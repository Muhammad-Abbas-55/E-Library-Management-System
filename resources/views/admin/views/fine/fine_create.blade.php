@extends("admin.layouts.layout")
@section("title","Create Fine Rules")

@section("content")

<section class="content-header">
  <h1>
    Create Fine Rules
    <small>Page</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section></br>

<div class="container p-4">
 <a href="{{ route('fine.index') }}">
  <button class="button button2" style="background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 16px; padding: 8px 3.5%; color: white; border-radius: 12%; border-radius: 1%;">
  View Fine Rules</button>
</a>

<div class="row">
  <div class="col-md-10 text-center" >
    <form method="post" action="fine_store">
      @csrf
      <div class="row">
        <div class="col-25">
          <label for="fname">Duration</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" name="day" placeholder="Enter Lose Duration Here..">
        </div>
        <div style="color: red">{{ $errors->first('day') }}</div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="fname">Fine Amount</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" name="f_amount" placeholder="Enter Book Category Here..">
        </div>
        <div style="color: red">{{ $errors->first('f_amount') }}</div>
      </div>

<!--       <div class="row">
        <div class="col-25">
          <label for="fname">Status</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" name="f_status" placeholder="Enter Book Status Here..">
        </div>
        <div>{{ $errors->first('f_status') }}</div>
      </div> -->


      <div class="row">
        <input type="submit" value="Submit">
      </div>
    </form>
  </div>
</div>
</div>


@endsection