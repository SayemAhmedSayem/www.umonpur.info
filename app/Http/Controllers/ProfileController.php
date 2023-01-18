<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\ProfileMember;
use App\Models\User;


use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles =  Profile::paginate(10);
         return view('backend.about.profile.index', compact('profiles'));
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
        $cat = new Profile();
        $cat->name = $request->name;
        $cat->description = $request->description;
        if ($request->hasfile('image')) {
            $file            = $request->file('image');
            $post_image = time() . $file->getClientOriginalName();
            $file->move(public_path() . "/uploads/profile/", $post_image);
        $cat->image =  $post_image;

        }
        $cat->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['profiles'] = ProfileMember::where('profile_id', $id)->get();
        $data['users'] = User::All();
        $data['prof'] = Profile::find($id);
        return view('backend.about.profile.members', $data);

    }
    public function memberStore(Request $request)
    {
       
        $member = new ProfileMember();
       $member->profile_id = $request->profile_id;
       $member->user_id = $request->user_id;
       $member->save();
       return redirect()->back();

    }

    public function memberDelete($id)
    {
       
        $cat =  ProfileMember::find($id);
        $cat->delete();
        return redirect()->back();
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = Profile::find($id);
        return view('backend.about.profile.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cat =  Profile::find($id);
        $cat->name = $request->name;
        $cat->description = $request->description;
        if ($request->hasfile('image')) {
            $file            = $request->file('image');
            $post_image = time() . $file->getClientOriginalName();
            $file->move(public_path() . "/uploads/profile/", $post_image);
        $cat->image =  $post_image;

        }
        $cat->save();
        return redirect()->route('profile.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Profile::find($id);
        $member->delete();
        return redirect()->route('profile.index');
    }

    public function Webshow($id)
    {
        $data['profiles'] = ProfileMember::where('profile_id', $id)->get();
        $data['users'] = User::All();
        $data['prof'] = Profile::find($id);
        return view('frontend.profile', $data);

    }
}
