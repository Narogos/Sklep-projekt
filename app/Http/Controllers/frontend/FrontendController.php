<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index',[
            'products' => Product::with('category')->get(),
            'categoriesList' => Category::with('children')->whereNull('parent_id')->get()
        ]);
    }

    public function categoryProduct(string $slugCategory)
    {
        return view('frontend.category_product', [
            'categoriesList' => Category::with('children')->whereNull('parent_id')->get(),
            'categories' => Category::with('products')->where('slug', $slugCategory)->get()
        ]);
    }
}
