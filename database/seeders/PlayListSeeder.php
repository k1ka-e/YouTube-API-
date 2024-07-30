<?php

namespace Database\Seeders;

use App\Models\PlayList;
use Illuminate\Database\Seeder;

class PlayListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PlayList::factory(10)->create();
    }
}
