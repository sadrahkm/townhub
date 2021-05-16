<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'id', 'user_id', 'method', 'gateway', 'status', 'res_num', 'ref_num', 'amount', 'created_at', 'updated_at'
    ];
    const INCOMPLETE = 0;
    const COMPLETE = 1;

    const ONLINE = 0;
    const WALLET = 1;

}
