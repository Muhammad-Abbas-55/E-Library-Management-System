@extends("admin.layouts.layout")
@section("title","Add Staff")

@section("content")

<section class="content-header">
  <h1>
    Add Staff
    <small>Page</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section></br>

<div class="container p-4">
 <a href="{{ route('staff.index') }}">
  <button class="button button2" style="background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 16px; padding: 8px 3.5%; color: white; border-radius: 12%; border-radius: 1%;">
  View Staff List</button>
</a>

<div class="row">
  <div class="col-md-10 text-center" >
    <form method="post" action="staff_store">
      @csrf

      <div class="row">
        <div class="col-25">
          <label for="fname">Staff Name</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" value="{{ old('name') }}" name="name" placeholder="Enter Staff Name Here..">
        </div>
        <div style="color: red">{{ $errors->first('name') }}</div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="fname">Staff Phone</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" value="{{ old('phone') }}" name="phone" placeholder="Enter Staff Phone No Here..">
        </div>
        <div style="color: red">{{ $errors->first('phone') }}</div>
      </div>

    <div class="row">
        <div class="col-25">
          <label for="fname">Cnic</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" value="{{ old('cnic') }}" name="cnic" placeholder="Enter Staff Cnic Here..">
        </div>
        <div style="color: red">{{ $errors->first('cnic') }}</div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="fname">Email</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" value="{{ old('email') }}" name="email" placeholder="Enter Staff Email Here..">
        </div>
        <div style="color: red">{{ $errors->first('email') }}</div>
      </div>

<!--       <div class="row">
        <div class="col-25">
          <label for="fname">Password</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" value="{{ old('password') }}" name="password" placeholder="Enter Staff password Here..">
        </div>
        <div style="color: red">{{ $errors->first('password') }}</div>
      </div> -->

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
          <label for="fname">Staff Type</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" value="{{ old('type') }}" name="type" placeholder="Enter Staff Type Here..">
        </div>
        <div style="color: red">{{ $errors->first('type') }}</div>
      </div>


      <div class="row">
        <input type="submit" value="Submit">
      </div>
    </form>
  </div>
</div>
</div>


@endsection