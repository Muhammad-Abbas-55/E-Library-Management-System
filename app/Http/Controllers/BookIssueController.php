<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Model;

use App\Models\BookIssue;
use App\Models\BookReturn;
use App\Models\Student;
use App\Models\Staff;
use App\Models\Book;
use App\Models\BookSerial;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
class BookIssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        //$books = Book::all();
        $student = Student::all();
        $bookissue = BookIssue::latest()->paginate(10);
    return view('admin.views.bookissue.bookissue_index', compact('bookissue','student'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bookissue = BookIssue::all();
        $student = Student::all();
        $staff = Staff::all();
        $book = Book::all();

        return view("admin.views.bookissue.bookissue_create", compact('bookissue','student','staff','book'));
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
           'book_id' => 'required',
         //  'student_id' => 'required',
           //'staff_id' => 'required',
           'issue_date' => 'required',
           'return_date' => 'required',
          ]);

         //Book::create($data); or



        $qty = Book::find(request('book_id'));

$asd=$qty->avalible_copies;
$now=0;
// dd($now);
        if($asd > $now){
                          
        $bookissue = new BookIssue();
        // $bookissue->book_id = request('book_id');
        $bookissue->book_id = request('book_id');
        $bookissue->serial_id = request('serial_id');
        $bookissue->student_id = request('student_id');
        $bookissue->staff_id = request('staff_id');
        $bookissue->issue_date = request('issue_date');
        $bookissue->return_date = request('return_date');
        $bookissue->save();


        $qty = Book::find(request('book_id'));

        $qty->decrement('avalible_copies');

        // $copy = BookCopy::find(request('bookcopy_id'));
        //dd($copyTable->quantity);

        // $qty = Book::find(request('book_id'));
        // $qty->decrement('avalible_copies');

       // $quantity = $copy->quantity - 1;
       // $quantity->save();
        //BookCopy::where('id',$book->bookcopy_id)->update('quantity'->$quantity);


        // update bookcopy_id = 1 minus

        $request->session()->flash('insert','Record Inserted Successfully');

     
        return redirect('bookissue_index');
                        }
                        else{

                             // echo"<h1>Sorry Not Available</h1>";
                             session()->flash('notavai','Sorry This Books Is Currently Not Available');
                             return redirect('bookissue_create');


     }







    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show($bookissue)
    {
        //dd($book);
        
       $bookissue = BookIssue::find($bookissue);
       //$bookissue = BookIssue::find($bookissue->id);
       $student = Student::all();
       $staff = Staff::all();

        return view("admin.views.bookissue.bookissue_show", compact('bookissue','student','staff'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($bookissue)
    {
        $bookissue = BookIssue::find($bookissue);
        $student = Student::all();
        $staff = Staff::all();
        $book = Book::all();
        //dd($book);

        return view("admin.views.bookissue.bookissue_edit", compact('bookissue','student','staff','book'));
   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $bookissue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $bookissue)
    {
         $data = request()->validate([
           'book_id' => 'required',
         //  'bookcopy_id' => 'required',
          // 'student_id' => 'required',
         //'staff_id' => 'required',
           'issue_date' => 'required',
           'return_date' => 'required',
          ]);
         

        $bookissue=BookIssue::find($request->bookissue);
        $bookissue->book_id = request('book_id');
        $bookissue->student_id = request('student_id');
        $bookissue->staff_id = request('staff_id');
        $bookissue->issue_date = request('issue_date');
        $bookissue->return_date = request('return_date');
        $bookissue->update();
        //$request->session()->flash('msg','Data Updated');

        $qty = Book::find(request('book_id'));
        $qty->decrement('avalible_copies');

        session()->flash('update','Record Updated Successfully');

        return redirect('bookissue_index');

          //  $bookissue->update($data);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $bookissue
     * @return \Illuminate\Http\Response
     */
   

     public function destroy(BookIssue $bookissue, $id)
    {
        BookIssue::destroy(array('id',$id));

        session()->flash('delete','Record Deleted Successfully');

        return redirect('bookissue_index');
    }
    

     public function getregistration($id)
    {
        //return $id;
        //dd('df);
        $student = Student::find($id);
        return $student->name;
    }


     public function getregistrationn($id)
    {
        //return $id;
        //dd('df);
        $student = Student::find($id);
        return $student->reg_no;
    }

         public function getquantity($id)
    {
       
        $bookcopy = Book::find($id);
        return $bookcopy->avalible_copies;
    }
       






         public function avaliblecopies($id)
    {
    
        $bookcopy = Book::find($id);
        $copy[0] = $bookcopy->total_copies;
        $copy[1] = $bookcopy->avalible_copies;
        return json_encode($copy);
    }

         public function totalcopies($id)
    {
    
        $bookcopy = Book::find($id);
        return $bookcopy->total_copies;
    }






    public function check_copies()
    {
        $bookissue = BookIssue::all();
        $book = Book::all();

        return view("admin.views.bookissue.check_copies", compact('bookissue','book'));
    }


        public function searchstd()
    {
        $search_text = $_GET['query'];
        $student = Student::where('name','LIKE','%'.$search_text.'%')
                ->orWhere('reg_no','LIKE','%'.$search_text.'%')
                ->get();

        return view('admin.views.bookissue.bookissuestd_search',compact('student'));

    }

        public function searchstf()
    {
        $search_text = $_GET['query'];
        $staff = Staff::where('name','LIKE','%'.$search_text.'%')
                ->orWhere('cnic','LIKE','%'.$search_text.'%')
                ->get();

        return view('admin.views.bookissue.bookissuestf_search',compact('staff'));

    }




        public function report()
    {
        // $report = BookIssue::all();

             
    return view('admin.views.bookissue.report');

    }


        public function dailyreport()
    {
    
        //$daily = BookIssue::whereDate('created_at',Carbon::today())->get();
         $daily = BookIssue::whereBetween('created_at', [Carbon::now()->startOfday(),Carbon::now()->endOfday()])->get();
             
    return view('admin.views.bookissue.dailyreport', compact('daily'));

    }


        public function issuereport()
    {
              
        $weekly = BookIssue::all();
        // dd($weekly);
             
    return view('admin.views.bookissue.issuereport', compact('weekly'));

    }


        public function issuereportt(Request $request)
    {
              
         $weekly = BookIssue::whereBetween('created_at', array($request->fromDate, $request->toDate))
            ->select()
            ->get();
        // dd($weekly);
            
             
    return view('admin.views.bookissue.issuereport', compact('weekly'));

    }


        public function bookissuereportstd()
    {
        $student = Student::all();

    return view('admin.views.bookissue.bookissuereportstd', compact('student'));

    }


        public function bookissuereportstf()
    {
        $staff = Staff::all();

    return view('admin.views.bookissue.bookissuereportstf', compact('staff'));

    }


     public function accegt($id)
    {
        //$book =BookIssue::where("student_id", $id)->get();

        $srno = DB::table('book_serials')
            ->join('books', 'book_serials.book_id', '=', 'books.id')
            ->select('book_serials.*')
             ->where('book_serials.book_id','=', $id)
            ->get();
         // dd($srno);
        
        $data = array(array());
        $i = 0;
        foreach($srno as $sr)
        {
            $data[$i][0] = $sr->id;
            $data[$i][1] = $sr->serial_no;
           
            $i++;
        }
    
        return json_encode($data);

    }



}
