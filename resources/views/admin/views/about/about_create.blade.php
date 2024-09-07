@extends("admin.layouts.layout")
@section("title","Add About")

@section("content")

<section class="content-header">
  <h1>
    Add About
    <small>Page</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section></br>

<div class="container p-4">
 <a href="{{ route('about.index') }}">
  <button class="button button2" style="background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 16px; padding: 8px 3.5%; color: white; border-radius: 12%; border-radius: 1%;">
  View About Us</button>
</a>

<div class="row">
  <div class="col-md-10 text-center" >      
    <form method="post" action="about_store" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col-25">
          <label for="fname">Introduction</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" name="intro" value="{{ old('intro') }}" placeholder="Enter Introduction Here..">
        </div>
        <div style="color: red">{{ $errors->first('intro') }}</div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="fname">Description</label>
        </div>
        <div class="col-75">
          <textarea type="text" id="fname" name="description" value="{{ old('description') }}" placeholder="Enter Description Here.."></textarea>
        </div>
        <div style="color: red">{{ $errors->first('description') }}</div>
      </div>


      <div class="row">
        <div class="col-25">
          <label for="fname">Image</label>
        </div>
        <div class="col-75">
          <p><label for="file" style="cursor: pointer; background-color: white; width: 50%">Upload Image</label></p>
          <p><img id="output" width="100" height="100" /></p>
             <input type="file" accept="image/*" name="a_image" id="file" onchange="loadFile(event)" style="display: none;">
        </div>
        
          <script>
          var loadFile = function(event) {
            var a_image = document.getElementById('output');
            a_image.src = URL.createObjectURL(event.target.files[0]);
          };
          </script>
    </div>
       @if($errors->any())
          <div style="color: red"> {{ $errors->first('a_image') }} </div>
       @endif


      <div class="row">
        <input type="submit" value="Submit">
      </div>
    </form>
  </div>
</div>
</div>


@endsection