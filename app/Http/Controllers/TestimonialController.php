<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Auth;
class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::latest()->paginate(10);
        return view('backend.testimonial.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       $post =  new Testimonial();
       $post_image = "";
       if ($request->hasfile('image')) {
           $file            = $request->file('image');
           $post_image = time() . $file->getClientOriginalName();
           $file->move(public_path() . "/uploads/testimonial/", $post_image);
       }
       $post->name = $request->name;
       $post->designation = $request->designation;
       $post->message = $request->message;
       $post->user_id =  Auth::user()->id;
       $post->image =  $post_image;
       $post->save();
   return redirect()->route('testimonial.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $testimonial = Testimonial::find($id);
        return view('backend.testimonial.show', compact('testimonial'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testimonial = Testimonial::find($id);
        return view('backend.testimonial.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post =  Testimonial::find($id);
        if($request->image==!Null){
            $post_image = "";
      if ($request->hasfile('image')) {
          $file            = $request->file('image');
          $post_image = time() . $file->getClientOriginalName();
          $file->move(public_path() . "/uploads/testimonial/", $post_image);
      }
      $post->image =  $post_image;
        }
        $post->name = $request->name;
        $post->designation = $request->designation;
        $post->message = $request->message;
        $post->user_id =  Auth::user()->id;
        $post->save();
    return redirect()->route('testimonial.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::find($id);
        $testimonial->delete();
        return redirect()->route('testimonial.index');
    }
}
