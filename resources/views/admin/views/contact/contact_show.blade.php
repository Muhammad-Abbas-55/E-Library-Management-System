@extends("admin.layouts.layout")
@section("title","Follow Us")

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
</section></br></br>

<div class="container p-4">
 <a href="contact_create">
  <button class="button button2" style="background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 16px; padding: 8px 3.5%; color: white; border-radius: 12%; border-radius: 1%;">
  Add Record</button>
</a>

<div class="row">
  <div class="col-md-12 text-center"> 


      @if(Session()->has('insert'))
      <br>
        <div class="alert alert-success" role="alert" style="font-size: 18px; height: 45px; padding: 7px;">
          {{Session::get('insert')}}
        </div>
      @endif

      @if(Session()->has('update'))
      <br>
        <div class="alert alert-info" role="alert" style="font-size: 18px; height: 45px; padding: 7px;">
          {{Session::get('update')}}
        </div>
      @endif

      @if(Session()->has('delete'))
      <br>
        <div class="alert alert-danger" role="alert" style="font-size: 18px; height: 45px; padding: 7px;">
          {{Session::get('delete')}}
        </div>
      @endif
       
   <br/>
   <div class="table-responsive">
    <table class="table" id="customers">
      <tr>
        <th>ID</th>
        <th>Facebook</th>
        <th>Twitter</th>
        <th>Gmail</th>
        <th>Phone</th>
        <th>Instagram</th>
        <th>Youtube</th>
        <th>Action</th>
      </tr>
          <?php $no=1; ?>

      @foreach($contactArr as $contact)
      <tr>
        <td>{{$no++}}</td>
        <td>{{$contact->fb}}</td>
        <td>{{$contact->twit}}</td>
        <td>{{$contact->gmail}}</td>
        <td>{{$contact->phone}}</td>
        <td>{{$contact->instagram}}</td>
        <td>{{$contact->youtube}}</td>
        <td style="padding: 0%;">
          <!-- <a href="">
            <button class="button button2">Show</button>
          </a> -->
          <a href="contact_edit/{{$contact->id}}">
            <button class="button button">Edit</button>
          </a>
          <a href="contact_delete/{{$contact->id}}">
            <button class="button button3">Delete</button>
          </a>       
        </td>
      </tr>
      @endforeach
    </table>
  </div>
</div>
</div>
</div>

@endsection
