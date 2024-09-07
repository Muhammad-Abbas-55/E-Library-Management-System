@extends("admin.layouts.layout")
@section("title","Edit E-Book Detail ")

@section("content")
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

<section class="content-header">
  <h1>
    Edit E-Book Detail
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

@if(isset($ebook->pdfbook))

<div class="row">
  <div class="col-md-10 text-center" >
    <form method="post" action="/ebook_update/{{ $ebook->id }}" enctype="multipart/form-data">
      @method('PATCH')
      @csrf


      <div class="row">
        <div class="col-25">
          <label for="fname">Select PDF Book</label>
        </div>
        <div class="col-75">
          <input class="form-control" type="file" id="fname" name="pdfbook" value="{{ old('pdfbook') ?? $ebook->pdfbook }}">
        </div>
        <div>{{ $errors->first('pdfbook') }}</div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="fname">Title</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" name="title" value="{{ old('title') ?? $ebook->title }}">
        </div>
        <div style="color: red">{{ $errors->first('title') }}</div>
      </div>
      
      <div class="row">
        <div class="col-25">
          <label for="lname">Book Edition</label>
        </div>
        <div class="col-75">
          <input type="text" id="lname" name="edition" value="{{ old('edition') ?? $ebook->edition }}">
        </div>
        <div style="color: red">{{ $errors->first('edition') }}</div>
      </div>



      <div class="row">
        <div class="col-25">
          <label for="selected_author_id">Authors</label>
        </div>
        <div class="col-75">
          <select name="selected_author_id[]" id="selected_author_id" class="form-control" multiple="multiple" > 
          @foreach($author as $authh)
            <option value="{{$authh->id}}" 
              @foreach($ebook->authers as $auth)
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
            // placeholder: "Select Author Name",
            allowClear: true
        });
</script>       


      <div class="row">
        <div class="col-25">
          <label for="category_id">Category</label>
        </div>
        <div class="col-75">
          <select name="category_id" id="category_id" class="form-control">
            <option value="">Select Book Category</option>
            @foreach($category as $cat)
                 <option value="{{ $cat->id }}" {{ $cat->id == $ebook->category_id ? 'selected' : '' }}>{{ $cat->c_name }}</option>
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
          <label for="selected_publisher_id">Publisher Name</label>
        </div>
        <div class="col-75">
          <select name="selected_publisher_id[]" id="selected_publisher_id" class="form-control" multiple="multiple" > 
          @foreach($publisher as $pub)
            <option value="{{$pub->id}}" 
              @foreach($ebook->publishers as $pubb)
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
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">

      $("#selected_publisher_id").select2({
            // placeholder: "Select Author Name",
            allowClear: true
        });
</script>      



      <div class="row">
        <div class="col-25">
          <label for="country_id">Publish Country</label>
        </div>
        <div class="col-75">
          <select name="country_id" id="country_id" class="form-control">
            <option value="">Select Country</option>
            @foreach($country as $con)
                 <option value="{{ $con->id }}" {{ $con->id == $ebook->country_id ? 'selected' : '' }}>{{ $con->country }}</option>
            @endforeach
         </select>
        </div>
      </div>


<script type="text/javascript">

      $("#country_id").select2({
            placeholder: "Select Book Category",
            allowClear: true
        });
</script>


      <div class="row">
        <div class="col-25">
          <label for="lname">Publish Date</label>
        </div>
        <div class="col-75">
          <input class="form-control" style="float: left;" type="date" id="lname" name="p_date"  value="{{ old('p_date') ?? $ebook->p_date }}">
        </div>
        <div style="color: red">{{ $errors->first('p_date') }}</div>
      </div>


      <div class="row">
        <input type="submit" value="Submit">
      </div>

    </form>
  </div>
</div>
@endif









@if(isset($ebook->audiobook))

