<?php

namespace Database\Seeders;

use App\Models\HomePage;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Role::create([
            'name' => 'admin'
        ]);
        Role::create([
            'name' => 'user'
        ]);
        Role::create([
            'name' => 'teacher'
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'phone' => '930430959',
        ])->assignRole('admin');
        HomePage::create([
            'title'=>'1',
            'video1'=>'1',
            'video2'=>'1',
            'video3'=>'1',
        ]);
    }
}
