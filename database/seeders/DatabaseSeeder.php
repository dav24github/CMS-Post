<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.jm
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->has(Post::factory()->count(2))->create();
        User::factory(10)->hasPosts(3)->create();

        // $this->call(UsersTableSeeder::class);
    }
}