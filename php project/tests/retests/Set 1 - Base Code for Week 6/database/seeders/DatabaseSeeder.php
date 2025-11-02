<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Blog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();


        $this->call(PermissionSeeder::class);

        \App\Models\User::factory()->create([
            'name' => 'Akash',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678')
        ])->assignRole('admin');
        Blog::factory(10)->create();
    }
}
