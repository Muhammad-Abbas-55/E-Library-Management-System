@extends("admin.layouts.layout")
@section("title","Edit Staff")

@section("content")

<section class="content-header">
  <h1>
    Edit Staff
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
  Back</button>
</a>

<div class="row">
  <div class="col-md-10 text-center" >      
    <form method="post" action="/staff_update/{{ $staff->id }}">
      @csrf
      @method('PATCH')
      
      <div class="row">
        <div class="col-25">
          <label for="fname">Staff Name</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" value="{{ old('name') ?? $staff->name }}" name="name">
        </div>
        <div style="color: red">{{ $errors->first('name') }}</div>
      </div>

     <div class="row">
        <div class="col-25">
          <label for="fname">Phone</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" value="{{ old('phone') ?? $staff->phone }}" name="phone">
        </div>
        <div style="color: red">{{ $errors->first('phone') }}</div>
      </div>

     <div class="row">
        <div class="col-25">
          <label for="fname">Cnic</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" value="{{ old('cnic') ?? $staff->cnic }}" name="cnic">
        </div>
        <div style="color: red">{{ $errors->first('cnic') }}</div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="fname">Email</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" value="{{ old('email') ?? $staff->email }}" name="email">
        </div>
        <div style="color: red">{{ $errors->first('email') }}</div>
      </div>


      <div class="row">
        <div class="col-25">
          <label for="lname">Gender</label>
        </div>
        <div class="col-75">
          <select name="gender" id="" class="form-control">
            <option value="" disabled>Select Gender</option>     
                 <option value="1" {{ $staff->gender == 'Male' ? 'selected' : '' }}>Male</option>
                 <option value="0" {{ $staff->gender == 'Female' ? 'selected' : '' }}>Female</option>      
         </select>
        </div>
      </div>


      <div class="row">
        <div class="col-25">
          <label for="fname">Staff Type</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" value="{{ old('type') ?? $staff->type }}" name="type">
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