<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index() {
        $posts = Post::orderBy('created_at', 'desc')->paginate(3);

        return view('posts.index', compact('posts'));
    }

    public function new() {
        return view('posts.form');
    }

    public function create(Request $request) {
        $request->validate([
            'name' => 'required|string|max:50',
            'message' => 'required|string|max:255',
        ]);

        $post = Post::create($request->all());

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public'); // storage/app/public/images
            $post->image = $path;
            $post->save();
        }

        return redirect()->route('posts.index')->with('success', '投稿しました！');
    }

    public function destroy($id) {
        $post = Post::findOrFail($id); // idで該当の投稿を探す(見つからなければ404エラー)
        $post->delete();

        return redirect('/posts')->with('success', "投稿を削除しました。");
    }

    public function show($id) {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function edit($id) {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request) {
        $request->validate([
            'name' => 'required|string|max:50',
            'message' => 'required|string|max:255',
        ]);

        $post = Post::findOrFail($request->id);
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public'); // storage/app/public/images
            $post->image = $path;
            $post->save();
        }
        $post->update($request->only(['name', 'message']));

        return redirect()->route('posts.index')->with('success', '投稿を更新しました！');
    }
}
