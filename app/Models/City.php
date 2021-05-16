<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name','image'];

    public function getImageAttribute($value)
    {
        return '/storage/' . $value;
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
