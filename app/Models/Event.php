<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Event extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function socials()
    {
        return $this->morphMany(Social::class, 'socialable');
    }

    public function features()
    {
        return $this->hasMany(Feature::class, 'event_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class,'wishlist','event_id','user_id');
    }

    public function getThumbnailAttribute($value)
    {
        $thumbnailObject = json_decode($value);
        return [
            'status' => $thumbnailObject->show_thumbnail,
            'url' => '/storage/' . $thumbnailObject->thumbnailImage,
        ];
    }

    public function getHeaderMediaAttribute($value)
    {
        $headerMediaObject = json_decode($value);
        if (key_exists('singleImage', $headerMediaObject)) {
            return [
                'type' => 'single',
                'url' => '/storage/' . $headerMediaObject->singleImage,
            ];
        }
        $newUrlsWithPathPrefix = $headerMediaObject->carouselImages;
        array_walk($newUrlsWithPathPrefix, function (&$item) {
            $item = '/storage/' . $item;
        });
        return [
            'type' => 'carousel',
            'url' => $newUrlsWithPathPrefix,
        ];
    }

    public function getHasSavedAttribute()
    {
        if(Auth::check()) {
            if (Auth::user()->wishlist()->where('event_id',$this->id)->exists()) {
                return true;
            }
        }
        return false;
    }
}
