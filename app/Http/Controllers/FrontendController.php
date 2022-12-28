<?php

namespace App\Http\Controllers;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\NID;
use App\Models\Menu;
use App\Models\Slider;
use App\Models\Member;
use App\Models\Category;
use App\Models\AboutPage;
use App\Models\Album;
use App\Models\Year;
use App\Models\Photo;
use App\Models\Video;
use App\Models\About;
use App\Models\Profile;
use App\Models\Statistic;
use App\Models\Donate;
use App\Models\Income;
use App\Models\Message;
use App\Models\User;
use App\Models\Version;

use DB;
Use Auth;
Use Hash;
use PDF;
class FrontendController extends Controller
{
    public function index(){
        $data['latests'] = Post::where('cat_id', 1)->latest()->paginate(4);
        $data['notices'] = Post::where('cat_id', 2)->latest()->paginate(4);
        $data['events'] = Post::where('cat_id', 3)->latest()->paginate(8);
        $data['villages'] = Post::where('cat_id', 4)->latest()->get();
        $data['schools'] = Post::where('cat_id', 5)->latest()->get();
        $data['madrasas'] = Post::where('cat_id', 6)->latest()->get();
        $data['sports'] = Post::where('cat_id', 7)->latest()->get();
        $data['healths'] = Post::where('cat_id', 8)->latest()->get();
        //This code is for decending order
        $data['testimonials'] = Testimonial::orderBy('created_at', 'desc')->get();

        return view('frontend.index', $data);
    }

    public function PostShow($id){

        $post = Post::find($id);
        return view('frontend.blog.show', compact('post'));


    }
    public function PostList(){

        $latests= Post::where('cat_id', 1)->latest()->paginate(9);
        return view('frontend.blog.list', compact('latests'));


    }
    public function PostCategory($id){

        $latests= Post::where('cat_id', $id)->latest()->paginate(9);
        return view('frontend.blog.category', compact('latests'));


    }
    public function NoticeShow($id){

        $notice = Post::find($id);
        return view('frontend.notice.show', compact('notice'));


    }
    public function NoticeList(){

        $notices = Post::where('cat_id', 2)->get();
        return view('frontend.notice.list', compact('notices'));


    }
    public function EventShow($id){

        $event = Post::find($id);
        return view('frontend.event.show', compact('event'));


    }
    public function EventList(){

        $events = Post::where('cat_id', 3)->get();
        return view('frontend.event.list', compact('events'));


    }

    public function photoGallery(){
    
        return view('frontend.photo_gallery');
    }


    
    public function photoYear($id){
    
        $album = Album::find($id);
    if($album->type=='Photo'){
     $data['album'] = Album::find($id);
     $data['years'] = Year::where('album_id', $id)->latest()->paginate(10);
     return view('frontend.photo_year', $data);
    }
    }
    public function photoPhoto($id){
    
        $yr =  Year::find($id);
        $data['year'] = Year::find($id);
        $data['album'] = Album::find($yr->album_id);
        $data['photos'] = Photo::where('year_id', $id)->latest()->paginate(10);
        return view('frontend.photo_photo', $data);
    }

    public function videoGallery(){
    
        return view('frontend.video_gallery');
    }
    public function videoVideo($id){
    
        $data['album'] = Album::find($id);
        $data['videos'] = Video::where('album_id', $id)->latest()->paginate(10);
        return view('frontend.video_video', $data);
    }
    
    public function show($id){
        $post = Post::find($id);
        return view('frontend.details', compact('post'));
    }

    // Frontend About Us Page 
    public function About(){
        $data['abouts'] = About::where('status', 0)->latest()->paginate(6);
        $data['profiles'] = Profile::All();
        $data['statistics'] = Statistic::All();
        $data['testimonials'] = Testimonial::orderBy('created_at', 'desc')->get();
        $data['dbypayer'] =   DB::table('incomes')->where('income_type', '!=', 'general')
        ->select(DB::raw('sum(amount) as amount, user_id'))
        ->groupBy('user_id')->orderBy('amount','desc')
        ->limit(4)->get();
        $data['gbypayer'] =   DB::table('incomes')->where('income_type', 'general')
        ->select(DB::raw('sum(amount) as amount, user_id'))
        ->groupBy('user_id')->orderBy('amount','desc')
        ->limit(4)->get();
        
        return view('frontend.about.index', $data);


    }
      // Frontend About Us Details Page 
    public function AboutShow($id){

        $about = About::find($id);
        return view('frontend.about.show', compact('about'));


    }

        // Frontend About Us All  Page 
    public function AboutList(){

        $abouts = About::where('status', 0)->latest()->paginate(6);
        return view('frontend.about.list', compact('abouts'));


    }
    public function AboutDonateG(){


        $data['incomes'] =   DB::table('incomes')->where('income_type', 'general')
        ->select(DB::raw('sum(amount) as amount, user_id, count(amount) as count'))
        ->groupBy('user_id')->orderBy('amount','desc')
        ->paginate(10);
  
        $data['title'] = 'তহবিলে দাতাকারীদের তালিকা';
        return view('frontend.about.donate_details', $data);
    


    }
    public function AboutDonateD(){

        $data['incomes'] =   DB::table('incomes')->where('income_type', '!=', 'general')
        ->select(DB::raw('sum(amount) as amount, user_id, count(amount) as count'))
        ->groupBy('user_id')->orderBy('amount','desc')
        ->paginate(10);

        $data['title'] = 'আর্থিক সহায়তা দাতাকারীদের তালিকা';

        
        return view('frontend.about.donate_details', $data);
    


    }

