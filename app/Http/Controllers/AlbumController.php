<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Year;
use App\Models\Video;

use Illuminate\Http\Request;
use Auth;
class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::latest()->paginate(10);
        return view('backend.album.index', compact('albums'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.album.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $cat = new Album();
        $cat->name = $request->name;
        $cat->type = $request->type;
        $cat->description = $request->description;
        $cat->user_id = Auth::user()->id;
        if ($request->hasfile('thumbnail')) {
            $file            = $request->file('thumbnail');
            $post_image = time() . $file->getClientOriginalName();
            $file->move(public_path() . "/uploads/album/thumbnail/", $post_image);
        $cat->thumbnail =  $post_image;

        }
        $cat->save();
     return redirect()->route('album.index')->with('message', 'Album Saved Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $album = Album::find($id);
       $data['album'] = Album::find($id);
       if($album->type=='Photo'){
      
        $data['years'] = Year::where('album_id', $id)->latest()->paginate(10);
        return view('backend.year.index', $data);
       }
       $data['videos'] = Video::where('album_id', $id)->latest()->paginate(10);
       return view('backend.video.index', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $album = Album::find($id);
        return view('backend.album.edit', compact('album'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cat = Album::find($id);
        $cat->name = $request->name;
        $cat->type = $request->type;
        $cat->description = $request->description;
        $cat->user_id = Auth::user()->id;
        if ($request->hasfile('thumbnail')) {
            $file            = $request->file('thumbnail');
            $post_image = time().$file->getClientOriginalName();
            $file->move(public_path()."/uploads/album/thumbnail/",$post_image);
        $cat->thumbnail =  $post_image;
          
        }
        $cat->save();
     return redirect()->route('album.index')->with('message', 'Album Saved Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Album::find($id);
        if(file_exists(public_path('uploads/album/thumbnail/'.$category->thumbnail))){
            unlink(public_path('uploads/album/thumbnail/'.$category->thumbnail));
          }else{
             
            }
        $category->delete();
        return redirect()->back();
    }
}
