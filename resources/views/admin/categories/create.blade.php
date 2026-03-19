@extends('admin.layouts.app')

@section('title', 'Nuova Categoria')

@section('content')

    {{-- Intestazione --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">🏷️ Nuova Categoria</h2>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">
            ← Torna alle categorie
        </a>
    </div>

    {{-- Form --}}
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf

                {{-- Campo nome --}}
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Nome Categoria</label>
                    <input type="text" name="name" id="name"
                        class="form-control @error('name') is-invalid @enderror "
                        placeholder="es. Jeans, Cappotti, Tailleurs..." value="{{ old('name') }}" required>

                    {{-- Messaggio errore validazione --}}
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                </div>

                {{-- Bottoni --}}
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        💾 Salva Categoria
                    </button>
                    <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">
                        Annulla
                    </a>
                </div>

            </form>
        </div>
    </div>

@endsection
