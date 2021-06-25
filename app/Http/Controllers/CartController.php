<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Cart;

class CartController extends Controller
{
    public function addToCart($id)
    {
    	$product = Product::find($id);
    	Cart::add($id, $product->title,1,$product->price,['size'=> 'S', 'image' => $product->image]);

    	return back()->withMessage('add product to cart');
    }

    public function cartIndex()
    {
    	$categories = Category::all();
    	$cartItems = Cart::content();
        $products = Product::paginate(1);
    	return view('cart.index', compact('categories','cartItems','products'));
    }
    public function updateCart(Request $request, $id)
    {
        Cart::update($id,['qty' => $request->qty, "options" => ['size' => $request->size, 'image' => $request->image]]);

        return back()->withMessage('Successfuly updated');
    }
    public function deleteItems($id)
    {
    	Cart::remove($id);

    	return back()->withMessage('Successfuly Deleted');
    }
}
