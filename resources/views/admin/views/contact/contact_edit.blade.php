@extends("admin.layouts.layout")
@section("title","Contact Us")

@section("content")

<section class="content-header">
      <h1>
        Follow Us
        <small>Page</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section></br>




<div class="container p-4">

   <a href="{{ route ('contact.show') }}">
      <button class="button button2" style="background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 16px; padding: 8px 3.5%; color: white; border-radius: 12%; border-radius: 1%;">
      View Follow Us</button>
   </a>

  
   <div class="row">
      <div class="col-md-10 text-center" >  
  <form method="post" action="{{route('contact.update',[$contactArr->id])}}">
  @csrf
  <div class="row">
    <div class="col-25">
      <label for="fname">Facebook</label>
    </div>
    <div class="col-75">
      <input type="text" id="fname" name="fb" value="{{$contactArr->fb}}" placeholder="Enter Facebook..">
    </div>
        <div style="color: red">{{ $errors->first('fb') }}</div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="fname">Twitter</label>
    </div>
    <div class="col-75">
      <input type="text" id="fname" name="twit" value="{{$contactArr->twit}}" placeholder="Enter Facebook..">
    </div>
        <div style="color: red">{{ $errors->first('twit') }}</div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="lname">Gmail</label>
    </div>
    <div class="col-75">
      <input type="text" id="lname" name="gmail" value="{{$contactArr->gmail}}" placeholder="Your Gmail Account..">
    </div>
        <div style="color: red">{{ $errors->first('twit') }}</div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="lname">Phone</label>
    </div>
    <div class="col-75">
      <input type="text" id="lname" name="phone" value="{{$contactArr->phone}}" placeholder="Enter Phone Number..">
    </div>
        <div style="color: red">{{ $errors->first('phone') }}</div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="lname">Instagram</label>
    </div>
    <div class="col-75">
      <input type="text" id="lname" name="instagram" value="{{$contactArr->instagram}}" placeholder="Enter instagram link..">
    </div>
        <div style="color: red">{{ $errors->first('instagram') }}</div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="lname">Youtube</label>
    </div>
    <div class="col-75">
      <input type="text" id="lname" name="youtube" value="{{$contactArr->youtube}}" placeholder="Enter Youtube link..">
    </div>
        <div style="color: red">{{ $errors->first('youtube') }}</div>
  </div>

      <div class="row">
    <input type="submit" value="Submit">
  </div>
  </form>
  </div>
</div>
    </div>


@endsection