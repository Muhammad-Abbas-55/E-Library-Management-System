@extends("admin.layouts.layout")
@section("title","Add Book")

@section("content")
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

<section class="content-header">
  <h1>
    Add Book
    <small>Page</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section></br>

<div class="container p-4">
 <a href="{{ route('book.index') }}">
  <button class="button button2" style="background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 16px; padding: 8px 3.5%; color: white; border-radius: 12%; border-radius: 1%;">
  View Books List</button>
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
<a href="{{ route('shelf.create') }}">
    <button class="button button2" style="background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 15px; padding: 8px 3.5%; color: white; border-radius: 12%; border-radius: 1%;">
    Add Shelf No</button>
  </a>


<div class="row">
  <div class="col-md-10 text-center" >      
    <form method="post" action="book_store" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col-25">
          <label for="fname">Book Title</label>
        </div>
        <div class="col-75">
          <input type="text" name="b_title" id="fname" class="form-control" value="{{ old('b_title') }}" placeholder="Enter Book Title Here..">
        </div>
        <div style="color: red">{{ $errors->first('b_title') }}</div>
      </div>
      
      <div class="row">
        <div class="col-25">
          <label for="b_edition">Book Edition</label>
        </div>
        <div class="col-75">
          <input type="text" id="b_edition" class="form-control" name="b_edition" value="{{ old('b_edition') }}" placeholder="Enter Book Edition Here..">
        </div>
        <div style="color: red">{{ $errors->first('b_edition') }}</div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="lname">Price</label>
        </div>
        <div class="col-75">
          <input type="text" id="lname" name="b_price" class="form-control" value="{{ old('b_price') }}" placeholder="Enter Book Price Here..">
        </div>
        <div style="color: red">{{ $errors->first('b_price') }}</div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="lname">Book ISBN</label>
        </div>
        <div class="col-75">
          <input type="text" id="lname" name="b_isbn" class="form-control" value="{{ old('b_isbn') }}" placeholder="Enter Book ISBN No Here..">
        </div>
        <div style="color: red">{{ $errors->first('b_isbn') }}</div>
      </div>

     <div class="row">
        <div class="col-25">
          <label for="lname">Book Description</label>
        </div>
        <div class="col-75">
          <textarea type="text" id="lname" name="description"  class="form-control" value="{{ old('description') }}" placeholder="Enter Book Description Here.."></textarea>
        </div>
        <div style="color: red; margin-left: 26%;">{{ $errors->first('description') }}</div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="fname">Total Copies</label>
        </div>
        <div class="col-75">
          <input class="form-control" type="number" min="0" id="fname" name="total_copies" value="{{ old('total_copies') }}">
        </div>  
      </div>
       @if($errors->any())
          <div style="color: red; margin-left: 26%;"> {{ $errors->first('total_copies') }} </div>
       @endif


      <div class="row">
        <div class="col-25">
          <label for="fname">Available Copies</label>
        </div>
        <div class="col-75">
          <input class="form-control" type="number" min="0" id="fname" name="avalible_copies" value="{{ old('avalible_copies') }}">
        </div>  
      </div>
       @if($errors->any())
          <div style="color: red; margin-left: 26%;"> {{ $errors->first('avalible_copies') }} </div>
       @endif


          <div class="row">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th style="text-align: center">Book Accession No</th>
                  <th></th>
                  <th style="text-align: center"><a href="#" class="btn btn-info addSerial">+</a></th>
                </tr>
              </thead>
              <tbody id="addSerials">
                <tr>
                  <td>1</td>
                  <td><input type="text" name="serial_no[]" class="form-control"></td>
                  <td style="text-align: center"><a href="#" class="btn btn-danger remove">-</a></td>
                </tr>
              </tbody>
            </table>
          </div>


    <div class="row">
        <div class="col-25">
          <label for="lname">Book Length</label>
        </div>
        <div class="col-75">
          <input type="number" class="form-control" id="lname" name="length" value="{{ old('length') }}">
        </div>
        <div style="color: red">{{ $errors->first('length') }}</div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="author_id">Select Author Name</label>
        </div>
        <div class="col-75">
          <select name="selected_author_id[]" id="author_id" style="width: 100%" class="form-control" multiple="multiple" ondblclick="addOpt()">
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
          <select name="selected_author_id[]" id="selected_author_id"  style="width: 100%" class="form-control" multiple="multiple" ondblclick="removeOpt()" onclick="selectAll()">  
         </select>
        </div>
      </div> -->



      <div class="row">
        <div class="col-25">
          <label for="category_id">Select Category</label>
        </div>
        <div class="col-75">
          <select name="category_id" id="category_id" style="width: 100%" class="form-control">
            <option></option>
            @foreach($category as $cat)
                 <option value="{{ $cat->id }}">{{ $cat->c_name }}</option>
            @endforeach
         </select>
        </div>
      </div>
      @if($errors->any())
          <div style="color: red"> {{ $errors->first('c_name') }} </div>
      @endif


