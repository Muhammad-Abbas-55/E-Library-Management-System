@extends("admin.layouts.layout")
@section("title","Create News & Events")

@section("content")

<section class="content-header">
  <h1>
    Create News & Events
    <small>Page</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section></br>

<div class="container p-4">
 <a href="{{ route('news.index') }}">
  <button class="button button2" style="background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 16px; padding: 8px 3.5%; color: white; border-radius: 12%; border-radius: 1%;">
  View News & Events</button>
</a>

<div class="row">
  <div class="col-md-10 text-center" >
    <form method="post" action="news_store" enctype="multipart/form-data">
      @csrf

      <div class="row">
        <div class="col-25">
          <label for="fname">News & Event Title</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" name="e_title" value="{{ old('e_title') }}" placeholder="Enter News & Event Title Here..">
        </div>
        <div>{{ $errors->first('e_title') }}</div>
      </div>


      <div class="row">
        <div class="col-25">
          <label for="lname">News & Event Description</label>
        </div>
        <div class="col-75">
          <textarea type="text" id="lname" name="e_description" value="{{ old('e_description') }}" placeholder="Enter News & Event Description Here.."></textarea>
        </div>
        <div>{{ $errors->first('e_description') }}</div>
      </div>



    <div class="row">
        <div class="col-25">
          <label for="fname">Upload Slider 1</label>
        </div>
        <div class="col-75">
             <input type="file" accept="image/*" name="slider1_image" id="file" >
        </div>
    </div>
       @if($errors->any())
          <div> {{ $errors->first('slider1_image') }} </div>
       @endif



    <div class="row">
        <div class="col-25">
          <label for="fname">Upload Slider 2</label>
        </div>
        <div class="col-75">
             <input type="file" accept="image/*" name="slider2_image" id="file">
        </div>
    </div>
       @if($errors->any())
          <div> {{ $errors->first('slider2_image') }} </div>
       @endif




    <div class="row">
        <div class="col-25">
          <label for="fname">Upload Slider 3</label>
        </div>
        <div class="col-75">
             <input type="file" accept="image/*" name="slider3_image" id="file">
        </div>
    </div>
       @if($errors->any())
          <div> {{ $errors->first('slider3_image') }} </div>
       @endif



      <div class="row">
        <div class="col-25">
          <label for="lname">News & Event Date</label>
        </div>
        <div class="col-75">
          <input class="form-control" style="float: left;" type="date" id="lname" name="e_date" value="{{ old('e_date') }}">
        </div>
        <div>{{ $errors->first('e_date') }}</div>
      </div>




      <div class="row">
        <div class="col-25">
          <label for="lname">Event Start Time</label>
        </div>
        <div class="col-75">
          <input class="form-control" style="float: left;" type="time" id="lname" name="e_stime" value="{{ old('e_stime') }}">
        </div>
        <div>{{ $errors->first('e_stime') }}</div>
      </div>


      <div class="row">
        <div class="col-25">
          <label for="lname">Event End Time</label>
        </div>
        <div class="col-75">
          <input class="form-control" style="float: left;" type="time" id="lname" name="e_etime" value="{{ old('e_etime') }}">
        </div>
        <div>{{ $errors->first('e_etime') }}</div>
      </div>



      <div class="row">
        <div class="col-25">
          <label for="fname">Location</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" name="e_location" value="{{ old('e_location') }}" placeholder="Enter Event Location Here..">
        </div>
        <div>{{ $errors->first('e_location') }}</div>
      </div><br><br>

      <div class="row">
        <input type="submit" value="Submit">
      </div>
    </form>
  </div>
</div>
</div>


@endsection