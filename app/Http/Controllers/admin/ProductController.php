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

        //attacco le taglie nella tabella pivot, il controllo è necessario perchè se nessuna taglia è selezionata il campo non arriva
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
