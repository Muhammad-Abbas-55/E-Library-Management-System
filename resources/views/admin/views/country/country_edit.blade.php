@extends("admin.layouts.layout")
@section("title","Edit Country")

@section("content")

<section class="content-header">
  <h1>
    Edit Country
    <small>Page</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section></br>

<div class="container p-4">
 <a href="{{ route('country.index') }}">
  <button class="button button2" style="background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 16px; padding: 8px 3.5%; color: white; border-radius: 12%; border-radius: 1%;">
  Back</button>
</a>

<div class="row">
  <div class="col-md-10 text-center" >      
    <form method="post" action="/country_update/{{ $country->id }}">
      @csrf
      @method('PATCH')
      <div class="row">
        <div class="col-25">
          <label for="fname">Country</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" name="country" value="{{ old('country') ?? $country->country }}" placeholder="Enter country Here..">
        </div>
        <div style="color: red">{{ $errors->first('country') }}</div>
      </div>

      <div class="row">
        <input type="submit" value="Submit">
      </div>
    </form>
  </div>
</div>
</div>


@endsection