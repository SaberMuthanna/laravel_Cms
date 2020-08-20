<?php

namespace App\Http\Controllers\Blog;


use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Tag;
use App\User;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function show(Post $post)
    {
        return view('blog.show')->with('post', $post);
    }
    public function category (Category $category){
        return view('blog.category')->with('category', $category);
    }
    public function tag(Tag $tag)
    {
        return view('blog.tag')->with('tag', $tag);
    }

}
