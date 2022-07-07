<?php

namespace App\Http\Controllers\backend;

use App\DataTables\backend\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index(CategoryDataTable $dataTable)
    {
        return $dataTable->render('backend.category.index');
    }

    public function create()
    {
        return view('backend.category.create');
    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $categories = Category::all();
        $category = Category::findOrFail($id);

        return view('backend.category.edit', [
            'categories' => $categories,
            'category' => $category
        ]);
    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}
