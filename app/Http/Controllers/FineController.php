<?php

namespace App\Http\Controllers;

use App\Models\Fine;
use Illuminate\Http\Request;

class FineController extends Controller
{
    public function index()
    {
        $fine = Fine::orderBy('id','desc')->get();
        //$fine = Fine::all();

        return view('admin.views.fine.fine_index', compact('fine'));
        return view('admin.views.fine.fine_show', compact('fine'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view("admin.views.fine.fine_create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = request()->validate([
            'day' => 'required',
            'f_amount' => 'required',

        ]);

        $fine = new Fine();
        $fine->day = request('day');
        $fine->f_amount = request('f_amount');
       // $fine->f_status = request('f_status');
       // $fine->lose = request('lose');
        $fine->save();

        $request->session()->flash('insert','Record Inserted Successfully');


        return redirect('fine_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $fine
     * @return \Illuminate\Http\Response
     */
    public function show($fine)
    {
         //dd($fine);
       $fine = Fine::find($fine);
        return view("admin.views.fine.fine_show", compact('fine'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $fine
     * @return \Illuminate\Http\Response
     */
    public function edit($fine)
    {
        $fine = Fine::find($fine);
        return view("admin.views.fine.fine_edit", compact('fine'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fine  $fine
     * @return \Illuminate\Http\Response
     */
    public function update(Fine $fine)
    {
        $data = request()->validate([
            'day' => 'required',
            'f_amount' => 'required',
           // 'f_status' => 'required',

        ]);
        
        $fine->update($data);

        session()->flash('update','Record Updated Successfully');

        return redirect('fine_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fine  $fine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fine $fine, $id)
    {
        Fine::destroy(array('id',$id));

        session()->flash('delete','Record Deleted Successfully');

        return redirect('fine_index');
    }
}
