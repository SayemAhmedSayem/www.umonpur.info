<?php

namespace App\Http\Controllers;
use App\Models\Member;
use App\Models\NID;
use App\Models\User;
use App\Models\Post;
use Auth;
use App\Models\Income;
use App\Models\Expense;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    
         return redirect()->route('web-home');
        
    }
}
