<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $fillable = [
        'id', 'user_id','address','city','country','postal_code','state'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
