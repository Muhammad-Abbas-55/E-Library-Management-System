<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Category;
use App\Models\AboutUs;
use App\Models\Book;
use App\Models\Ebook;
use Illuminate\Http\Request;
use App\Imports\StudentImport;
use App\Exports\StudentExport;
use Excel;
use DB;

class StudentController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Student::all();

        return view('admin.views.student.student_index', compact('student'));
        return view('admin.views.student.student_show', compact('student'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view("admin.views.student.student_create");
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
            'name' => 'required',
            'fname' => 'required',
            'email' => 'required|email|unique:students,email',
            'cell_no' => 'required|min:6|max:13',
            'gender' => 'required',
            'reg_no' => 'required',
            'cnic' => 'required|min:13|max:15',
            'batch' => 'required',
            'department' => 'required',

        ]);

        $student = new Student();
        $student->name = request('name');
        $student->fname = request('fname');
        $student->email = request('email');
        $student->password = request('password');
        $student->cell_no = request('cell_no');
        $student->gender = request('gender');
        $student->reg_no = request('reg_no');
        $student->cnic = request('cnic');
        $student->batch = request('batch');
        $student->department = request('department');
        $student->save();

        $request->session()->flash('insert','Record Inserted Successfully');

        return redirect('student_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($student)
    {
         //dd($student);
       $student = Student::find($student);
        return view("admin.views.student.student_show", compact('student'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($student)
    {
        $student = Student::find($student);
        return view("admin.views.student.student_edit", compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Student $student)
    {
        $data = request()->validate([
            'name' => 'required',
            'fname' => 'required',
            'email' => 'required|email|unique:students,email',
            'cell_no' => 'required',
            'gender' => 'required',
            'reg_no' => 'required',
            'cnic' => 'required',
            'batch' => 'required',
            'department' => 'required',

        ]);
        
        $student->update($data);

        session()->flash('update','Record Updated Successfully');

        return redirect('student_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */

      public function destroy(Student $student, $id)
    {
        Student::destroy(array('id',$id));

        $request->session()->flash('delete','Record Deleted Successfully');

        return redirect('student_index');
    }


        public function studentimport()
    {
         return view("admin.views.student.student_import");
    }


        public function import(Request $request)
    {
        Excel::import(new StudentImport,$request->file);
         return redirect('student_index');
    }


        public function studentexportExcel()
    {
        return Excel::download(new StudentExport,'studentlist.xlsx');
    }

        public function studentexportCsv()
    {
        return Excel::download(new StudentExport,'studentlist.csv');
    }


    public function login()
    {
        $about = AboutUs::first();

        return view('admin.views.student.login', compact('about'));
    }

    public function checkLogin(Request $request)
    {
       $res = DB::table('students')
             ->where('email' , $request->email)
             ->where('password',$request->password)
             ->select('*')
             ->first();

             if(!$res)
             {
                return back()->with('status','Email Or Password is wrong');
             }
             else
             {
                return redirect()->route('index');
             }
    }


        public function logout()
    {
        $about = AboutUs::first();
        

        //dd($about);
        return view('login_dashboard', compact('about'));
    }


}
