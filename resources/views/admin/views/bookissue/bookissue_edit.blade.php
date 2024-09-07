@extends("admin.layouts.layout")
@section("title","Edit Book Issue Detail")

@section("content")
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

<section class="content-header">
  <h1>
    Edit Book Issue Detail
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
  Back</button>
</a>

@if(isset($bookissue->student->name))
<div class="row">
  <div class="col-md-10 text-center" >      
    <form method="post" action="/bookissue_update/{{ $bookissue->id }}">
      @method('PATCH')
      @csrf

      <div class="row">
        <div class="col-25">
          <label for="book_id">Book Title</label>
        </div>
        <div class="col-75">
          <select name="book_id" id="book_id" class="form-control" onchange="getQty(this.value)">
            <option value="" disabled>Select Book</option>
            @foreach($book as $bk)
                 <option value="{{ $bk->id }}" {{ $bk->id == $bookissue->book_id ? 'selected' : '' }}>{{ $bk->b_title }}</option>
            @endforeach
          </select>
        </div>
         <div>{{ $errors->first('b_title') }}</div>
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
          <label for="student_id">Book Copy</label>
        </div>
        <div class="col-75">
          <input type="text" name="avalible_copies" id="avalible_copies" class="form-control" value="{{ old('avalible_copies') ?? $bk->avalible_copies }}" readonly="readonly">
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="student_id">Student Name</label>
        </div>
        <div class="col-75">
          <select name="student_id" id="student_id" class="form-control" onchange="getRegNo(this.value)">
            <option value="{{ old('student_id') }}" disabled>Select Student</option>
            @foreach($student as $std)
            <option value="{{ $std->id }}" {{ $std->id == $bookissue->student_id ? 'selected' : '' }}>{{ $std->name }}</option>
            @endforeach
         </select>
        </div>
         <div>{{ $errors->first('name') }}</div>
      </div>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">

      $("#student_id").select2({
            placeholder: "Select Student",
            allowClear: true
        });
</script>


      <div class="row">
        <div class="col-25">
          <label for="student_id">Student Registration</label>
        </div>
        <div class="col-75">
          <input type="text" name="reg_no" id="reg_no" class="form-control" value="{{ old('reg_no') ?? $std->reg_no }}" readonly="readonly">
        </div>
         <div>{{ $errors->first('reg_no') }}</div>
      </div>



      <div class="row">
        <div class="col-25">
          <label for="lname">Issue Date</label>
        </div>
        <div class="col-75">
          <input class="form-control" style="float: left;" type="date" id="lname" name="issue_date" value="{{ old('issue_date') ?? $bookissue->issue_date }}">
        </div>
        <div style="color: red">{{ $errors->first('issue_date') }}</div>
      </div>


      <div class="row">
        <div class="col-25">
          <label for="lname">Return Date</label>
        </div>
        <div class="col-75">
          <input class="form-control" style="float: left;" type="date" id="lname" name="return_date"  value="{{ old('return_date') ?? $bookissue->return_date }}">
        </div>
        <div style="color: red">{{ $errors->first('return_date') }}</div>
      </div>

      <div class="row">
        <input type="submit" value="Submit">
      </div>
    </form>
  </div>
</div>
@endif






@if(isset($bookissue->staff->name))
<div class="row">
  <div class="col-md-10 text-center" >      
    <form method="post" action="/bookissue_update/{{ $bookissue->id }}">
      @method('PATCH')
      @csrf

      <div class="row">
        <div class="col-25">
          <label for="book_id">Book Title</label>
        </div>
        <div class="col-75">
          <select name="book_id" id="book_id" class="form-control" onchange="getQty(this.value)">
            <option value="" disabled>Select Book</option>
            @foreach($book as $bk)
                 <option value="{{ $bk->id }}" {{ $bk->id == $bookissue->book_id ? 'selected' : '' }}>{{ $bk->b_title }}</option>
            @endforeach
          </select>
        </div>
         <div>{{ $errors->first('b_title') }}</div>
      </div>


      <div class="row">
        <div class="col-25">
          <label for="student_id">Book Copy</label>
        </div>
        <div class="col-75">
          <input type="text" name="avalible_copies" id="avalible_copies" class="form-control" value="{{ old('avalible_copies') ?? $bk->avalible_copies }}" readonly="readonly">
        </div>
         <div>{{ $errors->first('avalible_copies') }}</div>
      </div>


      <div class="row">
        <div class="col-25">
          <label for="staff_id">Staff</label>
        </div>
        <div class="col-75">
          <select name="staff_id" id="staff_id" class="form-control">
            <option value="" disabled>Select Staff</option>
            @foreach($staff as $stf)
                 <option value="{{ $stf->id }}" {{ $stf->id == $bookissue->staff_id ? 'selected' : '' }}>{{ $stf->name }}</option>
            @endforeach
         </select>
        </div>
         <div>{{ $errors->first('name') }}</div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="lname">Issue Date</label>
        </div>
        <div class="col-75">
          <input class="form-control" style="float: left;" type="date" id="lname" name="issue_date" value="{{ old('issue_date') ?? $bookissue->issue_date }}">
        </div>
        <div style="color: red">{{ $errors->first('issue_date') }}</div>
      </div>


      <div class="row">
        <div class="col-25">
          <label for="lname">Return Date</label>
        </div>
        <div class="col-75">
          <input class="form-control" style="float: left;" type="date" id="lname" name="return_date"  value="{{ old('return_date') ?? $bookissue->return_date }}">
        </div>
        <div style="color: red">{{ $errors->first('return_date') }}</div>
      </div>

      <div class="row">
        <input type="submit" value="Submit">
      </div>
    </form>
  </div>
</div>
@endif
</div>

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
        var url = "{{ route('book.getregistrationn','sid') }}";
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
</script>



@endsection