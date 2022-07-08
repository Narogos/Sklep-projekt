<?php

namespace App\Http\Controllers\backend;

use App\DataTables\backend\ProductDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Traits\PhotoTrait;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    Use PhotoTrait;

    public function index(ProductDataTable $dataTable)
    {
        return $dataTable->render('backend.product.index');
    }

    public function create()
    {
        return view('backend.product.create',
        ['categories' => Category::all()]);
    }

    public function store(ProductRequest $request)
    {
        $data = $request->validated();

        $filePath = $this->uploadImage($data['image'], 600, 300);
        $data['slug'] = str_slug($request->slug, '-');
        $data['image'] = $filePath;

        $product = Product::create($data);

        return redirect()->route('admin.product.index');
    }

    public function show(Product $product)
    {
        return view('backend.product.show', [
            'product' => $product,
        ]);
    }

    public function edit(Product $product)
    {
        return view('backend.product.edit', [
            'product' => $product,
            'categories' => Category::all()
        ]);
    }

    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->validated();
        $path = null;

        if(!empty($data['image']))
        {
            $path = $data['image']->store('products', 'public');

            if($path)
            {
                Storage::disk('public')->delete($product->image);
                $data['image'] = $path;
            }
        }
        $product->update($data);

        return redirect()->route('admin.product.index');
    }

    public function destroy()
    {

    }
}
