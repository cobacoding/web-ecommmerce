@extends('admin.includes.main_admin')
@section('title','New Category')
@section('content')

<div class="container">
  <div class="row">
    @include('admin.includes.sidebar_admin')
    
      <div class="col-md-9">
        <div class="panel panel-primary">
          <div class="panel-heading">Create New Category</div>
            <div class="panel-body">
              
              <form action="{{route('category.store')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                  <label for="name">Name :</label>
                  <input type="text" name="name" class="form-control" placeholder="name..">
                </div>
                
                <button type="submit" class="btn btn-success">Submit</button>
              </form>
            </div>
        </div>
      </div>
   </div>
</div>

@endsection