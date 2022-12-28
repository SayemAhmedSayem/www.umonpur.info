<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders =  Slider::paginate(10);
        return view('backend.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.sliders.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post =  new Slider();
        $post_image = "";
        if ($request->hasfile('image')) {
            $file            = $request->file('image');
            $post_image = time() . $file->getClientOriginalName();
            $file->move(public_path() . "/uploads/sliders/", $post_image);
        }
        $post->title = $request->title;
        $post->desscriptions = $request->desscriptions;
        $post->image =  $post_image;
        $post->save();
    return redirect()->route('sliders.index')->with('message', 'Post Saved Successfully');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $slider = Slider::find($id);
        return view('backend.sliders.show', compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('backend.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post =  Slider::find($id);
        if($request->image==!Null){
            $post_image = "";
      if ($request->hasfile('image')) {
          $file            = $request->file('image');
          $post_image = time() . $file->getClientOriginalName();
          $file->move(public_path() . "/uploads/sliders/", $post_image);
      }
      $post->image =  $post_image;
        }
     
        $post->title = $request->title;
        $post->desscriptions = $request->desscriptions;

        $post->save();
    return redirect()->route('sliders.index')->with('message', 'Post Saved Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Slider::find($id);
        if(file_exists(public_path('uploads/sliders/'.$post->image))){
            unlink(public_path('uploads/sliders/'.$post->image));
          }else{
             
            }
        $post->delete();
        return redirect()->route('sliders.index');
    }
    
}
