@extends('layouts.app')


@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body background="background/food.jpg" style="background-repeat:no-repeat;
	background-attachment: fixed;
  background-size: 100% 100%">
     @foreach($fback as $f)
	 <center>
	 <div class="card" style="width:500px">
	 <div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Name:{{$f->name}}<br>Posted on:{{$f->created_at}}<br>
	@if($f->star=="1")
	<span class="fa fa-star checked" style='font-size:40px;color:yellow'></span>
	<span class="fa fa-star"></span>
	<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
	@elseif($f->star=="2")
	<span class="fa fa-star checked" style='font-size:40px;color:yellow'></span>
<span class="fa fa-star checked" style='font-size:40px;color:yellow'></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
	@elseif($f->star=="3")
	<span class="fa fa-star checked" style='font-size:40px;color:yellow'></span>
<span class="fa fa-star checked" style='font-size:40px;color:yellow'></span>
<span class="fa fa-star checked" style='font-size:40px;color:yellow'></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
@elseif($f->star=="4")
<span class="fa fa-star checked" style='font-size:40px;color:yellow'></span>
<span class="fa fa-star checked" style='font-size:40px;color:yellow'></span>
<span class="fa fa-star checked" style='font-size:40px;color:yellow'></span>
<span class="fa fa-star checked" style='font-size:40px;color:yellow'></span>
<span class="fa fa-star"></span>
	@else
	<span class="fa fa-star checked" style='font-size:40px;color:yellow'></span>
<span class="fa fa-star checked" style='font-size:40px;color:yellow'></span>
<span class="fa fa-star checked" style='font-size:40px;color:yellow'></span>
<span class="fa fa-star checked" style='font-size:40px;color:yellow'></span>
<span class="fa fa-star checked" style='font-size:40px;color:yellow'></span>
	@endif

	@if($f->rating=="Satisfied")
		<i class='fas fa-smile' style='font-size:40px;color:green'></i>
	@else
		<i class='far fa-angry' style='font-size:40px;color:red'></i>
	@endif
	</h3>
  </div>
  <hr style=" border: 1px solid black">
  <div class="panel-body">
 <h3>Feedback: {{$f->feedback}}</h3>
  </div>
  
</div>
</div></center><br><br>
	 @endforeach
	<div style="margin-left:20px;">{{$fback->links()}}</div>
</body>	
	 
@endsection