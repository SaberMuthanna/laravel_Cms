<?php

namespace App\Http\Controllers;
use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        return view('welcome')
            ->with('posts'     , Post::simplepaginate(2))
            ->with('categories', Category::all())
            ->with('tags'     , Tag::all());
    }
}
