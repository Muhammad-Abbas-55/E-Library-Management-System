@extends("admin.layouts.layout")
@section("title","Edit Student")

@section("content")

<section class="content-header">
  <h1>
    Edit Student
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
  Back</button>
</a>

<div class="row">
  <div class="col-md-10 text-center" >      
    <form method="post" action="/student_update/{{ $student->id }}">
      @csrf
      @method('PATCH')

      <div class="row">
        <div class="col-25">
          <label for="fname">Student Name</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" value="{{ old('name') ?? $student->name }}" name="name">
        </div>
        <div style="color: red">{{ $errors->first('name') }}</div>
      </div>

     <div class="row">
        <div class="col-25">
          <label for="fname">Father Name</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" value="{{ old('fname') ?? $student->fname }}" name="fname">
        </div>
        <div style="color: red">{{ $errors->first('fname') }}</div>
      </div>

     <div class="row">
        <div class="col-25">
          <label for="fname">Student Email</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" value="{{ old('email') ?? $student->email }}" name="email">
        </div>
        <div style="color: red">{{ $errors->first('email') }}</div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="fname">Cell No</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" value="{{ old('cell_no') ?? $student->cell_no }}" name="cell_no">
        </div>
        <div style="color: red">{{ $errors->first('cell_no') }}</div>
      </div>


      <div class="row">
        <div class="col-25">
          <label for="lname">Gender</label>
        </div>
        <div class="col-75">
          <select name="gender" id="" class="form-control">
            <option value="" disabled>Select Gender</option>     
                 <option value="1" {{ $student->gender == 'Male' ? 'selected' : '' }}>Male</option>
                 <option value="0" {{ $student->gender == 'Female' ? 'selected' : '' }}>Female</option>      
         </select>
        </div>
      </div>


      <div class="row">
        <div class="col-25">
          <label for="fname">Registration No</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" value="{{ old('reg_no') ?? $student->reg_no }}" name="reg_no">
        </div>
        <div style="color: red">{{ $errors->first('reg_no') }}</div>
      </div>

            <div class="row">
        <div class="col-25">
          <label for="fname">CNIC</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" value="{{ old('cnic') ?? $student->cnic }}" name="cnic">
        </div>
        <div style="color: red">{{ $errors->first('cnic') }}</div>
      </div>

            <div class="row">
        <div class="col-25">
          <label for="fname">Batch</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" value="{{ old('batch') ?? $student->batch }}" name="batch">
        </div>
        <div style="color: red">{{ $errors->first('batch') }}</div>
      </div>

            <div class="row">
        <div class="col-25">
          <label for="fname">Department</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" value="{{ old('department') ?? $student->department }}" name="department">
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