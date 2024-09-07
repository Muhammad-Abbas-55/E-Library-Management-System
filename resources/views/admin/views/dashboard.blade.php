@extends("admin.layouts.layout")
@section("title","Admin Dashboard")

@section("content")
<?php
use Illuminate\Foundation\Auth\User;
 ?>

<!-- <div class="content-wrapper"> -->
  <!-- Content Header (Page header) -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

  <section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>

        <h1 style="text-align: center; text-shadow: 2px 2px #FF4500 " class="p-3 mb-2 bg-primary text-white">
      Welcome To UOBS E-Library Management System
      <small style="color: #fff">(Admin Dashboard)</small>
    </h1>
  </section>
        <div class="col-md-12">   
      <form class="example" action="{{ route('book.search') }}" style="margin:auto;max-width:700px;margin-top: 10px;">
        <label class="sr-only" for="query">Search by Book Title</label>
         <select name="query" id="query" style="width: 80%%;">
                        <option></option>
                            @foreach($books as $bkss)
                               <option value="{{ $bkss->b_title }}">{{ $bkss->b_title }}</option>
                            @endforeach
                </select>
         <button style="height:27px; padding: 2px; float: right;" type="submit">Search</button>
      </form>
    </div><br><br>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">

      $("#query").select2({
            placeholder: "Search Books by Title...",
            allowClear: true
        });
</script>





  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-primary">
          <div class="inner">
            <h3>{{$books->count()}}</h3>

            <p>Add Book</p>
          </div>
          <div class="icon">
            <i class="ion-ios-book"></i>
          </div>
          
          <a href="{{ route ('book.create') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-teal">
          <div class="inner">
            <h3>{{$books->count()}}</h3>
            

            <p>View Books</p>
          </div>
          <div class="icon">
            <i class="icon icon ion-ios-eye"></i>
          </div>
          <a href="{{ route ('book.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3>{{$category->count()}}</h3>

            <p>Add Book Category</p>
          </div>
          <div class="icon">
            <i class="ion-transgender"></i>
          </div>
          <a href="{{ route ('category.create') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-orange">
          <div class="inner">
            <h3>{{$category->count()}}</h3>

            <p>View Book Category</p>
          </div>
          <div class="icon">
            <i class="ion-closed-captioning"></i>
          </div>
          <a href="{{ route ('category.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <!-- ./col -->
    </div>
    <!-- /.row -->






   <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3>{{$bookissue->count()}}</h3>

            <p>Issue Book</p>
          </div>
          <div class="icon">
            <i class="ion-ios-printer-outline"></i>
          </div>
          
          <a href="{{ route ('bookissue.create') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3>{{$bookissue->count()}}</h3>

            <p>View Book Issues</p>
          </div>
          <div class="icon">
            <i class="ion-document-text"></i>
          </div>
          <a href="{{ route ('bookissue.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>{{$bookreturn->count()}}</h3>

            <p>Return Book</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="{{ route ('bookreturn.create') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-primary">
          <div class="inner">
            <h3>{{$bookreturn->count()}}</h3>

            <p>View Book Returns</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="{{ route ('bookreturn.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

    </div>


    <div class="row">

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-orange">
          <div class="inner">
            <h3>{{$ebook->count()}}</h3>

            <p>Add E-Book</p>
          </div>
          <div class="icon">
            <i class="ion ion-document-text"></i>
          </div>
          
          <a href="{{ route ('ebook.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
    
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-teal">
          <div class="inner">
            <h3>{{$ebook->count()}}</h3>

            <p>View E-Book</p>
          </div>
          <div class="icon">
            <i class="ion-ios-world"></i>
          </div>
          <a href="{{ route ('ebook.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>



      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-orange">
          <div class="inner">
            <h3>{{$fine->count()}}</h3>

            <p>Add Fine Rule</p>
          </div>
          <div class="icon">
            <i class="ion ion-document-text"></i>
          </div>
          
          <a href="{{ route ('fine.create') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-teal">
          <div class="inner">
            <h3>{{$fine->count()}}</h3>

            <p>View Fine Rules</p>
          </div>
          <div class="icon">
            <i class="ion-ios-eye"></i>
          </div>
          <a href="{{ route ('fine.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      </div>




  <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-teal">
          <div class="inner">
            <h3>{{$publisher->count()}}</h3>

            <p>Add Publisher</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          
          <a href="{{ route ('publisher.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-primary">
          <div class="inner">
            <h3>{{$country->count()}}</h3>

            <p>Add Country</p>
          </div>
          <div class="icon">
            <i class="ion-closed-captioning"></i>
          </div>
          <a href="{{ route ('country.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>{{$author->count()}}</h3>

            <p>Add Author</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="{{ route ('author.create') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3>{{$author->count()}}</h3>

            <p>View Book Authors</p>
          </div>
          <div class="icon">
            <i class="ion-compose"></i>
          </div>
          <a href="{{ route ('author.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->






   <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>{{$student->count()}}</h3>

            <p>Add Student</p>
          </div>
          <div class="icon">
            <i class="ion-university"></i>
          </div>
          
          <a href="{{ route ('student.create') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3>{{$student->count()}}</h3>

            <p>View Students List</p>
          </div>
          <div class="icon">
            <i class="ion-person-stalker"></i>
          </div>
          <a href="{{ route ('student.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-teal">
          <div class="inner">
            <h3>{{$staff->count()}}</h3>

            <p>Add Staff</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="{{ route ('staff.create') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>{{$staff->count()}}</h3>

            <p>View Staff List</p>
          </div>
          <div class="icon">
            <i class="ion-android-person"></i>
          </div>
          <a href="{{ route ('staff.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      </div>







   <div class="row">

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3>{{$about->count()}}</h3>

            <p>Add About</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          
          <a href="{{ route ('about.create') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-teal">
          <div class="inner">
            <h3>{{$about->count()}}</h3>

            <p>View About</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="{{ route ('about.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3>{{$contact->count()}}</h3>

            <p>Contact Us</p>
          </div>
          <div class="icon">
            <i class="ion ion-flash"></i>
          </div>
          <a href="{{ route ('contact.create') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-primary">
          <div class="inner">
            <h3>{{$feedback->count()}}</h3>

            <p>Feedback</p>
          </div>
          <div class="icon">
            <i class="ion-email"></i>
          </div>
          <a href="{{ route ('feedback.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

    </div>






    </div>
  </section>

  <!-- /.content -->
  <!-- </div> -->

  @endsection