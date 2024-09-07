<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use image;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        $about = AboutUs::all();

        return view('admin.views.about.about_index', compact('about'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view("admin.views.about.about_create");
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
            'intro' => 'required',
            'description' => 'required',
            'a_image' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $image =$request->file('a_image');
        //dd($image);
        $image_new =time().$image->getClientOriginalName();
        $image->move('media/about/',$image_new);

        $about = new AboutUs();
        $about->intro = request('intro');
        $about->description = request('description');
        $about->a_image = 'media/about/'.$image_new;
        $about->save();

        $request->session()->flash('insert','Record Inserted Successfully');

        return redirect('about_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($about)
    {
        //dd($about);
        $about = AboutUs::find($about);
        return view("admin.views.about.about_show", compact('about'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $about
     * @return \Illuminate\Http\Response
     */
    public function edit($about)
    {
        $about = AboutUs::find($about);
        return view("admin.views.about.about_edit", compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AboutUs $about)
    {
        $data = request()->validate([
            'intro' => 'required',
            'description' => 'required',
            'a_image' => 'required|image|mimes:jpeg,png,jpg',

        ]);

        $image =$request->file('a_image');
        $image_new =time().$image->getClientOriginalName();
        $image->move('media/about/',$image_new);
        $about->a_image = $request->file('a_image')->getClientOriginalName();

        $about->intro = request('intro');
        $about->description = request('description');
        $about->a_image = 'media/about/'.$image_new;

        
        $about->update();

        session()->flash('update','Record Updated Successfully');

        return redirect('about_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(AboutUs $about, $id)
    {
        AboutUs::destroy(array('id',$id));

        session()->flash('delete','Record Deleted Successfully');

        return redirect('about_index');
    }
}
