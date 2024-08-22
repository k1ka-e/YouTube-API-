<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ChannelSeeder::class,
            PlayListSeeder::class,
            VideoSeeder::class,
            CategorySeeder::class,
            CategoryVideoSeeder::class,
            PlayListVideoSeeder::class,
            Comment::class,
        ]);

    }
}
