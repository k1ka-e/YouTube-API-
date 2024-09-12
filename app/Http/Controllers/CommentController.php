<?php

namespace App\Http\Controllers;

use App\Enums\Period;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        return Comment::withRelationships(request('with'))
            ->fromPeriod(Period::tryFrom(request('period')))
            ->search(request('query'))
            ->orderBy(request('sort', 'created_at'), request('order', 'desc'))
            ->simplePaginate(request('limit'));
    }

    public function show(Comment $comment)
    {
        return $comment->loadRelationships(request('with'));
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'text' => 'required|string',
            'parent_id' => 'exists:comments,id',
            'video_id' => 'required_without:parent_id|exists:videos,id'
        ]);




        return Comment::create($attributes);
    }


    public function update(Comment $comment, Request $request)
    {
        //authorize
        Gate::allowIf(fn (User $user) => $comment->isOwnedBy($user) && $user->tokenCan('comment:update'));

        $attributes = $request->validate([
            'text' => 'required|string'
        ]);

        $comment->fill($attributes)->save();
    }

    public function destroy(Comment $comment, )
    {
        //authorize
        Gate::allowIf(fn (User $user) => $comment->isOwnedBy($user) && $user->tokenCan('comment:delete'));

        $comment->delete();
    }

}
