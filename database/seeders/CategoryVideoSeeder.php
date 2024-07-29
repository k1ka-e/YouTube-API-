<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Video;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class CategoryVideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    //    public function run(): void
    //    {
    //        $categoryIds = Category::pluck('id')->all();
    //        $videoIds = Video::pluck('id')->all();
    //
    //        $categoryVideo = [];
    //
    //        foreach ($categoryIds as $categoryId) {
    //            $randomVideoIds = Arr::random($videoIds, mt_rand(1, count($videoIds)));
    //
    //            foreach ($randomVideoIds as $videoId) {
    //                $categoryVideo[] = [
    //                    'category_id' => $categoryId,
    //                    'video_id' => $videoId,
    //                ];
    //            }
    //        }
    //
    //        DB::table('category_video')->insert($categoryVideo);
    //    }

    public function run(): void
    {
        $categoryIds = Category::pluck('id');
        $videoIds = Video::pluck('id');

        $categoryVideo = $categoryIds->flatMap(
            fn (int $id) => $this->categoryVideos($id, $this->randomVideoIds($videoIds))
        );

        DB::table('category_video')->insert($categoryVideo->all());

    }

    private function categoryVideos(int $categoryId, Collection $videoIds): Collection
    {

        return $videoIds->map(fn (int $id) => [
            'category_id' => $categoryId,
            'video_id' => $id,
        ]);
    }

    private function randomVideoIds(Collection $ids): Collection
    {
        return $ids->random(mt_rand(1, count($ids)));
    }
}
