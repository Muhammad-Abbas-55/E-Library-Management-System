@extends("admin.layouts.layout")
@section("title","Add E-Book")

@section("content")
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

<section class="content-header">
  <h1>
    Add E-Book
    <small>Page</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section></br>

<div class="container p-4">
 <a href="{{ route('ebook.index') }}">
  <button class="button button2" style="background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 16px; padding: 8px 3.5%; color: white; border-radius: 12%; border-radius: 1%;">
  E-Book List</button>
</a>
 <a href="{{ route('publisher.index') }}">
  <button class="button button2" style="background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 16px; padding: 8px 3.5%; color: white; border-radius: 12%; border-radius: 1%;">
  Add Publisher</button>
</a>
<a href="{{ route('author.create') }}">
  <button class="button button2" style="background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 16px; padding: 8px 3.5%; color: white; border-radius: 12%; border-radius: 1%;">
  Add Auther</button>
</a>
  <a href="{{ route('category.create') }}">
    <button class="button button2" style="background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 15px; padding: 8px 3.5%; color: white; border-radius: 12%; border-radius: 1%;">
    Add Category</button>
  </a>

<div class="row">
  <div class="col-md-10 text-center" >
    <form method="post" action="/ebook_store" enctype="multipart/form-data">
      @csrf

<p>
  <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Add PDF Book</a>
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Add Audio Book</button>
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample3" aria-expanded="false" aria-controls="multiCollapseExample3">Add Research Paper</button>
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample4" aria-expanded="false" aria-controls="multiCollapseExample4">Add Magazine</button> 
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample5" aria-expanded="false" aria-controls="multiCollapseExample5">Add Video Book</button>
</p>
<div class="row">
  <div class="col">
    <div class="collapse multi-collapse" id="multiCollapseExample1">
      <div class="card card-body">

      <div class="row">
        <div class="col-25">
          <label for="fname">Select PDF Book</label>
        </div>
        <div class="col-75">
          <input class="form-control" type="file" id="fname" name="pdfbook" value="{{ old('pdfbook') }}">
        </div>
        <div style="color: red">{{ $errors->first('pdfbook') }}</div>
      </div>
        </div>
    </div>
  </div>    
  <div class="col">
    <div class="collapse multi-collapse" id="multiCollapseExample2">
      <div class="card card-body">


      <div class="row">
        <div class="col-25">
          <label for="fname">Select Audio Book</label>
        </div>
        <div class="col-75">
          <input class="form-control" type="file" id="fname" name="audiobook" value="{{ old('audiobook') }}">
        </div>
        <div>{{ $errors->first('audiobook') }}</div>
      </div>


      <div class="row">
        <div class="col-25">
          <label for="fname">Instructure Name</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" name="inst" value="{{ old('inst') }}" placeholder="Enter Instructure Name Here..">
        </div>
        <div>{{ $errors->first('inst') }}</div>
      </div>
        </div>
    </div>
  </div>

  <div class="col">
    <div class="collapse multi-collapse" id="multiCollapseExample3">
      <div class="card card-body">


      <div class="row">
        <div class="col-25">
          <label for="fname">Select Research Paper</label>
        </div>
        <div class="col-75">
          <input class="form-control" type="file" id="fname" name="papers" value="{{ old('papers') }}">
        </div>
        <div>{{ $errors->first('papers') }}</div>
      </div>
        </div>
    </div>
  </div>

  <div class="col">
    <div class="collapse multi-collapse" id="multiCollapseExample4">
      <div class="card card-body">


      <div class="row">
        <div class="col-25">
          <label for="fname">Select Magazine</label>
        </div>
        <div class="col-75">
          <input class="form-control" type="file" id="fname" name="magazine" value="{{ old('magazine') }}">
        </div>
        <div>{{ $errors->first('magazine') }}</div>
      </div>
        </div>
    </div>
  </div>


  <div class="col">
    <div class="collapse multi-collapse" id="multiCollapseExample5">
      <div class="card card-body">


      <div class="row">
        <div class="col-25">
          <label for="fname">Select Video</label>
        </div>
        <div class="col-75">
          <input class="form-control" type="file" id="fname" name="videobook" value="{{ old('videobook') }}">
        </div>
        <div>{{ $errors->first('videobook') }}</div>
      </div>


       <div class="row">
        <div class="col-25">
          <label for="fname">Instructure Name</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" name="instructure" value="{{ old('instructure') }}" placeholder="Enter Instructure Name Here..">
        </div>
        <div>{{ $errors->first('instructure') }}</div>
      </div>
         </div>
    </div>
  </div>
</div>

      <div class="row">
        <div class="col-25">
          <label for="fname">Title</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" name="title" value="{{ old('title') }}" placeholder="Enter Title Here..">
        </div>
        <div style="color: red">{{ $errors->first('title') }}</div>
      </div>
      
      <div class="row">
        <div class="col-25">
          <label for="lname">Book Edition</label>
        </div>
        <div class="col-75">
          <input type="text" id="lname" name="edition" value="{{ old('edition') }}" placeholder="Enter Book Edition Here..">
        </div>
        <div style="color: red">{{ $errors->first('edition') }}</div>
      </div>


    <div class="row">
        <div class="col-25">
          <label for="author_id">Author Name</label>
        </div>
        <div class="col-75">
          <select name="selected_author_id[]" id="author_id" class="form-control" multiple="multiple" ondblclick="addOpt()">
            <option value="" disabled>Select Authors Name</option>
            @foreach($author as $auth)
                 <option value="{{ $auth->id }}">{{ $auth->a_name }}</option>
            @endforeach
         </select>
        </div>
      </div>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">

      $("#author_id").select2({
            // placeholder: "Select Author Name",
            allowClear: true
        });
