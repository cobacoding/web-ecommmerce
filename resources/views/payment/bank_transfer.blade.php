@extends('layouts.includes.main')
@section('title','Bank Transfer')
@section('content')

<div class="container" style="margin-top: 100px;"> 
  <ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="#">Home</a></li>
  <li class="breadcrumb-item"><a href="#">Payment Method</a></li>
  <li class="breadcrumb-item active">Bank Transfer</li>
</ol>
<div class="row">
<div class="col-md-8 ">
  <div class="panel panel-default">
    <div class="panel-heading">Bank Transfer</div>
      <div class="panel-body" style="background:rgb(217, 237, 247)">
 
  <form action="{{route('bankTransferSubmitOrder')}}" method="post">
    {{csrf_field()}}
    <div class="form-group">
      <label for="full_name">Full Name</label>
      <input type="text" name="full_name" class="form-control" value="{{Auth::user()->name}}" placeholder="Full Name.." required>
    </div>
    <div class="form-group">
      <label for="address">Address</label>
      <textarea type="text" name="address" class="form-control" placeholder="Address.." required></textarea>
    </div>
    <div class="form-group">
      <label for="city">City</label>
      <input type="text" name="city" class="form-control" placeholder="City.." required>
    </div>
    <div class="form-group">
      <label for="phone">Phone</label>
      <input type="text" name="phone" class="form-control" placeholder="Phone.." required>
    </div>
    <div class="form-group">
      <label for="zip">Zip Code</label>
      <input type="text" name="zip" class="form-control" placeholder="Zip Code.." required>
    </div>
      <button type="submit" class="btn btn-success btn-block">Submit</button>
   </form>
  </div> <!-- panel body -->
 
       <div class="panel-footer">
          <div class="row">
            <div class="panel-footer">
           </div>
            <div class="col-md-7">
              <a href="{{route('paymentMethod')}}" class="btn btn-success" style="background-color: #303734; border: none"><< Payment Method</a>
                </div>
                <div class="col-md-5">
                </div>
               </div>
            </div> <!-- panel footer -->     
          </div>
      </div> <!-- col md 8 -->

         <div class="col-md-4">
        <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading"><div class="text-center">Info!</div></div>
           <div class="panel-body">
              <div class="alert alert-warning" style=" margin-bottom: 0px;">
               <div class="row">
                 <div class="col-md-8">
                     <b>
                      Items: {{Cart::count()}} <br>
                      <!-- Tax: Rp. {{Cart::tax()}}<br> 
                      Sub Total: Rp. {{Cart::subtotal()}}<br> -->
                      Grand Total: Rp. {{Cart::total()}}
                      </b>
                </div>
                  <!-- <div class="col-md-7">
                      <b>
                        
                        </b>
                  </div> -->
               </div>
            </div>
        </div>
      </div>
     </div>
      <div class="panel-group">
        <div class="panel panel-default">
           <div class="panel-body">
              <div class="alert alert-info" style=" margin-bottom: 0px;">
                <p>Please transfer to:</p>
                <h4>Bank BCA : 1234567890</h4> 
                 <p>a.n Roy Alexander</p>
              </div>
            </div>
         </div>
         </div>
        </div> <!-- col md 4 -->
      </div>
    </div> <!-- container -->

@endsection