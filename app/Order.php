<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=['qty','tax','subtotal','total','status','full_name','address','city','phone','zip','image','title','size'];
}
