@extends('layouts.app')

<body background="/images/img21.jpg" style="background-repeat:no-repeat;
	background-attachment: fixed;
  background-size: 100% 100%">

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      @include('management.inc.sidebar')
      <div class="col-md-8">
        Change User Password({{$user->name}})
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
        <form action="/management/user/{{$user->id}}/updatePassword" method="POST">
        <!-- as teh updatePassword function is user created,so we have to also define the name of the function in the href -->
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="Old Password">Old Password</label>
            <input type="password" id="myInput1" name="oldpass" class="form-control" placeholder="Old Password...">
          </div>
          <input type="checkbox" onclick="myFunction1()">&nbsp Show Password<br><br>
          <div class="form-group">
            <label for="New Password">New Password</label>
            <input type="password" id="myInput2" name="newpass" class="form-control" placeholder="New Password...">
          </div>
          <input type="checkbox" onclick="myFunction2()">&nbsp Show Password<br><br>
          <div class="form-group">
            <label for="Confirm Password">Confirm Password</label>
            <input type="password" id="myInput3" name="cpass" class="form-control" placeholder="Confirm Password...">
          </div>
          <input type="checkbox" onclick="myFunction3()">&nbsp Show Password<br><br>
          
        
          <button type="submit" class="btn btn-primary">Save Change</button>
        </form>
      </div>
    </div>
  </div>

  <script>
  function myFunction1() {
  var x = document.getElementById("myInput1");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

function myFunction2() {
  var x = document.getElementById("myInput2");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

function myFunction3() {
  var x = document.getElementById("myInput3");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

@endsection