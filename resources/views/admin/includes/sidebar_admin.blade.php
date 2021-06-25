<div class="col-md-3">
    <div class="panel panel-primary">
      <div class="panel-heading">Menu</div>
        <div class="list-group"> 
	       <a data-toggle="collapse" href="#orders" class="list-group-item">Orders</a>
          <div id="orders" class="panel-collapse collapse">
        	<div class="panel-footer"> </div>
          <div class="panel-body">
              <a href="{{route('allOrders')}}" class="list-group-item">All Orders</a>
              <a href="{{route('pendingOrders')}}" class="list-group-item">Pending Orders</a>
              <a href="{{route('deliveredOrders')}}" class="list-group-item">Delivered</a>
          </div>
          </div>
              <a data-toggle="collapse" href="#product" class="list-group-item">Products</a>
          <div id="product" class="panel-collapse collapse">
          <div class="panel-body">
              <a href="{{route('product.index')}}" class="list-group-item">All Products</a>
              <a href="{{route('product.create')}}" class="list-group-item">Create Product</a>
        </div>
    <div class="panel-footer"> </div>
</div>
 
<a data-toggle="collapse" href="#category" class="list-group-item">Categories</a>

    <div id="category" class="panel-collapse collapse">
    	<div class="panel-footer"> </div>
      <div class="panel-body">
      	  <a href="{{route('category.index')}}" class="list-group-item">All Categories</a> 
          <a href="{{route('category.create')}}" class="list-group-item">Add Category</a> 
      </div>
 
    </div>
</div>
 
    </div>
      <div class="alert alert-info"> </div>
      <div class="alert alert-warning"> </div>
      <div class="alert alert-info"> </div>
 
        </div>

