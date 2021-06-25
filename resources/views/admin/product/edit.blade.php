@extends('admin.includes.main_admin')
@section('title','Edit Product')
@section('content')

<div class="container">
  <div class="row">
    @include('admin.includes.sidebar_admin')
    
      <div class="col-md-9">
        <div class="panel panel-primary">
          <div class="panel-heading">Edit Product</div>
            <div class="panel-body">
              
              <form action="{{route('product.update', $product->id)}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                {{method_field('put')}}
                <div class="form-group">
                  <label for="title">Title :</label>
                  <input type="text" name="title" class="form-control" value="{{$product->title}}" required>
                </div>
                <div class="form-group">
                  <label for="price">Price :</label>
                  <input type="text" name="price" class="form-control" value="{{$product->price}}">
                </div>
                <div class="form-group">
                  <label for="description">Description :</label>
                  <input type="text" name="description" class="form-control" value="{{$product->description}}">
                </div>
                <div class="form-group">
                  <label for="category_id">Category :</label>
                  <select name="category_id" class="form-control">
                  <option value="" disabled selected>Select Category</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}" <?php if($product->category_id == $category->id){echo "selected";}?>>{{$category->name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="image">Image :</label>
                  <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                  <img src="{{asset('/images/'.$product->image)}}" style="width: 40%" height="200px">
                </div>
                <button type="submit" class="btn btn-success">Update</button>
              </form>
            </div>
        </div>
      </div>
   </div>
</div>

@endsection