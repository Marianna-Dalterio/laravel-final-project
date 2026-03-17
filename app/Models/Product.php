<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //Laravel ha una protezione chiamata mass assignment protection.
    //Un utente malintenzionato manipola una richiesta HTTP e aggiunge campi extra nel form, sperando che vengano salvati nel database.
    //Il $fillable dice a Laravel: "salva nel database SOLO questi campi, ignora tutto il resto".
    protected $fillable = [
        'name',
        'description',
        'price',
        'color',
        'image',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function sizes()
    {
        return $this->belongsToMany(Size::class);
    }
}
