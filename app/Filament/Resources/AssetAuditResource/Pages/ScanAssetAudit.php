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
        $this->audit = \App\Models\AssetAudit::with(['items.asset', 'location'])->findOrFail($record);
        $this->refreshItems();
    }

    public function refreshItems()
    {
        $this->audit->load('items.asset');
        $this->auditItems = $this->audit->items->groupBy('status')->toArray();
        
        $this->stats['found'] = count($this->auditItems['Found'] ?? []);
        $this->stats['missing'] = count($this->auditItems['Missing'] ?? []);
        $this->stats['misplaced'] = count($this->auditItems['Misplaced'] ?? []);
        $this->stats['total'] = $this->stats['found'] + $this->stats['missing'];
        $this->stats['progress'] = $this->stats['total'] > 0 
            ? round(($this->stats['found'] / $this->stats['total']) * 100) 
            : 0;
    }

    public function scanBarcode()
    {
        $barcode = trim($this->scannedBarcode);
        if (empty($barcode)) return;

        // Find asset by serial number
        $asset = \App\Models\Asset::where('serial_number', $barcode)->first();

        if (!$asset) {
            \Filament\Notifications\Notification::make()
                ->title(__('messages.audit.not_found'))
                ->body(__('messages.audit.not_found_desc', ['barcode' => $barcode]))
                ->danger()
                ->send();
            $this->scannedBarcode = '';
            return;
        }

        // Check if asset is already in the audit items
        $existingItem = $this->audit->items()->where('asset_id', $asset->id)->first();

        if ($existingItem) {
            // It was expected (Missing), now mark it as Found
            if ($existingItem->status !== 'Found') {
                $existingItem->update([
                    'status' => 'Found',
                    'scanned_serial_number' => $barcode,
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
                'scanned_serial_number' => $barcode,
            ]);
            \Filament\Notifications\Notification::make()
                ->title(__('messages.audit.misplaced_title'))
                ->body(__('messages.audit.misplaced_desc', ['name' => $asset->name]))
                ->warning()
                ->send();
        }

        $this->scannedBarcode = '';
        $this->refreshItems();
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
