<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::whereHas('roles', function($query) {
            $query->where('name', 'customer');
        })->latest()->get();
        
        return view('admin.user.index', compact('users'));
    }
}
