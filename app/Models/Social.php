<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $fillable = [
        'website',
        'link'
    ];

    public function socialable()
    {
        return $this->morphTo();
    }
}
