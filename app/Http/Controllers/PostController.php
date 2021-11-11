<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function index()
    {
        // $posts = Post::all();
        $posts = Auth::user()->posts()->paginate(3);

        return view('admin.posts.index', ['posts' => $posts]);
    }

    //
    public function show(Post $post)
    {
        return view('blog-post', ['post' => $post]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Post::class);

        $inputs = $request->validate([
            'title' => 'required|min:8|max:255',
            'post_image' => 'file', //mines:jpeg, png
            'body' => 'required'
        ]);

        if ($request->file('post_image')) {
            $inputs['post_image'] = $request->file('post_image')->store('images');
        };

        Auth::user()->posts()->create($inputs);

        $request->session()->flash('post-created-message', 'Post was create');

        return redirect()->route('post.index');
    }

    public function edit(Post $post)
    {
        // if (Auth::user()->can('view', $post))
        $this->authorize('view', $post);
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post, Request $request)
    {
        $inputs = $request->validate([
            'title' => 'required|min:8|max:255',
            'post_image' => 'file', //mines:jpeg, png
            'body' => 'required'
        ]);

        if ($request->file('post_image')) {
            $inputs['post_image'] = $request->file('post_image')->store('images');
            $post->post_image =  $inputs['post_image'];
        };

        $post->title = $inputs['title'];
        $post->body = $inputs['body'];

        $this->authorize('update', $post);
        // Auth::user()->posts()->save($post);
        $post->save();

        $request->session()->flash('post-updated-message', 'Post was updated');

        return redirect()->route('post.index');
    }

    public function destroy(Post $post, Request $request)
    {
        $this->authorize('delete', $post);

        $post->delete();

        // Session::flash('message', 'Post was delete');
        $request->session()->flash('message', 'Post was delete');

        return back();
    }
}