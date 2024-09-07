@extends("admin.layouts.layout")
@section("title","Check Book Copies")

@section("content")

<section class="content-header">
  <h1>
    Check Book Copies Avalible
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section></br>

<div class="container p-4">
 <a href="{{ route('bookissue.index') }}">
  <button class="button button2" style="background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 16px; padding: 8px 3.5%; color: white; border-radius: 12%; border-radius: 1%;">
  View Book Issues
</button>
</a>


<div class="row">
  <div class="col-md-10 text-center" >      
    <form method="post" action="bookissue_store">
      @csrf

      <div class="row">
        <div class="col-25">
          <label for="book_id">Book Title</label>
        </div>
        <div class="col-75">
          <select name="book_id" id="book_id" class="form-control" onchange="checkQty(this.value)">
            <option value="" disabled>Select Book</option>
            @foreach($book as $bk)
                 <option value="{{ $bk->id }}">{{ $bk->b_title }}</option>
            @endforeach
         </select>
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="total_copies">Total Copies</label>
        </div>
        <div class="col-75">
          <input type="text" name="total_copies" id="total_copies" class="form-control" readonly="readonly">
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="avalible_copies">Available Copies</label>
        </div>
        <div class="col-75">
          <input type="text" name="avalible_copies" id="avalible_copies" class="form-control" readonly="readonly">
        </div>
      </div>

    </form>
  </div>
</div>
</div>

<script type="text/javascript">

  function checkQty(id) {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function()
      {
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
          {
              var res = JSON.parse(xmlhttp.responseText);
              document.getElementById("avalible_copies").value = res[1];
              document.getElementById("total_copies").value = res[0];
            }
        };

        var url = "{{ route('book.avaliblecopies','sid')}}";
        url = url.replace('sid',id);
        xmlhttp.open("get", url, true);
        xmlhttp.send();
        
}
</script>



@endsection