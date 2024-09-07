<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $country = Country::all();

        return view('admin.views.country.country_index', compact('country'));
        return view('admin.views.country.country_show', compact('country'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view("admin.views.country.country_create");
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
            'country' => 'required'

        ]);

        $country = new Country();
        $country->country = request('country');
        $country->save();

        $request->session()->flash('insert','Record Inserted Successfully');

        return redirect('country_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $category
     * @return \Illuminate\Http\Response
     */
    public function show($country)
    {
         //dd($country);
       $country = Country::find($country);
        return view("admin.views.country.country_show", compact('country'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit($country)
    {
        $country = Country::find($country);
        return view("admin.views.country.country_edit", compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Country $country)
    {
        $data = request()->validate([
            'country' => 'required'

        ]);
        
        $country->update($data);

        session()->flash('update','Record Updated Successfully');

        return redirect('country_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country, $id)
    {
        Country::destroy(array('id',$id));

        session()->flash('delete','Record Deleted Successfully');

        return redirect('country_index');
    }
}
