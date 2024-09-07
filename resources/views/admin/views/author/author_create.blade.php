@extends("admin.layouts.layout")
@section("title","Add Author")

@section("content")

<section class="content-header">
  <h1>
    Add Author
    <small>Page</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section></br>

<div class="container p-4">
 <a href="{{ route('author.index') }}">
  <button class="button button2" style="background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 16px; padding: 8px 3.5%; color: white; border-radius: 12%; border-radius: 1%;">
  View Author's List</button>
</a>

<div class="row">
  <div class="col-md-10 text-center" >
    <form method="post" action="author_store">
      @csrf

      <div class="row">
        <div class="col-25">
          <label for="fname">Author Name</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" value="{{ old('a_name') }}" name="a_name" placeholder="Enter Author Name Here..">
        </div>
        <div style="color: red">{{ $errors->first('a_name') }}</div>
      </div>


<!--       <div class="row">
        <div class="col-25">
          <label for="country_id">Author Country</label>
        </div>
        <div class="col-75">
          <select name="country_id" id="country_id" class="form-control">
            <option value="" >Select Country</option>
            @foreach($country as $con)
                 <option value="{{ $con->id }}">{{ $con->country }}</option>
            @endforeach
         </select>
        </div>
      </div>
      @if($errors->any())
          <div style="color: red"> {{ $errors->first('country') }} </div>
       @endif -->

      <div class="row">
        <input type="submit" value="Submit">
      </div>
    </form>
  </div>
</div>
</div>


@endsection