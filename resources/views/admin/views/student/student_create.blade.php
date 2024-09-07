@extends("admin.layouts.layout")
@section("title","Add Student")

@section("content")

<section class="content-header">
  <h1>
    Add Student
    <small>Page</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section></br>

<div class="container p-4">
 <a href="{{ route('student.index') }}">
  <button class="button button2" style="background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 16px; padding: 8px 3.5%; color: white; border-radius: 12%; border-radius: 1%;">
  View Students List</button>
</a>

<div class="row">
  <div class="col-md-10 text-center" >
    <form method="post" action="student_store">
      @csrf

      <div class="row">
        <div class="col-25">
          <label for="fname">Student Name</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" value="{{ old('name') }}" name="name" placeholder="Enter Student Name Here..">
        </div>
        <div style="color: red">{{ $errors->first('name') }}</div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="fname">Father Name</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" value="{{ old('fname') }}" name="fname" placeholder="Enter Students Father Name Here..">
        </div>
        <div style="color: red">{{ $errors->first('fname') }}</div>
      </div>

    <div class="row">
        <div class="col-25">
          <label for="fname">Student Email</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" value="{{ old('email') }}" name="email" placeholder="Enter Student Email Here..">
        </div>
        <div style="color: red">{{ $errors->first('email') }}</div>        
      </div>

<!--       <div class="row">
        <div class="col-25">
          <label for="fname">Password</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" value="{{ old('password') }}" name="password" placeholder="Enter Student password Here..">
        </div>
        <div style="color: red">{{ $errors->first('password') }}</div>
      </div> -->

      <div class="row">
        <div class="col-25">
          <label for="fname">Cell No</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" value="{{ old('cell_no') }}" name="cell_no" placeholder="Enter Student Cell No Here..">
        </div>
        <div style="color: red">{{ $errors->first('cell_no') }}</div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="gender">Gender</label>
        </div>
        <div class="col-75">
          <select name="gender" id="gender" class="form-control">
            <option value="" disabled>Select Gender</option>  
                 <option value="1">Male</option>
                 <option value="0">Female</option> 
         </select>
        </div>
      </div>


      <div class="row">
        <div class="col-25">
          <label for="fname">Registration No</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" value="{{ old('reg_no') }}" name="reg_no" placeholder="Enter Student Registration No Here..">
        </div>
        <div style="color: red">{{ $errors->first('reg_no') }}</div>
      </div>

     <div class="row">
        <div class="col-25">
          <label for="fname">CNIC</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" value="{{ old('cnic') }}" name="cnic" placeholder="Enter Student Cnic No Here..">
        </div>
        <div style="color: red">{{ $errors->first('cnic') }}</div>
      </div>

    <div class="row">
        <div class="col-25">
          <label for="fname">Batch</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" value="{{ old('batch') }}" name="batch" placeholder="Enter Student Batch Here..">
        </div>
        <div style="color: red">{{ $errors->first('batch') }}</div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="fname">Department</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" value="{{ old('department') }}" name="department" placeholder="Ente Student Department Here..">
        </div>
        <div style="color: red">{{ $errors->first('department') }}</div>
      </div>

      <div class="row">
        <input type="submit" value="Submit">
      </div>
    </form>
  </div>
</div>
</div>


@endsection