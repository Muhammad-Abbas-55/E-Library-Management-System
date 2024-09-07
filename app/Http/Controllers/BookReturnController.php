<?php

namespace App\Http\Controllers;

use App\Models\BookReturn;
use App\Models\BookIssue;
use App\Models\Student;
use App\Models\Staff;
use App\Models\Book;
use App\Models\Fine;
use App\Mail\ReturnMail;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use DB;

class BookReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        //$books = Book::all();
        $bookreturn = BookReturn::latest()->paginate(24);
             
        //dd($books);
    return view('admin.views.bookreturn.bookreturn_index', compact('bookreturn'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bookreturn =BookReturn::all();
        $bookissue = BookIssue::all();
        $student = Student::all();
        $staff = Staff::all();
        $book = Book::all();
        $fine = Fine::all();

        return view("admin.views.bookreturn.bookreturn_create", compact('bookreturn','bookissue','student','staff','book','fine'));
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
        //   'return_date' => 'required',
            'book_id' => 'required',
        //  'issue_id' => 'required',
        //   'student_id' => 'required',
        //   'staff_id' => 'required',
         //  'issue_date' => 'required',
        //   'return_date' => 'required',
           ]);

         //Book::create($data); or



        $issuee = BookIssue::find(request('book_id'));
        $ireturn_date= $issuee->return_date;

          // dd($ireturn_date);

            $fine = Fine::first();

        $return_date = \Carbon\Carbon::parse($ireturn_date)->format('Y-m-d');
        $areturn_date = \Carbon\Carbon::parse($request->input('return_date'));

        $price = $fine->f_amount;

        $result = $areturn_date->diffInDays($return_date, false);
        $result= $result-$result-$result;

        // if ($result < 0) {
          $price = $price * $result;

        // }

        $bookreturn = new BookReturn();
        $bookreturn->return_date  = request('return_date');
        $bookreturn->issue_id  = request('book_id');
        $bookreturn->fine_id  = request('fine_id');
        $bookreturn->status  = request('status');
        $bookreturn->lose  = request('lose');
        $bookreturn->fine  = $price;

          // dd($bookreturn);

        $bookreturn->save();
        
        $issue_status = BookIssue::where('id',$request->book_id)->first();
        $issue_status->return_status = 1;
        $issue_status->save();


        $issue = BookIssue::find(request('book_id'));

      //  Book::where('id', $bookreturn)->update(['avalible_copies' => \DB::raw('avalible_copies + 1')]);
      //  BookIssue::where('id', $article)->update(['avalible_copies' => DB::raw('avalible_copies + 1')]);
         //DB::table('books')->increment('avalible_copies');
         Book::find($issue->book_id)->increment('avalible_copies',1);
        // $qty = Book::find(request('book_id'));
        // $qty->increment('avalible_copies');

        // $copy = BookCopy::find(request('bookcopy_id'));

     

        // $quantity = $copy->quantity - 1;
        // $quantity->save();
        //BookCopy::where('id',$book->bookcopy_id)->update('quantity'->$quantity);


        // update bookcopy_id = 1 minus

        $request->session()->flash('insert','Record Inserted Successfully');

     
        return redirect('bookreturn_index');
    }




    // public function bookreturn_fststus_store(Request $request)
    // {
    //     $bookreturn = new BookReturn();
    //     $bookreturn->status  = request('status');
    //     $bookreturn->issue_id  = request('book_id');


    //     dd($bookreturn);

    //     $request->session()->flash('status','Fine Status Updated Successfully');
    //     $bookreturn->save();

     
    //     return redirect('bookreturn_index');
    // }    


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */


    public function show($bookreturn)
    {
        //dd($book);
        
       $bookreturn = BookReturn::find($bookreturn);
       $student = Student::all();
       $fine = Fine::all();
       $staff = Staff::all();

        return view("admin.views.bookreturn.bookreturn_show", compact('bookreturn','fine','staff'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($bookreturn)
    {
        $bookreturn = BookReturn::find($bookreturn);
        $student = Student::all();
        $staff = Staff::all();
        $book = Book::all();
        $fine = Fine::all();

        return view("admin.views.bookreturn.bookreturn_edit", compact('bookreturn','student','staff','book','fine'));

       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $bookreturn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $bookreturn)
    {
         $data = request()->validate([
            // 'book_id' => 'required',
            //'bookcopy_id' => 'required',
            //'student_id' => 'required',
            //'staff_id' => 'required',
            //'issue_date' => 'required',
           // 'return_date' => 'required',
          ]);



        // $issuee = BookIssue::find(request('book_id'));
        // $ireturn_date= $issuee->return_date;

          // dd($ireturn_date);

        //     $fine = Fine::first();

        // $return_date = \Carbon\Carbon::parse($ireturn_date)->format('Y-m-d');
        // $areturn_date = \Carbon\Carbon::parse($request->input('return_date'));

        // $price = $fine->f_amount;

        // $result = $areturn_date->diffInDays($return_date, false);
        // $result= $result-$result-$result;

        // // if ($result < 0) {
        //   $price = $price * $result;

        // // }


        $bookreturn = BookReturn::find($request->bookreturn);
        // $bookreturn->return_date  = request('return_date');
        // $bookreturn->issue_id  = request('book_id');
        // $bookreturn->fine_id  = request('fine_id');
        $bookreturn->status  = request('status');
        // $bookreturn->lose  = request('lose');
        // $bookreturn->fine  = $price;
        
       // dd($bookreturn);

        $bookreturn->save();

        // $issue = BookIssue::find(request('book_id'));

        //  Book::find($issue->book_id)->increment('avalible_copies',1);

        session()->flash('update','Record Updated Successfully');

            return redirect('bookreturn_index');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $bookreturn
     * @return \Illuminate\Http\Response
     */
   

     public function destroy(BookReturn $bookreturn, $id)
    {
        BookReturn::destroy(array('id',$id));

        session()->flash('delete','Record Deleted Successfully');

        return redirect('bookreturn_index');
    }

     public function getregistration($id)
    {   //return $id;
        //dd('df);
        $student = Student::find($id);
        return $student->reg_no;
    }


         public function getquantity($id)
    {
        $bookcopy = Book::find($id);
        return $bookcopy->avalible_copies;
    }



         public function getdate($id)
    {
        $book_issues = BookIssue::where("id",$id)->first();
        // $book_return = BookReturn::where("issue_id",$id)->first();
        
        $data[0] = $book_issues->issue_date;
        $data[1] = $book_issues->return_date;
        //print_r($book_issues);

       return json_encode($data);
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


         public function bookgt($id)
    {
        //$book =BookIssue::where("student_id", $id)->get();

        $book = DB::table('book_issues')
            ->join('books', 'book_issues.book_id', '=', 'books.id')
            ->select('books.*', 'book_issues.id as issue_id')
            ->where('book_issues.student_id','=', $id)
            ->get();
        //dd($book);
        
        $data = array(array());
        $i = 0;
        foreach($book as $t)
        {
          $br = BookReturn::where('issue_id', $t->issue_id)->first();
          if(!isset($br->id))
          {
            $data[$i][0] = $t->issue_id;
            $data[$i][1] = $t->b_title;
           
            $i++;
          }
        }
    
        return json_encode($data);

    }


         public function bookg($id)
    {
        //$book =BookIssue::where("student_id", $id)->get();

        $book = DB::table('book_issues')
            ->join('books', 'book_issues.book_id', '=', 'books.id')
            ->select('books.*', 'book_issues.id as issue_id')
            ->where('book_issues.staff_id','=', $id)
            ->get();
        //dd($book);
        
        $data = array(array());
        $i = 0;
        foreach($book as $t)
        {
          $br = BookReturn::where('issue_id', $t->issue_id)->first();
          if(!isset($br->id))
          {  
          $data[$i][0] = $t->issue_id;
          $data[$i][1] = $t->b_title;
          $i++;
        }
    }
    
        return json_encode($data);

    }


    public function getlatefine($id)
    {
        $fine = Fine::where("id",$id)->first();
       // print_r($fine);
        
        $data[0] = $fine->f_amount;
       // $data[1] = $fine->f_status;

       return json_encode($data);
    }



    public function dailyreportt()
    {
        $bookreturn = BookReturn::all();

        $daily = BookReturn::whereBetween('created_at', [Carbon::now()->startOfday(),Carbon::now()->endOfday()])->get();
             
    return view('admin.views.bookreturn.dailyreport', compact('bookreturn','daily'));

    }

        public function returnreport()
    {
        $bookreturn = BookReturn::all();
        // dd($bookreturn);
             
    return view('admin.views.bookreturn.returnreport', compact('bookreturn'));

    }

        public function returnreportt(Request $request)
    {
        $bookreturn = BookReturn::whereBetween('created_at', array($request->fromDate, $request->toDate))
            ->select()
            ->get();
             
    return view('admin.views.bookreturn.returnreport', compact('bookreturn'));
    }

    public function sendEmail()
    {

      
        $details = [
            'title' => 'Book Late Return Notification Mail',
            'body' => 'Please Return the book as soon as possible',

        ];

          $now = Carbon::now()->format('Y-m-d');

        $stdreturn_datee =BookIssue::join('students', 'book_issues.student_id','students.id')
                            ->select('book_issues.return_date')
                            ->where('return_status',0)
                            ->where('return_date','<',$now)
                            ->get();

        $stfreturn_datee =BookIssue::join('staff', 'book_issues.staff_id','staff.id')
                            ->select('book_issues.return_date')
                            ->where('return_status',0)
                            ->where('return_date','<',$now)
                            ->get();   
// dd($stfreturn_datee);



//dd($now);

        if($stdreturn_datee > $now){
                            $bookissue =BookIssue::join('students', 'book_issues.student_id','students.id')
                            ->select('students.email')
                            ->where('return_status',0)
                            ->where('return_date','<',$now)
                            ->get();
                // dd($bookissue);
                            $std=Mail::to($bookissue)->send(new ReturnMail($details));
                            
                }
                else{
                    echo "No Book Late Found";
                }



        if($stfreturn_datee > $now){
                            $staffemail =BookIssue::join('staff', 'book_issues.staff_id','staff.id')
                            ->select('staff.email')
                            ->where('return_status',0)
                            ->where('return_date','<',$now)
                            ->get();
                // dd($staffemail);
                                $stf=Mail::to($staffemail)->send(new ReturnMail($details));

                                session()->flash('emailsend','Your E-mail has been sent successfully');
                                

                }
                else{
                    echo "No Book Late Found";
                }

     
                return redirect('bookissue_index');


    }




}
