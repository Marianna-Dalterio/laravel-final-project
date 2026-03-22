@extends('admin.layouts.app')
@section('title', 'Modifica Prodotto')
@section('content')
    {{-- Intestazione --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">👗 Modifica un Prodotto</h2>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">
            ← Torna ai prodotti
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Nome --}}
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Nome Prodotto</label>
                    <input type="text" id="name" name="name" class="form-control "
                        placeholder="es. Slim Fit Jeans..." value="{{ $product->name }}">

                </div>

                {{-- Descrizione --}}
                <div class="mb-3">
                    <label for="description" class="form-label fw-bold">Descrizione</label>
                    <textarea id="description" name="description" rows="4" class="form-control "
                        placeholder="Descrizione del prodotto...">{{ $product->description }}</textarea>

                </div>

                {{-- Prezzo --}}
                <div class="mb-3">
                    <label for="price" class="form-label fw-bold">Prezzo (€)</label>
                    <input type="number" id="price" name="price" step="0.01" min="0" class="form-control "
                        placeholder="es. 29.99" value="{{ $product->price }}">

                </div>

                {{-- Colore --}}
                <div class="mb-3">
                    <label for="color" class="form-label fw-bold">Colore</label>
                    <input type="text" id="color" name="color" class="form-control "
                        placeholder="es. Blu, Rosso, Nero..." value="{{ $product->color }}">

                </div>

                {{-- Immagine --}}
                <div class="mb-3">
                    <label for="image" class="form-label fw-bold">Immagine</label>
                    <input type="file" id="image" name="image" class="form-control mb-2">

                    @if ($product->image)
                        @if (str_starts_with($product->image, 'http'))
                            {{-- Immagine esterna dal seeder --}}
                            <img src="{{ $product->image }}" alt="{{ $product->name }}"
                                style="width: 50px; height: 60px; object-fit: cover; " class="rounded">
                        @else
                            {{-- Immagine caricata tramite upload --}}
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                style="width: 50px; height: 60px; object-fit: cover;  " class="rounded">
                        @endif

                    @endif

                </div>

                {{-- Categoria --}}
                <div class="mb-3">
                    <label for="category_id" class="form-label fw-bold">Categoria</label>
                    <select name="category_id" id="category_id" class="form-select ">
                        <option value="">-- Seleziona una categoria --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $product->category_id == $category->id ? 'selected' : '' }}>
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
                                    id="size{{ $size->id }}" class="form-check-input"
                                    {{ $product->sizes->pluck('id')->contains($size->id) ? 'checked' : '' }}>
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
                        💾 Aggiorna Prodotto
                    </button>
                    <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
                        Annulla
                    </a>
                </div>

            </form>
        </div>
    </div>

@endsection
