@extends('layouts.app')


      


<style>
body{
  background-image: url('images/img1.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
</style>





@section('content')


<div class="container">





    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                
                
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                     @if(Auth::user()->checkAdmin())
                    <div class="row text-center">
                        <div class="col-sm-4">
                            <a href="/management">
                                <h4>Managment</h4>
                            </a>
                        </div>
						@endif
                        
                        <div class="col-sm-4">
                            <a href="/cashier">
                                <h4>Cashier</h4>
                            </a>
                        </div>
                        
                        <div class="col-sm-4">
                            
                            <a href="/feedback">
                                <h4>Feedback</h4>
                            </a>
                        </div>
                        <div class="card-body">

                        <body>
<video height="300px" width="500px" autoplay="true" loop="true"  controls>
      <source src="images/video2.mp4" type="video/mp4">
      </video>
</body>
</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