</script>       

<!--        <div class="row">
        <div class="col-25">
          <label for="selected_author_id">Selected Author Name</label>
        </div>
        <div class="col-75">
          <select name="selected_author_id[]" id="selected_author_id" class="form-control" multiple="multiple" ondblclick="removeOpt()" onclick="selectAll()">  
         </select>
        </div>
      </div> -->


      <div class="row">
        <div class="col-25">
          <label for="category_id">Category</label>
        </div>
        <div class="col-75">
          <select name="category_id" id="category_id" class="form-control">
            <option value="">Select Book Category</option>
            @foreach($category as $cat)
                 <option value="{{ $cat->id }}">{{ $cat->c_name }}</option>
            @endforeach
         </select>
        </div>
      </div>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">

      $("#category_id").select2({
            placeholder: "Select Book Category",
            allowClear: true
        });
</script>

      <div class="row">
        <div class="col-25">
          <label for="publisher_id">Publisher Name</label>
        </div>
        <div class="col-75">
          <select name="selected_publisher_id[]" id="publisher_id" class="form-control" multiple="multiple" ondblclick="addOptpublisher()">
            <option value="" disabled>Select Publisher Name</option>
            @foreach($publisher as $pub)
                 <option value="{{ $pub->id }}">{{ $pub->p_name }}</option>
            @endforeach
         </select>
        </div>
      </div>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">

      $("#publisher_id").select2({
            // placeholder: "Select Author Name",
            allowClear: true
        });
</script>       

<!--        <div class="row">
        <div class="col-25">
          <label for="selected_publisher_id">Selected Publisher Name</label>
        </div>
        <div class="col-75">
          <select name="selected_publisher_id[]" id="selected_publisher_id" class="form-control" multiple="multiple" ondblclick="removeOptpublisher()" onclick="selectAllpublisher()">  
         </select>
        </div>
      </div>
 -->

      <div class="row">
        <div class="col-25">
          <label for="country_id">Publish Country</label>
        </div>
        <div class="col-75">
          <select name="country_id" id="country_id" class="form-control">
            <option value="">Select Country</option>
            @foreach($country as $con)
                 <option value="{{ $con->id }}">{{ $con->country }}</option>
            @endforeach
         </select>
        </div>
      </div>

      
<script type="text/javascript">

      $("#country_id").select2({
            placeholder: "Select Country",
            allowClear: true
        });
</script>


      <div class="row">
        <div class="col-25">
          <label for="lname">Publish Date</label>
        </div>
        <div class="col-75">
          <input class="form-control" style="float: left;" type="date" id="lname" name="p_date" value="{{ old('p_date') }}">
        </div>
        <div style="color: red">{{ $errors->first('p_date') }}</div>
      </div>


      <div class="row">
        <input type="submit" value="Submit">
      </div>

    </form>
  </div>
</div>
</div>






<script type="text/javascript">
  
function addOpt()
{
  var author = document.getElementById("author_id");
  var sel = document.getElementById("selected_author_id");

  var text = author.options[author.selectedIndex].text;
  var value = author.options[author.selectedIndex].value;


  var option = document.createElement("option");
  option.text = text;
  option.value = value;
  option.selected =true;
  sel.add(option);
  author.remove(author.selectedIndex);

}
function selectAll()
{
  var sel = document.getElementById("selected_author_id");

  for(i=0 ;i<sel.length;i++)
  {
    sel[i].selected =true;
  }
}


function removeOpt()
{
  var sel = document.getElementById("selected_author_id");
  var author = document.getElementById("author_id");

  var text = sel.options[sel.selectedIndex].text;
  var value = sel.options[sel.selectedIndex].value;

  var option = document.createElement("option");
  option.text = text;
  option.value = value;
  author.add(option);

  sel.remove(sel.selectedIndex);

}






function addOptpublisher()
{
  var shelf = document.getElementById("publisher_id");
  var sel = document.getElementById("selected_publisher_id");

  var text = shelf.options[shelf.selectedIndex].text;
  var value = shelf.options[shelf.selectedIndex].value;


  var option = document.createElement("option");
  option.text = text;
  option.value = value;
  option.selected =true;
  sel.add(option);
  shelf.remove(shelf.selectedIndex);

}
function selectAllpublisher()
{
  var sel = document.getElementById("selected_publisher_id");

  for(i=0 ;i<sel.length;i++)
  {
    sel[i].selected =true;
  }
}


function removeOptpublisher()
{
  var sel = document.getElementById("selected_publisher_id");
  var shelf = document.getElementById("publisher_id");

  var text = sel.options[sel.selectedIndex].text;
  var value = sel.options[sel.selectedIndex].value;

  var option = document.createElement("option");
  option.text = text;
  option.value = value;
  shelf.add(option);

  sel.remove(sel.selectedIndex);



}



</script>

@endsection