<div class="row">
  <div class="col-md-10 text-center" >
    <form method="post" action="/ebook_update/{{ $ebook->id }}" enctype="multipart/form-data">
      @method('PATCH')
      @csrf



      <div class="row">
        <div class="col-25">
          <label for="fname">Select Audio Book</label>
        </div>
        <div class="col-75">
          <input class="form-control" type="file" id="fname" name="audiobook" value="{{ old('audiobook') ?? $ebook->audiobook }}">
        </div>
        <div>{{ $errors->first('audiobook') }}</div>
      </div>


      <div class="row">
        <div class="col-25">
          <label for="fname">Instructure Name</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" name="inst" value="{{ old('inst') ?? $ebook->inst }}">
        </div>
        <div>{{ $errors->first('inst') }}</div>
      </div>



      <div class="row">
        <div class="col-25">
          <label for="fname">Title</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" name="title" value="{{ old('title') ?? $ebook->title }}">
        </div>
        <div style="color: red">{{ $errors->first('title') }}</div>
      </div>
      
      <div class="row">
        <div class="col-25">
          <label for="lname">Book Edition</label>
        </div>
        <div class="col-75">
          <input type="text" id="lname" name="edition" value="{{ old('edition') ?? $ebook->edition }}">
        </div>
        <div style="color: red">{{ $errors->first('edition') }}</div>
      </div>



      <div class="row">
        <div class="col-25">
          <label for="selected_author_id">Authors</label>
        </div>
        <div class="col-75">
          <select name="selected_author_id[]" id="selected_author_id" class="form-control" multiple="multiple" > 
          @foreach($author as $authh)
            <option value="{{$authh->id}}" 
              @foreach($ebook->authers as $auth)
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
            // placeholder: "Select Author Name",
            allowClear: true
        });
</script> 

      <div class="row">
        <div class="col-25">
          <label for="category_id">Category</label>
        </div>
        <div class="col-75">
          <select name="category_id" id="category_id" class="form-control">
            <option value="">Select Book Category</option>
            @foreach($category as $cat)
                 <option value="{{ $cat->id }}" {{ $cat->id == $ebook->category_id ? 'selected' : '' }}>{{ $cat->c_name }}</option>
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
          <label for="selected_publisher_id">Publisher Name</label>
        </div>
        <div class="col-75">
          <select name="selected_publisher_id[]" id="selected_publisher_id" class="form-control" multiple="multiple" > 
          @foreach($publisher as $pub)
            <option value="{{$pub->id}}" 
              @foreach($ebook->publishers as $pubb)
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
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">

      $("#selected_publisher_id").select2({
            // placeholder: "Select Author Name",
            allowClear: true
        });
</script> 

      <div class="row">
        <div class="col-25">
          <label for="country_id">Publish Country</label>
        </div>
        <div class="col-75">
          <select name="country_id" id="country_id" class="form-control">
            <option value="">Select Country</option>
            @foreach($country as $con)
                 <option value="{{ $con->id }}" {{ $con->id == $ebook->country_id ? 'selected' : '' }}>{{ $con->country }}</option>
            @endforeach
         </select>
        </div>
      </div>
<script type="text/javascript">

      $("#country_id").select2({
            placeholder: "Select Book Category",
            allowClear: true
        });
</script>

      <div class="row">
        <div class="col-25">
          <label for="lname">Publish Date</label>
        </div>
        <div class="col-75">
          <input class="form-control" style="float: left;" type="date" id="lname" name="p_date"  value="{{ old('p_date') ?? $ebook->p_date }}">
        </div>
        <div style="color: red">{{ $errors->first('p_date') }}</div>
      </div>

      <div class="row">
        <input type="submit" value="Submit">
      </div>

    </form>
  </div>
</div>
@endif






@if(isset($ebook->papers))

<div class="row">
  <div class="col-md-10 text-center" >
    <form method="post" action="/ebook_update/{{ $ebook->id }}" enctype="multipart/form-data">
      @method('PATCH')
      @csrf


      <div class="row">
        <div class="col-25">
          <label for="fname">Select Research Paper</label>
        </div>
        <div class="col-75">
          <input class="form-control" type="file" id="fname" name="papers" value="{{ old('papers') ?? $ebook->papers }}">
        </div>
        <div>{{ $errors->first('papers') }}</div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="fname">Title</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" name="title" value="{{ old('title') ?? $ebook->title }}">
        </div>
        <div style="color: red">{{ $errors->first('title') }}</div>
      </div>
      
      <div class="row">
        <div class="col-25">
          <label for="lname">Book Edition</label>
        </div>
        <div class="col-75">
          <input type="text" id="lname" name="edition" value="{{ old('edition') ?? $ebook->edition }}">
        </div>
        <div style="color: red">{{ $errors->first('edition') }}</div>
      </div>



      <div class="row">
        <div class="col-25">
          <label for="selected_author_id">Authors</label>
        </div>
        <div class="col-75">
          <select name="selected_author_id[]" id="selected_author_id" class="form-control" multiple="multiple" > 
          @foreach($author as $authh)
            <option value="{{$authh->id}}" 
              @foreach($ebook->authers as $auth)
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
            // placeholder: "Select Author Name",
            allowClear: true
        });
