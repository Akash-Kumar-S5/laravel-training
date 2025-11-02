<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use Tests\TestCase;

class PermissionTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        Role::create(['name' => 'admin']);
        $this->user->assignRole('admin');
        $this->actingAs($this->user);
    }

    public function test_index_method_displays_permission_index_view()
    {
        $response = $this->get(route('admin.permissions.index'));

        $response->assertStatus(Response::HTTP_OK);
        $response->assertViewIs('admin.permissions.index');
    }

    public function test_create_method_displays_permission_create_view()
    {
        $response = $this->get(route('admin.permissions.create'));

        $response->assertStatus(Response::HTTP_OK);
        $response->assertViewIs('admin.permissions.create');
    }

    public function test_store_method_creates_permission()
    {
        $permissionData = ['name' => 'test_permission'];

        $response = $this->post(route('admin.permissions.store'), $permissionData);

        $response->assertStatus(Response::HTTP_FOUND);
        $this->assertDatabaseHas('permissions', $permissionData);
    }

    public function test_store_method_redirects_to_index_on_success()
    {
        $permissionData = ['name' => 'test_permission'];

        $response = $this->post(route('admin.permissions.store'), $permissionData);

        $response->assertRedirect(route('admin.permissions.index'));
        $response->assertSessionHas('alert', 'success');
        $response->assertSessionHas('message', 'Permission created successfully');
    }

    public function test_store_method_validates_name_field()
    {
        // Test validation when 'name' field is missing
        $response = $this->post(route('admin.permissions.store'), []);
        $response->assertSessionHasErrors('name');

        // Test validation when 'name' field is too short
        $response = $this->post(route('admin.permissions.store'), ['name' => 'a']);
        $response->assertSessionHasErrors('name');
    }

    public function test_edit_method_displays_permission_edit_view()
    {
        $permission = Permission::create(['name' => 'testing']);

        $response = $this->get(route('admin.permissions.edit', $permission));

        $response->assertStatus(Response::HTTP_OK);
        $response->assertViewIs('admin.permissions.edit');
    }

    public function test_update_method_updates_permission()
    {
        $permission = Permission::create(['name' => 'testing']);

        $updatedName = 'updated_permission';

        $response = $this->put(route('admin.permissions.update', $permission), ['name' => $updatedName]);

        $response->assertStatus(Response::HTTP_FOUND);
        $this->assertDatabaseHas('permissions', ['id' => $permission->id, 'name' => $updatedName]);
    }

    public function test_update_method_redirects_to_index_on_success()
    {
        $permission = Permission::create(['name' => 'testing']);


        $response = $this->put(route('admin.permissions.update', $permission), ['name' => 'updated_permission']);

        $response->assertRedirect(route('admin.permissions.index'));
        $response->assertSessionHas('alert', 'success');
        $response->assertSessionHas('message', 'Permission edited successfully');
    }

    public function test_destroy_method_deletes_permission()
    {
        $permission = Permission::create(['name' => 'testing']);


        $response = $this->delete(route('admin.permissions.destroy', $permission));

        $response->assertStatus(ResponseAlias::HTTP_OK);
        $this->assertDatabaseMissing('permissions', ['id' => $permission->id]);
    }

    public function test_destroy_method_returns_json_response_on_success()
    {
        $permission = Permission::create(['name' => 'testing']);


        $response = $this->delete(route('admin.permissions.destroy', $permission));

        $response->assertStatus(ResponseAlias::HTTP_OK);
        $response->assertJson(['message' => 'Permission deleted successfully']);
    }
}
