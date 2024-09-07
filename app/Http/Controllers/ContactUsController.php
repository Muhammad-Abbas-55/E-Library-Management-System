<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.views.contact.contact_create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->input();
        $data = request()->validate([
            'fb' => 'required',
            'twit' => 'required',
            'gmail' => 'required|email',
            'phone' => 'required',
            'instagram' => 'required',
            'youtube' => 'required',
        ]);

        $res=new ContactUs;
        $res->fb=$request->input('fb');
        $res->twit=$request->input('twit');
        $res->gmail=$request->input('gmail');
        $res->phone=$request->input('phone');
        $res->instagram=$request->input('instagram');
        $res->youtube=$request->input('youtube');
        $res->save();

        $request->session()->flash('insert','Record Inserted Successfully');

        return redirect('contact_show');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function show(ContactUs $contactUs)
    {
        return view("admin.views.contact.contact_show")->with('contactArr',ContactUs::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactUs $contactUs,$id)
    {
        return view("admin.views.contact.contact_edit")->with('contactArr',ContactUs::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactUs $contactUs)
    {
        $data = request()->validate([
            'fb' => 'required',
            'twit' => 'required',
            'gmail' => 'required|email',
            'phone' => 'required',
            'instagram' => 'required',
            'youtube' => 'required',
        ]);
        
        $res=ContactUs::find($request->id);
        $res->fb=$request->input('fb');
        $res->twit=$request->input('twit');
        $res->gmail=$request->input('gmail');
        $res->phone=$request->input('phone');
        $res->instagram=$request->input('instagram');
        $res->youtube=$request->input('youtube');
        $res->save();

        session()->flash('update','Record Updated Successfully');


        return redirect('contact_show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactUs $contactUs, $id)
    {
        ContactUs::destroy(array('id',$id));

        session()->flash('delete','Record Deleted Successfully');

        return redirect('contact_show');
    }
}