    public function voterShow(Request $request){
        // dd($request->search);
       $nids = NID::where('nid', $request->search)->get();
        return response()->json([  
            'nids' => $nids,
  
          ]);


    }

    public function voterList(){
        $data['voters'] = NID::All();
        return view('frontend.voter.list', $data);


    }

    public function voterPrint(Request $request){
         # Validation
         if($request->user_id==NULL){
            return redirect()->back()->with('error', 'দুঃখিত ভোটার তথ্য পাওয়া যায়নি');  
         }

        $data['voter'] = NID::find($request->user_id);
        return view('frontend.voter.print', $data);


    }
    
    public function Testimonial(){

        $testimonials = Testimonial::latest()->paginate(6);
        return view('frontend.testimonial.list', compact('testimonials'));
    }

    public function TestimonialSingle($id){

        $test = Testimonial::find($id);
        return view('frontend.testimonial.single', compact('test'));
    }


    public function message(){
        return view('frontend.message.index');

    }
    public function donate(){
        $donates = Donate::orderBy('created_at', 'desc')->paginate(6);
        $donatesc = Donate::orderBy('created_at', 'desc')->paginate(6);
        return view('frontend.donate.list', compact('donates', 'donatesc'));

    }
    public function donateShow($id){
        $pdonate = Donate::find($id);
        $data['donate'] = Donate::find($id);
        $pincome = Income::where('donate_id', $id)->where('status',1)->sum('amount');
        $data['income'] = Income::where('donate_id', $id)->where('status',1)->sum('amount');
        $goal = $pdonate->goal;
        $data['percent'] = $pincome/$goal * 100;
        $data['donar'] =   Income::where('donate_id', $id)->where('status',1)->groupBy('user_id')->count('user_id');
        // $data['incomes'] =   Income::with(['user'])->where('donate_id', $id)->where('status',1)->latest()->get();
        $data['incomes'] =   DB::table('incomes')->where('donate_id', $id)->where('status',1)
        ->select(DB::raw('sum(amount) as amount, user_id, count(amount) as count'))
        ->groupBy('user_id')->latest()->get();
  
        return view('frontend.donate.show', $data);

    }

    public function Incomestore(Request $request)
    {
        // dd($request->all());
        if(Auth::user()->status=='0'){
            return redirect()->back()->with('error', 'সাবধান !! আপনার অ্যাকাউন্ট সক্রিয় নয়');  
        }
        $income =  new Income();
        $income->user_id = Auth::user()->id;
        $income->amount = $request->amount;
        $income->date = now();
        $income->income_type = $request->income_type;
        $income->transection_no = $request->transection_no;
        $income->transection_phone = $request->transection_phone;
        $income->payment_type = $request->payment_type;
        $income->donate_id = $request->donate_id;
        $income->status = 0;
        $income->save();
        // return redirect()->back();
        return redirect()->back()->with('success', 'ধন্যবাদ !! আপনার পেমেন্ট তথ্য পর্যালোচনার জন্য পাঠানো হয়েছে ');
  
    }

    public function Messagestore(Request $request)
    {
        // dd($request->all());
        $message = new Message();
        $message->name = $request->name;
        $message->email = $request->email;
        $message->subject = $request->subject;
        $message->phone = $request->phone;
        $message->message = $request->message;
        $message->status = 0;
         if ($request->hasfile('image')) {
            $file            = $request->file('image');
            $post_image = time() . $file->getClientOriginalName();
            $file->move(public_path() . "/uploads/message/", $post_image);
            $message->image =  $post_image;
         }
        $message->save();
        return redirect()->back()->with('success', 'ধন্যবাদ !! আপনার বার্তাটি পাঠানো হয়েছে ');

    }

    public function Mypfile($id){
        $member = User::find(Auth::user()->id);
        return view('backend.user.profile', compact('member'));
    }
    public function Mypfile_update(Request $request , $id){
        $user = User::find($id);
        $user->name = $request->name;
		$user->email = $request->email;
		$user->password = Hash::make($request->password);
		// $user->user_type = 'staff';
		// $user->status = 1;
        $user->role_id = $request->role_id;

        $user->save();

        $findnid = Nid::where('user_id', $id)->pluck('id')->first();
        $nid = NID::find($findnid);
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
        return redirect()->back();
    }

    public function Mypayment($id){
        $member = User::find($id);
        return view('backend.user.payment', compact('member'));
    }

    public function MypaymentRecipt($id){
       
        $data['income'] = Income::find($id);
        $data['2'] = 1;
        return view('backend.download.recipt', $data);
        $pdf = PDF::loadView('backend.download.recipt', $data);
        return $pdf->download('recipt.pdf');
    }
    public function chnagePassword($id){
        $member = User::find($id);
        return view('backend.user.chnage_password', compact('member'));
    }
    public function chnagePasswordStore(Request $request, $id){
 # Validation
 $request->validate([
    'new_password' => 'required|confirmed',
]);





#Update the new Password
User::whereId(auth()->user()->id)->update([
    'password' => Hash::make($request->new_password)
]);

return back()->with("status", "Password changed successfully!");
    return redirect()->route('my-profile', $user->id);
    }

    // Version 
    public function VersionShow($id)
    {
       $version = Version::find($id);
       return view('frontend.version', compact('version'));
    }
}
