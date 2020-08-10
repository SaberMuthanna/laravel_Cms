<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Http\Requests\Posts\CreatePostRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  view('posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('posts.create')->with('categories', Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        //upload the image to store
        // $image = $request->image->store('posts');
        $image = $request->image;
        $image_new_name = time() . $image->getClientOriginalName();
        $image->move('storage/posts', $image_new_name);
        //create this post
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            "image" => 'storage/posts/'. $image_new_name,
            'published_at' => $request->published_at,
            'category_id' => $request->category
        ]);
        session()->flash('success', 'Post Created successfully');

        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

        return view('posts.create')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->only(['title', 'description', 'published_at', 'content']);

        if ($request->hasFile('image')) {
            $image = $request->image;
            $image_new_name = time() . $image->getClientOriginalName();
            $image->move('storage/posts', $image_new_name);
            $data['image'] = 'storage/posts/' . $image_new_name;
        }
        $post->update($data);
        session()->flash('success', 'Post Updated successfully');
        return redirect('/posts');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post =  Post::withTrashed()->where('id', $id)->firstOrFail();
        if ($post->trashed()) {
            $post->forceDelete();
        } else {
            $post->delete();
        }

        session()->flash('success', 'Post deleted successfully');
        return redirect('/posts');
    }
    //Display list of post trashed
    public function trashed()
    {
        $rtashed  = Post::onlyTrashed()->get();
        return view('posts.softDelete')->with('posts', $rtashed);
    }
    public function restore($id)
    {
        $post =  Post::withTrashed()->where('id', $id)->firstOrFail();
        $post->restore();
        session()->flash('success', 'Post restore successfully');
        return redirect()->back();
    }
}
