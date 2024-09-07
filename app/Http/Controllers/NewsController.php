<?php

namespace App\Http\Controllers;

use App\Models\News;
use image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::orderBy('id','desc')->get();
        //$news = News::all();

        return view('admin.views.news.news_index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.views.news.news_create");
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
            'e_title' => 'required',
            'e_description' => 'required|min:2|max:100000',
            'slider1_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'slider2_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'slider3_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'e_date' => 'required',
            'e_stime' => 'required',
            'e_etime' => 'required',
            'e_location' => 'required',



        ]);

        $image1 =$request->file('slider1_image');
        $image_new1 =time().$image1->getClientOriginalName();
        $image1->move('media/news/',$image_new1);

        $image2 =$request->file('slider2_image');
        $image_new2 =time().$image2->getClientOriginalName();
        $image2->move('media/news/',$image_new2);

        $image3 =$request->file('slider3_image');
        $image_new3 =time().$image3->getClientOriginalName();
        $image3->move('media/news/',$image_new3);




        $news = new News();
        $news->e_title = request('e_title');
        $news->e_description = request('e_description');
        $news->slider1_image = 'media/news/'.$image_new1;
        $news->slider2_image = 'media/news/'.$image_new2;
        $news->slider3_image = 'media/news/'.$image_new3;
        $news->e_date = request('e_date');
        $news->e_stime = request('e_stime');
        $news->e_etime = request('e_etime');
        $news->e_location = request('e_location');


        $news->save();

        $request->session()->flash('insert','Record Inserted Successfully');


        return redirect('news_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show($news)
    {
        $news = News::find($news);
        return view("admin.views.news.news_show", compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit($news)
    {
        $news = News::find($news);

        return view("admin.views.news.news_edit", compact('news'));

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
            $data = request()->validate([
            'e_title' => 'required',
            'e_description' => 'required',
            'slider1_image' => 'image|mimes:jpg,png,jpeg,gif,svg',
            'e_date' => 'required',
            'e_stime' => 'required',
            'e_etime' => 'required',
            'e_location' => 'required',


        ]);

        News::where('id',$request->id)->update([
                'e_title'=>$request->e_title,
                'e_description'=>$request->e_description,
                'e_date'=>$request->e_date,
                'e_stime'=>$request->e_stime,
                'e_etime'=>$request->e_etime,
                'e_location'=>$request->e_location,
        ]);

        $news=News::find($request->id);
            if($request->hasfile('slider1_image')){
                $image1 =$request->file('slider1_image');
                $extension = $image1->getClientOriginalName();
                $filename=$news->id. "." .$extension;
                $destination=public_path('/media/news/');
                $image1->move($destination,$filename);
                $news->slider1_image = '/media/news/'.$filename;
            }
            $news->save();


        $news2=News::find($request->id);
            if($request->hasfile('slider2_image')){
                $image2 =$request->file('slider2_image');
                $extension = $image2->getClientOriginalName();
                $filename=$news2->id. "." .$extension;
                $destination=public_path('/media/news2/');
                $image2->move($destination,$filename);
                $news2->slider2_image = '/media/news2/'.$filename;
            }
            $news2->save();
            

        $news3=News::find($request->id);
            if($request->hasfile('slider3_image')){
                $image3 =$request->file('slider3_image');
                $extension = $image3->getClientOriginalName();
                $filename=$news3->id. "." .$extension;
                $destination=public_path('/media/news3/');
                $image3->move($destination,$filename);
                $news3->slider3_image = '/media/news3/'.$filename;
            }
            $news3->save();    
        
        session()->flash('update','Record Updated Successfully');

        return redirect('news_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news, $id)
    {
        News::destroy(array('id',$id));

        session()->flash('delete','Record Deleted Successfully');

        return redirect('news_index');
    }
}
