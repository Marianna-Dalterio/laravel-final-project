@extends('admin.layouts.app')
@section('title', 'Back Office')
@section('content')
    {{-- Intestazione --}}
    <div class="row mb-4">
        <div class="col">
            <h1 class="fw-bold">Benvenuto/a! 👋</h1>
            <p class="text-muted">Pannello di controllo — Fashion Admin</p>
        </div>
    </div>

    {{-- Messaggio introduttivo --}}
    <div class="alert alert-primary" role="alert">
        <h5 class="alert-heading">🛍️ Sei nel backoffice del catalogo moda!</h5>
        <p class="mb-0">
            Da questo pannello puoi gestire tutti i contenuti del sito.
            Usa la barra di navigazione in alto per accedere alle sezioni disponibili.
        </p>
    </div>

    {{-- Card sezioni --}}
    <div class="row g-4 mt-2">

        {{-- Card Prodotti --}}
        <div class="col-md-6">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title fw-bold">👗 Gestione Prodotti</h5>
                    <p class="card-text text-muted">
                        Aggiungi, modifica o elimina i prodotti del catalogo.
                        Per ogni prodotto puoi gestire nome, descrizione, prezzo,
                        colore, immagine, categoria e taglie disponibili.
                    </p>
                    <a href="{{ route('products.index') }}" class="btn btn-primary">
                        Vai ai Prodotti
                    </a>
                </div>
            </div>
        </div>

        {{-- Card Categorie --}}
        <div class="col-md-6">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title fw-bold">🏷️ Gestione Categorie</h5>
                    <p class="card-text text-muted">
                        Organizza i prodotti del catalogo creando e gestendo
                        le categorie (es. T-shirt, Jeans, Giacche).
                        Ogni prodotto appartiene ad una categoria.
                    </p>
                    <a href="{{ route('categories.index') }}" class="btn btn-primary">
                        Vai alle Categorie
                    </a>
                </div>
            </div>
        </div>

    </div>

@endsection
