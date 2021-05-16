<?php

namespace App;

use App\Models\Booking;
use App\Models\Comment;
use App\Models\Delivery;
use App\Models\Event;
use App\Models\Order;
use App\Models\Social;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $guarded = ['id'];

    const ADMIN = 1;
    const USER = 0;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function socials()
    {
        return $this->morphMany(Social::class, 'socialable');
    }

    public function followings()
    {
        return $this->belongsToMany(User::class, 'follow', 'follower_id', 'following_id');
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'follow', 'following_id', 'follower_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function wishlist()
    {
        return $this->belongsToMany(Event::class, 'wishlist', 'user_id', 'event_id');
    }

    public function delivery()
    {
        return $this->hasOne(Delivery::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function getAvatarNameAttribute($value)
    {
        if (empty($value)) {
            return "/img/avatar/defaultAvatar.jpg";
        }
        return '/storage/' . $value;
    }

    public function getHeaderBackgroundAttribute($value)
    {
        if (empty($value)) {
            return "/img/header_background/defaultHeaderBackground.jpg";
        }
        return '/storage/' . $value;
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function getFullNameAttribute($value)
    {
        return ucwords($value);
    }
}
