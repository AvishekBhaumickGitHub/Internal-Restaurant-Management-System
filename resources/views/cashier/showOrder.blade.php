@extends('layouts.app')

@section('content')
@if($order==false)
<div class="jumbotron">
  <h1>Oops!Your Food Cart Is Empty</h1>
  
  <p><a class="btn btn-primary btn-lg" href="/cashier" role="button">Menu List</a></p>
</div>
@else
	

  <div >
   
      <div class="col-md-8">
      <label ><h3>Your Food Cart </h3></label>
        
        <br><br>
		<div class="card">
        <table class="table table-bordered"  >
          <thead>
            <tr>
              
              <th scope="col">Menu Name</th>
               <th scope="col">Category</th>
               <th scope="col">Menu Price</th>
              <th scope="col">Quantity/Order</th>
              <th scope="col">Cost</th>
             </tr>
          </thead>
          </thead>
          <tbody>
		  @foreach($menus as $menu)
              <tr>
                
                <td>{{$menu->menu_name}}</td>
                <td>{{$menu->category}}</td>
                <td>{{$menu->price}}</td>
				<td>{{$menu->qty}}</td>
				<td>{{$menu->total_price}}</td>

               
              </tr>
            @endforeach  
            
          </tbody>
		  
        </table>
		</div><br>
       <div class="container">
	   <a class="btn btn-success btn-lg" href="/cashier" role="button">Menu List</a>
  
   <a class="btn btn-success btn-lg" href="/cashier/showOrder" role="button">Confirm Order</a>
  
            </div>
      </div>
    </div>
	@endif
@endsection