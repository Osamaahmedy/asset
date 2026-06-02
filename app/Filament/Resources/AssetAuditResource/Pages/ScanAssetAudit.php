<?php

namespace App\Filament\Resources\AssetAuditResource\Pages;

use App\Filament\Resources\AssetAuditResource;
use Filament\Resources\Pages\Page;

class ScanAssetAudit extends Page
{
    protected static string $resource = AssetAuditResource::class;

    protected static string $view = 'filament.resources.asset-audit-resource.pages.scan-asset-audit';

    public $record;
    public $scannedBarcode = '';
    public $searchQuery = '';
    public $searchResults = [];
    public $audit;
    public $auditItems = [];
    public $stats = [
        'total' => 0,
        'found' => 0,
        'missing' => 0,
        'misplaced' => 0,
        'progress' => 0,
    ];

    public function mount($record): void
    {
        $this->record = $record;
        $this->audit = \App\Models\AssetAudit::with(['items.asset.location', 'location'])->findOrFail($record);
        $this->refreshItems();
    }

    public function refreshItems()
    {
        $this->audit->load(['items.asset.location']);

        $userDepartmentIds = auth()->user()
            ->departments()
            ->pluck('departments.id')
            ->toArray();

        $allItems = $this->audit->items->filter(function ($item) use ($userDepartmentIds) {
            return in_array($item->asset->department_id, $userDepartmentIds);
        });
        
        // Group unfiltered first to calculate global stats
        $groupedAll = $allItems->groupBy('status');
        $this->stats['found'] = count($groupedAll['Found'] ?? []);
        $this->stats['missing'] = count($groupedAll['Missing'] ?? []);
        $this->stats['misplaced'] = count($groupedAll['Misplaced'] ?? []);
        $this->stats['total'] = $this->stats['found'] + $this->stats['missing'];
        $this->stats['progress'] = $this->stats['total'] > 0 
            ? round(($this->stats['found'] / $this->stats['total']) * 100) 
            : 0;

        // Apply search query filter if set
        $filteredItems = $allItems;
        if (!empty(trim($this->searchQuery))) {
            $search = strtolower(trim($this->searchQuery));
            $filteredItems = $allItems->filter(function ($item) use ($search) {
                $assetName = strtolower($item->asset->name ?? '');
                $serialNumber = strtolower($item->asset->serial_number ?? '');
                return str_contains($assetName, $search) || str_contains($serialNumber, $search);
            });
        }

        $this->auditItems = $filteredItems->groupBy('status')->toArray();
    }

    public function updatedSearchQuery()
    {
        $this->refreshItems();
    }

    public function updatedScannedBarcode($value)
    {
        $query = trim($value);
        if (strlen($query) >= 2) {
            $this->searchResults = \App\Models\Asset::where('name', 'like', "%{$query}%")
                ->orWhere('serial_number', 'like', "%{$query}%")
                ->limit(5)
                ->get()
                ->toArray();
        } else {
            $this->searchResults = [];
        }
    }

    public function selectAsset($assetId)
    {
        $asset = \App\Models\Asset::find($assetId);
        if (!$asset) return;

        $this->processAssetScan($asset);
        
        $this->scannedBarcode = '';
        $this->searchResults = [];
        $this->refreshItems();
    }

    public function scanBarcode()
    {
        $barcode = trim($this->scannedBarcode);
        if (empty($barcode)) return;

        $asset = null;

        // Try parsing URL if it's a URL
        if (filter_var($barcode, FILTER_VALIDATE_URL)) {
            $path = parse_url($barcode, PHP_URL_PATH);
            if (preg_match('/assets\/(\d+)/', $path, $matches)) {
                $asset = \App\Models\Asset::find($matches[1]);
            }
        }

        if (!$asset) {
            $asset = \App\Models\Asset::where('serial_number', $barcode)->first();
        }

        if (!$asset) {
            // Fallback to finding by name if they typed it
            $asset = \App\Models\Asset::where('name', $barcode)->first();
        }

        if (!$asset) {
            \Filament\Notifications\Notification::make()
                ->title(__('messages.audit.not_found'))
                ->body(__('messages.audit.not_found_desc', ['barcode' => $barcode]))
                ->danger()
                ->send();
            $this->scannedBarcode = '';
            $this->searchResults = [];
            return;
        }

        $this->processAssetScan($asset);

        $this->scannedBarcode = '';
        $this->searchResults = [];
        $this->refreshItems();
    }

    protected function processAssetScan($asset)
    {
        // Check if asset is already in the audit items
        $existingItem = $this->audit->items()->where('asset_id', $asset->id)->first();

        if ($existingItem) {
            // It was expected (Missing), now mark it as Found
            if ($existingItem->status !== 'Found') {
                $existingItem->update([
                    'status' => 'Found',
                    'scanned_serial_number' => $asset->serial_number,
                ]);
                \Filament\Notifications\Notification::make()
                    ->title(__('messages.audit.found_title'))
                    ->body(__('messages.audit.found_desc', ['name' => $asset->name]))
                    ->success()
                    ->send();
            } else {
                \Filament\Notifications\Notification::make()
                    ->title(__('messages.audit.already_scanned'))
                    ->body(__('messages.audit.already_scanned_desc', ['name' => $asset->name]))
                    ->warning()
                    ->send();
            }
        } else {
            // It was NOT expected (Misplaced) - It belongs somewhere else!
            \App\Models\AssetAuditItem::create([
                'asset_audit_id' => $this->audit->id,
                'asset_id' => $asset->id,
                'status' => 'Misplaced',
                'scanned_serial_number' => $asset->serial_number,
            ]);
            \Filament\Notifications\Notification::make()
                ->title(__('messages.audit.misplaced_title'))
                ->body(__('messages.audit.misplaced_desc', ['name' => $asset->name]))
                ->warning()
                ->send();
        }
    }

    public function completeAudit()
    {
        $this->audit->update(['status' => 'Completed']);
        
        \Filament\Notifications\Notification::make()
            ->title(__('messages.audit.completed_title'))
            ->body(__('messages.audit.completed_desc'))
            ->success()
            ->send();
            
        return redirect()->route('filament.admin.resources.asset-audits.index');
    }
}
