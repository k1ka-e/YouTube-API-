<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Video;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Video::take(3)->get()
            ->flatMap(fn (Video $video) => static::seedCommentFor($video)
            ->each(fn (Comment $comment) => static::associateParentCommentWith($comment);
    }

    private static function findRandomCommentThatCanBeParentOf(Comment $comment)
    {
        return $comment->video
            ->comments()
            ->doesntHave('parent')
            ->where('id', '<>', $comment->id)
            ->inRandomOrder()
            ->first();
    }

    private static function associateParentCommentWith(Comment $comment)
    {
        if ($comment->replies->isNotEmpty()) return;
        $comment->parent()->associate(static::findRandomCommentThatCanBeParentOf($comment))->save();
    }

    private static function seedCommentFor(Video $video)
    {
        $comment = Comment::factory(10)->create();

        $video->comments()->saveMany($comment);

        return $comment;
    }
}
