<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->query('keyword');

        $posts = Post::query()
            ->when($keyword, function ($query, $keyword) {
                $query->where('title', 'like', '%' . $keyword . '%');
            })
            ->latest()
            ->get();

        return view('posts.index', compact('posts', 'keyword'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'max:255'],
            'body' => ['required'],
        ]);

        $post = new Post();
        $post->title = $validated['title'];
        $post->body = $validated['body'];
        $post->save();

        return redirect('/posts')->with('message', '投稿を保存しました。');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => ['required', 'max:255'],
            'body' => ['required'],
        ]);

        $post->title = $validated['title'];
        $post->body = $validated['body'];
        $post->save();

        return redirect('/posts/' . $post->id)->with('message', '投稿を更新しました。');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/posts')->with('message', '投稿を削除しました。');
    }
}

