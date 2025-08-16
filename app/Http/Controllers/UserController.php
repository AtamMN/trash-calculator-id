<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Trash;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->role == "user") {
            return view('index');
        } else if (Auth::check() && Auth::user()->role == "admin") {
            return view('admin.dashboard');
        }
    }
    
    public function home(){
        $trashes = Trash::all();
        return view('index', compact('trashes'));
    }
}
