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
        //chiamo la funzione dei prodotti definita nel model
        //mi serve per mostrare i prodotti associati alla categoria nella pagina dettaglio
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
    public function update(Request $request, Category $category)
    {
        //Validazione-unique: Il campo name deve essere unico nella tabella categories, eccetto per il record con id $category->id
        //senza questa eccezione, provando a cambiare un altro campo della categoria senza cambiare nome 
        //Laravel lancerebbe un errore di duplicato 
        //in questo caso possiamo solo modificare il nome ma se in futuro aggiungessimo più informazioni torna utile
        $request->validate([
            'name' => 'required|min:3|max:100|string|unique:categories,name,' . $category->id
        ]);

        $data = $request->all();

        $category->name = $data['name'];
        $category->update();

        return redirect()->route('categories.show', $category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
}
