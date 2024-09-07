@extends("admin.layouts.layout")
@section("title","Edit Book Category")

@section("content")

<section class="content-header">
  <h1>
    Edit Book Category
    <small>Page</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section></br>

<div class="container p-4">
 <a href="{{ route('category.index') }}">
  <button class="button button2" style="background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 16px; padding: 8px 3.5%; color: white; border-radius: 12%; border-radius: 1%;">
  View Category List</button>
</a>

<div class="row">
  <div class="col-md-10 text-center" >      
    <form method="post" action="/category_update/{{ $category->id }}">
      @csrf
      @method('PATCH')
      <div class="row">
        <div class="col-25">
          <label for="fname">Book Category</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" name="c_name" value="{{ old('c_name') ?? $category->c_name }}" placeholder="Enter Book Category Here..">
        </div>
        <div style="color: red">{{ $errors->first('c_name') }}</div>
      </div>

      <div class="row">
        <input type="submit" value="Submit">
      </div>
    </form>
  </div>
</div>
</div>


@endsection