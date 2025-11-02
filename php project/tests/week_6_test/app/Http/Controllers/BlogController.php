<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogStoreRequest;
use App\Http\Requests\BlogUpdateRequest;
use App\Models\Blog;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $blogs = Blog::select('title', 'published_at', 'created_at', 'id', 'user_id')->get();
        return view('blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BlogStoreRequest $request
     * @return Application|Redirector|RedirectResponse
     */
    public function store(BlogStoreRequest $request)
    {
        Blog::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => Auth::id(),
            'published_at' => $request->published_at,
        ]);
        return redirect()->route('blog.index')->with('success','Blog created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param Blog $blog
     * @return Application|Factory|View
     */
    public function show(Blog $blog)
    {
        return view('blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Blog $blog
     * @return Application|Factory|View
     */
    public function edit(Blog $blog)
    {
        return view('blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BlogUpdateRequest $request
     * @param Blog $blog
     * @return Application|RedirectResponse|Redirector
     */
    public function update(BlogUpdateRequest $request, Blog $blog)
    {
        $blog->update([
            'title' => $request->title,
            'body' => $request->body,
            'published_at' => $request->published_at,
        ]);
        return redirect()->route('blog.index')->with('success','Blog updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Blog $blog
     * @return Application|Redirector|RedirectResponse
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('blog.index')->with('success','Blog deleted successfully!');
    }
}
