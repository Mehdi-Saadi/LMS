<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('categories', ['categories' => Category::all()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:100',
        ]);

        $category = new Category();
        $category->name = $validated['name'];
        $category->save();

        alert()->success('', "Category Saved");
        return to_route('categories');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:100',
        ]);

        $category = Category::findOrFail($id);
        $category->name = $validated['name'];
        $category->save();

        alert()->success('', "Category Changed");
        return to_route('categories');
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        alert()->success('', "Category Deleted");
        return to_route('categories');
    }
}
