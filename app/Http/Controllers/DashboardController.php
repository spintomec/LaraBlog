<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Posts;

class DashboardController extends Controller
{
    public function index() {
        $posts = auth()->user()->posts;

        return view('dashboard', compact('posts'));
    }
}
