<?php

namespace App\Http\Controllers;

use App\Models\Auther;
use App\Models\Country;
use Illuminate\Http\Request;

class AutherController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $author = Auther::orderBy('id','desc')->get();

        //$authors = Auther::all();

        return view('admin.views.author.author_index', compact('author'));
        return view('admin.views.author.author_show', compact('author'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $country = Country::all();
         return view('admin.views.author.author_create', compact('country'));
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
            'a_name' => 'required',
            // 'country_id' => 'required|not_in:null',

        ]);

        $author = new Auther();
        $author->a_name = request('a_name');
        // $author->country_id = request('country_id');
        $author->save();

        $request->session()->flash('insert','Record Inserted Successfully');

        return redirect('author_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Auther  $author
     * @return \Illuminate\Http\Response
     */
    public function show($author)
    {
         //dd($author);
       $author = Auther::find($author);
        return view("admin.views.author.author_show", compact('author'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Auther  $author
     * @return \Illuminate\Http\Response
     */
    public function edit($author)
    {
        $author = Auther::find($author);
        $country = Country::all();

        return view("admin.views.author.author_edit", compact('author','country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Auther  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Auther $author)
    {
        $data = request()->validate([
            'a_name' => 'required',
            // 'country_id' => 'required',

        ]);
        
        $author->update($data);

        session()->flash('update','Record Updated Successfully');


        return redirect('author_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Auther  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Auther $author, $id)
    {
        Auther::destroy(array('id',$id));

        session()->flash('delete','Record Deleted Successfully');

        return redirect('author_index');
    }
}
