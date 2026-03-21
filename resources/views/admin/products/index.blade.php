@extends('admin.layouts.app')
@section('title', 'Prodotti')
@section('content')
    {{-- Intestazione --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">👗 Prodotti</h2>
        <a href="{{ route('products.create') }}" class="btn btn-primary">
            + Nuovo Prodotto
        </a>
    </div>

    {{-- Tabella prodotti --}}
    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>#ID</th>
                        <th>Immagine</th>
                        <th>Nome</th>
                        <th>Categoria</th>
                        <th>Prezzo</th>
                        <th>Colore</th>
                        <th>Taglie</th>
                        <th class="text-end">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>

                            {{-- Immagine --}}
                            <td>
                                @if ($product->image)
                                    @if (str_starts_with($product->image, 'http'))
                                        {{-- Immagine esterna dal seeder --}}
                                        <img src="{{ $product->image }}" alt="{{ $product->name }}"
                                            style="width: 50px; height: 60px; object-fit: cover;" class="rounded">
                                    @else
                                        {{-- Immagine caricata tramite upload --}}
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                            style="width: 50px; height: 60px; object-fit: cover;" class="rounded">
                                    @endif
                                @else
                                    <span class="text-muted">Non Disponibile</span>
                                @endif
                            </td>
                            {{-- Nome --}}
                            <td>{{ $product->name }}</td>

                            {{-- Categoria --}}
                            <td>
                                <span class="badge bg-secondary">
                                    {{ $product->category->name }}
                                </span>
                            </td>

                            {{-- Prezzo --}}
                            <td>€ {{ number_format($product->price, 2) }}</td>
                            {{-- Colore --}}
                            <td>{{ $product->color }}</td>

                            {{-- Taglie --}}
                            <td>
                                @foreach ($product->sizes as $size)
                                    <span class="badge bg-info text-dark">{{ $size->name }}</span>
                                @endforeach
                            </td>

                            {{-- Azioni --}}
                            <td class="text-end">

                                {{-- Dettaglio --}}
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">
                                    🔍 Dettaglio
                                </a>

                                {{-- Modifica --}}
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">
                                    ✏️ Modifica
                                </a>

                                {{-- Elimina --}}
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modalElimina{{ $product->id }}">
                                    🗑️ Elimina
                                </button>

                                {{-- Modal conferma eliminazione --}}
                                <div class="modal fade" id="modalElimina{{ $product->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Elimina Prodotto</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                Sei sicuro di voler eliminare definitivamente il prodotto
                                                <strong>{{ $product->name }}</strong>?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Annulla
                                                </button>
                                                <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        Elimina
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted py-4">
                                Nessun prodotto trovato.
                                <a href="{{ route('products.create') }}">Aggiungine uno!</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
