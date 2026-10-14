<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'NexusPC | Tienda de Componentes de Ordenador')</title>
    <meta name="description" content="@yield('meta_description', 'Tienda minimalista de componentes de hardware: tarjetas gráficas, procesadores, memorias RAM DDR5 y almacenamiento.')">

    <!-- Google Fonts: Outfit & Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Store Styling (Vanilla CSS Minimalist) -->
    <link rel="stylesheet" href="{{ asset('css/store.css') }}?v={{ filemtime(public_path('css/store.css')) }}">

    @stack('styles')
</head>
<body>
    <!-- Top Minimal Ticker -->
    <div class="top-bar-ticker">
        <span>Envío 24h gratuito a partir de 50€ &bull; 3 Años de garantía directa oficial</span>
    </div>

    <!-- Main Navigation Bar -->
    <header class="site-header">
        <div class="navbar">
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="brand-logo" title="NexusPC Hardware - Inicio">
                <svg class="brand-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="4" y="4" width="16" height="16" rx="2"></rect>
                    <rect x="9" y="9" width="6" height="6"></rect>
                    <line x1="9" y1="1" x2="9" y2="4"></line>
                    <line x1="15" y1="1" x2="15" y2="4"></line>
                    <line x1="9" y1="20" x2="9" y2="23"></line>
                    <line x1="15" y1="20" x2="15" y2="23"></line>
                </svg>
                <span>NEXUS</span>
                <span class="brand-tag">PC</span>
            </a>

            <!-- Search Form -->
            <form action="{{ route('home') }}" method="GET" class="header-search-form" id="searchForm">
                @if (request('category') && request('category') !== 'all')
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('sort'))
                    <input type="hidden" name="sort" value="{{ request('sort') }}">
                @endif
                <div class="search-input-wrapper">
                    <svg class="search-icon-left" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                    <input 
                        type="text" 
                        name="search" 
                        class="search-input" 
                        placeholder="Buscar por componente, fabricante o modelo..." 
                        value="{{ request('search') }}"
                        autocomplete="off"
                    >
                    @if (request('search'))
                        <a href="{{ route('home', array_filter(['category' => request('category'), 'sort' => request('sort')])) }}" class="search-clear-btn" title="Limpiar búsqueda">&times;</a>
                    @endif
                </div>
            </form>

            <!-- Actions: Cart -->
            <div class="nav-actions">
                <button type="button" class="nav-badge-btn" onclick="showCartSummary()" title="Ver carrito">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="9" cy="21" r="1"></circle>
                        <circle cx="20" cy="21" r="1"></circle>
                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                    </svg>
                    <span>Carrito</span>
                    <span class="cart-counter" id="cartCounter">0</span>
                </button>
            </div>
        </div>
    </header>

    <!-- Main Content Injection -->
    <main>
        @yield('content')
    </main>

    <!-- Minimal Trust Strip -->
    <section class="trust-strip" aria-label="Garantías del servicio">
        <div class="trust-strip-inner">
            <div class="trust-item-min">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <rect x="1" y="3" width="15" height="13"></rect>
                    <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                    <circle cx="5.5" cy="18.5" r="2.5"></circle>
                    <circle cx="18.5" cy="18.5" r="2.5"></circle>
                </svg>
                <div>
                    <div class="trust-title-min">Envío 24h</div>
                    <div class="trust-desc-min">Entrega urgente asegurada</div>
                </div>
            </div>

            <div class="trust-item-min">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                </svg>
                <div>
                    <div class="trust-title-min">Garantía 3 Años</div>
                    <div class="trust-desc-min">Sustitución directa oficial</div>
                </div>
            </div>

            <div class="trust-item-min">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <rect x="2" y="4" width="20" height="16" rx="2"></rect>
                    <path d="M7 15h0M2 9.5h20"></path>
                </svg>
                <div>
                    <div class="trust-title-min">Pago Seguro</div>
                    <div class="trust-desc-min">Bizum, Tarjetas y PayPal</div>
                </div>
            </div>

            <div class="trust-item-min">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                </svg>
                <div>
                    <div class="trust-title-min">Soporte Experto</div>
                    <div class="trust-desc-min">Atención técnica dedicada</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Minimal Footer -->
    <footer class="site-footer">
        <div class="footer-inner">
            <div class="footer-top-row">
                <a href="{{ route('home') }}" class="brand-logo" style="font-size: 1.05rem;">
                    <span>NEXUS</span>
                    <span class="brand-tag">PC</span>
                </a>

                <ul class="footer-links-row">
                    <li><a href="{{ route('home', ['category' => 'Tarjetas Gráficas']) }}" class="footer-link-min">Tarjetas Gráficas</a></li>
                    <li><a href="{{ route('home', ['category' => 'Procesadores']) }}" class="footer-link-min">Procesadores</a></li>
                    <li><a href="{{ route('home', ['category' => 'Memoria RAM']) }}" class="footer-link-min">Memoria RAM</a></li>
                    <li><a href="{{ route('home', ['category' => 'Placas Base']) }}" class="footer-link-min">Placas Base</a></li>
                    <li><a href="{{ route('home', ['category' => 'Almacenamiento']) }}" class="footer-link-min">Almacenamiento</a></li>
                </ul>
            </div>

            <div class="footer-bottom-row">
                <div>&copy; {{ date('Y') }} NexusPC Hardware. Arquitectura limpia en Laravel Blade.</div>
                <div class="payment-badges-min">
                    <span class="payment-chip">VISA</span>
                    <span class="payment-chip">Mastercard</span>
                    <span class="payment-chip">Bizum</span>
                    <span class="payment-chip">PayPal</span>
                </div>
            </div>
        </div>
    </footer>

    <!-- Toast Notification -->
    <div class="toast-notification" id="toastNotification" role="alert" aria-live="assertive">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="20 6 9 17 4 12"></polyline>
        </svg>
        <div id="toastMessage">Componente añadido al carrito.</div>
    </div>

    <!-- Quick View Modal -->
    <div class="modal-overlay" id="quickViewModal" onclick="closeQuickView(event)">
        <div class="modal-content" onclick="event.stopPropagation()">
            <button type="button" class="modal-close-btn" onclick="closeQuickView()" aria-label="Cerrar modal">&times;</button>
            <div id="modalBody"></div>
        </div>
    </div>

    <!-- Minimal Store Scripts -->
    <script>
        let cart = JSON.parse(localStorage.getItem('nexus_cart') || '[]');
        updateCartDisplay();

        function addToCart(productName, price) {
            cart.push({ name: productName, price: price, date: new Date().toISOString() });
            localStorage.setItem('nexus_cart', JSON.stringify(cart));
            updateCartDisplay();
            showToast(`Añadido: <strong>${productName}</strong>`);
        }

        function updateCartDisplay() {
            const counter = document.getElementById('cartCounter');
            if (counter) {
                counter.textContent = cart.length;
            }
        }

        function showCartSummary() {
            if (cart.length === 0) {
                showToast('El carrito está vacío.');
                return;
            }
            const modalBody = document.getElementById('modalBody');
            modalBody.innerHTML = `
                <h3 style="font-family: var(--font-heading); font-size: 1.15rem; color: #fff; margin-bottom: 16px; font-weight: 600;">
                    Carrito de compras (${cart.length})
                </h3>
                <div style="max-height: 240px; overflow-y: auto; display: flex; flex-direction: column; gap: 8px; margin-bottom: 18px;">
                    ${cart.map((item) => `
                        <div style="display: flex; justify-content: space-between; align-items: center; background: #161619; padding: 8px 12px; border-radius: 6px; border: 1px solid rgba(255,255,255,0.06);">
                            <span style="font-size: 0.8125rem; color: #fff;">${item.name}</span>
                            <span style="font-weight: 600; color: #fafafa; font-size: 0.8125rem;">${item.price}</span>
                        </div>
                    `).join('')}
                </div>
                <div style="display: flex; gap: 8px; justify-content: flex-end;">
                    <button class="btn-view-min" onclick="clearCart()">Vaciar</button>
                    <button class="btn-buy-min" onclick="closeQuickView(); showToast('Redirigiendo a pasarela segura...')">Tramitar pedido</button>
                </div>
            `;
            document.getElementById('quickViewModal').classList.add('open');
        }

        function clearCart() {
            cart = [];
            localStorage.removeItem('nexus_cart');
            updateCartDisplay();
            closeQuickView();
            showToast('Carrito vaciado.');
        }

        function openQuickView(data) {
            const modalBody = document.getElementById('modalBody');
            let specsHtml = '';
            if (data.specs) {
                specsHtml = '<div style="margin: 14px 0; display: grid; grid-template-columns: 1fr 1fr; gap: 6px;">';
                for (const [key, value] of Object.entries(data.specs)) {
                    specsHtml += `
                        <div style="background: #18181b; padding: 6px 10px; border-radius: 4px; font-size: 0.75rem; border: 1px solid rgba(255,255,255,0.06);">
                            <span style="color: var(--text-muted); display: block; font-size: 0.6875rem;">${key}</span>
                            <span style="color: #fff; font-weight: 500;">${value}</span>
                        </div>
                    `;
                }
                specsHtml += '</div>';
            }

            modalBody.innerHTML = `
                <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 10px;">
                    <span style="font-size: 0.6875rem; font-weight: 600; color: var(--text-muted); text-transform: uppercase;">
                        ${data.category} &bull; ${data.brand}
                    </span>
                    <span style="margin-left: auto; color: var(--accent-amber); font-weight: 600; font-size: 0.8125rem;">★ ${data.rating}</span>
                </div>
                <h3 style="font-family: var(--font-heading); font-size: 1.15rem; font-weight: 600; color: #fff; line-height: 1.35; margin-bottom: 10px;">
                    ${data.name}
                </h3>
                <p style="font-size: 0.8125rem; color: var(--text-secondary); line-height: 1.5; margin-bottom: 12px;">
                    ${data.description}
                </p>
                ${specsHtml}
                <div style="display: flex; align-items: center; justify-content: space-between; margin-top: 16px; padding-top: 14px; border-top: 1px solid var(--border-subtle);">
                    <div>
                        <span style="font-size: 1.35rem; font-weight: 700; color: #fff; font-family: var(--font-heading);">${data.price}</span>
                        ${data.original_price ? `<span style="font-size: 0.8125rem; color: var(--text-muted); text-decoration: line-through; margin-left: 6px;">${data.original_price}</span>` : ''}
                    </div>
                    <button class="btn-buy-min" onclick="addToCart('${data.name.replace(/'/g, "\\'")}', '${data.price}'); closeQuickView();">
                        <span>Añadir al carrito</span>
                    </button>
                </div>
            `;
            document.getElementById('quickViewModal').classList.add('open');
        }

        function closeQuickView() {
            document.getElementById('quickViewModal').classList.remove('open');
        }

        function showToast(message) {
            const toast = document.getElementById('toastNotification');
            const toastMsg = document.getElementById('toastMessage');
            toastMsg.innerHTML = message;
            toast.classList.add('active');
            setTimeout(() => {
                toast.classList.remove('active');
            }, 3000);
        }
    </script>

    @stack('scripts')
</body>
</html>
