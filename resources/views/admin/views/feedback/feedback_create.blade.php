@extends("std.layouts.sub_layout")
@section("title","FeedBack")

@section("tophead")
    FeedBack
@endsection

@section("head")
   FeedBack
@endsection


@section("content")
<?php 

?>


<div id="myCarousel" class="carousel slide" data-ride="carousel" style="width: 90%; margin-left: 5%">
    <br>
    <h1 style="text-align: center; background-color: gray; color: white">FeedBack</h1><br>
    <h3><marquee behavior="scroll" direction="left">Welcome to FeedBack Page</marquee></h3><br>



<form action="feedback_store"  method="post">
  {{csrf_field()}}
  
      @if(Session()->has('insert'))
      <br>
        <div class="alert alert-success" role="alert" style="font-size: 18px; height: 45px; padding: 7px;">
          {{Session::get('insert')}}
        </div>
      @endif
  <div class="col-md-8 col-sm-6">
      <div class="form-group">
            <label for="registration">Registration No</label>
                <input class="form-control" placeholder="Enter Registration No Here" id="registration" name="registration" type="search">
        <div style="color: red">{{ $errors->first('registration') }}</div>
      </div>

      <div class="form-group">
            <label for="message_title">Feedback Title</label>
                <input class="form-control" placeholder="Enter Feedback Title Here" id="message_title" name="message_title" type="search">
        <div style="color: red">{{ $errors->first('message_title') }}</div>               
      </div>

      <div class="form-group">
            <label for="feedback">Feedback</label><br>
                 <textarea rows="7" cols="95" type="text" id="lname" name="feedback" value="{{ old('feedback') }}" placeholder="Enter Feedback Here.."></textarea>
        <div style="color: red">{{ $errors->first('feedback') }}</div>               
      </div>

        <div class="form-group">
            <input style="width: 100px; float: right;" class="form-control" type="submit" value="Submit">
        </div>
  </div>

</form>

<br><br>

</div>



@endsection

