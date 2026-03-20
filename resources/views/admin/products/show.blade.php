@extends('admin.layouts.app')
@section('title', 'Dettagli Prodotto')
@section('content')
    {{-- Intestazione --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">👗 {{ $product->name }}</h2>
        <div class="d-flex gap-2">
            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">
                ✏️ Modifica
            </a>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">
                ← Torna ai prodotti
            </a>
        </div>
    </div>

    <div class="row g-4">

        {{-- Colonna immagine --}}
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    @if ($product->image)
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="img-fluid rounded"
                            style="max-height: 400px; object-fit: cover;">
                    @else
                        <div class="text-muted py-5">
                            <p>Nessuna immagine disponibile</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Colonna dettagli --}}
        <div class="col-md-8">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title fw-bold mb-4">Dettagli Prodotto</h5>

                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th style="width: 150px">Nome</th>
                                <td>{{ $product->name }}</td>
                            </tr>
                            <tr>
                                <th>Categoria</th>
                                <td>
                                    <span class="badge bg-secondary">
                                        {{ $product->category->name }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th>Prezzo</th>
                                <td>€ {{ number_format($product->price, 2) }}</td>
                            </tr>
                            <tr>
                                <th>Colore</th>
                                <td>{{ $product->color }}</td>
                            </tr>
                            <tr>
                                <th>Taglie</th>
                                <td>
                                    @forelse ($product->sizes as $size)
                                        <span class="badge bg-info text-dark">
                                            {{ $size->name }}
                                        </span>
                                    @empty
                                        <span class="text-muted">Nessuna taglia associata</span>
                                    @endforelse
                                </td>
                            </tr>
                            <tr>
                                <th>Descrizione</th>
                                <td>{{ $product->description }}</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>

@endsection
