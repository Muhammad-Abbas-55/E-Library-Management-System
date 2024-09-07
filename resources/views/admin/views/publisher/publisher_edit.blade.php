@extends("admin.layouts.layout")
@section("title","Edit Publisher")

@section("content")

<section class="content-header">
  <h1>
    Edit Publisher
    <small>Page</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section></br>

<div class="container p-4">
 <a href="{{ route('publisher.index') }}">
  <button class="button button2" style="background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 16px; padding: 8px 3.5%; color: white; border-radius: 12%; border-radius: 1%;">
  Back</button>
</a>

<div class="row">
  <div class="col-md-10 text-center" >      
    <form method="post" action="/publisher_update/{{ $publisher->id }}">
      @csrf
      @method('PATCH')
      <div class="row">
        <div class="col-25">
          <label for="fname">Publisher</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" name="p_name" value="{{ old('p_name') ?? $publisher->p_name }}" placeholder="Enter publisher Here..">
        </div>
        <div style="color: red">{{ $errors->first('p_name') }}</div>
      </div>

      <div class="row">
        <input type="submit" value="Submit">
      </div>
    </form>
  </div>
</div>
</div>


@endsection