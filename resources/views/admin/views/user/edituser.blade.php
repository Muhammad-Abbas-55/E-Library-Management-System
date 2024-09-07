@extends("admin.layouts.layout")
@section("title","Edit Admin Role")

@section("content")

<section class="content-header">
  <h1>
    Edit Admin Role
    <small>Page</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section></br>

<div class="container p-4">
 <a href="{{ route('role.index') }}">
  <button class="button button2" style="background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 16px; padding: 8px 3.5%; color: white; border-radius: 12%; border-radius: 1%;">
  View Admin Role List</button>
</a>

<div class="row">
  <div class="col-md-10 text-center" >      
    <form method="post" action="/role_update/{{ $users->id }}">
      @csrf
      @method('PATCH')
      <div class="row">
        <div class="col-25">
          <label for="fname">Name</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" name="name" value="{{ old('name') ?? $users->name }}" placeholder="Enter Name Here..">
        </div>
        <div style="color: red">{{ $errors->first('name') }}</div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="fname">Email</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" name="email" value="{{ old('email') ?? $users->email }}" placeholder="Enter Name Here..">
        </div>
        <div style="color: red">{{ $errors->first('email') }}</div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="fname">Password</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" name="password" value="{{ old('password') ?? $users->password }}" placeholder="Enter Name Here..">
        </div>
        <div style="color: red">{{ $errors->first('password') }}</div>
      </div>



      <div class="row">
        <div class="col-25">
          <label for="role">Verity Admin Role</label>
        </div>
        <div class="col-75">
          <select name="role" id="role" class="form-control">
            <option value="" disabled selected>Select Option</option>
                 <option value="Admin" hidden> Amdin </option>
                 <option value="Super Admin" > Verifed Admin </option>
         </select>
        </div>
      </div>




      <div class="row">
        <input type="submit" value="Submit">
      </div>
    </form>
  </div>
</div>
</div>


@endsection