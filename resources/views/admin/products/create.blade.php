@extends('admin.layouts.app')
@section('title', 'Nuovo Prodotto')
@section('content')
    {{-- Intestazione --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">👗 Nuovo Prodotto</h2>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">
            ← Torna ai prodotti
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Nome --}}
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Nome Prodotto</label>
                    <input type="text" id="name" name="name" class="form-control "
                        placeholder="es. Slim Fit Jeans...">

                </div>

                {{-- Descrizione --}}
                <div class="mb-3">
                    <label for="description" class="form-label fw-bold">Descrizione</label>
                    <textarea id="description" name="description" rows="4" class="form-control "
                        placeholder="Descrizione del prodotto..."></textarea>

                </div>

                {{-- Prezzo --}}
                <div class="mb-3">
                    <label for="price" class="form-label fw-bold">Prezzo (€)</label>
                    <input type="number" id="price" name="price" step="0.01" min="0" class="form-control "
                        placeholder="es. 29.99">

                </div>

                {{-- Colore --}}
                <div class="mb-3">
                    <label for="color" class="form-label fw-bold">Colore</label>
                    <input type="text" id="color" name="color" class="form-control "
                        placeholder="es. Blu, Rosso, Nero...">

                </div>

                {{-- Immagine --}}
                <div class="mb-3">
                    <label for="image" class="form-label fw-bold">Immagine</label>
                    <input type="file" id="image" name="image" class="form-control ">

                </div>

                {{-- Categoria --}}
                <div class="mb-3">
                    <label for="category_id" class="form-label fw-bold">Categoria</label>
                    <select name="category_id" id="category_id" class="form-select ">
                        <option value="">-- Seleziona una categoria --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>

                </div>

                {{-- Taglie --}}
                <div class="mb-3">
                    <label class="form-label fw-bold">Taglie disponibili</label>
                    <div class="d-flex flex-wrap gap-3">
                        @foreach ($sizes as $size)
                            <div class="form-check">
                                <input type="checkbox" name="sizes[]" value="{{ $size->id }}"
                                    id="size{{ $size->id }}" class="form-check-input">
                                <label class="form-check-label" for="size{{ $size->id }}">
                                    {{ $size->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>

                </div>

                {{-- Bottoni --}}
                <div class="d-flex gap-2 mt-4">
                    <button type="submit" class="btn btn-primary">
                        💾 Salva Prodotto
                    </button>
                    <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
                        Annulla
                    </a>
                </div>

            </form>
        </div>
    </div>

@endsection
