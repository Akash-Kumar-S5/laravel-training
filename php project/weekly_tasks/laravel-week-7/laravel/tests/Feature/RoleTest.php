<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class RoleTest extends TestCase
{
    use RefreshDatabase;

    /**
     *  Create a user and authenticate it for testing
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        Role::create(['name' => 'admin']);
        $this->user->assignRole('admin');
        $this->actingAs($this->user);
    }

    /**
     * @return void
     */
    public function test_creates_role_with_permissions()
    {
        $permission1 = Permission::create(['name' => 'create-permission']);
        $permission2 = Permission::create(['name' => 'edit-permission']);

        $response = $this->post(route('admin.roles.store'), [
            'name' => 'test_role',
            'permissions' => [$permission1->name, $permission2->name]
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('roles', ['name' => 'admin']);
        $this->assertDatabaseHas('role_has_permissions', ['role_id' => 2, 'permission_id' => $permission1->id]);
        $this->assertDatabaseHas('role_has_permissions', ['role_id' => 2, 'permission_id' => $permission2->id]);
    }

    /**
     * @return void
     */
    public function test_updates_role_and_permissions()
    {
        $role = Role::create(['name' => 'test_role']);

        $permission1 = Permission::create(['name' => 'create-permission']);
        $permission2 = Permission::create(['name' => 'edit-permission']);

        $role->givePermissionTo([$permission1->id]);

        $response = $this->put(route('admin.roles.update', $role), [
            'name' => 'updated_role',
            'permissions' => [$permission2->id]
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('roles', ['name' => 'updated_role']);
        $this->assertDatabaseMissing('role_has_permissions', ['role_id' => $role->id, 'permission_id' => $permission1->id]);
        $this->assertDatabaseHas('role_has_permissions', ['role_id' => $role->id, 'permission_id' => $permission2->id]);
    }

}
