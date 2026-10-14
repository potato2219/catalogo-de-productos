@extends('layouts.app')

@section('title', 'NexusPC | Catálogo Minimalista de Hardware')
@section('meta_description', 'Selección de componentes de ordenador: tarjetas gráficas, procesadores Ryzen e Intel, memoria RAM DDR5 y almacenamiento.')

@section('content')
    <!-- Minimalist Hero -->
    <section class="hero-minimal" aria-label="Introducción al catálogo">
        <div class="hero-minimal-inner">
            <div class="hero-content">
                <div class="hero-label">
                    <span class="hero-label-bullet"></span>
                    <span>Catálogo de Hardware 2026</span>
                </div>

                <h1 class="hero-heading">
                    Componentes esenciales.<br>Rendimiento puro.
                </h1>

                <p class="hero-desc">
                    Una selección precisa de tarjetas gráficas, procesadores y módulos de memoria de alta fidelidad. Construcción limpia, especificaciones verificadas y entrega asegurada.
                </p>
            </div>

            <div class="hero-stats-row">
                <div class="hero-stat-block">
                    <div class="hero-stat-val">{{ $products->count() }}</div>
                    <div class="hero-stat-lbl">Piezas disponibles</div>
                </div>
                <div class="hero-stat-block">
                    <div class="hero-stat-val">24h</div>
                    <div class="hero-stat-lbl">Envío estándar</div>
                </div>
                <div class="hero-stat-block">
                    <div class="hero-stat-val">3 Años</div>
                    <div class="hero-stat-lbl">Garantía directa</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Catalog Area -->
    <section class="main-catalog" id="catalogo">
        <div class="catalog-toolbar-minimal">
            <!-- Category Navigation Tabs -->
            <nav class="category-nav-scroll" aria-label="Categorías de componentes">
                <a 
                    href="{{ route('home', array_filter(['search' => request('search'), 'sort' => request('sort')])) }}" 
                    class="category-tab {{ $selectedCategory === 'all' ? 'active' : '' }}"
                >
                    Todos los componentes
                </a>

                @foreach ($categories as $cat)
                    <a 
                        href="{{ route('home', array_filter(['category' => $cat, 'search' => request('search'), 'sort' => request('sort')])) }}" 
                        class="category-tab {{ $selectedCategory === $cat ? 'active' : '' }}"
                    >
                        {{ $cat }}
                    </a>
                @endforeach
            </nav>

            <!-- Sub Toolbar: Count, Reset & Sort -->
            <div class="sub-toolbar">
                <div class="results-info">
                    Mostrando <strong>{{ $products->count() }}</strong> componentes
                    @if ($selectedCategory !== 'all')
                        en <strong>{{ $selectedCategory }}</strong>
                    @endif
                    @if ($currentSearch)
                        para "<em>{{ $currentSearch }}</em>"
                    @endif
                </div>

                <div class="filter-actions">
                    @if ($selectedCategory !== 'all' || $currentSearch || $currentSort !== 'default')
                        <a href="{{ route('home') }}" class="reset-link">
                            Restablecer filtros
                        </a>
                    @endif

                    <div class="sort-minimal">
                        <label for="sortSelector">Ordenar por:</label>
                        <select 
                            id="sortSelector" 
                            class="sort-select-min" 
                            onchange="handleSortChange(this.value)"
                        >
                            <option value="default" {{ $currentSort === 'default' ? 'selected' : '' }}>Destacados</option>
                            <option value="price_asc" {{ $currentSort === 'price_asc' ? 'selected' : '' }}>Precio: Menor a Mayor</option>
                            <option value="price_desc" {{ $currentSort === 'price_desc' ? 'selected' : '' }}>Precio: Mayor a Menor</option>
                            <option value="rating" {{ $currentSort === 'rating' ? 'selected' : '' }}>Mejor Valorados</option>
                            <option value="name" {{ $currentSort === 'name' ? 'selected' : '' }}>Nombre A-Z</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Products Grid: Blade Partial Loop -->
        <div class="products-grid">
            @forelse ($products as $product)
                {{-- Inclusión del partial individual para replicar cada producto --}}
                @include('partials.product-card', ['product' => $product])
            @empty
                {{-- Partial de estado vacío --}}
                @include('partials.empty-state')
            @endforelse
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        function handleSortChange(sortValue) {
            const currentUrl = new URL(window.location.href);
            if (sortValue === 'default') {
                currentUrl.searchParams.delete('sort');
            } else {
                currentUrl.searchParams.set('sort', sortValue);
            }
            window.location.href = currentUrl.toString();
        }
    </script>
@endpush
