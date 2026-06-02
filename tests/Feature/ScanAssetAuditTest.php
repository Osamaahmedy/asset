<?php

namespace Tests\Feature;

use App\Models\Asset;
use App\Models\AssetAudit;
use App\Models\AssetAuditItem;
use App\Models\Department;
use App\Models\Location;
use App\Models\User;
use App\Filament\Resources\AssetAuditResource\Pages\ScanAssetAudit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class ScanAssetAuditTest extends TestCase
{
    use RefreshDatabase;

    public function test_live_search_updates_search_results()
    {
        $user = User::factory()->create();
        $location = Location::create(['name' => 'Test Location']);
        $audit = AssetAudit::create([
            'name' => 'Audit 1',
            'audit_date' => now(),
            'location_id' => $location->id,
            'user_id' => $user->id,
            'status' => 'In Progress',
        ]);

        $asset1 = Asset::create([
            'name' => 'Laptop HP ProBook',
            'serial_number' => 'SN-HP-123',
            'location_id' => $location->id,
        ]);

        $asset2 = Asset::create([
            'name' => 'Dell Monitor',
            'serial_number' => 'SN-DELL-456',
            'location_id' => $location->id,
        ]);

        Livewire::actingAs($user)
            ->test(ScanAssetAudit::class, ['record' => $audit->id])
            ->set('scannedBarcode', 'Laptop')
            ->assertSet('searchResults', function($results) use ($asset1) {
                return count($results) === 1 && $results[0]['id'] === $asset1->id;
            })
            ->set('scannedBarcode', 'SN-')
            ->assertSet('searchResults', function($results) {
                return count($results) === 2;
            })
            ->set('scannedBarcode', 'abc')
            ->assertSet('searchResults', []);
    }

    public function test_select_asset_processes_scan_properly()
    {
        $user = User::factory()->create();
        $location = Location::create(['name' => 'Test Location']);
        $audit = AssetAudit::create([
            'name' => 'Audit 1',
            'audit_date' => now(),
            'location_id' => $location->id,
            'user_id' => $user->id,
            'status' => 'In Progress',
        ]);

        $asset = Asset::create([
            'name' => 'Laptop HP ProBook',
            'serial_number' => 'SN-HP-123',
            'location_id' => $location->id,
        ]);

        $item = AssetAuditItem::create([
            'asset_audit_id' => $audit->id,
            'asset_id' => $asset->id,
            'status' => 'Missing',
        ]);

        Livewire::actingAs($user)
            ->test(ScanAssetAudit::class, ['record' => $audit->id])
            ->call('selectAsset', $asset->id)
            ->assertSet('scannedBarcode', '')
            ->assertSet('searchResults', []);

        $this->assertEquals('Found', $item->fresh()->status);
        $this->assertEquals('SN-HP-123', $item->fresh()->scanned_serial_number);
    }

    public function test_url_scanning_resolves_and_processes_scan()
    {
        $user = User::factory()->create();
        $location = Location::create(['name' => 'Test Location']);
        $audit = AssetAudit::create([
            'name' => 'Audit 1',
            'audit_date' => now(),
            'location_id' => $location->id,
            'user_id' => $user->id,
            'status' => 'In Progress',
        ]);

        $asset = Asset::create([
            'name' => 'Laptop HP ProBook',
            'serial_number' => 'SN-HP-123',
            'location_id' => $location->id,
        ]);

        $item = AssetAuditItem::create([
            'asset_audit_id' => $audit->id,
            'asset_id' => $asset->id,
            'status' => 'Missing',
        ]);

        Livewire::actingAs($user)
            ->test(ScanAssetAudit::class, ['record' => $audit->id])
            ->set('scannedBarcode', "http://127.0.0.1:8000/api/assets/{$asset->id}")
            ->call('scanBarcode');

        $this->assertEquals('Found', $item->fresh()->status);
    }

    public function test_search_query_filters_lists_without_affecting_global_stats()
    {
        $user = User::factory()->create();
        $location = Location::create(['name' => 'Test Location']);
        $audit = AssetAudit::create([
            'name' => 'Audit 1',
            'audit_date' => now(),
            'location_id' => $location->id,
            'user_id' => $user->id,
            'status' => 'In Progress',
        ]);

        $asset1 = Asset::create([
            'name' => 'HP Laptop',
            'serial_number' => 'SN-HP-123',
            'location_id' => $location->id,
        ]);

        $asset2 = Asset::create([
            'name' => 'Dell Monitor',
            'serial_number' => 'SN-DELL-456',
            'location_id' => $location->id,
        ]);

        AssetAuditItem::create([
            'asset_audit_id' => $audit->id,
            'asset_id' => $asset1->id,
            'status' => 'Missing',
        ]);

        AssetAuditItem::create([
            'asset_audit_id' => $audit->id,
            'asset_id' => $asset2->id,
            'status' => 'Missing',
        ]);

        Livewire::actingAs($user)
            ->test(ScanAssetAudit::class, ['record' => $audit->id])
            ->assertCount('auditItems.Missing', 2)
            ->set('searchQuery', 'HP')
            ->assertCount('auditItems.Missing', 1)
            ->assertSet('stats.missing', 2);
    }
}
