<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\NID;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Redirect;
use Validator;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
class MemberController extends Controller
{

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = User::latest()->paginate(5);
        return view('backend.members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post =  new Member();
        $post_image = "";
        if ($request->hasfile('image')) {
            $file            = $request->file('image');
            $post_image = time() . $file->getClientOriginalName();
            $file->move(public_path() . "/uploads/members/", $post_image);
        }
        $post->name = $request->name;
        $post->phone = $request->phone;
        $post->image =  $post_image;
        $post->save();
   return redirect()->route('members.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = User::find($id);
        return view('backend.members.show', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = User::find($id);
        return view('backend.members.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
		$user->email = $request->email;
		$user->designation = $request->designation;
		// $user->password = Hash::make($request->password);
		// $user->user_type = 'staff';
		$user->status = $request->status;
        if($user->user_type=='user'){
            $user->status = 1;

        }else{
            $user->status = $request->status;
        }

        $user->role_id = $request->role_id;

        $user->save();
        
        if(Nid::where('user_id', $id)->exists()){
            $findnid = Nid::where('user_id', $id)->pluck('id')->first();
            $nid = NID::find($findnid);
            $nid->nid = $request->nid;
            $nid->name = $request->name;
            $nid->serial = $request->serial;
            $nid->name_bn = $request->name_bn;
            $nid->gender = $request->gender;
            $nid->dob = $request->dob;
            $nid->father = $request->father;
            $nid->mother = $request->mother;
            $nid->address = $request->address;
            $nid->holding_no = $request->holding_no;
            $nid->phone = $request->phone;
            $nid->user_id = $user->id;
            $nid->status = 1;
            if ($request->hasFile('image')){
               $image = $request->file('image');
               $file_name = "member_".time().'.'.$image->getClientOriginalExtension();
               $image->move(base_path('public/uploads/members/'),$file_name);
               $nid->image = $file_name;
            }
            $nid->save();
        }else{
            $nid = new NID();
            $nid->nid = $request->nid;
            $nid->name = $request->name;
            $nid->name_bn = $request->name_bn;
            $nid->gender = $request->gender;
            $nid->dob = $request->dob;
            $nid->father = $request->father;
            $nid->mother = $request->mother;
            $nid->address = $request->address;
            $nid->holding_no = $request->holding_no;
            $nid->phone = $request->phone;
            $nid->user_id = $user->id;
            $nid->status = 1;
            if ($request->hasFile('image')){
               $image = $request->file('image');
               $file_name = "member_".time().'.'.$image->getClientOriginalExtension();
               $image->move(base_path('public/uploads/members/'),$file_name);
               $nid->image = $file_name;
            }
            $nid->save();
        }



         return redirect()->route('members.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Member::find($id);
        $member->delete();
        return redirect()->route('members.index');
    }

    public function mStore(Request $request){


        $user = New User();
        $user->name = $request->name;
		$user->email = $request->email;
		$user->password = Hash::make($request->password);
		$user->user_type = 'staff';
		$user->status = 0;
        $user->save();

         $nid = new NID();
         $nid->nid = $request->nid;
         $nid->name = $request->name;
         $nid->name_bn = $request->name_bn;
         $nid->gender = $request->gender;
         $nid->dob = $request->dob;
         $nid->father = $request->father;
         $nid->mother = $request->mother;
         $nid->address = $request->address;
         $nid->holding_no = $request->holding_no;
         $nid->phone = $request->phone;
         $nid->user_id = $user->id;
         $nid->status = 0;
         if ($request->hasFile('image')){
            $image = $request->file('image');
            $file_name = "member_".time().'.'.$image->getClientOriginalExtension();
            $image->move(base_path('public/uploads/members/'),$file_name);
            $nid->image = $file_name;
         }
         $nid->save();


         return redirect()->route('home');
    }

    public function RoleSort($id){
        $members = User::where('role_id', $id)->latest()->paginate(5);
        $id = $id;
        return view('backend.members.sort', compact('members', 'id'));
    }


    public function updatePassword(Request $request)
{
        # Validation
        $request->validate([
   
            'new_password' => 'required|confirmed',
        ]);
       

        #Update the new Password
        User::whereId($request->user_id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("status", "Password changed successfully!");
}
    
}
