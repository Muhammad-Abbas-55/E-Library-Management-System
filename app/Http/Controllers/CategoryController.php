<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::orderBy('id','desc')->get();
        //$category = Category::all();

        return view('admin.views.category.category_index', compact('category'));
        return view('admin.views.category.category_show', compact('category'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view("admin.views.category.category_create");
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
            'c_name' => 'required',

        ]);

        for ($i=0; $i < count($request->c_name) ; $i++) { 
            
              $date[] =[
                
                'c_name' => $request->c_name[$i],
              ];

        }

          Category::insert($date);

        $request->session()->flash('insert','Record Inserted Successfully');


        return redirect('category_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($category)
    {
         //dd($category);
       $category = Category::find($category);
        return view("admin.views.category.category_show", compact('category'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($category)
    {
        $category = Category::find($category);
        return view("admin.views.category.category_edit", compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Category $category)
    {
        $data = request()->validate([
            'c_name' => 'required'

        ]);
        
        $category->update($data);

        session()->flash('update','Record Updated Successfully');

        return redirect('category_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category, $id)
    {
        Category::destroy(array('id',$id));

        session()->flash('delete','Record Deleted Successfully');

        return redirect('category_index');
    }
}
