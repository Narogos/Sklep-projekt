<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;


class CardController extends Controller
{
    public function index()
    {
        return view('frontend.cart', [
                   'categoriesList' => Category::with('children')->whereNull('parent_id')->get()
            ]
        );
    }

    public function addProduct(Product $product)
    {
        $card = Cart::create(['user_id' => auth()->id(), 'product_id' => $product->id]);
    }

    public function showProducts()
    {
        $card = Cart::with('products')->where('user_id', auth()->id())->get();

        return response()->json($card);
    }
    public function addOrder(Request $request)
    {
        $order = Order::create([
            'user_id' => auth()->id(), 'product_id' => $request->id]);
    }

    public function deleteProduct(Request $request)
    {
        Cart::where('id', $request->id)->delete();
    }
}
