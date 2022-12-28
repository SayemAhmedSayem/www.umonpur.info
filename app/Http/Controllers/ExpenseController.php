<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use Auth;
class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        // return Auth::user()->user_type. Auth::user()->role_id;
        $expenses = Expense::latest()->paginate(5);
        return view('backend.expense.index' , compact('expenses'));
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
        $income =  new Expense();
        $income->user_id = Auth::user()->id;
        $income->amount = $request->amount;
        $income->date = $request->date;
        $income->description = $request->description;
        $income->expense_type = 1;
        $income->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $expense = Expense::find($id);
       return view('backend.expense.edit' , compact('expense'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $income =   Expense::find($id);
        $income->user_id = Auth::user()->id;
        $income->amount = $request->amount;
        $income->date = $request->date;
        $income->description = $request->description;
        $income->expense_type = 1;
        $income->save();
        return redirect()->route('expense.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $e = Expense::find($id);
        $e->delete();
        return redirect()->back();
    }
}
