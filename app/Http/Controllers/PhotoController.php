<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Year;
use App\Models\Album;
use Illuminate\Http\Request;
use Auth;
class PhotoController extends Controller
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
        $cat = new Photo();
        $cat->title = $request->title;
        $cat->date = now();
        $cat->year_id = $request->year_id;
        $cat->description = $request->description;
        $cat->user_id = Auth::user()->id;
        if ($request->hasfile('image')) {
            $file            = $request->file('image');
            $post_image = time() . $file->getClientOriginalName();
            $file->move(public_path() . "/uploads/album/photos/", $post_image);
        $cat->image =  $post_image;

        }
        $cat->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pt = Photo::find($id);
        $yr =  Year::find($pt->year_id);
        $data['year'] = Year::find($pt->year_id);
        $data['album'] = Album::find($yr->album_id);
        $data['photo'] = Photo::find($id);
        return view('backend.photo.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cat = Photo::find($id);
        $cat->date = now();
        $cat->title = $request->title;
        $cat->year_id = $request->year_id;
        $cat->description = $request->description;
        $cat->user_id = Auth::user()->id;
        if ($request->hasfile('image')) {
            $file            = $request->file('image');
            $post_image = time() . $file->getClientOriginalName();
            $file->move(public_path() . "/uploads/album/photos/", $post_image);
        $cat->image =  $post_image;

        }
        $cat->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Photo::find($id);
        if(file_exists(public_path('uploads/album/photos/'.$post->image))){
            unlink(public_path('uploads/album/photos/'.$post->image));
          }else{
             
            }
        $post->delete();
        return redirect()->back();
    }
}
