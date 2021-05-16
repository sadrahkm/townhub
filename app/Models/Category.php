<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','image'];
    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function getImageAttribute($value)
    {
        return '/storage/' . $value;
    }
}
