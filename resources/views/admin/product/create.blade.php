@extends('admin.includes.main_admin')
@section('title','New Product')
@section('content')

<div class="container">
  <div class="row">
    @include('admin.includes.sidebar_admin')
    
      <div class="col-md-9">
        <div class="panel panel-primary">
          <div class="panel-heading">All Product</div>
            <div class="panel-body">
              
              <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                  <label for="title">Title :</label>
                  <input type="text" name="title" class="form-control" placeholder="title..">
                </div>
                <div class="form-group">
                  <label for="price">Price :</label>
                  <input type="text" name="price" class="form-control" placeholder="price..">
                </div>
                <div class="form-group">
                  <label for="description">Description :</label>
                  <textarea type="text" name="description" class="form-control" placeholder="Description.."></textarea>
                </div>
                <div class="form-group">
                  <label for="category_id">Category :</label>
                  <select name="category_id" class="form-control">
                  <option value="" disabled selected>Select Category</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="image">Image :</label>
                  <input type="file" name="image" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
              </form>
            </div>
        </div>
      </div>
   </div>
</div>

@endsection