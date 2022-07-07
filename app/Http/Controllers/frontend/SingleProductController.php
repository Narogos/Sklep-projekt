<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class SingleProductController extends Controller
{
    public function index(string $slugCategory, string $product)
    {
        return view('frontend.single_product', [
            'product' => Product::where('slug', $product)->first(),
            'categoriesList' => Category::with('children')->whereNull('parent_id')->get()
        ]);
    }
}
