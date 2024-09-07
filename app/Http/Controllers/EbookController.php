<?php

namespace App\Http\Controllers;

use App\Models\Ebook;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\Country;
use App\Models\Auther; 
use App\Models\Authorbook;
use App\Models\Bookpublisher;
use App\Models\ContactUs;
use App\Models\AboutUs;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;


class EbookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        //$books = Book::all();
        $ebooks = Ebook::latest()->paginate(50);
        $category = Category::all();
        $publisher = Publisher::all();
        $author = Auther::all();
        $country = Country::all();
        $ebook = Ebook::all();



             
        //dd($books);
        return view('admin.views.ebook.ebook_index', compact('category','ebooks','author','publisher','country','ebook'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ebook = Ebook::latest()->paginate(5);
        $publisher = Publisher::all();
        $category = Category::all();
        $country = Country::all();
        $author = Auther::all();


        return view("admin.views.ebook.ebook_create", compact('country','category','publisher','ebook','author'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $data = request()->validate([
            'title' => 'required|min:2',
            'edition' => 'required',
            'category_id' => 'required',
            'country_id' => 'required',
            'p_date' => 'required',
        ]);



        $ebook = new Ebook();

        if($request->file('pdfbook')){
            $file=$request->file('pdfbook');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->pdfbook->move('media/ebook/', $filename);

            $ebook->pdfbook= $filename;
        }
        if($request->file('audiobook')){
            $file=$request->file('audiobook');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->audiobook->move('media/ebook/', $filename);

            $ebook->audiobook= $filename;
        }
        if($request->file('magazine')){
            $file=$request->file('magazine');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->magazine->move('media/ebook/', $filename);

            $ebook->magazine= $filename;
        }
        if($request->file('videobook')){
            $file=$request->file('videobook');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->videobook->move('media/ebook/', $filename);

            $ebook->videobook= $filename;
        }
        if($request->file('papers')){
            $file=$request->file('papers');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->papers->move('media/ebook/', $filename);

            $ebook->papers= $filename;
        }

        $ebook->title = request('title');
        $ebook->instructure = request('instructure');
        $ebook->edition = request('edition');
        $ebook->category_id = request('category_id');
        $ebook->country_id = request('country_id');
        $ebook->p_date = request('p_date');
        $ebook->inst = request('inst');
        $ebook->save();

           // dd($request->selected_author_id);
           foreach($request->selected_author_id as $abid) {
               $authorbook = new Authorbook();
               $authorbook->auther_id = $abid;
               $authorbook->ebook_id = $ebook->id;
               $authorbook->save();
           }

           foreach($request->selected_publisher_id as $pbid) {
               $publisherbook = new Bookpublisher();
               $publisherbook->publisher_id = $pbid;
               $publisherbook->ebook_id = $ebook->id;
               $publisherbook->save();
           }
 
        $request->session()->flash('insert','Record Inserted Successfully');

        return redirect('ebook_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ebook  $ebook
     * @return \Illuminate\Http\Response
     */
    public function show($ebook)
    {
        //dd($ebook);
        $ebook = Ebook::find($ebook);
        $category = Category::all();
        $publisher = Publisher::all();
        $author = Auther::all();
        return view("admin.views.ebook.ebook_show", compact('ebook','category','author','publisher'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $ebook
     * @return \Illuminate\Http\Response
     */
    public function edit($ebook)
    {
        $authorbooks =DB::table('authorbooks')  
                                 ->join('authers','authorbooks.auther_id','=','authers.id')
                                 ->join('ebooks','authorbooks.ebook_id','=','ebooks.id')
                                 ->where('authorbooks.ebook_id',$ebook)
                                 ->select('*')
                                 ->get();

        $bookpublishers =DB::table('bookpublishers')
                                 ->join('publishers','bookpublishers.publisher_id','=','publishers.id')
                                 ->join('ebooks','bookpublishers.ebook_id','=','ebooks.id')
                                 ->where('bookpublishers.ebook_id',$ebook)
                                 ->select('*')
                                 ->get();                          

        $ebook = Ebook::find($ebook);
        $author = Auther::all();
        $publisher = Publisher::all();
        $category = Category::all();
        $country = Country::all();

        return view("admin.views.ebook.ebook_edit", compact('country','category','publisher','ebook','authorbooks','author','bookpublishers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ebook  $ebook
     * @return \Illuminate\Http\Response
     */
    public function update(Ebook $ebook , Request $request)
    {
        $data = request()->validate([
            'title' => 'required|min:2',
            'edition' => 'required',
            'category_id' => 'required',
            'country_id' => 'required',
            'p_date' => 'required',
        ]);

        if($request->file('pdfbook')){
            $file=$request->file('pdfbook');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->pdfbook->move('media/ebook/', $filename);

            $ebook->pdfbook= $filename;
        }
        if($request->file('audiobook')){
            $file=$request->file('audiobook');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->audiobook->move('media/ebook/', $filename);

            $ebook->audiobook= $filename;
        }
        if($request->file('papers')){
            $file=$request->file('papers');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->papers->move('media/ebook/', $filename);

            $ebook->papers= $filename;
        }
        if($request->file('magazine')){
            $file=$request->file('magazine');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->magazine->move('media/ebook/', $filename);

            $ebook->magazine= $filename;
        }
        if($request->file('videobook')){
            $file=$request->file('videobook');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->videobook->move('media/ebook/', $filename);

            $ebook->videobook= $filename;
        }

        $ebook->title = $request->title;
        $ebook->instructure = $request->instructure;
        $ebook->edition = $request->edition;
        $ebook->category_id = $request->category_id;
        $ebook->country_id = $request->country_id;
        $ebook->p_date = $request->p_date;
        $ebook->inst = $request->inst;
        $ebook->authers()->sync($request->selected_author_id);
        $ebook->publishers()->sync($request->selected_publisher_id);


        $ebook->update();

        session()->flash('update','Record Updated Successfully');


            return redirect('ebook_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ebook  $ebook
     * @return \Illuminate\Http\Response
     */
   

     public function destroy(Ebook $ebook, $id)
    {
        Ebook::destroy(array('id',$id));

        session()->flash('delete','Record Deleted Successfully');

        return redirect('ebook_index');
    }


     public function read($id)
    {
         
       $ebook = Ebook::find($id);
        return view("admin.views.ebook.ebook_read", compact('ebook'));
     
    }


    public function download($id)
    {
        
       return response()->download('media/ebook/'.$id);
    }



    public function editauther($id)
    {
        
        $author =Auther::where("id", $id)->get();
        //dd($placetypes);
        
        $data = array(array());
        $i = 0;
        foreach($placetypes as $t)
        {
          $data[$i][0] = $t->id;
          $data[$i][1] = $t->a_name;
          $i++;
        }


        //print "<pre>";
        //print_r($data);
        return json_encode($data);
    }


        public function search()
    {
        $search_text = $_GET['query'];
        $ebooks = Ebook::where('title','LIKE','%'.$search_text.'%')
                ->orWhere('instructure','LIKE','%'.$search_text.'%')
                ->get();

        $author = Auther::all();
        $publisher = Publisher::all();
        $category = Category::all();
        $ebook = Ebook::all();
        $about = AboutUs::all();



        return view('admin.views.ebook.ebook_search',compact('ebooks','author','category','publisher','about','ebook'));

    }


        public function booksearch()
    {
        $search_text = $_GET['queryy'];
        $ebooks = Ebook::where('title','LIKE','%'.$search_text.'%')
                ->orWhere('instructure','LIKE','%'.$search_text.'%')
                ->get();

        $ebook = Ebook::all();
        $author = Auther::all();
        $publisher = Publisher::all();
        $category = Category::all();
        $contact = ContactUs::first();
        $about = AboutUs::all();



        return view('std.views.books.search_ebook',compact('ebooks','ebook','author','category','publisher','contact','about'));

    }


        public function aindex()
    {

        //$books = Book::all();
        $ebooks = Ebook::latest()->paginate(50);
        $category = Category::all();
        $publisher = Publisher::all();
        $author = Auther::all();
        $country = Country::all();


             
        //dd($books);
        return view('admin.views.ebook.aebook_index', compact('category','ebooks','author','publisher','country'));

}
}





