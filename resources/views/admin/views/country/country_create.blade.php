@extends("admin.layouts.layout")
@section("title","Add Country")

@section("content")

<section class="content-header">
  <h1>
    Add Country
    <small>Page</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section></br>

<div class="container p-4">
 <a href="{{ route('country.index') }}">
  <button class="button button2" style="background-color: #008CBA; margin: 4px 2px; text-align: center; text-decoration: none; font-size: 16px; padding: 8px 3.5%; color: white; border-radius: 12%; border-radius: 1%;">
  Back</button>
</a>

/*--------------------------------------------------------------------------
| create puts in publisher_index.blade.php
|--------------------------------------------------------------------------*/



@endsection