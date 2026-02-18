<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(20)->for(Post::factory()->has(Comment::factory()->count(4))->count(3))->create();
    }
}
