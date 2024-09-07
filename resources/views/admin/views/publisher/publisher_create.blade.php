@extends("admin.layouts.layout")
@section("title","Book Publisher")

@section("content")


<section class="content-header">
  <h1>
    Books Publisher List
    <small>Page</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section></br>

<div class="container p-4">
  <a href="{{ route('publisher.create') }}">
    <button class="button button2" style="background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 15px; padding: 8px 3.5%; color: white; border-radius: 12%; border-radius: 1%;">
    Add New Publisher</button>
  </a>

  
  <a href="{{ route('country.index') }}">
    <button class="button button2" style="background-color: gray; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 15px; padding: 8px 3.5%; color: white; border-radius: 12%; border-radius: 1%;">
    Add Country</button>
  </a>

  <div class="row">
    <div class="col-md-12 text-center"> 
      {{session('msg')}}
      <br/>
      <div class="table-responsive">
        <table class="table" id="customers">
          <tr>
            <th>ID</th>
            <th>Publisher Name</th>
            <th>Book Title</th>
            <th>Publish Date</th>           
            <th>Publish Country</th>
          </tr>
          @foreach($publisher as $pub)
          <tr>
            <td>{{$pub->id}}</td>
            <td>{{$pub->p_name}}</td>
            <td>{{$pub->p_year}}</td>
            <td>{{$pub->p_year}}</td>
            <td>{{$pub->p_country}}</td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>
</div>



@endsection