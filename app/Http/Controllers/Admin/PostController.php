<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostRequest;
use App\Models\Post;

class PostController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Post::class, 'post');
    }

    public function index()
    {
        $posts = \Auth::user()->posts()->orderByDesc('updated_at')->paginate();

        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(PostRequest $request): \Illuminate\Http\RedirectResponse
    {
        try {
            $post = app('PostService')->store($request->user(), $request);
            // call events
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }

        return redirect()->route('admin.posts.index')->with('successful', 'Post stored.');
    }

    public function show(Post $post)
    {
        return view('admin.posts.view', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(PostRequest $request, Post $post): \Illuminate\Http\RedirectResponse
    {
        $post->update($request->only(['title', 'content']));

        if ($request->hasFile('image')) {
            app('PostService')->dissociateImage($post);
            app('PostService')->associatingImage($post, $request->image);
        }

        return redirect()->route('admin.posts.index')->with('successful', 'Post updated.');
    }

    public function destroy(Post $post): \Illuminate\Http\RedirectResponse
    {
        try {
            $post->delete();
            // event
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }

        return redirect()->route('admin.posts.index')->with('successful', 'Post deleted.');
    }
}
