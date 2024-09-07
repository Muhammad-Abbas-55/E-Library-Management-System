<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use App\Imports\StaffImport;
use App\Exports\StaffExport;
use App\Models\AboutUs;

use Excel;
use DB;

class StaffController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staff = Staff::all();

        return view('admin.views.staff.staff_index', compact('staff'));
        return view('admin.views.staff.staff_show', compact('staff'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view("admin.views.staff.staff_create");
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
            'phone' => 'required|min:6|max:15',
            'cnic' => 'required|min:13|max:15',
            'email' => 'required|email|unique:staff,email',
            'gender' => 'required',
            'type' => 'required',
        ]);

        $student = new Staff();
        $student->name = request('name');
        $student->phone = request('phone');
        $student->cnic = request('cnic');
        $student->email = request('email');
        $student->password = request('password');
        $student->gender = request('gender');
        $student->type = request('type');
        $student->save();

        $request->session()->flash('insert','Record Inserted Successfully');
        return redirect('staff_index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $staff
     * @return \Illuminate\Http\Response
     */
    public function show($staff)
    {
         //dd($staff);
       $staff = Staff::find($staff);
        return view("admin.views.staff.staff_show", compact('staff'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit($staff)
    {
        $staff = Staff::find($staff);
        return view("admin.views.staff.staff_edit", compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Staff $staff)
    {
        $data = request()->validate([
            'name' => 'required',
            'phone' => 'required',
            'cnic' => 'required',
            'email' => 'required|email|unique:staff,email',
            'gender' => 'required',
            'type' => 'required',

        ]);
        
        $staff->update($data);

        session()->flash('update','Record Updated Successfully');
        return redirect('staff_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff, $id)
    {
        Staff::destroy(array('id',$id));
        session()->flash('delete','Record Deleted Successfully');

        return redirect('staff_index');
    }


        public function staffimport()
    {
         return view("admin.views.staff.staff_import");
    }


        public function import(Request $request)
    {
        Excel::import(new StaffImport,$request->file);
         return redirect('staff_index');
    }


        public function staffexportExcel()
    {
        return Excel::download(new StaffExport,'stafflist.xlsx');
    }

    public function staffexportCsv()
    {
        return Excel::download(new StaffExport,'stafflist.csv');
    }



     public function login()
    {
        $about = AboutUs::first();

        return view('admin.views.staff.login', compact('about'));
    }

    public function checkLogin(Request $request)
    {
       $res = DB::table('staff')
             ->where('email' , $request->email)
             ->where('password',$request->password)
             ->select('*')
             ->first();

             if(!$res)
             {
                return back()->with('status','Credentail Fail');
             }
             else
             {
                return redirect()->route('index');
             }
    }
}
