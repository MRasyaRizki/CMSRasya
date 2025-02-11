<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 

class userController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(5);
        return view('manageUser', compact('users'));
    }
}
