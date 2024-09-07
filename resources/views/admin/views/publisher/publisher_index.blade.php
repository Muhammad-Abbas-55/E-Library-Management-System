@extends("admin.layouts.layout")
@section("title","List Publisher")

@section("content")


<section class="content-header">
  <h1>
    Add Publisher
    <small>Page</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section></br>

<div class="container p-4">

  
  <a href="{{ route('country.index') }}">
    <button class="button button2" style="background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 15px; padding: 8px 3.5%; color: white; border-radius: 12%; border-radius: 1%;">
    Add Country</button>
  </a>



<div class="row">
  <div class="col-md-10 text-center" >

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

       
    <form method="post" action="publisher_store">
      @csrf
      <div class="row">
        <div class="col-25">
          <label for="fname">Publisher Name</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" name="p_name" placeholder="Enter Publisher Name Here..">
        </div>
          <div style="color: red">{{ $errors->first('p_name') }}</div>
          <div class="row" style="padding-top: 60px">
          <input type="submit" value="Submit">
        </div>
      </div>
    </form>
  </div>
 </div>


  <div class="row">
    <div class="col-md-12 text-center">
      {{session('msg')}}  
      <br/>
      <div class="table-responsive">
        <table class="table" id="customers">
          <tr>
            <th>ID</th>
            <th>Publisher Name</th>
            <th>Action</th>
          </tr>
          <?php $no=1; ?>

          @foreach($publisher as $pub)
          <tr>
            <td>{{$no++}}</td>
            <td>{{$pub->p_name}}</td>
            <td style="padding: 0%;">
              <a href="publisher_show/{{ $pub->id }}">
                <button class="button button2"><i class="fa fa-eye" style="font-size: 19px"></i></button>
              </a>
              <a href="publisher_edit/{{ $pub->id }}/edit">
                <button class="button button"><i class="fa fa-edit" style="font-size: 19px"></i></button>
              </a>
              <a href="publisher_delete/{{ $pub->id }}">
                <button class="button button3"><i class="fa fa-trash" style="font-size: 19px"></i></button>
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