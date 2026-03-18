@extends('admin.layouts.app')
@section('title', 'Categorie')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">🏷️ Categorie</h2>
        <a href="{{ route('categories.create') }}" class="btn btn-primary">
            + Nuova Categoria
        </a>
    </div>
    {{-- Tabella categorie --}}
    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>#ID</th>
                        <th>Nome</th>
                        <th class="text-end">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td class="text-end">

                                {{-- Dettaglio --}}
                                <a href="{{ route('categories.show', $category->id) }}" class="btn btn-info btn-sm">
                                    🔍 Dettaglio
                                </a>

                                {{-- Modifica --}}
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">
                                    ✏️ Modifica
                                </a>

                                {{-- Elimina --}}
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        🗑️ Elimina
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted py-4">
                                Nessuna categoria trovata.
                                <a href="{{ route('categories.create') }}">Creane una!</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
