<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;
use App\Category;

class PostController extends Controller
{
    protected $validationRule = [
        'title' => 'required|string|max:110',
        'content' => 'required',
        'published' => 'sometimes|accepted',
        'category_id' => 'nullable|exists:categories,id',
        'image' => 'nullable|image|mimes:jpeg,bmp,png|max:2048'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validationRule);
        $data = $request->all();
        $newPost = new Post();
        $newPost->title = $data['title'];
        $newPost->content = $data['content'];
        $newPost->published = isset($data['published']);
        $newPost->category_id = $data['category_id'];
        $slug = Str::of($data['title'])->slug("-");
        $count = 1;
        while(Post::where('slug', $slug)->first()){
            $slug = Str::of($data['title'])->slug("-") . "-{$count}";
            $count++;
        }
        $newPost->slug = $slug;
        $newPost->save();
        return redirect()->route('admin.posts.show', $newPost->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate($this->validationRule);
        $data = $request->all();
        if($post->title !== $data['title']){
            $post->title = $data['title'];
            $slug = Str::of($data['title'])->slug("-");
            $count = 1;
            while(Post::where('slug', $slug)->first()){
                $slug = Str::of($data['title'])->slug("-") . "-{$count}";
                $count++;
            }
            $post->slug = $slug;
        }
        $post->content = $data['content'];
        $post->published = isset($data['published']);
        $post->category_id = $data['category_id'];
        $post->update();
        return redirect()->route('admin.posts.show', $post->id);
    }   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}