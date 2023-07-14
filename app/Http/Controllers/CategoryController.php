<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        // Validate and store the new product
        $category = new Category;
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();

        return redirect()->back();
    }

    public function show($id)
    {
        $category = Category::find($id);
        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        $categories = Category::find($id);
        return view('admin.category.edit', compact('categories'));
    }

    public function update(Request $request, $id)
    {
        // Validate and update the product
        $category = Category::find($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        // Delete the product
        $category = Category::find($id);
        $category->delete();

        return redirect()->back();
    }

}
