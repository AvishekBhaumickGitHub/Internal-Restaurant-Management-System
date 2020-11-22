@extends('layouts.app')

<body background="/images/img20.jpg" style="background-repeat:no-repeat;
	background-attachment: fixed;
  background-size: 100% 100%">

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      @include('management.inc.sidebar')
      <div class="col-md-8">
        Category
        <a href="/management/category/create" class="btn btn-success btn-sm float-right"> Create Category</a>
        <hr>

        @if(Session()->has('status'))
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">X</button>
            {{Session()->get('status')}}
          </div>
        @endif
<!-- This table is used to print the data table -->
        <table class="table table-bordered" style="background-color:#ffffcc">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Category</th>
              <th scope="col">Edit</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>
          <!-- This part is used to fetch the values from the data base-->
            @foreach($categories as $category)
              <tr>
                <th scope="row">{{$category->id}}</th>
                <td>{{$category->name}}</td>
                <td>
                  <a href="/management/category/{{$category->id}}/edit" class="btn btn-warning">Edit</a>
                </td>
                <td>
                <form action="/management/category/{{$category->id}}" method="post">
                  @csrf
                  @method('DELETE')
                  <input type="submit" value="Delete" class="btn btn-danger">
                </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        {{$categories->links()}}
      </div>
    </div>
  </div>
@endsection