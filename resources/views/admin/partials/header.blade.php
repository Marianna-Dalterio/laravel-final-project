<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

        {{-- Brand --}}
        <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">
            👗 Fashion Admin
        </a>

        {{-- Toggle mobile --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMain">

            {{-- Link navigazione --}}
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('products.index') }}">
                        Prodotti
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('categories.index') }}">
                        Categorie
                    </a>
                </li>
            </ul>



        </div>
    </div>
</nav>
