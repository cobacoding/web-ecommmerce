@extends('layouts.includes.main')
@section('title','Homepage')
@section('content')
 
 <div class="container-fluid">
    <div class="row">
        {{-- <div class="col-md-4">
              <div class="header_wrap"></div>
        </div>
        <div class="col-md-8">
            <div class="header_wrap">
               <div class="info">
                 <div class="header_info">
                    <div class="descrip">
                        <a href="#"><h1 style=" font-weight: bold;     margin-top: 0;">WELCOME</h1></a> 
                        <p>
                           Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, omnis doloremque non cum id reprehenderit, quisquam totam aspernatur tempora minima unde aliquid ea culpa sunt.
                           </p><br>
                            <div><p>
                            <a href="#" class="btn btn-warning" >Singup</a>
                            <a href="#" class="btn btn-primary" >Login</a>
                            </p></div>
                         </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
              <div class="item active">
                <img src="{{asset('/images/slide/bg1.png')}}" alt="Los Angeles">
              </div>

              <div class="item">
                <img src="{{asset('/images/slide/bg3.png')}}" alt="Chicago">
              </div>

              <!-- <div class="item">
                <img src="{{asset('/images/slide/slide3.jpg')}}" alt="New York">
              </div> -->
            </div>

          </div>

    </div>
 </div>
        <section class="section">
                <div class="container">
                    <div class="row text-center">
                        <p class="h1">Happy Shopping</p>
                        <p class="lead">Online shopping makes everything so much easier.</p>
                    </div>
                </div>
        </section>
 
        <div class="container">
         <div class="row">
            @foreach($products as $product)
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
                    <span class="fa fa-star star_color"></span>
                    <span class="fa fa-star star_color"></span>
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
                <span class="fa fa-star star_color"></span>
                <span class="fa fa-star star_color"></span></div>
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
        <!-- <div class="show_more">
            <a href="#" class="btn btn-default">Show more >>></a>
        </div> -->

        <div class="container">
            <div class="text-right">
                {!!$products->links()!!}    
            </div>
        </div>
</div><br>
        <div class="container-fluid">
          <div class="jumbotron jumbotron-bg" style="background-color: #099; color: #fff;">
            <h1>Hot!</h1> 
            <button class="btn btn-success">Promo</button>
          </div>
         </div> 

@endsection

 