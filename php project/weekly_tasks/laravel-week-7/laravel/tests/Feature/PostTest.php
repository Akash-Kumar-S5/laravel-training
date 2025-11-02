<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class PostTest extends TestCase
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

    public function test_index_method_displays_post_index_view()
    {
        $response = $this->get(route('post.index'));

        $response->assertStatus(Response::HTTP_OK);
        $response->assertViewIs('post.index');
    }

    public function test_userPosts_method_displays_user_post_view()
    {
        $response = $this->get(route('post.my-posts'));

        $response->assertStatus(Response::HTTP_OK);
        $response->assertViewIs('post.user-post');
    }

    public function test_create_method_displays_post_create_view()
    {
        $response = $this->get(route('post.create'));

        $response->assertStatus(Response::HTTP_OK);
        $response->assertViewIs('post.create');
    }

    public function test_store_method_creates_post()
    {
        Storage::fake('public');

        $postData = [
            'title' => 'Test Post',
            'description' => 'This is a test post',
            'image' => UploadedFile::fake()->image('test.jpg'),
        ];

        $response = $this->post(route('post.store'), $postData);

        $response->assertStatus(Response::HTTP_FOUND);
        $this->assertDatabaseHas('posts', ['post_name' => 'Test Post']);
        Storage::disk('public')->assertExists('images/' . $postData['image']->hashName());
    }

    public function test_store_method_redirects_to_index_on_success()
    {
        Storage::fake('public');

        $postData = [
            'title' => 'Test Post',
            'description' => 'This is a test post',
            'image' => UploadedFile::fake()->image('test.jpg'),
        ];

        $response = $this->post(route('post.store'), $postData);

        $response->assertRedirect(route('post.index'));
        $response->assertSessionHas('success', 'Post created successfully');
    }

    public function test_store_method_validates_fields()
    {
        $response = $this->post(route('post.store'), ['description' => 'Test Description']);
        $response->assertSessionHasErrors('title');

        $response = $this->post(route('post.store'), ['title' => 'Test Title']);
        $response->assertSessionHasErrors('description');

        $response = $this->post(route('post.store'), [
            'title' => 'Test Title',
            'description' => 'Test Description',
            'image' => UploadedFile::fake()->create('document.pdf'),
        ]);
        $response->assertSessionHasErrors('image');
    }

    public function test_edit_method_displays_post_edit_view()
    {
        $post = Post::factory()->create(['user_id' => '1']);

        $response = $this->get(route('post.edit', $post));

        $response->assertStatus(Response::HTTP_OK);
        $response->assertViewIs('post.edit');
    }

    public function test_update_method_updates_post()
    {
        Storage::fake('public');
        $post = Post::factory()->create(['user_id' => '1']);
        $newImage = UploadedFile::fake()->image('updated.jpg');

        $postData = [
            'title' => 'Updated Test Post',
            'description' => 'This is an updated test post',
            'image' => $newImage,
        ];
        $response = $this->put(route('post.update', $post), $postData);
        $response->assertRedirect(route('post.index'));
        $response->assertSessionHas('success', 'Updated successfully');
        $this->assertDatabaseHas('posts', ['post_name' => 'Updated Test Post']);
        Storage::disk('public')->assertExists('images/' . $newImage->hashName());
    }

    public function test_destroy_method_deletes_post()
    {
        $post = Post::factory()->create(['user_id' => '1']);

        $response = $this->delete(route('post.destroy', $post));

        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertSessionHas('success', 'Post deleted successfully.');
        $response->assertRedirect();
    }
}
