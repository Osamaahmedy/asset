<?php

namespace Tests\Feature;

use App\Models\Asset;
use App\Models\AssetType;
use App\Models\Department;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Spatie\Permission\Models\Permission;

class AssetBarcodePrintTest extends TestCase
{
    use RefreshDatabase;

    public function test_unauthenticated_user_cannot_access_barcode_print()
    {
        $response = $this->get(route('assets.print-barcodes', ['ids' => '1,2']));

        $response->assertStatus(403);
    }

    public function test_authenticated_user_without_permission_cannot_access_barcode_print()
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)
            ->get(route('assets.print-barcodes', ['ids' => '1,2']));

        $response->assertStatus(403);
    }

    public function test_authenticated_user_with_permission_can_only_print_assets_in_their_departments()
    {
        // 1. Create permission
        Permission::findOrCreate('عرض الأصول');

        // 2. Create departments
        $dept1 = Department::create(['name' => 'Department One']);
        $dept2 = Department::create(['name' => 'Department Two']);

        // 3. Create user and assign permission and department 1
        $user = User::factory()->create();
        $user->givePermissionTo('عرض الأصول');
        $user->departments()->attach($dept1->id);

        // 4. Create asset type
        $assetType = AssetType::create(['name' => 'Test Type']);

        // 5. Create assets
        $assetInDept1 = Asset::create([
            'name' => 'Asset 1',
            'serial_number' => 'SN-111',
            'department_id' => $dept1->id,
            'asset_type_id' => $assetType->id,
            'is_personal' => false,
            'price' => 100,
            'purchase_date' => '2026-05-28',
            'status' => Asset::STATUS_AVAILABLE,
            'maintenance_due_date' => '2026-08-28',
            'last_maintenance_date' => '2026-05-28',
        ]);

        $assetInDept2 = Asset::create([
            'name' => 'Asset 2',
            'serial_number' => 'SN-222',
            'department_id' => $dept2->id,
            'asset_type_id' => $assetType->id,
            'is_personal' => false,
            'price' => 200,
            'purchase_date' => '2026-05-28',
            'status' => Asset::STATUS_AVAILABLE,
            'maintenance_due_date' => '2026-08-28',
            'last_maintenance_date' => '2026-05-28',
        ]);

        // 6. Act as the user and request print for both assets
        $response = $this->actingAs($user)
            ->get(route('assets.print-barcodes', ['ids' => "{$assetInDept1->id},{$assetInDept2->id}"]));

        $response->assertStatus(200);
        $response->assertViewHas('assets');
        
        $renderedAssets = $response->viewData('assets');
        
        // Assert that only Asset 1 (belonging to Dept 1) is returned/printed
        $this->assertTrue($renderedAssets->contains($assetInDept1));
        $this->assertFalse($renderedAssets->contains($assetInDept2));
    }
}
