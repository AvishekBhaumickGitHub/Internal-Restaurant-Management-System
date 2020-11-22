@extends('layouts.app')

@section('content')

  <div >
   
      <div class="col-md-8">
      <label ><h3>Our Menus</h3></label>
        
        <br><br>
		<div class="card">
        <table class="table table-bordered"  >
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Menu Name</th>
              <th scope="col">Description</th>
              <th scope="col">Picture</th>
               <th scope="col">Category</th>
               <th scope="col">Price</th>
              <th scope="col">Quantity/Order</th>
              <th scope="col">Remove Order</th>

             
              
             </tr>
          </thead>

          </thead>
          <tbody>
          @foreach($menus as $menu)
              <tr>
                <td>{{$menu->id}}</td>
                <td>{{$menu->name}}</td>
                <td>{{$menu->description}}</td>
                <td>
                  <img src="{{asset('menu_images')}}/{{$menu->image}}" alt="{{$menu->name}}" width="120px" height="120px" class="img-thumbnail">
                </td>
                <td>{{$menu->category->name}}</td>
                <td>{{$menu->price}}</td>
                <td><div class="col-lg-12">
    <div class="input-group">
      <input type="number" class="form-control" placeholder="Quantity...">
      <span class="input-group-btn">
        <button class="btn btn-primary" type="button">Place!</button>
      </span>
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
               
                <td><button type="submit" value="" class="btn btn-danger">REMOVE</button>
                </td>
              </tr>
            @endforeach  
            
          </tbody>
		  
        </table>
		</div><br>
       <div class="container">
  
   <a class="btn btn-success btn-block" href="/cashier/showOrder" role="button">View Order</a>
  
            </div>
      </div>
    </div>
@endsection