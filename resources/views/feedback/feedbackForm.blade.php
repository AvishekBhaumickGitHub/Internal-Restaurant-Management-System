@extends('layouts.app')

<style>
*{
    margin: 0;
    padding: 0;
}
.rate {
    float: left;
    height: 46px;
    margin-left: 168px;
    padding:0  10px;
}
.rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}
.rate > input:checked ~ label {
    color: #ffc700;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}
</style>


@section('content')
        @if($errors->any())
          <div class="alert alert-danger">
              <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
              </ul>
          </div>
        @endif
        @if(Session()->has('status'))
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">X</button>
            {{Session()->get('status')}}
          </div>
        @endif
		<body background="background/pasta.jpg" style="background-repeat:no-repeat;
	background-attachment: fixed;
  background-size: 100% 100%">
    <center><div class="card" style="width:500px">
        <form action="/feedbackform" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group">
            <h1 for="CustName">Customer Name</h1>
            <input type="text" name="name" class="form-control" placeholder="Name..." style="width:200px">
          </div>
          <div class="form-group">
            <h1 for="Phone number">Phone Number</h1>
            <input type="text" name="phno" class="form-control" placeholder="Phone Number..." style="width:200px">
          </div>
          <div class="form-group">
            <h1 for="Rating">Rating(Select one)</h1>
            <select name="rate" class="form-control" style="width:200px">
            <option value="Satisfied">Satisfied</option>
            <option value="Dissatisfied">Dissatisfied</option>
            </select></div>
            <h1 for="Star Rating">Rate Us</h1>
            <div class="rate">
    <input type="radio" id="star5" name="star" value="5" />
    <label for="star5" title="text">5 stars</label>
    <input type="radio" id="star4" name="star" value="4" />
    <label for="star4" title="text">4 stars</label>
    <input type="radio" id="star3" name="star" value="3" />
    <label for="star3" title="text">3 stars</label>
    <input type="radio" id="star2" name="star" value="2" />
    <label for="star2" title="text">2 stars</label>
    <input type="radio" id="star1" name="star" value="1" />
    <label for="star1" title="text">1 star</label>
  </div>
          
          <div class="form-group">
            <textarea  name="feedback" rows="10" cols="50" placeholder="Feedback...." class="form-control" style="width:400px">
            </textarea>
          </div>
          <button type="submit" class="btn btn-primary">Submit Feedback</button>
        </form>
    </div></center>
	</body>
@endsection