<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::where('role',User::USER)->paginate(10);
        $admins = User::where('role',User::ADMIN)->paginate(10);
        return view('admin.users.index',compact('users','admins'));
    }
}
