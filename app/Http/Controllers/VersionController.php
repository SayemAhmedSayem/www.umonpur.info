<?php

namespace App\Http\Controllers;
use Auth;

use App\Models\Version;
use Illuminate\Http\Request;

class VersionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $versions = Version::all();
        return view('backend.version.index', compact('versions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.version.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $version = new Version();
        $version->year = $request->year;
        $version->version_title = $request->version_title;
        $version->version_subtitle = $request->version_subtitle;
        $version->description_title_p1 = $request->description_title_p1;
        $version->description_title_p2 = $request->description_title_p2;
        $version->description_details = $request->description_details;
        $version->url = $request->url;
        $version->user_id = Auth::user()->id;
        if ($request->hasfile('image')) {
            $file            = $request->file('image');
            $post_image = time() . $file->getClientOriginalName();
            $file->move(public_path() . "/uploads/version/", $post_image);
        $version->image =  $post_image;

        }
        $version->save();
         return redirect()->route('version.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Version  $version
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $version = Version::find($id);
       return view('frontend.version', compact('version'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Version  $version
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $version = Version::find($id);
        return view('backend.version.edit', compact('version'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Version  $version
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $version = Version::find($id);
        $version->year = $request->year;
        $version->version_title = $request->version_title;
        $version->version_subtitle = $request->version_subtitle;
        $version->description_title_p1 = $request->description_title_p1;
        $version->description_title_p2 = $request->description_title_p2;
        $version->description_details = $request->description_details;
        $version->user_id = Auth::user()->id;
        $version->url = $request->url;
        if ($request->hasfile('image')) {
            $file            = $request->file('image');
            $post_image = time() . $file->getClientOriginalName();
            $file->move(public_path() . "/uploads/version/", $post_image);
        $version->image =  $post_image;

        }
        $version->save();
        return redirect()->route('version.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Version  $version
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Version::find($id);
        $post->delete();
        return redirect()->route('version.index');
    }
}
