<?php

namespace Database\Seeders;

use App\Models\Opnion;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory(3)->create();
        Post::factory(5)->create();
        Opnion::factory(2)->create();
    }
}
