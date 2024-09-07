@extends("admin.layouts.layout")
@section("title","Add Category")

@section("content")

<section class="content-header">
  <h1>
    Add Book Category
    <small>Page</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section></br>

<div class="container p-4">
  <a href="{{ route('category.index') }}">
    <button class="button button2" style="background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 16px; padding: 8px 3.5%; color: white; border-radius: 12%; border-radius: 1%;">
    View Category List</button>
  </a>



  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <div class="table-responsive">


          <form method="post" action="/category_store">

            {{ @csrf_field()}}


            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Sr.no</th>
                  <th>Book Catagory</th>
                  <th style="text-align: center"><a href="#" class="btn btn-info addRow">+</a></th>
                </tr>
              </thead>
              <tbody id="addRows">
                <tr>
                  <td>1</td>
                  <td><input type="text" name="c_name[]" class="form-control"></td>

                  <td style="text-align: center"><a href="#" class="btn btn-danger remove">-</a></td>
                </tr>
                   <div style="color: red">{{ $errors->first('c_name[]') }}</div>

              </tbody>
              <tfoot>
                <tr>
                  <td colspan="1" align="right"><br></td>
                  <td>
                    <input type="submit" name="submit" id="submit" class="btn btn-primary" value="submit">
                  </td>
                </tr>  
              </tfoot>
            </table>

          </form> 
        </div>

      </div>
    </div>
  </div>
</div>



@endsection