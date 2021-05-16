<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $guarded = ['id'];
    public $timestamps = false;

    public function events()
    {
        return $this->belongsTo(Event::class);
    }

    public function getContentAttribute($value)
    {
        return json_decode($value, true);
    }
}
