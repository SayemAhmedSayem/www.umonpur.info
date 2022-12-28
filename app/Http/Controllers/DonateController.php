<?php

namespace App\Http\Controllers;

use App\Models\Donate;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class DonateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
       $donates = Donate::latest()->paginate(5);
       return view('backend.donate.index', compact('donates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
     
        return view('backend.donate.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $donate = new Donate();
        $donate->name = $request->name;
        $donate->goal = $request->goal;
        $donate->description = $request->description;
        if ($request->hasfile('image')) {
            $file            = $request->file('image');
            $post_image = time() . $file->getClientOriginalName();
            $file->move(public_path() . "/uploads/donate/", $post_image);
        $donate->image =  $post_image;

        }
        $donate->save();
        return redirect()->route('donate.index');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Donate  $donate
     * @return \Illuminate\Http\Response
     */
    public function show(Donate $donate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Donate  $donate
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $donate = Donate::find($id);
        return view('backend.donate.edit', compact('donate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Donate  $donate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $donate = Donate::find($id);
        $donate->name = $request->name;
        $donate->goal = $request->goal;
        $donate->description = $request->description;
        if ($request->hasfile('image')) {
            $file            = $request->file('image');
            $post_image = time() . $file->getClientOriginalName();
            $file->move(public_path() . "/uploads/donate/", $post_image);
        $donate->image =  $post_image;

        }
        $donate->save();
        return redirect()->route('donate.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Donate  $donate
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Donate::find($id);
        $category->delete();
        return redirect()->back();
    }
}
