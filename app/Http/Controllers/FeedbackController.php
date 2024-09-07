<?php

namespace App\Http\Controllers;

use App\Models\feedback;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedback = feedback::all();
        $contact=ContactUs::first();


        return view('admin.views.feedback.feedback_index', compact('feedback','contact'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contact=ContactUs::first();
        

         return view('admin.views.feedback.feedback_create', compact('contact'));
        
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
            'registration' => 'required',
            'message_title' => 'required',
            'feedback' => 'required',
        ]);



        $feedback = new feedback();
        $feedback->registration = request('registration');
        $feedback->message_title = request('message_title');
        $feedback->feedback = request('feedback');
        $feedback->save();

        $request->session()->flash('insert','Feedback Submitted Successfully');

        return redirect('feedback_create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function show(feedback $feedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function edit(feedback $feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, feedback $feedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(feedback $feedback, $id)
    {
        feedback::destroy(array('id',$id));

        session()->flash('delete','Record Deleted Successfully');

        return redirect('feedback_index');
    }
}
