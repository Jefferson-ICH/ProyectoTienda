<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index()
    {
      $category = Category::all();
      return view('admin.category.index', ['categories'=>$category]);
    }

    public function create()
    {
      return view('admin.category.create');
    }

    public function store(Request $request)
    {
      $newCategory = new Category();
      $newCategory->name = $request->category;
      $newCategory->save();
      return redirect()->back();
    }

    public function update(Request $request, $categoryId)
    {
      $category = Category::find($categoryId);
      $category->name = $request->category;
      $category->save();
      return redirect()->back();
    }

    public function delete(Request $request, $categoryId)
    {
      $category = Category::find($categoryId);
      $category->delete();
      return redirect()->back();
    }
    
}
