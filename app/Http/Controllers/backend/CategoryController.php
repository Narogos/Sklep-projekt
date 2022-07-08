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
        Category::create($request->all());
        toast('Kategoria została dodana','success');

        return redirect()->route('admin.category.index');

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

    public function update( Request $request, Category $category)
    {
        $category->update($request->all());

        toast('Kategoria została zaaktualizowana','success');

        return redirect()->route('admin.category.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
    }
}
