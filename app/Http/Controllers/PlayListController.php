<?php

namespace App\Http\Controllers;

use App\Models\PlayList;

class PlayListController extends Controller
{
    public function index()
    {
        return PlayList::withRelationships(request('with', []))
            ->search(request('query'))
            ->orderBy(request('sort', 'name'), request('order', 'asc'))
            ->simplePaginate(request('limit'));

    }

    public function show(PlayList $playlist)
    {
        return $playlist->load(request('with', []));
    }
}
