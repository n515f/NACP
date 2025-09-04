<?php

namespace App\Http\Controllers\Api\Shared;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // حفظ الصورة
        $iconPath = null;
        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/categories'), $filename);
            $iconPath = 'images/categories/' . $filename;
        }

        // إنشاء التصنيف
        Category::create([
            'name' => $request->name,
            'icon' => $iconPath,
        ]);

        return redirect()->route('categories.index')->with('success', 'تمت إضافة التصنيف بنجاح');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $iconPath = $category->icon;

        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/categories'), $filename);
            $iconPath = 'images/categories/' . $filename;
        }

        $category->update([
            'name' => $request->name,
            'icon' => $iconPath,
        ]);

        return redirect()->route('categories.index')->with('success', 'تم التحديث بنجاح');
    }

    public function destroy(Category $category)
    {
        // يمكن هنا حذف الصورة من السيرفر إذا أردت
        // File::delete(public_path($category->icon));

        $category->delete();
        return redirect()->route('categories.index')->with('success', 'تم الحذف بنجاح');
    }
}
