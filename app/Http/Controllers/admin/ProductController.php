<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //passo le categorie e taglie per popolare il select e i checkbox
        $categories = Category::all();
        $sizes = Size::all();
        return view('admin.products.create', compact('categories', 'sizes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $newProduct = new Product();
        $newProduct->name = $data['name'];
        $newProduct->description = $data['description'];
        $newProduct->price = $data['price'];
        $newProduct->color = $data['color'];
        //upload immagine
        if (array_key_exists("image", $data)) {
            $img_url = Storage::putFile("products", $data['image']);
            $newProduct->image = $img_url;
        };
        $newProduct->category_id = $data['category_id'];
        //prima salvo 

        $newProduct->save();

        //poi attacco le taglie nella tabella pivot, il controllo è necessario perchè se nessuna taglia è selezionata il campo non arriva
        //nel $data e darebbe errore
        if (array_key_exists('sizes', $data)) {
            $newProduct->sizes()->attach($data['sizes']);
        }



        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $sizes = Size::all();
        return view('admin.products.edit', compact('product', 'categories', 'sizes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->all();

        $product->name = $data['name'];
        $product->description = $data['description'];
        $product->price = $data['price'];
        $product->color = $data['color'];

        //immagine
        if (array_key_exists('image', $data)) {

            // Elimino la precedente solo se è un file locale
            if ($product->image && !str_starts_with($product->image, 'http')) {
                Storage::delete($product->image);
            }
            //carico la nuova
            $img_url = Storage::putFile("products", $data['image']);

            //aggiorno il db
            $product->image = $img_url;
        }

        $product->update();

        if (array_key_exists('sizes', $data)) {
            //sostituisce le taglie precedenti con le nuove
            $product->sizes()->sync($data['sizes']);
        }

        return redirect()->route('products.show', $product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
