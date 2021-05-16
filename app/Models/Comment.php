<?php

namespace App\Models;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    const LIKE = 2;
    const DISLIKE = 3;
    protected $fillable = [
        'user_id', 'description', 'clean', 'comfort', 'staff', 'facility','point', 'gallery'
    ];

    public function commentable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPointAttribute($value)
    {
        $pointDecodedJsonObject = json_decode($value,true);
        $allPoints = [];
        foreach ($pointDecodedJsonObject['points'] as $key => $point) {
            $allPoints[$key] = $point;
        }
        return [
            'average' => $pointDecodedJsonObject['avg'],
            'clean' => $allPoints['clean'],
            'comfort' => $allPoints['comfort'],
            'staff' => $allPoints['staff'],
            'facility' => $allPoints['facility'],
        ];
    }

    public function getCreatedAtAttribute($value)
    {
        $value = Carbon::parse($value);
        return $value->format('Y M d | h:m');
    }

    public function getGalleryAttribute($value)
    {
        $imagesDecodedObject = json_decode($value,true);
        $result = [];
        if(!empty($imagesDecodedObject)) {
            foreach ($imagesDecodedObject as $item) {
                $result[] = '/storage/' . $item;
            }
        }
        return $result;
    }
}
