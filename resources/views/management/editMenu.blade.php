@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      @include('management.inc.sidebar')
      <div class="col-md-8">
        Edit a Menu
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
        <form action="/management/menu/{{$menu->id}}" method="POST"  enctype="multipart/form-data">
          @csrf
		  @method('PUT')
          <div class="form-group">
            <label for="menuName">Menu Name</label>
            <input type="text" value="{{$menu->name}}" name="name" class="form-control" >
          </div>
          <label for="menuPrice">Price</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">&#8377;</span>
            </div>
            <input type="text" value="{{$menu->price}}" name="price" class="form-control" aria-label="Amount (to the nearest dollor)">
            <div class="input-group-append">
            <span class="input-group-text">.00</span>
            </div>
          </div>
		  <label for="MenuImage">Image</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Upload</span>
            </div>
            <div class="custom-file">
              <input type="file" name="image">
            </div>
          </div>
          <div class="form-group">
            <label for="Description">Description</label>
            <input type="text" value="{{$menu->description}}" name="description" class="form-control" >
          </div>
          <div class="form-group">
            <label for="Category">Category</label>
            <select class="form-control" name="category_id">
              @foreach($category as $c)
			  @if($menu->category_id==$c->id)
                <option value="{{$c->id}}" selected>{{$c->name}}</option>
			@else
				<option value="{{$c->id}}">{{$c->name}}</option>
			@endif
			
              @endforeach
            </select>
          </div>

          <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
@endsection
