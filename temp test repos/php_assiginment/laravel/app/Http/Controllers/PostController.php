<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class postController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allPosts = Post::with('user')->orderByDesc('created_at')->paginate(6); // Retrieve 6 products per page
        return view('home', compact('allPosts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create-posts');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        $post = auth()->user()->post()->create([
            'post_name' => $request['title'],
            'post_description' => $request['description'],
            'post_image' => $imagePath,
        ]);

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $user = auth()->user();
        $userPosts = $user->post()->orderByDesc('created_at')->paginate(6);

        return view('admin.user-posts',compact('userPosts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        return view('admin.edit-post',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images', 'public');
            }

            $model = Post::findOrFail($id);
            $data=[
                'post_name' => $request['title'],
                'post_description' => $request['description']
            ];
            if($imagePath){
                $data = [
                    'post_image' => $imagePath
                ];
            }
            if($model->update($data))
            {
                return redirect()->route('home.index')->with('success','Updated successfully');
            }
            return  redirect()->back()->with('failed','problem detected');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->back()
            ->with('success', 'Post deleted successfully.');

    }
}
