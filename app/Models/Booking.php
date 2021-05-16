<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    const WAITING = 1;
    const VERIFIED = 0;
    const UNVERIFIED = 2;

    protected $guarded = ['d'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
