<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::paginate(8);
        return view('categories.index', compact('categories'));
    }

    public function create() {
        return view('categories.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|max:255|unique:categories'
        ]);

        if($validated) {
            Category::create(['name' => $validated['name']]);
            return Redirect::route('categories')->with('success', 'Success!');
        } else {
            return back()->with('fail', 'Something went wrong!');
        }
    }

    public function edit(Category $category) {
        return view('categories.edit', [
            'category' => $category
        ]);
    }

    public function update(Category $category, Request $request) {
        $validated = $request->validate([
            'name' => 'required|max:255|unique:categories'
        ]);

        if($validated) {
            $category->update(['name' => $validated['name']]);
            return Redirect::route('categories')->with('success', 'Success!');
        } else {
            return back()->with('fail', 'Something went wrong!');
        }
    }

    public function destroy(Category $category) {
        $category->delete();
        return Redirect::route('categories')->with('success', 'Success!');
    }
}
