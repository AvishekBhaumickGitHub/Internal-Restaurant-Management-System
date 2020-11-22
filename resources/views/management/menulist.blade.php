@extends('layouts.app')

<body background="/images/img18.jpg" style="background-repeat:no-repeat;
	background-attachment: fixed;
  background-size: 100% 100%">

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <h1 style="color:white;font-family:verdana;font-size:40px">Menulist</h1>
        <hr>
        @if(Session()->has('status'))
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">X</button>
            {{Session()->get('status')}}
          </div>
        @endif
        <table class="table table-bordered" style="background-color:#cc6666">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Price</th>
			  <th scope="col">Picture</th>
              <th scope="col">Description</th>
              <th scope="col">Category</th>
          </thead>
          <tbody>
            @foreach($menus as $menu)
              <tr style="background-color:#f5f3a4">
                <td>{{$menu->id}}</td>
                <td>{{$menu->name}}</td>
                <td>{{$menu->price}}</td>
				<td>
                  <img src="{{asset('menu_images')}}/{{$menu->image}}" alt="{{$menu->name}}" width="120px" height="120px" class="img-thumbnail">
                </td>
                <td>{{$menu->description}}</td>
                <td>{{$menu->category->name}}</td>
                
                  </form>
                </td>
              </tr>
            @endforeach 
          </tbody>
        </table>
        {{$menus->links()}}
      </div>
    </div>
  </div>
@endsection