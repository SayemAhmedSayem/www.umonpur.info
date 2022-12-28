<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\Request;
use Auth;
class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        // return Auth::user()->user_type. Auth::user()->role_id;
        $incomes = Income::latest()->paginate(5);
        return view('backend.income.index' , compact('incomes'));
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
        // dd($request->all());
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
        return redirect()->back();
  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function show(Income $income)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function Approve($id)
    {
        $income = Income::find($id);
        $income->status = 1;
        $income->approved_by = Auth::user()->id;
        $income->save();
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Income $income)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function destroy(Income $income)
    {
        //
    }
}
