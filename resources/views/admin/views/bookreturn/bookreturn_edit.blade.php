@extends("admin.layouts.layout")
@section("title","Book Return Edit")

@section("content")
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

<section class="content-header">
  <h1>
    Book Return Edit
    <small>Page</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section></br>

<div class="container p-4">
 <a href="{{ route('bookreturn.index') }}">
  <button class="button button2" style="background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 16px; padding: 8px 3.5%; color: white; border-radius: 12%; border-radius: 1%;">
  Back</button>
</a>

@if(isset($bookreturn->bookissue->student->name))

<div class="row">
  <div class="col-md-10 text-center">
    <form method="post" action="/bookreturn_update/{{ $bookreturn->id }}">
      @method('PATCH')
      @csrf
      
     <!--  <div class="row">
        <div class="col-25">
          <label for="student_id">Student Name</label>
        </div>
        <div class="col-75">
          <select name="student_id" id="student_id" class="form-control" onchange="getBook(this.value)">
            <option value="{{ old('student_id') }}">Select Student</option>
            @foreach($student as $std)
                 <option value="{{ $std->id }}" {{ $std->id == $bookreturn->bookissue->student_id ? 'selected' : '' }}>{{ $std->name }} {{ $std->reg_no }}</option>    
            @endforeach
         </select>
        </div>
      </div>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">

      $("#student_id").select2({
            placeholder: "Select Student",
            allowClear: true
        });
</script> -->


<!--       <div class="row">
        <div class="col-25">
          <label for="book_id">Book Title</label>
        </div>
        <div class="col-75">
          <select name="book_id" id="book_id" class="form-control" onchange="getDate(this.value)">
            <option value="">Select Book</option> 
         </select>
        </div>
        <div style="color: red">{{ $errors->first('b_title') }}</div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="lname">Issue Date</label>
        </div>
        <div class="col-75">
          <input class="form-control" type="date" id="issue_date" name="issue_date" value="{{ old('issue_date') ?? $bookreturn->bookissue->issue_date }}" readonly="readonly">
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="lname">Return Date</label>
        </div>
        <div class="col-75">
          <input class="form-control" type="date" id="return_date" name="return_date" value="{{ old('return_date') ?? $bookreturn->bookissue->return_date }}" readonly="readonly">
        </div>
      </div> -->


<!--       <div class="row">
        <div class="col-25">
          <label for="return_date">Actual Return Date</label>
        </div>
        <div class="col-75">
          <input class="form-control" style="float: left;" type="date" id="lname" name="return_date" value="{{ old('return_date') ?? $bookreturn->return_date }}">
        </div>
        <div style="color: red">{{ $errors->first('return_date') }}</div>
      </div>

<p>
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
   Click Only To Add Fine For Late Book Returns
  </button>
</p>
<div class="collapse" id="collapseExample"> -->
  <div class="card card-body">


<!--       <div class="row">   
        <div class="col-25">
          <label for="fine_id">Select Late Duration</label>
        </div>
        <div class="col-75">
          <select name="fine_id" id="fine_id" class="form-control" onchange="getFine(this.value)">
            <option value="">Select Late Duration</option>
            @foreach($fine as $fines)
                <option value="{{ $fines->id }}" {{ $fines->id == $bookreturn->fine_id ? 'selected' : '' }}>{{ $fines->day }}</option>
            @endforeach
         </select>
        </div>
      </div> -->


<!--       <div class="row">
        <div class="col-25">
          <label for="return_date">Book Lose Fine</label>
        </div>
        <div class="col-75">
          <input class="form-control" style="float: left;" type="number" id="lname" name="lose" value="{{ old('lose') ?? $bookreturn->lose }}">
        </div>
      </div> -->

    <div class="row">
        <div class="col-25">
          <label for="status"> Fine Status</label>
        </div>
      <div class="col-75">
        <select name="status" id="status" class="form-control">
        <option disabled>Select Fine Status</option>
          
            <option value="None" {{ $bookreturn->status == 'None' ? 'selected' : '' }}>None</option>
            <option value="Paid" {{ $bookreturn->status == 'Paid' ? 'selected' : '' }}>Paid</option>
            <option value="Unpaid" {{ $bookreturn->status == 'Unpaid' ? 'selected' : '' }}>Unpaid</option>
         </select>
      </div>
    </div>

 </div>
  <!--   </div>  -->     
      
      <div class="row">
        <input type="submit" value="Submit"> 
      </div>  
    </form>
  </div>
</div>
@endif




@if(isset($bookreturn->bookissue->staff->name))
  <div class="row">
  <div class="col-md-10 text-center" >      
    <form method="post" action="/bookreturn_update/{{ $bookreturn->id }}">
      @method('PATCH')
      @csrf

