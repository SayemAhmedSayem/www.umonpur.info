<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Auth;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $posts =  Post::latest()->paginate(10);
       $categories = Category::All();
        return view('backend.posts.index', compact('posts', 'categories'));

    }
    public function PostSort($id){
        $posts = Post::where('cat_id', $id)->latest()->paginate(5);
        $id = $id;
        $categories = Category::All();
        return view('backend.posts.sort', compact('posts', 'id', 'categories'));
    }

    /**
     * Show the form for creating a new resource.Category
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::All();
        return view('backend.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //    dd($request->all());
       $request->validate([
       'title' => 'required',
    
       ]);

      $post =  new Post();
      $post_image = "";
      if ($request->hasfile('image')) {
          $file            = $request->file('image');
          $post_image = time() . $file->getClientOriginalName();
          $file->move(public_path() . "/uploads/posts/", $post_image);
      }
      $post->date = $request->date;
      $post->cat_id = $request->cat_id;
      $post->title = $request->title;
      $post->sub_title = $request->sub_title;
      $post->description = $request->description;
      $post->image =  $post_image;
      $post->user_id =  Auth::user()->id;
     
    $post->save();
    return redirect()->route('posts.index')->with('message', 'Post Saved Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Category::All();
        $post = Post::find($id);
        return view('backend.posts.show', compact('categories', 'post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::All();
        $post = Post::find($id);
        return view('backend.posts.edit', compact('categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post =  Post::find($id);
        if($request->image==!Null){
            $post_image = "";
      if ($request->hasfile('image')) {
        unlink(public_path('uploads/posts/'.$post->image));
          $file            = $request->file('image');
          $post_image = time() . $file->getClientOriginalName();
          $file->move(public_path() . "/uploads/posts/", $post_image);
      }
      $post->image =  $post_image;
        }
     
      $post->date = $request->date;
      $post->cat_id = $request->cat_id;
      $post->title = $request->title;
      $post->sub_title = $request->sub_title;
      $post->description = $request->description;
     
      $post->user_id =  Auth::user()->id;
     
    $post->save();
    return redirect()->route('posts.index')->with('message', 'Post Saved Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if(file_exists(public_path('uploads/posts/'.$post->image))){
      unlink(public_path('uploads/posts/'.$post->image));
    }else{
       
      }
    $post->delete();


        return redirect()->route('posts.index');
    }
}