</script> 


      <div class="row">
        <div class="col-25">
          <label for="category_id">Category</label>
        </div>
        <div class="col-75">
          <select name="category_id" id="category_id" class="form-control">
            <option value="">Select Book Category</option>
            @foreach($category as $cat)
                 <option value="{{ $cat->id }}" {{ $cat->id == $ebook->category_id ? 'selected' : '' }}>{{ $cat->c_name }}</option>
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
          <label for="selected_publisher_id">Publisher Name</label>
        </div>
        <div class="col-75">
          <select name="selected_publisher_id[]" id="selected_publisher_id" class="form-control" multiple="multiple" > 
          @foreach($publisher as $pub)
            <option value="{{$pub->id}}" 
              @foreach($ebook->publishers as $pubb)
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
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">

      $("#selected_publisher_id").select2({
            // placeholder: "Select Author Name",
            allowClear: true
        });
</script>      


      <div class="row">
        <div class="col-25">
          <label for="country_id">Publish Country</label>
        </div>
        <div class="col-75">
          <select name="country_id" id="country_id" class="form-control">
            <option value="">Select Country</option>
            @foreach($country as $con)
                 <option value="{{ $con->id }}" {{ $con->id == $ebook->country_id ? 'selected' : '' }}>{{ $con->country }}</option>
            @endforeach
         </select>
        </div>
      </div>

<script type="text/javascript">

      $("#country_id").select2({
            placeholder: "Select Book Category",
            allowClear: true
        });
</script>

      <div class="row">
        <div class="col-25">
          <label for="lname">Publish Date</label>
        </div>
        <div class="col-75">
          <input class="form-control" style="float: left;" type="date" id="lname" name="p_date"  value="{{ old('p_date') ?? $ebook->p_date }}">
        </div>
        <div style="color: red">{{ $errors->first('p_date') }}</div>
      </div>


      <div class="row">
        <input type="submit" value="Submit">
      </div>

    </form>
  </div>
</div>
@endif






@if(isset($ebook->magazine))

<div class="row">
  <div class="col-md-10 text-center" >
    <form method="post" action="/ebook_update/{{ $ebook->id }}" enctype="multipart/form-data">
      @method('PATCH')
      @csrf


      <div class="row">
        <div class="col-25">
          <label for="fname">Select Magazine</label>
        </div>
        <div class="col-75">
          <input class="form-control" type="file" id="fname" name="magazine" value="{{ old('magazine') ?? $ebook->magazine }}">
        </div>
        <div>{{ $errors->first('magazine') }}</div>
      </div>
 

      <div class="row">
        <div class="col-25">
          <label for="fname">Title</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" name="title" value="{{ old('title') ?? $ebook->title }}">
        </div>
        <div style="color: red">{{ $errors->first('title') }}</div>
      </div>
      
      <div class="row">
        <div class="col-25">
          <label for="lname">Book Edition</label>
        </div>
        <div class="col-75">
          <input type="text" id="lname" name="edition" value="{{ old('edition') ?? $ebook->edition }}">
        </div>
        <div style="color: red">{{ $errors->first('edition') }}</div>
      </div>


      <div class="row">
        <div class="col-25">
          <label for="selected_author_id">Authors</label>
        </div>
        <div class="col-75">
          <select name="selected_author_id[]" id="selected_author_id" class="form-control" multiple="multiple" > 
          @foreach($author as $authh)
            <option value="{{$authh->id}}" 
              @foreach($ebook->authers as $auth)
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
            // placeholder: "Select Author Name",
            allowClear: true
        });
</script>

      <div class="row">
        <div class="col-25">
          <label for="category_id">Category</label>
        </div>
        <div class="col-75">
          <select name="category_id" id="category_id" class="form-control">
            <option value="">Select Book Category</option>
            @foreach($category as $cat)
                 <option value="{{ $cat->id }}" {{ $cat->id == $ebook->category_id ? 'selected' : '' }}>{{ $cat->c_name }}</option>
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
          <label for="selected_publisher_id">Publisher Name</label>
        </div>
        <div class="col-75">
          <select name="selected_publisher_id[]" id="selected_publisher_id" class="form-control" multiple="multiple" > 
          @foreach($publisher as $pub)
            <option value="{{$pub->id}}" 
              @foreach($ebook->publishers as $pubb)
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
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">

      $("#selected_publisher_id").select2({
            // placeholder: "Select Author Name",
            allowClear: true
        });
</script>

      <div class="row">
        <div class="col-25">
          <label for="country_id">Publish Country</label>
        </div>
        <div class="col-75">
          <select name="country_id" id="country_id" class="form-control">
            <option value="">Select Country</option>
            @foreach($country as $con)
                 <option value="{{ $con->id }}" {{ $con->id == $ebook->country_id ? 'selected' : '' }}>{{ $con->country }}</option>
            @endforeach
         </select>
        </div>
      </div>