<script type="text/javascript">

      $("#category_id").select2({
            placeholder: "Select Book Category",
            allowClear: true
        });
</script>




      <div class="row">
        <div class="col-25">
          <label for="shelf_id">Select Shelf No</label>
        </div>
        <div class="col-75">
          <select name="selected_shelf_id[]" id="shelf_id" style="width: 100%" class="form-control" multiple="multiple" ondblclick="addOptshelf()">
            <option value="" disabled>Select Shelf No</option>
            @foreach($shelf as $shf)
                 <option value="{{ $shf->id }}">{{ $shf->s_no }}</option>
            @endforeach
         </select>
        </div>
      </div>
<script type="text/javascript">

      $("#shelf_id").select2({
            // placeholder: "Select Shelf No",
            allowClear: true
        });
</script>
     <!-- <div class="row">
        <div class="col-25">
          <label for="selected_shelf_id">Selected Shelf No</label>
        </div>
        <div class="col-75">
          <select name="selected_shelf_id[]" id="selected_shelf_id" style="width: 100%" class="form-control" multiple="multiple" ondblclick="removeOptshelf()" onclick="selectAllshelf()">  
         </select>
        </div>
      </div> -->
      

      <div class="row">
        <div class="col-25">
          <label for="publisher_id">Select Publisher Name</label>
        </div>
        <div class="col-75">
          <select name="selected_publisher_id[]" id="publisher_id" placeholder="ghjk" style="width: 100%" class="form-control" multiple="multiple" ondblclick="addOptpublisher()">
            <option value="" disabled>Select Publisher Name</option>
            @foreach($publisher as $pub)
                 <option value="{{ $pub->id }}">{{ $pub->p_name }}</option>
            @endforeach
         </select>
        </div>
      </div>

<script type="text/javascript">

      $("#publisher_id").select2({
            // placeholder: "Select Publisher Name",
            allowClear: true
        });
</script>

  


      <div class="row">
        <div class="col-25">
          <label for="lname">Publish Year</label>
        </div>
        <div class="col-75">
          <input class="form-control" style="float: left;" type="text" id="lname" name="p_date" value="{{ old('p_date') }}">
        </div>
        <div style="color: red">{{ $errors->first('p_date') }}</div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="country_id">Select Publish Country</label>
        </div>
        <div class="col-75">
          <select name="country_id" id="country_id" style="width: 100%" class="form-control">
            <option></option>
            @foreach($country as $con)
                 <option value="{{ $con->id }}">{{ $con->country }}</option>
            @endforeach
         </select>
        </div>
      </div>
      @if($errors->any())
          <div style="color: red"> {{ $errors->first('country') }} </div>
       @endif

<script type="text/javascript">

      $("#country_id").select2({
            placeholder: "Select Country",
            allowClear: true
        });
</script>
 


    <div class="row">
        <div class="col-25">
          <label for="fname">Cover Image</label>
        </div>
        <div class="col-75">
          <p><label for="file" style="cursor: pointer; background-color: white; width: 50%">Browse Image</label></p>
          <p><img id="output" width="100" height="100" /></p>
             <input type="file" accept="image/*" name="b_image" id="file" onchange="loadFile(event)" style="display: none;">
        </div>
        
          <script>
          var loadFile = function(event) {
            var b_image = document.getElementById('output');
            b_image.src = URL.createObjectURL(event.target.files[0]);
          };
          </script>
    </div>
       @if($errors->any())
          <div style="color: red; margin-left: 26%;"> {{ $errors->first('b_image') }} </div>
       @endif



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


function addOptshelf()
{
  var shelf = document.getElementById("shelf_id");
  var sel = document.getElementById("selected_shelf_id");

  var text = shelf.options[shelf.selectedIndex].text;
  var value = shelf.options[shelf.selectedIndex].value;


  var option = document.createElement("option");
  option.text = text;
  option.value = value;
  option.selected =true;
  sel.add(option);
  shelf.remove(shelf.selectedIndex);

}
function selectAllshelf()
{
  var sel = document.getElementById("selected_shelf_id");

  for(i=0 ;i<sel.length;i++)
  {
    sel[i].selected =true;
  }
}


function removeOptshelf()
{
  var sel = document.getElementById("selected_shelf_id");
  var shelf = document.getElementById("shelf_id");

  var text = sel.options[sel.selectedIndex].text;
  var value = sel.options[sel.selectedIndex].value;

  var option = document.createElement("option");
  option.text = text;
  option.value = value;
  shelf.add(option);

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