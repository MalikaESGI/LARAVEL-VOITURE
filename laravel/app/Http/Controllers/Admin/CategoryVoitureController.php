<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryVoitureController extends Controller
{
    
    public function index()
    {
        return view('admin.categories.index',[
            'categories' => Category::paginate(25),
        ]);
    }

    public function create()
    {
        $category = new Category();

        return view('admin.categories.create',[
            'category'=> $category,
            ]);
    }


    public function store( CategoryFormRequest $request, Category $category)
    {
            Category::create($request->validated());

        return redirect()->route('admin.category.index')->with('success', 'La catégorie a été bien créé');

    }


    public function edit(Category $category)
    {
        return view('admin.categories.create', [
            'category'=> $category,
            
        ]);
    }

    public function update(CategoryFormRequest $request, Category $category)
    {
        $category->update($request->validated());
        return redirect()->route('admin.category.index')->with('success','la category a été bien modifiée');
    }

 
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.category.index')->with('success','la category a été bien supprimée');
    }
}
