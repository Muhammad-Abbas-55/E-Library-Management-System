<?php

namespace App\Http\Controllers;

use App\Models\Shelf;
use Illuminate\Http\Request;

class ShelfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shelf = Shelf::orderBy('id','desc')->get();
        //$shelf = Shelf::all();

        return view('admin.views.shelf.shelf_index', compact('shelf'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view("admin.views.shelf.shelf_create");
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
            's_no' => 'required',

        ]);

        $shelf = new Shelf();
        $shelf->s_no = request('s_no');
        $shelf->save();

        $request->session()->flash('insert','Record Inserted Successfully');

        return redirect('shelf_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Auther  $shelf
     * @return \Illuminate\Http\Response
     */
    public function show($shelf)
    {
         //dd($shelf);
       $shelf = Shelf::find($shelf);
        return view("admin.views.shelf.shelf_show", compact('shelf'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shelf  $shelf
     * @return \Illuminate\Http\Response
     */
    public function edit($shelf)
    {
        $shelf = Shelf::find($shelf);
        return view("admin.views.shelf.shelf_edit", compact('shelf'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shelf  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Shelf $shelf)
    {
        $data = request()->validate([
            's_no' => 'required',

        ]);
        
        $shelf->update($data);

        session()->flash('update','Record Updated Successfully');

        return redirect('shelf_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Auther  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shelf $shelf, $id)
    {
        Shelf::destroy(array('id',$id));

        session()->flash('delete','Record Deleted Successfully');

        return redirect('shelf_index');
    }
}
