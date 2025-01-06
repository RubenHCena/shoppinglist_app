<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getAll() {
        $categories=Category::all();
        return $categories;
    }

    public function store(Request $request){
        $category = new Category;
        $category->name = $request->name;
        $category->icon_name = $request->icon_name;
        $category->save();
        return $category;
    }

    public function delete($id) {
        $category = Category::findOrFail($id);
        $category->delete();
        return "http kode ;)";
    }
}
