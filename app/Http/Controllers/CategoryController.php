<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index() {
        return view('admin.category.index', [
            'categories' => Category::all()
        ]);
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return back()->with('success', 'Categoria Excluída!');
    }

    public function store()
    {
        Category::create(array_merge($this->validatePost(), [
            'name' => request()->name,
            'slug' => request()->slug
        ]));

        return redirect('admin/category');
    }
    protected function validatePost(?Category $category = null): array
    {
        $category ??= new Category();
        return request()->validate([
            'name' => 'required',
            'slug' => ['required', Rule::unique('categories', 'slug')->ignore($category)],
        ]);
    }
}
