<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="{{ $meta_description ?? 'VoktaStyle — Furniture premium handmade oleh pengrajin Indonesia.' }}" />
    <title>{{ $title ?? 'VoktaStyle' }} — Premium Furniture Handmade Indonesia</title>
    
    <!-- Fonts & Tailwind -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,400;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Tailwind Config (dari HTML Anda) -->
    <script>
    tailwind.config = {
        darkMode: 'class',
        theme: {
            extend: {
                fontFamily: {
                    serif: ['Cormorant Garamond', 'Georgia', 'serif'],
                    sans: ['Plus Jakarta Sans', 'system-ui', 'sans-serif'],
                },
                colors: {
                    sage: {
                        50: '#f4f7f4', 100: '#e6ede6', 200: '#cddccd', 300: '#a9c3a9',
                        400: '#7da47d', 500: '#5a865a', 600: '#456945', 700: '#385438',
                        800: '#2e432e', 900: '#273827', 950: '#131f13',
                    },
                    cream: '#FAFAF7', parchment: '#F2F0EA',
                    gold: { DEFAULT: '#B8974A', light: '#D4B47A', dark: '#8B7438' },
                    charcoal: '#1A1F1A',
                },
                // ... tambahkan animasi & boxShadow dari HTML Anda di sini ...
            }
        }
    }
    </script>
    
    @livewireStyles
    @stack('styles')
</head>
<body class="antialiased bg-cream text-charcoal">
    
    <!-- Loading Screen -->
    <div id="loading-screen">
        <div class="text-center">
            <p class="loader-logo font-serif text-3xl tracking-widest text-cream font-light">
                VOKTA<span class="text-sage-400">STYLE</span>
            </p>
            <div class="loader-bar"></div>
        </div>
    </div>

    <!-- Navbar (Partial) -->
    @include('partials.navbar')

    <!-- Main Content -->
    <main>
        {{ $slot }}
    </main>

    <!-- Footer (Partial) -->
    @include('partials.footer')

    <!-- Cart Sidebar (Livewire) -->
    @livewire('customer.cart-component')

    <!-- Toast & Scripts -->
    <div id="toast-container"></div>
    <div id="zoom-overlay"></div>
    <div id="cart-overlay" class="fixed inset-0 bg-charcoal/40 backdrop-blur-sm z-40 hidden"></div>
    
    @livewireScripts
    @stack('scripts')
    
    <!-- Global JS (dari HTML Anda) -->
<script>
document.addEventListener('livewire:init', () => {
    
    // 1. Buka Cart Sidebar saat icon cart diklik
    document.getElementById('open-cart')?.addEventListener('click', () => {
        const sidebar = document.getElementById('cart-sidebar');
        if (sidebar) {
            sidebar.classList.remove('translate-x-full');
            document.body.classList.add('overflow-hidden'); // Prevent scroll bg
        }
    });

    // 2. Tutup Cart Sidebar (via tombol X atau klik luar)
    document.addEventListener('click', (e) => {
        const sidebar = document.getElementById('cart-sidebar');
        const closeBtn = sidebar?.querySelector('button[onclick*="closeCart"]');
        const overlay = document.getElementById('cart-overlay');
        
        if (e.target === overlay || e.target === closeBtn) {
            sidebar?.classList.add('translate-x-full');
            document.body.classList.remove('overflow-hidden');
        }
    });

    // 3. Update Badge Cart saat ada perubahan dari Livewire
    Livewire.on('cart:updated', ({ totalQty }) => {
        const badge = document.getElementById('cart-badge');
        if (badge) {
            badge.textContent = totalQty > 9 ? '9+' : totalQty;
            badge.classList.toggle('hidden', totalQty === 0);
            
            // Animasi pulse
            badge.classList.add('scale-125');
            setTimeout(() => badge.classList.remove('scale-125'), 200);
        }
    });

    // 4. Toast Notification System
    Livewire.on('notify', ({ message, type }) => {
        showToast(message, type);
    });
});

// Fungsi Toast (jika belum ada)
function showToast(message, type = 'success') {
    let container = document.getElementById('toast-container');
    if (!container) {
        container = document.createElement('div');
        container.id = 'toast-container';
        container.className = 'fixed bottom-4 right-4 z-[100] space-y-2';
        document.body.appendChild(container);
    }
    
    const toast = document.createElement('div');
    toast.className = `flex items-center gap-2 px-4 py-3 rounded-lg shadow-lg text-sm font-sans transform transition-all duration-300 translate-y-10 opacity-0 ${
        type === 'success' ? 'bg-sage-700 text-white' : 
        type === 'error' ? 'bg-red-500 text-white' : 
        'bg-sage-100 text-sage-800'
    }`;
    
    toast.innerHTML = `
        <span>${type === 'success' ? '✅' : type === 'error' ? '⚠️' : 'ℹ️'}</span>
        <span>${message}</span>
    `;
    
    container.appendChild(toast);
    
    // Animate in
    requestAnimationFrame(() => {
        toast.classList.remove('translate-y-10', 'opacity-0');
    });
    
    // Auto remove
    setTimeout(() => {
        toast.classList.add('opacity-0', 'translate-y-2');
        setTimeout(() => toast.remove(), 300);
    }, 4000);
}

// 5. Helper: Dispatch event cart:add dari tombol vanilla JS (jika ada)
function addToCartFromCard(btn) {
    const card = btn.closest('[data-id]');
    if (!card) return;
    
    Livewire.dispatch('cart:add', {
        id: parseInt(card.dataset.id),
        qty: 1,
        name: card.dataset.name || '',
        price: parseFloat(card.dataset.price) || 0,
        img: card.dataset.img || '',
        variant: '',
        finish: ''
    });
}
</script>
</body>
</html>