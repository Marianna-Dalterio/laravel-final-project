<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    //Il nome del metodo products() va messo al plurale — una Size appartiene a molti prodotti
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
