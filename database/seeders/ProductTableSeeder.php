<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Recupero tutte le categorie e taglie già inserite
        $categories = Category::all();
        $sizes = Size::all();

        $products = [
            [
                "name" => "Classic T-shirt",
                "color" => "White"
            ],
            [
                "name" => "Slim Fit Jeans",
                "color" => "Blue"
            ],
            [
                "name" => "Leather Jacket",
                "color" => "Black"
            ],
            [
                "name" => "Floral Dress",
                "color" => "Red"
            ],
            [
                "name" => "Hooded Sweatshirt",
                "color" => "Gray"
            ],
            [
                "name" => "Denim Skirt",
                "color" => "Blue"
            ],
            [
                "name" => "Wool Coat",
                "color" => "Camel"
            ],
            [
                "name" => "Striped Shirt",
                "color" => "Navy"
            ],
            [
                "name" => "Cargo Shorts",
                "color" => "Green"
            ],
            [
                'name' => 'Yoga Leggings',
                'color' => 'Black'
            ],
            [
                'name' => 'Polo Shirt',
                'color' => 'Yellow'
            ],
            [
                'name' => 'Trench Coat',
                'color' => 'Beige'
            ],
            [
                'name' => 'Puffer Jacket',
                'color' => 'Orange'
            ],
        ];

        foreach ($products as $productData) {
            //creo il prodotto
            $product = new Product();

            $product->name = $productData['name'];
            $product->description = fake()->paragraph();
            $product->price = fake()->randomFloat(2, 9.99, 299.99);
            $product->color = $productData['color'];
            $product->image = 'https://picsum.photos/400/600';
            //assegno una categoria casuale
            $product->category_id = $categories->random()->id;
            $product->save();

            //collego 3-4 taglie casuali nella tabella pivot
            $randomSizes = $sizes->random(rand(3, 4))->pluck('id')->toArray();
            $product->sizes()->attach($randomSizes);
        }
    }
}
