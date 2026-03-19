<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //regole di validazione dell'input, se l'input non le rispetta la validazione fallisce e compare il messaggio di errore
        //automatico di Laravel che ho settato in create.blade.php
        $request->validate([
            'name' => 'required|min:3|max:100|string|unique:categories,name'
        ]);

        $data = $request->all();

        $newCategory = new Category();

        $newCategory->name = $data['name'];

        $newCategory->save();

        return redirect()->route("categories.index", $newCategory);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //chiamo la funzione definita nel model 
        $products = $category->products;
        return view('admin.categories.show', compact('category', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return "Sei nell'update";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
