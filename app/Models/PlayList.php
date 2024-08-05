<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayList extends Model
{
    use HasFactory;

    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }

    public function videos()
    {
        return $this->belongsToMany(Video::class,'playlist_video', 'playlist_id', 'video_id');
    }

    public function scopeSearch($query, ?string $name)
    {
        return $query->where('name', 'like', '%' . "%$name%");
    }
}
