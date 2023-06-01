<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;

class PostController extends Controller
{
    public function index(Request $request)
    {

        $query = Post::query();
        if ($request->c) {
            $query->where('category_id', $request->c);
        }
        $query->orderBy('id', 'desc');

        $posts = $query->paginate(20);

        $categories = Category::orderBy('name', 'asc')->get();
        return view('pages.post.listing', compact('posts', 'categories'));
    }
    public function create()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        $tags = Tag::orderBy('title', 'asc')->get();
        return view('pages.post.add', compact('categories', 'tags'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'category' => 'required',
            'title' => 'required|max:100|min:3',
            'price' => 'required|numeric',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // store image
        $image = $request->image->store('posts');
        // insert data to data base
        $post =  Post::create([
            'category_id' => $request->category,
            'title' => $request->title,
            'price' => $request->price,
            'image' => $image,
            'description' => $request->description,
        ]);
        $post->tag()->attach($request->tag);
        // redirect back
        return redirect()->back()->with('success', 'Your post was successfuly created, We are reviesing your post. It will take at lease 3 woroking day');
    }
    public function detial($id)
    {
        $post = Post::where('id', $id)->first();
        $tags = $post->tag;

        return view('pages.post.detail', compact('post', 'tags'));
    }
    public function edit($id)
    {
        $post = Post::where('id', $id)->first();
        $post_tag = $post->tag->pluck('id')->toArray();
        $categories = Category::orderBy('name', 'asc')->get();
        $tags = Tag::orderBy('title', 'asc')->get();
        return view('pages.post.edit', compact('post', 'tags', 'post_tag', 'categories'));
    }
    public function update(Request $request, $id)
    {
        $post = Post::where('id', $id)->first();
        if ($post) {
            abort(404);
        }
        $this->validate($request, [
            'category' => 'required',
            'title' => 'required|max:100|min:3',
            'price' => 'required|numeric',
            'description' => 'required',
            'image' => 'required',
        ]);
        // store image
        if ($request->image) {
            $image = $request->image->store('posts');
        } else {

            $image = $post->image;
        }
        // insert data to data base
        Post::where('id', $post->id)->update([
            'category_id' => $request->category,
            'title' => $request->title,
            'price' => $request->price,
            'image' => $image,
            'description' => $request->description,
        ]);
        $post->tag()->sync($request->tag);
        // redirect back
        return redirect()->back()->with('success', 'Your Update was successfuly');
    }
}
