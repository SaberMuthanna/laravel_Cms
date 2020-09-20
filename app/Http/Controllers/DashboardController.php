<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Category;
use App\Tag;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [

            'users_count' => User::all()->count(),
            'posts_count' => Post::all()->count(),
            'categories_count' => Category::all()->count(),
            'tags_count' => Tag::all()->count(),

        ]);
    }
}
