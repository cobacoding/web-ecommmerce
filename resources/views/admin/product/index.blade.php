@extends('admin.includes.main_admin')
@section('title','Home Product')
@section('content')

<div class="container">
  <div class="row">
    @include('admin.includes.sidebar_admin')
      <div class="col-md-9">
        <div class="panel panel-primary">
          <div class="panel-heading">All Product</div>
            <div class="panel-body">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                  <tbody>
                    @foreach($products as $product)
                    <tr>
                      <td width="120"><img src="{{asset('/images/'.$product->image)}}" style="width: 100%"></td>
                      <td>{{$product->title}}</td>
                      <td>{{$product->price}}</td>
                      <td>{{$product->description}}</td>
                      <td>
                        <a href="{{route('product.edit', $product->id)}}" class="btn btn-warning btn-sm">Edit</a>
                      </td>
                      <td>
                        <form action="{{route('product.destroy',$product->id)}}" method="post">
                          {{csrf_field()}}
                          {{method_field('DELETE')}}
                          <button onclick="return confirm('Are You Sure Delete ?')" type="submit" class="btn btn-sm btn-danger"> Delete</button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
              </table>
            </div>
        </div>
          <div class="text-right">
            {!!$products->links();!!}
          </div>
      </div>
   </div>
</div>

@endsection