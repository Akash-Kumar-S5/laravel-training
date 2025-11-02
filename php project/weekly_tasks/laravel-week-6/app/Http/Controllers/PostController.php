<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('post.index',compact('posts'));
    }

    /**
     * show the posts user created
     */
    public function userPosts()
    {
        $user = auth()->user();
        $posts = $user->post()->orderByDesc('created_at')->paginate(6);

        return view('post.user-post',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'description' => 'required|min:3',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        $post = auth()->user()->post()->create([
            'post_name' => $request['title'],
            'post_description' => $request['description'],
            'post_image' => $imagePath,
        ]);

        return to_route('post.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('post.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|min:3',
            'description' => 'required|min:3',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        $data=[
            'post_name' => $request['title'],
            'post_description' => $request['description']
        ];

        if($imagePath){
            $data = [
                'post_image' => $imagePath
            ];
        }
        if($post->update($data))
        {
            return redirect()->route('post.index')->with('success','Updated successfully');
        }
        return  redirect()->back()->with('failed','problem detected');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $deletePost=$post->delete();
        return redirect()->back()->with('success', 'Post deleted successfully.');
    }
}
