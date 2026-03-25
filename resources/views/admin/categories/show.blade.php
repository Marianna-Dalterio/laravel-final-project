@extends('admin.layouts.app')
@section('title', 'Dettaglio Categoria')
@section('content')
    {{-- Intestazione --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">🏷️ {{ $category->name }}</h2>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">
            ← Torna alle categorie
        </a>
    </div>

    {{-- Card riepilogo --}}
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h5 class="card-title fw-bold">Riepilogo</h5>
            <p class="card-text">
                La categoria <strong>{{ $category->name }}</strong> ha
                <span class="badge bg-primary fs-6">{{ count($category->products) }}</span>
                prodotti associati.
            </p>
        </div>
    </div>

    {{-- Lista prodotti --}}
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title fw-bold mb-3">Prodotti associati</h5>

            {{-- controllo se ci sono prodotti in quella categoria --}}
            @if (count($category->products) > 0)

                <table class="table table-hover align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Prezzo</th>

                            <th class="text-end">Azioni</th>
                        </tr>
                    </thead>
                    {{-- mostro i prodotti collegati --}}
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>€ {{ number_format($product->price, 2) }}</td>

                                <td class="text-end">
                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">
                                        🔍 Dettaglio
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            @else
                <p class="text-muted">Nessun prodotto associato a questa categoria.</p>

            @endif

        </div>
    </div>

@endsection
