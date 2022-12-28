<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\Album;
use Auth;
class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cat = new Video();
        $cat->title = $request->title;
        $cat->date = now();
        $cat->album_id = $request->album_id;
        $cat->description = $request->description;
        $cat->url = $request->url;
        $cat->user_id = Auth::user()->id;
        if ($request->hasfile('image')) {
            $file            = $request->file('image');
            $post_image = time() . $file->getClientOriginalName();
            $file->move(public_path() . "/uploads/album/videos/", $post_image);
        $cat->image =  $post_image;

        }
        $cat->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pt = Video::find($id);
        $data['album'] = Album::find($pt->album_id);
        $data['video'] = Video::find($id);
        return view('backend.video.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cat = Video::find($id);
        $cat->title = $request->title;
        $cat->date = now();
        $cat->album_id = $request->album_id;
        $cat->description = $request->description;
        $cat->url = $request->url;
        $cat->user_id = Auth::user()->id;
        if ($request->hasfile('image')) {
            $file            = $request->file('image');
            $post_image = time() . $file->getClientOriginalName();
            $file->move(public_path() . "/uploads/album/videos/", $post_image);
        $cat->image =  $post_image;

        }
        $cat->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Video::find($id);
        if(file_exists(public_path('uploads/album/videos/'.$post->image))){
            unlink(public_path('uploads/album/videos/'.$post->image));
          }else{
             
            }
        $post->delete();
        return redirect()->back();
    }
}
