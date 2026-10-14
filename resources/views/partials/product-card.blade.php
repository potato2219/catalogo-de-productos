@props(['product'])

<article class="product-card" id="product-{{ $product->id }}" data-category="{{ $product->category }}" data-brand="{{ $product->brand }}">
    {{-- Card Top: Brand & Subtle Badge --}}
    <div class="product-card-top">
        <span class="brand-name-subtle">{{ $product->brand }}</span>
        @if ($product->badge)
            <span class="minimal-badge">{{ $product->badge }}</span>
        @endif
    </div>

    {{-- Minimal Preview Graphic Area --}}
    <div class="card-preview-area">
        <div class="hardware-svg-wrap">
            @if ($product->image_url)
                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" loading="lazy" style="max-width:100%; max-height:100%; object-fit:contain;">
            @else
                @include('partials.hardware-icon', ['category' => $product->category])
            @endif
        </div>
        <span class="category-label-subtle">{{ $product->category }}</span>
    </div>

    {{-- Rating --}}
    <div class="rating-minimal">
        <span class="rating-star-icon">★</span>
        <span class="rating-val">{{ number_format($product->rating, 1) }}</span>
        <span>({{ $product->reviews_count }})</span>
    </div>

    {{-- Title & Short Description --}}
    <h3 class="product-title" title="{{ $product->name }}">{{ $product->name }}</h3>
    <p class="product-description-min">{{ $product->description }}</p>

    {{-- Specs --}}
    @if (!empty($product->specs) && is_array($product->specs))
        <div class="specs-row-min">
            @foreach (array_slice($product->specs, 0, 2) as $specKey => $specValue)
                <span class="spec-chip-min">
                    <strong>{{ $specKey }}:</strong> {{ $specValue }}
                </span>
            @endforeach
        </div>
    @endif

    {{-- Card Bottom --}}
    <div class="card-bottom-min">
        <div class="stock-status-row">
            @if ($product->stock > 5)
                <span class="stock-indicator in-stock">
                    <span class="stock-dot-min"></span> En stock
                </span>
            @elseif ($product->stock > 0)
                <span class="stock-indicator low-stock">
                    <span class="stock-dot-min"></span> Últimas {{ $product->stock }} uds.
                </span>
            @else
                <span class="stock-indicator">
                    <span class="stock-dot-min"></span> Agotado
                </span>
            @endif
            <span>Envío 24h</span>
        </div>

        <div class="price-row-min">
            <span class="price-main">{{ $product->formatted_price }}</span>
            @if ($product->formatted_original_price)
                <span class="price-original">{{ $product->formatted_original_price }}</span>
            @endif
            @if ($product->discount_percentage)
                <span class="discount-tag-min">-{{ $product->discount_percentage }}%</span>
            @endif
        </div>

        <div class="card-actions-grid">
            <button 
                type="button" 
                class="btn-buy-min" 
                onclick="addToCart('{{ addslashes($product->name) }}', '{{ $product->formatted_price }}')"
                title="Añadir al carrito"
            >
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                <span>Añadir</span>
            </button>

            <button 
                type="button" 
                class="btn-view-min" 
                onclick="openQuickView({{ json_encode([
                    'name' => $product->name,
                    'category' => $product->category,
                    'brand' => $product->brand,
                    'price' => $product->formatted_price,
                    'original_price' => $product->formatted_original_price,
                    'description' => $product->description,
                    'specs' => $product->specs,
                    'stock' => $product->stock,
                    'rating' => $product->rating,
                ]) }})"
                title="Ver especificaciones"
            >
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="16" x2="12" y2="12"></line>
                    <line x1="12" y1="8" x2="12.01" y2="8"></line>
                </svg>
            </button>
        </div>
    </div>
</article>
