<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Statistic;
use App\Models\Profile;
use Auth;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts =  About::paginate(10);
         return view('backend.about.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.about.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->status==1){

            if(About::where('status' , '=', 1)->exists()){
                About::where('status', '=', 1)->update(['status' => 0]);
            }
          
           }
        $post =  new About();
       
        if ($request->hasfile('image')) {
            $file            = $request->file('image');
            $post_image = time() . $file->getClientOriginalName();
            $file->move(public_path() . "/uploads/about/", $post_image);
            $post->image =  $post_image;
        }
        $post->date = $request->date;
        $post->title = $request->title;
        $post->description = $request->description;
       
        if($request->status==1){
            $post->status = 1;
           }else{
            $post->status = 0;
           }
        $post->user_id =  Auth::user()->id;
       
      $post->save();

      if(About::where('status' , '=', 1)->exists()){

    }else{
        About::where('id' , $post->id)->update(['status' => 1]);
    }
      return redirect()->route('about.index')->with('message', 'Post Saved Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $about = About::find($id);
        return view('backend.about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    
        $post =  About::find($id);
        if ($request->hasfile('image')) {
            $file            = $request->file('image');
            $post_image = time() . $file->getClientOriginalName();
            $file->move(public_path() . "/uploads/about/", $post_image);
            $post->image =  $post_image;
        }
        $post->date = $request->date;
        $post->title = $request->title;
        $post->description = $request->description;
      
        if($request->default==1){
     
            About::where('status' , '=', 1)->update(['status' => 0]);
            About::where('id' , $id)->update(['status' => 1]);
    
           }else{
    

        if(About::where('status' , '=', 1)->exists()){
                
                if($post->status==1){
                    $post->status = 1;
                }else {
                    $post->status = 0;
                }
               
            }else{
                $post->status = 1;
            }
           }
        $post->user_id =  Auth::user()->id;
       
      $post->save();

  
      return redirect()->route('about.index')->with('message', 'Post Saved Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        //
    }
}