<script type="text/javascript">

      $("#country_id").select2({
            placeholder: "Select Book Category",
            allowClear: true
        });
</script>

      <div class="row">
        <div class="col-25">
          <label for="lname">Publish Date</label>
        </div>
        <div class="col-75">
          <input class="form-control" style="float: left;" type="date" id="lname" name="p_date"  value="{{ old('p_date') ?? $ebook->p_date }}">
        </div>
        <div style="color: red">{{ $errors->first('p_date') }}</div>
      </div>


      <div class="row">
        <input type="submit" value="Submit">
      </div>

    </form>
  </div>
</div>
@endif








@if(isset($ebook->videobook))

<div class="row">
  <div class="col-md-10 text-center" >
    <form method="post" action="/ebook_update/{{ $ebook->id }}" enctype="multipart/form-data">
      @method('PATCH')
      @csrf


      <div class="row">
        <div class="col-25">
          <label for="fname">Select Video Book</label>
        </div>
        <div class="col-75">
          <input class="form-control" type="file" id="fname" name="videobook" value="{{ old('videobook') ?? $ebook->videobook }}">
        </div>
        <div>{{ $errors->first('videobook') }}</div>
      </div>


       <div class="row">
        <div class="col-25">
          <label for="fname">Instructure Name</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" name="instructure" value="{{ old('instructure') ?? $ebook->instructure }}">
        </div>
        <div>{{ $errors->first('instructure') }}</div>
      </div>


      <div class="row">
        <div class="col-25">
          <label for="fname">Title</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" name="title" value="{{ old('title') ?? $ebook->title }}">
        </div>
        <div style="color: red">{{ $errors->first('title') }}</div>
      </div>
      
      <div class="row">
        <div class="col-25">
          <label for="lname">Book Edition</label>
        </div>
        <div class="col-75">
          <input type="text" id="lname" name="edition" value="{{ old('edition') ?? $ebook->edition }}">
        </div>
        <div style="color: red">{{ $errors->first('edition') }}</div>
      </div>



      <div class="row">
        <div class="col-25">
          <label for="selected_author_id">Authors</label>
        </div>
        <div class="col-75">
          <select name="selected_author_id[]" id="selected_author_id" class="form-control" multiple="multiple"> 
          @foreach($author as $authh)
            <option value="{{$authh->id}}" 
              @foreach($ebook->authers as $auth)
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
            // placeholder: "Select Author Name",
            allowClear: true
        });
</script>      


      <div class="row">
        <div class="col-25">
          <label for="category_id">Category</label>
        </div>
        <div class="col-75">
          <select name="category_id" id="category_id" class="form-control">
            <option value="">Select Book Category</option>
            @foreach($category as $cat)
                 <option value="{{ $cat->id }}" {{ $cat->id == $ebook->category_id ? 'selected' : '' }}>{{ $cat->c_name }}</option>
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
          <label for="selected_publisher_id">Publisher Name</label>
        </div>
        <div class="col-75">
          <select name="selected_publisher_id[]" id="selected_publisher_id" class="form-control" multiple="multiple" > 
          @foreach($publisher as $pub)
            <option value="{{$pub->id}}" 
              @foreach($ebook->publishers as $pubb)
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
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">

      $("#selected_publisher_id").select2({
            // placeholder: "Select Author Name",
            allowClear: true
        });
</script>

      <div class="row">
        <div class="col-25">
          <label for="country_id">Publish Country</label>
        </div>
        <div class="col-75">
          <select name="country_id" id="country_id" class="form-control">
            <option value="">Select Country</option>
            @foreach($country as $con)
                 <option value="{{ $con->id }}" {{ $con->id == $ebook->country_id ? 'selected' : '' }}>{{ $con->country }}</option>
            @endforeach
         </select>
        </div>
      </div>
<script type="text/javascript">

      $("#country_id").select2({
            placeholder: "Select Book Category",
            allowClear: true
        });
</script>


      <div class="row">
        <div class="col-25">
          <label for="lname">Publish Date</label>
        </div>
        <div class="col-75">
          <input class="form-control" style="float: left;" type="date" id="lname" name="p_date"  value="{{ old('p_date') ?? $ebook->p_date }}">
        </div>
        <div style="color: red">{{ $errors->first('p_date') }}</div>
      </div>


      <div class="row">
        <input type="submit" value="Submit">
      </div>

    </form>
  </div>
</div>
@endif




</div>


@endsection