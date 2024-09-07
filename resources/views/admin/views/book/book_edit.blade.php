@extends("admin.layouts.layout")
@section("title","Edit Details of ". $book->b_title)

@section("content")
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

<section class="content-header">
  <h1>
    Edit Details For {{ $book->b_title }}
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
  Back</button>
</a>

<div class="row">
  <div class="col-md-10 text-center" >
    <form method="post" action="/book_update/{{ $book->id }}" enctype="multipart/form-data">
      @method('PATCH')
      @csrf

      <div class="row">
        <div class="col-25">
          <label for="lname">Book Title</label>
        </div>
        <div class="col-75">
          <input type="text" id="lname" name="b_title" class="form-control" value="{{ old('b_title') ?? $book->b_title }}">
        </div>
        <div style="color: red">{{ $errors->first('b_title') }}</div>
      </div>


      <div class="row">
        <div class="col-25">
          <label for="lname">Book Edition</label>
        </div>
        <div class="col-75">
          <input type="text" id="lname" name="b_edition" class="form-control" value="{{ old('b_edition') ?? $book->b_edition }}">
        </div>
        <div style="color: red">{{ $errors->first('b_edition') }}</div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="lname">Price</label>
        </div>
        <div class="col-75">
          <input type="text" id="lname" name="b_price" class="form-control" value="{{ old('b_price') ?? $book->b_price }}">
        </div>
        <div style="color: red">{{ $errors->first('b_price') }}</div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="lname">Book ISBN</label>
        </div>
        <div class="col-75">
          <input type="text" id="lname" name="b_isbn" class="form-control" value="{{ old('b_isbn') ?? $book->b_isbn }}">
        </div>
        <div style="color: red">{{ $errors->first('b_isbn') }}</div>
      </div>

     <div class="row">
        <div class="col-25">
          <label for="lname">Book Description</label>
        </div>
        <div class="col-75">
          <textarea type="text" maxlength="500" id="lname" class="form-control" name="description">{{$book->description}}</textarea>
        </div>
        <div style="color: red">{{ $errors->first('description') }}</div>
      </div>



    <div class="row">
        <div class="col-25">
          <label for="lname">Book Length</label>
        </div>
        <div class="col-75">
          <input type="number" class="form-control" class="form-control" id="lname" name="length" value="{{ old('length') ?? $book->length }}">
        </div>
        <div style="color: red">{{ $errors->first('length') }}</div>
      </div>


       <div class="row">
        <div class="col-25">
          <label for="selected_author_id">Authors</label>
        </div>
        <div class="col-75">
          <select name="selected_author_id[]" id="selected_author_id" class="form-control" multiple="multiple" > 
          @foreach($author as $authh)
            <option value="{{$authh->id}}" 
              @foreach($book->authers as $auth)
                @if($auth->id == $authh->id)
                  selected="true"
                  @break
                @endif
              @endforeach
              >{{ $authh->a_name }}</option>
          @endforeach
           </select>
        </div>
      </div>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">

      $("#selected_author_id").select2({
            placeholder: "Select Book Category",
            allowClear: true
        });
</script>



      <div class="row">
        <div class="col-25">
          <label for="category_id">Category</label>
        </div>
        <div class="col-75">
          <select name="category_id" id="category_id" class="form-control">
            <option value="" disabled>Select Book Category</option>
            @foreach($category as $cat)
                 <option value="{{ $cat->id }}" {{ $cat->id == $book->category_id ? 'selected' : '' }}>{{ $cat->c_name }}</option>
            @endforeach
         </select>
        </div>
      </div>

<script type="text/javascript">

      $("#category_id").select2({
            placeholder: "Select Book Category",
            allowClear: true
        });
</script>
        

    <div class="row">
        <div class="col-25">
          <label for="selected_shelf_id">Shelf No</label>
        </div>
        <div class="col-75">
          <select name="selected_shelf_id[]" id="selected_shelf_id" class="form-control" multiple="multiple"> 
          @foreach($shelf as $sh)
            <option value="{{$sh->id}}" 
              @foreach($book->shelves as $shelf)
                @if($shelf->id == $sh->id)
                  selected="true"
                  @break
                @endif
              @endforeach
              >{{ $sh->s_no }}</option>
          @endforeach
           </select>
        </div>
      </div>
<script type="text/javascript">

      $("#selected_shelf_id").select2({
            placeholder: "Select Shelf No",
            allowClear: true
        });
</script>

      <div class="row">
        <div class="col-25">
          <label for="fname">Total Copies</label>
        </div>
        <div class="col-75">
          <input class="form-control" type="number" min="0" id="fname" name="total_copies" value="{{ old('total_copies') ?? $book->total_copies }}">
        </div>
      </div>
       @if($errors->any())
          <div style="color: red"> {{ $errors->first('avalible_copies') }} </div>
       @endif

      <div class="row">
        <div class="col-25">
          <label for="fname">Available Copies</label>
        </div>
        <div class="col-75">
          <input class="form-control" type="number" min="0" id="fname" name="avalible_copies" value="{{ old('avalible_copies') ?? $book->avalible_copies }}">
        </div>
      </div>
       @if($errors->any())
          <div style="color: red"> {{ $errors->first('avalible_copies') }} </div>
       @endif



      <div class="row">
        <div class="col-25">
          <label for="selected_publisher_id">Publisher Name</label>
        </div>
        <div class="col-75">
          <select name="selected_publisher_id[]" id="selected_publisher_id" class="form-control" multiple="multiple" > 
          @foreach($publisher as $pub)
            <option value="{{$pub->id}}" 
              @foreach($book->publishers as $pubb)
                @if($pubb->id == $pub->id)
                  selected="true"
                  @break
                @endif
              @endforeach
              >{{ $pub->p_name }}</option>
          @endforeach
           </select>
        </div>
      </div>
<script type="text/javascript">

      $("#selected_publisher_id").select2({
            placeholder: "Select Publisher Name",
            allowClear: true
        });
</script>

      <div class="row">
        <div class="col-25">
          <label for="lname">Publish Year</label>
        </div>
        <div class="col-75">
          <input class="form-control" style="float: left;" type="text" id="lname" name="p_date" value="{{ old('p_date') ?? $book->p_date }}">
        </div>
        <div style="color: red">{{ $errors->first('p_date') }}</div>
      </div>

       <div class="row">
        <div class="col-25">
          <label for="country_id">Publish Country</label>
        </div>
        <div class="col-75">
          <select name="country_id" id="country_id" class="form-control">
            <option value=""></option>
            @foreach($country as $con)
                 <option value="{{ $con->id }}" {{ $con->id == $book->country_id ? 'selected' : '' }}>{{ $con->country }}</option>
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
          <label for="fname">Image</label>
        </div>
        <div class="col-75">
          <p><label for="file" style="cursor: pointer; background-color: white; width: 50%">Upload Image</label></p>
          <p><img id="output" width="100" height="100" src="{{asset($book->b_image)}}"  value="{{ $book->b_image }}"/></p>
             <input type="file" accept="image/*" name="b_image" id="file" value="{{ $book->b_image }}" onchange="loadFile(event)" style="display: none;">
        </div>
        
          <script>
          var loadFile = function(event) {
            var b_image = document.getElementById('output');
            b_image.src = URL.createObjectURL(event.target.files[0]);
          };
          </script>
    </div>
       @if($errors->any())
          <div style="color: red"> {{ $errors->first('b_image') }} </div>
       @endif




      <div class="row">
        <input type="submit" value="Submit">
      </div>
    </form>
  </div>
</div>
</div>




@endsection