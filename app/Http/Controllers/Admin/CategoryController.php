<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function save(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:15',
            'image' => 'required'
        ]);
        $filePath = $request->file('image')->store('category');
        $category = Category::create([
            'name' => $data['name'],
            'image' => $filePath,
        ]);
        if ($category && $category instanceof Category) {
            return redirect()->route('admin.categories.index');
        }
        return redirect()->back();
    }

    public function edit(Category $category)
    {
        return view('admin.categories.create',compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => 'required|max:15',
            'image' => 'required'
        ]);
        Storage::disk('public')->delete($category->image);
        $filePath = $request->file('image')->store('category');
        $category = $category->update([
            'name' => $data['name'],
            'image' => $filePath,
        ]);
        if ($category) {
            return redirect()->route('admin.categories.index');
        }
        return redirect()->back();
    }

    public function delete(Request $request, Category $category)
    {
        $categoryItem = $category->delete();
        if ($categoryItem) {
            return redirect()->route('admin.categories.index');
        }
        return redirect()->back();
    }
}
