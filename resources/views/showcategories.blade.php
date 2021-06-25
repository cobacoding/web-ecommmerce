@extends('layouts.includes.main')
@section('title',"$categories2->name")
@section('content')
  
        <div class="container" style="margin-top: 100px;">
          <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Category</a></li>      
          </ul>
         <div class="row">
            @foreach($categories2->products as $product)
           <div class="col-md-3">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-body">
                    <div class="thumnail-image">
                     <img src="{{asset('/images/'.$product->image)}}" alt="" />
                    </div>
                    <div class="info-product">
                    <button  data-toggle="modal" data-target="#{{$product->id}}-product_detail_modal">Product Info <i class="fa fa-info-circle"></i></button>
                    </div>
                    <div class="title-product"> <h4>{{$product->title}}</h4></div>
                    <div class="size"> 
                    <span class="fa fa-star star_color"></span>
                    <span class="fa fa-star star_color"></span>
                    <span class="fa fa-star star_color"></span>
                    <span class="fa fa-star-o"></span>
                    <span class="fa fa-star-o"></span>
                    <i class="label label-warning">{{$product->category->name}}</i>
                    </div>
                    <div class="price">  <p><b>Rp.</b> {{$product->price}}</p></div>
                    <div class="addToCart">
                     {{-- <i class="fa fa-heart-o"></i>
                     <i class="fa fa-share"></i> --}}
                     <a href="{{route('addToCart', $product->id)}}" class="btn btn-primary btn-block"><i class="fa fa-cart-plus"></i>Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
 <!-- Modal -->
<div id="{{$product->id}}-product_detail_modal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><b>{{$product->title}}</b></h4>
      </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-8">  
                <div class="panel-group" style="margin-bottom: 0;">
                <div class="panel panel-default">
                <div class="panel-body">
                 <div class="thumnail-image">
                <img src="{{asset('/images/'.$product->image)}}" alt="" />
                </div>
                <div class="title-product"> <h4>{{$product->title}}</h4></div>  
                <div class="size"> 
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star-o"></span>
                <span class="fa fa-star-o"></span>
                <i class="label label-warning">{{$product->category->name}}</i>
              </div>
                <div class="price">  <p><b>Rp.</b> {{$product->price}}</p></div>
                <div class="addToCart">
                     {{-- <i class="fa fa-heart-o"></i>
                     <i class="fa fa-share"></i> --}}
                     <a href="{{route('addToCart', $product->id)}}" class="btn btn-primary pull-right btn-sm"><i class="fa fa-cart-plus"></i>Add to Cart</a>
                </div>
                </div>
              </div>
             </div>
            </div>
            <div class="col-md-4">
               <div class="category-product">
                    <i class="fa fa-list"></i> <b>Category: </b>
                    <p>{{$product->category->name}}</p>
               </div>
                 <!-- <div class="category-product">
                    <i class="fa fa-th-large"></i> <b>Size: </b>
                    <p>S, M, L, XL</p>
               </div> -->
              
               <div class="description-product">
               <i class="fa fa-info-circle"></i> <b>Description:</b>
               <p>{{$product->description}}</p>
            
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach
</div>
        
        <!-- <div class="container">
            <div class="text-right">
                    
            </div>
        </div> -->
</div><br>
        <div class="container-fluid">
          <div class="jumbotron jumbotron-bg" style="background-color: #099; color: #fff;">
            <h1>Hot!</h1> 
            <button class="btn btn-success">Promo</button>
          </div>
         </div> 

@endsection

 