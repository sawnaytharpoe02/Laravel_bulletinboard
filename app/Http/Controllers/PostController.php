<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', ['posts' => Post::latest()->filter(request(['search']))->paginate(6)]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $formFields['user_id'] = auth()->id();

        Post::create($formFields);
        return redirect('/')->with('message', 'Post created successfully!');
    }

    public function show(Post $postId)
    {
        return view('posts.show', ['post' => $postId]);
    }

    public function update(Request $request, Post $postId)
    {
        $formFields = $request->validate([
            'title' => ['required', Rule::unique('posts', 'title')],
            'description' => 'required',
        ]);

        $formFields['user_id'] = auth()->id();
        $postId->update($formFields);

        return redirect('/')->with('message', 'Post updated successfully!');
    }

    public function destroy(Post $postId)
    {
        $postId->delete();
        return redirect('/')->with('message', 'Post deleted successfully!');
    }
}
