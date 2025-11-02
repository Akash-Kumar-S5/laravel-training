<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();


        $this->call(RoleSeeder::class);
        $this->call(AdminSeeder::class);
        Post::factory(5)->create([
            'user_id' => '1'
        ]);
        Post::factory(5)->create([
            'user_id' => '2'
        ]);
         \App\Models\User::factory()->create([
             'name' => 'Test User',
             'email' => 'test@gmail.com',
             'password' => Hash::make('12345678')
         ]);
    }
}
