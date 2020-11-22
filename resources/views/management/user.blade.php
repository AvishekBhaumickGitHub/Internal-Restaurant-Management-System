@extends('layouts/app')

<body background="/images/img2.jpg" style="background-repeat:no-repeat;
	background-attachment: fixed;
  background-size: 100% 100%">



@section('content')

  <div class="container">
    <div class="row justify-content-center">
      @include('management.inc.sidebar')
      <div class="col-md-8">
        Category
        <a href="/management/user/create" class="btn btn-success btn-sm float-right" > Create User</a>
        <hr>

        @if(Session()->has('status'))
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">X</button>
            {{Session()->get('status')}}
          </div>
        @endif

        <table class="table table-bordered" style="background-color:#f5f3a4">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Role</th>
              <th scope="col">Email</th>
              <th scope="col">Edit</th>
			  <th scope="col">ChangePassword</th>
              <th scope="col">Delete</th>
			  
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
              <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->role}}</td>
                <td>{{$user->email}}</td>
                <td><a href="/management/user/{{$user->id}}/edit" class="btn btn-warning">Edit</a></td>
				<td><a href="/management/user/{{$user->id}}/editPassword" class="btn btn-primary btn-sm float-right" >ChangePassword</a></td>
                
                <td>
                  <form action="/management/user/{{$user->id}}" method="post">
                    @csrf 
                    @method('DELETE')
                    <input type="submit" value="Delete" class="btn btn-danger">
                  </form>
                </td>
				
              </tr>
            @endforeach 
          </tbody>
        </table>

      </div>
    </div>
  </div>

@endsection