<!--     <div class="row">
        <div class="col-25">
          <label for="staff_id">Staff</label>
        </div>
        <div class="col-75">
          <select name="staff_id" id="staff_id" class="form-control" onchange="getBk(this.value)">
            <option value="">Select Staff</option>
            @foreach($staff as $stf)
                 <option value="{{ $stf->id }}" {{ $stf->id == $bookreturn->bookissue->staff_id ? 'selected' : '' }}>{{ $stf->name }}</option>
            @endforeach
         </select>
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="book_id">Book Title</label>
        </div>
        <div class="col-75">
          <select name="book_id" id="book_id" class="form-control" onchange="getDate(this.value)">
            <option value="{{ old('b_title') ?? $bookreturn->bookissue->book_id }}">Select Book</option> 
         </select>
        </div>
        <div>{{ $errors->first('b_title') }}</div>
      </div>


      <div class="row">
        <div class="col-25">
          <label for="lname">Issue Date</label>
        </div>
        <div class="col-75">
          <input class="form-control" type="date" id="issue_date" name="issue_date" value="{{ old('issue_date') ?? $bookreturn->bookissue->issue_date }}" readonly="readonly">
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="lname">Return Date</label>
        </div>
        <div class="col-75">
          <input class="form-control" type="date" id="return_date" name="return_date" value="{{ old('return_date') ?? $bookreturn->bookissue->return_date }}" readonly="readonly">
        </div>
      </div>


      <div class="row">
        <div class="col-25">
          <label for="return_date">Actual Return Date</label>
        </div>
        <div class="col-75">
          <input class="form-control" style="float: left;" type="date" id="lname" name="return_date" value="{{ old('return_date') ?? $bookreturn->return_date }}">
        </div>
        <div style="color: red">{{ $errors->first('return_date') }}</div>
      </div>

<p>
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
   Click Only To Add Fine For Late Book Returns
  </button>
</p>
<div class="collapse" id="collapseExample"> -->
  <div class="card card-body">


<!--       <div class="row">   
        <div class="col-25">
          <label for="fine_id">Select Late Duration</label>
        </div>
        <div class="col-75">
          <select name="fine_id" id="fine_id" class="form-control" onchange="getFine(this.value)">
            <option value="">Select Late Duration</option>
            @foreach($fine as $fines)
                <option value="{{ $fines->id }}" {{ $fines->id == $bookreturn->fine_id ? 'selected' : '' }}>{{ $fines->day }}</option>
            @endforeach
         </select>
        </div>
      </div> -->


<!--       <div class="row">
        <div class="col-25">
          <label for="return_date">Book Lose Fine</label>
        </div>
        <div class="col-75">
          <input class="form-control" style="float: left;" type="number" id="lname" name="lose" value="{{ old('lose') ?? $bookreturn->lose }}">
        </div>
      </div> -->

     <div class="row">
        <div class="col-25">
          <label for="status">Fine Status</label>
        </div>
      <div class="col-75">
        <select name="status" id="status" class="form-control">
          <option disabled>Select Fine Status</option>
            <option value="None" {{ $bookreturn->status == 'None' ? 'selected' : '' }}>None</option>
            <option value="Paid" {{ $bookreturn->status == 'Paid' ? 'selected' : '' }}>Paid</option>
            <option value="Unpaid" {{ $bookreturn->status == 'Unpaid' ? 'selected' : '' }}>Unpaid</option>
         </select>
      </div>
      </div>

</div>
<!--   </div>   -->    

      
      <div class="row">
        <input type="submit" value="Submit"> 
      </div>
     
    </form>
  </div>
</div>
@endif
</div>

<script type="text/javascript">
      
      function getBook(id){
                  var xmlhttp =new XMLHttpRequest();

                  xmlhttp.onreadystatechange =function()
                  {
                    if(xmlhttp.readyState ==4 && xmlhttp.status ===200)
                    {
                      var res = JSON.parse(xmlhttp.responseText);
                      var select = document.getElementById('book_id');
                      select.options.length = 0;

                      option = document.createElement('option');
                          option.setAttribute('value', "0");
                          option.appendChild(document.createTextNode("Select Book"));
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
 
                  var url ="{{route('book.bookgt','pId')}}";

                  url = url.replace('pId',id);

                  xmlhttp.open("GET",url,true);

                  xmlhttp.send();

      }

      
      function getBk(id){
                  var xmlhttp =new XMLHttpRequest();

                  xmlhttp.onreadystatechange =function()
                  {
                    if(xmlhttp.readyState ==4 && xmlhttp.status ===200)
                    {
                      var res = JSON.parse(xmlhttp.responseText);
                      var select = document.getElementById('book_id');
                      select.options.length = 0;

                         option = document.createElement('option');
                          option.setAttribute('value', "0");
                          option.appendChild(document.createTextNode("Select Book"));
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
 
                  var url ="{{route('book.bookg','pId')}}";

                  url = url.replace('pId',id);

                  xmlhttp.open("GET",url,true);

                  xmlhttp.send();

      }

    </script>

<script type="text/javascript">

  function getRegNo(id) { 
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() 
      {
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
          {
              var res = xmlhttp.responseText; //JSON.parse(xmlhttp.responseText);
              document.getElementById("reg_no").value = res;
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



  function getDate(id) {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function()
      {
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
          {
              var res = JSON.parse(xmlhttp.responseText);
              document.getElementById("issue_date").value = res[0];
              document.getElementById("return_date").value = res[1];
              
            }
        };
        var url = "{{ route('book.getdate','sid') }}";
        url = url.replace('sid',id);
      xmlhttp.open("get", url, true);
      xmlhttp.send();
}

  function getFine(id) {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function()
      {
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
          {
              var res = JSON.parse(xmlhttp.responseText);
              document.querySelector("#f_amount").value = res[0];
             // document.getElementById("f_status").value = res[1];
              
            }
        };
        var url = "{{ route('book.getlatefine','ssid') }}";
        url = url.replace('ssid',id);
      xmlhttp.open("get", url, true);
      xmlhttp.send();
}
</script>


@endsection