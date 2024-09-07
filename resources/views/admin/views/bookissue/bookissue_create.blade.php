@extends("admin.layouts.layout")
@section("title","Book Issue")

@section("content")
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

<section class="content-header">
  <h1>
    Book Issue
    <small>Page</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section></br>

<div class="container p-4">
 <a href="{{ route('bookissue.index') }}">
  <button class="button button2" style="background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 16px; padding: 8px 3.5%; color: white; border-radius: 12%; border-radius: 1%;">
 View Book Issues</button>
</a>


<div class="row">
  <div class="col-md-10 text-center">
    <form method="post" action="bookissue_store">
      @csrf

<p>
  <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Issue Book to Student</a>
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Issue Book to Staff</button>
</p>
<div class="row">

    @if(Session()->has('notavai'))
      <br>
        <div class="alert alert-danger" role="alert" style="font-size: 18px; height: 45px; padding: 7px;">
          {{Session::get('notavai')}}
        </div>
      @endif
      
  <div class="col">
    <div class="collapse multi-collapse" id="multiCollapseExample1">
      <div class="card card-body">


      <div class="row">
        <div class="col-25">
          <label for="student_id">Student Registration</label>
        </div>
        <div class="col-75">
          <select name="student_id" id="student_id" style="width: 100%" class="form-control" onchange="getSname(this.value)">
            <option value="">Select Student Registration No</option>
            @foreach($student as $std)
                 <option value="{{ $std->id }}">{{ $std->reg_no }}</option>
            @endforeach
         </select>
        </div>
      </div>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>      
<script type="text/javascript">

      $("#student_id").select2({
            placeholder: "Select Student Registration No",
            allowClear: true
        });
</script>

      <div class="row">
        <div class="col-25">
          <label for="student_id">Student Name</label>
        </div>
        <div class="col-75">
          <input type="text" name="name" id="name" style="width: 100%" class="form-control" readonly="readonly">
        </div>
      </div>


      </div>
    </div>
  </div>
  <div class="col">
    <div class="collapse multi-collapse" id="multiCollapseExample2">
      <div class="card card-body">

        <div class="row">
        <div class="col-25">
          <label for="staff_id">Staff</label>
        </div>
        <div class="col-75">
          <select name="staff_id" id="staff_id" style="width: 100%" class="form-control">
            <option value="">Select Staff</option>
            @foreach($staff as $stf)
                 <option value="{{ $stf->id }}">{{ $stf->name }}</option>
            @endforeach
         </select>
        </div>
      </div>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">

      $("#staff_id").select2({
            placeholder: "Select Staff",
            allowClear: true
        });
</script>


      </div>
    </div>
  </div>
</div>


      <div class="row">
        <div class="col-25">
          <label for="book_id">Book Title</label>
        </div>
        <div class="col-75">
          <select name="book_id" id="book_id" style="width: 100%" class="form-control" onchange="getAcce(this.value),getQty(this.value)">
            <option value="">Select Book</option>
            @foreach($book as $bk)
                 <option value="{{ $bk->id }}">{{ $bk->b_title }}   ISBN: ({{ $bk->b_isbn }})</option>
            @endforeach
         </select>
        </div>
      </div>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">

      $("#book_id").select2({
            placeholder: "Select Book",
            allowClear: true
        });
</script>



      <div class="row">
        <div class="col-25">
          <label for="book_id">Book Accession No</label>
        </div>
        <div class="col-75">
          <select name="serial_id" id="acce_id" class="form-control">
            <option value="">Select Accession No</option>
         </select>
        </div>
      </div>
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">

      $("#book_id").select2({
            placeholder: "Select Accession No",
            allowClear: true
        });
</script> -->



      <div class="row">
        <div class="col-25">
          <label for="student_id">Book Copies Available </label>
        </div>
        <div class="col-75">
          <input type="text" name="avalible_copies" id="avalible_copies" class="form-control" readonly="readonly">
        </div>
      </div>


      <div class="row">
        <div class="col-25">
          <label for="lname">Issue Date</label>
        </div>
        <div class="col-75">
          <input class="form-control" style="float: left;" type="date" id="lname" name="issue_date" value="{{ old('issue_date') }}">
        </div>
        <div style="color: red">{{ $errors->first('issue_date') }}</div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="lname">Return Date</label>
        </div>
        <div class="col-75">
          <input class="form-control" style="float: left;" type="date" id="lname" name="return_date" value="{{ old('return_date') }}">
        </div>
        <div style="color: red">{{ $errors->first('return_date') }}</div>
      </div>
      
      <div class="row">
        <input type="submit" value="Submit"> 
      </div>
     
    </form>
  </div>
</div>
</div>

<script type="text/javascript">

  function getSname(id) { 
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() 
      {
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
          {
              var res = xmlhttp.responseText; //JSON.parse(xmlhttp.responseText);
              document.getElementById("name").value = res;
            }
        };
        var url = "{{ route('book.getregistration','sid') }}";
        url = url.replace('sid',id);
      xmlhttp.open("get", url, true);
      xmlhttp.send();
}

  function getQty(id) {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function()
      {
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
          {
              var res = xmlhttp.responseText; //JSON.parse(xmlhttp.responseText);
              document.getElementById("avalible_copies").value = res;
            }
        };
        var url = "{{ route('book.getquantity','sid') }}";
        url = url.replace('sid',id);
      xmlhttp.open("get", url, true);
      xmlhttp.send();
}



      
      function getAcce(id){
                  var xmlhttp =new XMLHttpRequest();

                  xmlhttp.onreadystatechange =function()
                  {
                    if(xmlhttp.readyState ==4 && xmlhttp.status ===200)
                    {
                      var res = JSON.parse(xmlhttp.responseText);
                      var select = document.getElementById('acce_id');
                      select.options.length = 0;

                      option = document.createElement('option');
                          option.setAttribute('value', "0");
                          option.appendChild(document.createTextNode("Select Accession No"));
                          select.appendChild(option);
                          
                      //alert(res[0]);
                      for(i=0; i<res.length; i++)
                      {
                          option = document.createElement('option');
                          option.setAttribute('value', res[i][0]);
                          option.appendChild(document.createTextNode(res[i][1]));
                          select.appendChild(option); 
                      }   
                      //document.getElementById("place_type_id").value = res;
                     }
                  };
 
                  var url ="{{route('book.accegt','aId')}}";

                  url = url.replace('aId',id);

                  xmlhttp.open("GET",url,true);

                  xmlhttp.send();

      }
</script>


@endsection