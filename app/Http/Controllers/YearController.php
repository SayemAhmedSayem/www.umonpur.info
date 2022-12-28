<?php

namespace App\Http\Controllers;

use App\Models\Year;
use App\Models\Album;
use App\Models\Photo;
use Auth;
use Illuminate\Http\Request;

class YearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $years = Year::latest()->paginate(10);
        return view('backend.year.index', compact('years'));
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
        $cat = new Year();
        $cat->year = $request->year;
        $cat->album_id = $request->album_id;
        $cat->user_id = Auth::user()->id;
        $cat->save();
     return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Year  $year
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $yr =  Year::find($id);
        $data['year'] = Year::find($id);
        $data['album'] = Album::find($yr->album_id);
        $data['photos'] = Photo::where('year_id', $id)->latest()->paginate(10);
        return view('backend.photo.index', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Year  $year
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $yr =  Year::find($id);
        $data['year'] = Year::find($id);
        $data['album'] = Album::find($yr->album_id);
        return view('backend.year.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Year  $year
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cat = Year::find($id);
        $cat->year = $request->year;
        $cat->album_id = $request->album_id;
        $cat->user_id = Auth::user()->id;
        $cat->save();
     return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Year  $year
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Year::find($id);
        $category->delete();
        $photo = Photo::where('year_id', $id);
        $photo->delete();
        return redirect()->back();
    }
}
