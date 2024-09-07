@extends("admin.layouts.layout")
@section("title","Edit Shelf Details")

@section("content")

<section class="content-header">
  <h1>
    Edit Shelf Details
    <small>Page</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section></br>

<div class="container p-4">
 <a href="{{ route('shelf.index') }}">
  <button class="button button2" style="background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 16px; padding: 8px 3.5%; color: white; border-radius: 12%; border-radius: 1%;">
  Back</button>
</a>

<div class="row">
  <div class="col-md-10 text-center" >      
    <form method="post" action="/shelf_update/{{ $shelf->id }}">
      @csrf
      @method('PATCH')
      <div class="row">
        <div class="col-25">
          <label for="fname">Shelf No</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" name="s_no" value="{{ old('s_no') ?? $shelf->s_no }}" placeholder="Enter Shelf No Here..">
        </div>
        <div style="color: red">{{ $errors->first('s_no') }}</div>
      </div>


      <div class="row">
        <input type="submit" value="Submit">
      </div>
    </form>
  </div>
</div>
</div>


@endsection