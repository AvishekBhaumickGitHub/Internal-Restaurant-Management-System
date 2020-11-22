@extends('layouts.app')

<body background="/images/img21.jpg" style="background-repeat:no-repeat;
	background-attachment: fixed;
  background-size: 100% 100%">

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      @include('management.inc.sidebar')
      <div class="col-md-8" >
      <h1 style="color:black;font-family:verdana;font-size30px">Edit a user</h1>
        <hr>
        @if($errors->any())
          <div class="alert alert-danger">
              <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
              </ul>
          </div>
        @endif
        <form action="/management/user/{{$users->id}}" method="POST" >
        <!-- as the update function is created through migration,so we do not need to decleare the function in href and we have to only decleare the method('PUT') in order to use the update function -->
          @csrf
		  @method('PUT')
          <div class="form-group">
            <label for="Name"> <h1 style="color:black;font-family:verdana;font-size:20px">Name</h1> </label>
            <input type="text" value="{{$users->name}}" name="name" class="form-control" >
          </div>
          <div class="form-group">
            <label for="Email"> <h1 style="color:black;font-family:verdana;font-size:20px">Email</h1> </label>
            <input type="text" value="{{$users->email}}" name="email" class="form-control" >
          </div>




		  
          <div class="form-group">
			     <label><h1 style="color:black;font-family:verdana;font-size:20px">Password</h1></label>
		    	<input type="password" id="myInput" name="password" class="form-control" data-toggle="password"><br>
          <input type="checkbox" onclick="myFunction()">&nbsp Show Password
		      </div>

          <div class="form-group">
            <label for="Role"><h1 style="color:black;font-family:verdana;font-size:20px">Role</h1></label>
            <select class="form-control" name="role">
			@if($users->role=="admin")
              <option value="admin" >Admin</option>
		  <option value="cashier" >Cashier</option>
		  @else
              <option value="cashier" >Cashier</option>
		  <option value="admin" >Admin</option>
		  @endif
            </select>
          </div>

          <button type="submit" class="btn btn-primary">Update</button>
        </form>
      </div>
    </div>
  </div>
<script>
  function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

@endsection
