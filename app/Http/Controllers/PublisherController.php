<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use App\Models\Book;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $publisher = Publisher::all();
       $books = Book::all();

        return view('admin.views.publisher.publisher_index', compact('publisher'));
        return view('admin.views.publisher.publisher_show', compact('publisher','books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $publisher = Publisher::all();

        return view('admin.views.publisher.publisher_create', compact('publisher'));
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
            'p_name' => 'required',

        ]);

        $publisher = new Publisher();
        $publisher->p_name = request('p_name');
        $publisher->save();

        $request->session()->flash('insert','Record Inserted Successfully');

        return redirect('publisher_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function show($publisher)
    {
       //dd($publisher);
       $publisher = Publisher::find($publisher);
        return view("admin.views.publisher.publisher_show", compact('publisher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function edit($publisher)
    {
         $publisher = Publisher::find($publisher);
        return view("admin.views.publisher.publisher_edit", compact('publisher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function update(Publisher $publisher)
    {
        $data = request()->validate([
            'p_name' => 'required'

        ]);
        
        $publisher->update($data);

        session()->flash('update','Record Updated Successfully');

        return redirect('publisher_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publisher $publisher, $id)
    {
        Publisher::destroy(array('id',$id));

        session()->flash('delete','Record Deleted Successfully');

        return redirect('publisher_index');
    }
}
