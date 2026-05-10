<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Gembol Jati Furniture — Premium Furniture Jepara' }}</title>
    <meta name="description" content="Gembol Jati Furniture — Furniture premium handmade oleh pengrajin Jepara. Kualitas kayu jati pilihan, garansi 5 tahun, pengiriman gratis se-Indonesia.">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <!-- Fonts are now imported directly in app.css, but we can keep preconnects for speed -->

    <!-- Vite & Alpine/Tailwind -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    @livewireStyles
    @stack('styles')
</head>
<body class="antialiased bg-cream text-charcoal">
    
    <!-- ===== LOADING SCREEN ===== -->
    <div id="loading-screen">
        <div class="text-center">
            <p class="loader-logo font-serif text-3xl tracking-widest text-cream font-light">
                GEMBOL<span class="text-sage-400">JATI</span>
            </p>
            <div class="loader-bar"></div>
            <p class="text-sage-400 text-xs mt-4 font-sans tracking-widest uppercase">Memuat pengalaman premium...</p>
        </div>
    </div>

    <!-- ===== SCROLL PROGRESS ===== -->
    <div id="scroll-progress" style="width: 0%"></div>

    <!-- ===== TOAST CONTAINER ===== -->
    <div id="toast-container"></div>

    <!-- ===== CART SIDEBAR ===== -->
    <x-frontend.cart-sidebar />

    <!-- ===== NAVBAR ===== -->
    <x-frontend.navbar />

    <!-- ===== MAIN CONTENT ===== -->
    <main>
        {{ $slot }}
    </main>

    <!-- ===== FOOTER ===== -->
    <x-frontend.footer />

    <!-- ===== WHATSAPP BUTTON ===== -->
    <a id="wa-btn" href="https://wa.me/6281231311811?text=Halo%20Gembol%20Jati%20Furniture%2C%20saya%20tertarik%20dengan%20produk%20Anda"
        target="_blank" rel="noopener"
        class="fixed bottom-6 right-6 z-40 w-14 h-14 bg-[#25D366] rounded-full flex items-center justify-center"
        aria-label="Chat WhatsApp">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-white" viewBox="0 0 24 24" fill="currentColor">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
            <path d="M12 0C5.373 0 0 5.373 0 12c0 2.123.556 4.116 1.529 5.845L.057 23.617a.5.5 0 00.612.612l5.772-1.472A11.957 11.957 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.6a9.593 9.593 0 01-4.883-1.335l-.35-.208-3.627.925.954-3.527-.228-.362A9.558 9.558 0 012.4 12C2.4 6.698 6.698 2.4 12 2.4S21.6 6.698 21.6 12 17.302 21.6 12 21.6z"/>
        </svg>
    </a>

    <!-- Back to Top -->
    <button id="back-to-top" aria-label="Kembali ke atas">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
    </button>

    @livewireScripts
    
    <!-- ===== GLOBAL SCRIPTS ===== -->
    <script>
        // ===== GLOBAL STATE =====
        const state = {
            cart: JSON.parse(localStorage.getItem('gemboljati_cart')) || [],
            wishlist: JSON.parse(localStorage.getItem('gemboljati_wishlist')) || [],
            quickViewProduct: null,
            searchQuery: '',
        };

        // ===== UTILITIES =====
        const formatRupiah = (n) => 'Rp ' + parseInt(n).toLocaleString('id-ID');
        const showToast = (message, type = 'success') => {
            const container = document.getElementById('toast-container');
            const toast = document.createElement('div');
            toast.className = `toast ${type}`;
            toast.innerHTML = `
                <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    ${type === 'success' ? '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>' :
                    type === 'error' ? '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>' :
                    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>'}
                </svg>
                <span class="text-sm font-sans">${message}</span>
            `;
            container.appendChild(toast);
            setTimeout(() => {
                toast.style.opacity = '0';
                toast.style.transform = 'translateY(10px)';
                setTimeout(() => toast.remove(), 300);
            }, 4000);
        };

        // ===== LOADING SCREEN =====
        window.addEventListener('load', () => {
            setTimeout(() => {
                document.getElementById('loading-screen')?.classList.add('hidden');
            }, 800);
        });

        // ===== SCROLL PROGRESS =====
        window.addEventListener('scroll', () => {
            const scrollTop = document.documentElement.scrollTop;
            const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            if(scrollHeight > 0) {
                const scrolled = (scrollTop / scrollHeight) * 100;
                const progressEl = document.getElementById('scroll-progress');
                if(progressEl) progressEl.style.width = `${scrolled}%`;
            }
            const backToTop = document.getElementById('back-to-top');
            if(backToTop) {
                if (scrollTop > 400) {
                    backToTop.classList.add('visible');
                } else {
                    backToTop.classList.remove('visible');
                }
            }
        });
        document.getElementById('back-to-top')?.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // ===== NAVBAR SCROLL EFFECT =====
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            navbar?.classList.toggle('scrolled', window.scrollY > 50);
        }, { passive: true });

        // ===== MOBILE MENU =====
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenuBtn?.addEventListener('click', () => {
            const expanded = mobileMenuBtn.getAttribute('aria-expanded') === 'true';
            mobileMenuBtn.setAttribute('aria-expanded', !expanded);
            mobileMenu?.classList.toggle('hidden');
        });
        mobileMenu?.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
                mobileMenuBtn?.setAttribute('aria-expanded', 'false');
            });
        });

        // ===== SCROLL REVEAL ANIMATION =====
        const initReveal = () => {
            const revealEls = document.querySelectorAll('.reveal');
            const revealObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        revealObserver.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.12, rootMargin: '0px 0px -50px 0px' });
            revealEls.forEach(el => revealObserver.observe(el));
        };
        initReveal();
        document.addEventListener('livewire:navigated', initReveal);

        // ===== CART FUNCTIONALITY =====
        function updateCartUI() {
            const badge = document.getElementById('cart-badge');
            const emptyEl = document.getElementById('cart-empty');
            const footerEl = document.getElementById('cart-footer');
            const itemsEl = document.getElementById('cart-items');
            const totalEl = document.getElementById('cart-total');
            if(!itemsEl) return;

            const totalQty = state.cart.reduce((s, i) => s + i.qty, 0);
            const totalPrice = state.cart.reduce((s, i) => s + i.price * i.qty, 0);

            if (totalQty > 0 && badge) {
                badge.textContent = totalQty > 9 ? '9+' : totalQty;
                badge.classList.remove('hidden');
            } else if(badge) {
                badge.classList.add('hidden');
            }

            if (state.cart.length === 0) {
                emptyEl?.classList.remove('hidden');
                footerEl?.classList.add('hidden');
            } else {
                emptyEl?.classList.add('hidden');
                footerEl?.classList.remove('hidden');
            }

            if(totalEl) totalEl.textContent = formatRupiah(totalPrice);
            
            // Clear items except the empty state
            Array.from(itemsEl.children).forEach(child => {
                if (child.id !== 'cart-empty') child.remove();
            });

            state.cart.forEach((item, idx) => {
                const div = document.createElement('div');
                div.className = 'flex gap-4 items-start py-4 border-b border-sage-100 last:border-0';
                div.innerHTML = `
                    <img src="${item.img}" class="w-20 h-20 object-cover rounded bg-sage-100 shrink-0" alt="${item.name}" loading="lazy" />
                    <div class="flex-1 min-w-0">
                        <p class="font-sans text-sm text-sage-900 font-medium truncate">${item.name}</p>
                        <p class="font-sans text-xs text-sage-400 mb-2">${formatRupiah(item.price)}</p>
                        <div class="flex items-center gap-2">
                            <button class="qty-btn w-7 h-7 border border-sage-200 rounded text-sage-600 flex items-center justify-center hover:bg-sage-100 text-sm transition-colors" data-idx="${idx}" data-action="dec">−</button>
                            <span class="font-sans text-sm text-sage-800 w-6 text-center font-medium">${item.qty}</span>
                            <button class="qty-btn w-7 h-7 border border-sage-200 rounded text-sage-600 flex items-center justify-center hover:bg-sage-100 text-sm transition-colors" data-idx="${idx}" data-action="inc">+</button>
                            <button class="remove-btn ml-auto text-sage-300 hover:text-red-500 transition-colors p-1" data-idx="${idx}" aria-label="Hapus">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                            </button>
                        </div>
                    </div>
                `;
                itemsEl.insertBefore(div, emptyEl);
            });

            document.querySelectorAll('.qty-btn').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    const idx = parseInt(btn.dataset.idx);
                    if (btn.dataset.action === 'inc') {
                        state.cart[idx].qty++;
                    } else {
                        state.cart[idx].qty--;
                        if (state.cart[idx].qty <= 0) state.cart.splice(idx, 1);
                    }
                    saveCart();
                    updateCartUI();
                });
            });

            document.querySelectorAll('.remove-btn').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    state.cart.splice(parseInt(btn.dataset.idx), 1);
                    saveCart();
                    updateCartUI();
                    showToast('Produk dihapus dari keranjang', 'info');
                });
            });
        }

        function saveCart() {
            localStorage.setItem('gemboljati_cart', JSON.stringify(state.cart));
        }

        // ===== CART SIDEBAR OPENS/CLOSES =====
        function openCart() {
            document.getElementById('cart-sidebar')?.classList.remove('translate-x-full');
            document.getElementById('cart-overlay')?.classList.remove('opacity-0', 'pointer-events-none');
            document.getElementById('cart-overlay')?.setAttribute('aria-hidden', 'false');
            document.body.style.overflow = 'hidden';
        }
        function closeCart() {
            document.getElementById('cart-sidebar')?.classList.add('translate-x-full');
            document.getElementById('cart-overlay')?.classList.add('opacity-0', 'pointer-events-none');
            document.getElementById('cart-overlay')?.setAttribute('aria-hidden', 'true');
            document.body.style.overflow = '';
        }
        document.getElementById('open-cart')?.addEventListener('click', openCart);
        document.getElementById('close-cart')?.addEventListener('click', closeCart);
        document.getElementById('cart-overlay')?.addEventListener('click', closeCart);
        document.getElementById('empty-cart-btn')?.addEventListener('click', () => {
            if (confirm('Yakin ingin mengosongkan keranjang?')) {
                state.cart = [];
                saveCart();
                updateCartUI();
                showToast('Keranjang telah dikosongkan', 'info');
            }
        });

        // ===== ADD TO CART (From cards) =====
        function addToCartFromCard(btn) {
            const card = btn.closest('[data-name]');
            if(!card) return;
            const product = {
                name: card.dataset.name,
                price: parseInt(card.dataset.price),
                img: card.dataset.img,
                qty: 1,
                id: Date.now()
            };
            const existing = state.cart.find(i => i.name === product.name);
            if (existing) {
                existing.qty++;
                showToast('Jumlah produk diperbarui', 'success');
            } else {
                state.cart.push(product);
                showToast('Produk ditambahkan ke keranjang', 'success');
            }
            saveCart();
            updateCartUI();
            openCart();
        }

        // ===== WISHLIST =====
        function updateWishlistUI() {
            const badge = document.getElementById('wishlist-badge');
            if(!badge) return;
            if (state.wishlist.length > 0) {
                badge.textContent = state.wishlist.length > 9 ? '9+' : state.wishlist.length;
                badge.classList.remove('hidden');
            } else {
                badge.classList.add('hidden');
            }
        }
        function toggleWishlist(btn) {
            const card = btn.closest('[data-name]');
            if(!card) return;
            const product = {
                name: card.dataset.name,
                price: parseInt(card.dataset.price),
                img: card.dataset.img,
                id: Date.now()
            };
            const idx = state.wishlist.findIndex(i => i.name === product.name);
            if (idx === -1) {
                state.wishlist.push(product);
                showToast('Ditambahkan ke wishlist', 'success');
                btn.classList.add('text-gold');
            } else {
                state.wishlist.splice(idx, 1);
                showToast('Dihapus dari wishlist', 'info');
                btn.classList.remove('text-gold');
            }
            localStorage.setItem('gemboljati_wishlist', JSON.stringify(state.wishlist));
            updateWishlistUI();
        }

        // ===== QUICK VIEW MODAL =====
        function openQuickViewFromCard(btn) {
            showToast('Fitur quick view akan segera hadir', 'info');
        }

        // ===== INITIALIZE =====
        document.addEventListener('DOMContentLoaded', () => {
            updateCartUI();
            updateWishlistUI();
        });
        document.addEventListener('livewire:navigated', () => {
            updateCartUI();
            updateWishlistUI();
        });
    </script>
    
    @stack('scripts')
</body>
</html>
