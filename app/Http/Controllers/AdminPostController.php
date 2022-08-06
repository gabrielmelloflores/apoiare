<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index() {
        return view('admin.posts.index', [
            'posts' => Post::paginate(50)
        ]);
    }

    public function create(Post $post)
    {
//        if(auth()->guest()){
//            abort(403);
//        }
        return view('admin.posts.create');
    }

    public function store()
    {
        Post::create(array_merge($this->validatePost(), [
            'user_id' => request()->user()->id,
            'thumbnail' => request()->file('thumbnail')->store('thumbnails')
        ]));

        return redirect('/');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {

        $attributes = $this->validatePost($post);


        if ($attributes['thumbnail'] ?? false) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);
        return back()->with('success', 'Post Updated!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'Post Deleted!');
    }

    protected function validatePost(?Post $post = null): array
    {
        $post ??= new Post();

        return request()->validate([
            'title' => 'required',
            'thumbnail' => $post->exists ? ['image'] : ['required', 'image'],
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'published_at' => 'required'
        ]);
    }
//    public function store(Post $post)
//    {
//        $attributes = request()->validate([
//            'title' => 'required',
//            'thumbnail' => ['required', 'image'],
//            'slug' => ['required', Rule::unique('posts', 'slug')],
//            'excerpt' => 'required',
//            'body' => 'required',
//            'category_id' => ['required', Rule::exists('categories', 'id')],
//        ]);
//
//        $attributes['user_id'] = auth()->id();
//        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
//
//        Post::create($attributes);
//
//        return redirect('/');
//    }
//
//    public function edit(Post $post)
//    {
//        return view('admin.posts.edit', ['post' => $post]);
//    }
//
//    public function update(Post $post)
//    {
//        $attributes = request()->validate([
//            'title' => 'required',
//            'thumbnail' => 'image',
//            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
//            'excerpt' => 'required',
//            'body' => 'required',
//            'category_id' => ['required', Rule::exists('categories', 'id')],
//        ]);
//
//        if(isset($attributes['thumbnail'])){
//            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
//        }
//
//        $post->update($attributes);
//
//        return back()->with('success', 'Post Updated!');
//    }
//
//    public function destroy(Post $post)
//    {
//        $post->delete();
//
//        return back()->with('success', 'Post Deleted!');
//    }
}
