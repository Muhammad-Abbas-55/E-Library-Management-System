<?php

namespace App\Http\Controllers;
use App\Imports\BookImport;
use App\Exports\BookExport;
use Maatwebsite\Excel\Excel;
// use Excel;
use image;
use App\Models\Book;
use App\Models\User;
use App\Models\BookSerial;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\Country;
use App\Models\Auther;
use App\Models\Shelf;
use App\Models\Authorbook;
use App\Models\Shelfbook;
use App\Models\Bookpublisher;
use Illuminate\Http\Request;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        //$books = Book::all();
        $books = Book::latest()->paginate(10);
        $book = Book::all();
        $category = Category::all();
        $publisher = Publisher::all();
        $author = Auther::all();
        $shelf = Shelf::all();
        

        return view('admin.views.book.book_index', compact('books','book','category','publisher','author','shelf'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $publisher = Publisher::all();
        $country = Country::all();
        $author = Auther::all();
        $shelf = Shelf::all();

        return view("admin.views.book.book_create", compact('category','publisher','country','author','shelf'));
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
            'b_title' => 'required',
            'b_edition' => 'required',
            'b_price' => 'required',
            'b_isbn' => 'required',
            'description' => 'required|min:1|max:100000',
            'length' => 'required',
            'p_date' => 'required',
            'total_copies' => 'required',
            'avalible_copies' => 'required',
            'category_id' => 'required',
            'country_id' => 'required',
            'b_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            
        ]);

         //Book::create($data); or

        $image =$request->file('b_image');
        $image_new =time().$image->getClientOriginalName();
        $image->move('media/books/',$image_new);


        $book = new Book();
        $book->b_title = request('b_title');
        $book->b_edition = request('b_edition');
        $book->b_price = request('b_price');
        $book->b_isbn = request('b_isbn');
        $book->description = request('description');
        $book->length = request('length');
        $book->p_date = request('p_date');
        $book->total_copies = request('total_copies');
        $book->avalible_copies = request('avalible_copies');
        $book->category_id = request('category_id');
        $book->country_id = request('country_id');
        $book->b_image = 'media/books/'.$image_new;
        $book->save();


        for ($i=0; $i < count($request->serial_no) ; $i++) { 
            
              $serial[] =[
                'serial_no' => $request->serial_no[$i],
                 'book_id' => $book->id,
              ];
              // dd($serial);

        }
       
        BookSerial::insert($serial);
       
 
            // dd($request->selected_author_id);
           foreach($request->selected_author_id as $abid) {
               $authorbook = new Authorbook();
               $authorbook->auther_id = $abid;
               $authorbook->book_id = $book->id;
               $authorbook->save();
           }
                  
                  // dd($request->selected_shelf_id);
           foreach($request->selected_shelf_id as $ss) {
             // dd($ss);
               $shelfbook = new Shelfbook();
               $shelfbook->shelf_id = $ss;
               $shelfbook->book_id = $book->id;
               $shelfbook->save();
           }

           foreach($request->selected_publisher_id as $pbid) {
               $publisherbook = new Bookpublisher();
               $publisherbook->publisher_id = $pbid;
               $publisherbook->book_id = $book->id;
               $publisherbook->save();
           }

        $request->session()->flash('insert','Record Inserted Successfully');

        return redirect('book_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show($book)
    {
        //dd($book);s
       $book = Book::find($book);
        return view("admin.views.book.book_show", compact('book'));

        return view("admin.views.dashboard", compact('book'));

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($book)
    {
        // dd($book);

        $authorbooks =DB::table('authorbooks')  
                                 ->join('authers','authorbooks.auther_id','=','authers.id')
                                 ->join('books','authorbooks.book_id','=','books.id')
                                 ->where('authorbooks.book_id',$book)
                                 ->select('*')
                                 ->get();

        $shelfbooks =DB::table('shelfbooks')
                                 ->join('shelves','shelfbooks.shelf_id','=','shelves.id')
                                 ->join('books','shelfbooks.book_id','=','books.id')
                                 ->where('shelfbooks.book_id',$book)
                                 ->select('*')
                                 ->get();

        $bookpublishers =DB::table('bookpublishers')
                                 ->join('publishers','bookpublishers.publisher_id','=','publishers.id')
                                 ->join('books','bookpublishers.book_id','=','books.id')
                                 ->where('bookpublishers.book_id',$book)
                                 ->select('*')
                                 ->get();                         

        //$author = Auther::where('id',$book)->get();

        $book = Book::find($book);

        $category = Category::all();
        $publisher = Publisher::all();  
        $country = Country::all();
        $author = Auther::all();
        $shelf = Shelf::all();
      
            
        return view("admin.views.book.book_edit", compact('book','category','publisher','country','author','shelf','authorbooks','shelfbooks','bookpublishers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        // dd($request);
        $data = request()->validate([
            'b_title' => 'required|min:2',
            'b_edition' => 'required',
            'b_price' => 'required',
            'b_isbn' => 'required',
            'description' => 'required',
            'length' => 'required',
            'category_id' => 'required',
            'p_date' => 'required',
            'total_copies' => 'required',
            'avalible_copies' => 'required',
            'country_id' => 'required',
            'b_image' => 'required|image|mimes:jpeg,png,jpg',
        
            ]);
       // dd($book->id);

       
        $image =$request->file('b_image');
        $image_new =time().$image->getClientOriginalName();
        $image->move('media/books/',$image_new);
        $book->b_image = $request->file('b_image')->getClientOriginalName();

         //dd($book);
        $book->b_title = $request->b_title;
        $book->b_edition = $request->b_edition;
        $book->b_price = $request->b_price;
        $book->b_isbn = $request->b_isbn;
        $book->description = $request->description;
        $book->length = $request->length;
        $book->p_date = $request->p_date;
        $book->total_copies = $request->total_copies;
        $book->avalible_copies = $request->avalible_copies;
        $book->category_id = $request->category_id;
        $book->country_id = $request->country_id;
        $book->b_image = 'media/books/'.$image_new;
        $book->authers()->sync($request->selected_author_id);
        $book->shelves()->sync($request->selected_shelf_id);
        $book->publishers()->sync($request->selected_publisher_id);

        $book->update();

        session()->flash('update','Record Updated Successfully');

        return redirect('book_index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */


     public function destroy(Book $book, $id)
    {
        Book::destroy(array('id',$id));

        session()->flash('delete','Record Deleted Successfully');

        return redirect('book_index');
    }

    private $excel;
    public function __construct(Excel $excel)
    {
        $this->excel = $excel;
    }

    public function bookexportExcel()
    {
        return $this->excel->download(new BookExport,'booklist.xlsx');
    }

    public function bookexportCsv()
    {
        return $this->excel->download(new BookExport,'booklist.csv');
    }

        public function bookexportpdf()
    {
        return $this->excel->download(new BookExport,'booklist.pdf', Excel::DOMPDF);
    }


        public function bookimport()
    {
         return view("admin.views.book.book_import");
    }


        public function bimport(Request $request)
    {
        $file = $request->file('file')->store('import');
        (new BookImport)->import($file);
        
        $request->session()->flash('imp','Record Imported Successfully');

        return back();

        // Excel::import(new BookImport,$request->file);
        //  return redirect('book_index');
    }


        public function search()
    {
        $search_text = $_GET['query'];
        $books = Book::where('b_title','LIKE','%'.$search_text.'%')
                ->orWhere('b_isbn','LIKE','%'.$search_text.'%')
                ->get();
        $book = Book::all();        

        $author = Auther::all();
        $publisher = Publisher::all();
        $category = Category::all();
        $shelf = Shelf::all();


        return view('admin.views.book.book_search',compact('books','book','author','category','publisher','shelf'));

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



        public function bweeklyreport()
    {
    
        //$daily = BookIssue::whereDate('created_at',Carbon::today())->get();
        $category=Category::all();
        $books = Book::whereBetween('created_at', [Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()])->get();
            
    return view('admin.views.book.b_weeklyreport', compact('books','category'));

    }


        public function breport()
    {
        $category=Category::all();
        $books = Book::all();
             
    return view('admin.views.book.breport', compact('books','category'));

    }

        
        public function breportt(Request $request)
    {
        $books = Book::whereBetween('created_at', array($request->fromDate, $request->toDate))
            ->select()
            ->get();
        // dd($books);
             
    return view('admin.views.book.breport', compact('books'));

    }


        public function cat_report()
    {
        $category=Category::all();
        $books=Book::all();
             
    return view('admin.views.book.cat_report', compact('books','category'));

    }






        public function roleindex()
    {

        $users = User::all();
        

        return view('admin.views.user.userindex', compact('users'));
        
    }
    


        public function editrole($role)
    {

        $users = User::find($role);
      //  dd($user);
        return view('admin.views.user.edituser', compact('users'));
        
    }


        public function roleupdate(User $role)
    {

            $data = request()->validate([
            'name' => 'required',
            'email' => 'required',
            'role' =>'required',

        ]);
        
        $role->update($data);

        session()->flash('update','Record Updated Successfully');

        return redirect('role_index');
        

        
    }

     public function destroy_admin(User $user, $id)
    {
        User::destroy(array('id',$id));

        session()->flash('delete','Record Deleted Successfully');

        return redirect('role_index');
    }

    public function aindex()
    {

        //$books = Book::all();
        $books = Book::latest()->paginate(10);
        $book = Book::all();
        $category = Category::all();
        $publisher = Publisher::all();
        $author = Auther::all();
        $shelf = Shelf::all();
        

        return view('admin.views.book.abook_index', compact('books','book','category','publisher','author','shelf'));
        
    }
    


}
