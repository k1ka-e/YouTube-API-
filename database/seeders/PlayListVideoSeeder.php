<?php

namespace Database\Seeders;

use App\Models\Channel;
use App\Models\PlayList;
use App\Models\Video;
use Illuminate\Support\Collection;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PlayListVideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        PlayList::with('channel.videos')
            ->get()
            ->each(fn (PlayList $playList) => $playList->videos()->saveMany($this->randomVideosFrom($playList->channel)));
    }


    private function randomVideosFrom(Channel $channel): Collection
    {
        if ($channel->videos->isEmpty()) {
            return collect();
        }

        $videos = $channel->videos;
        $randomCount = mt_rand(1, $videos->count());

        return $videos->random($randomCount);
    }


}
