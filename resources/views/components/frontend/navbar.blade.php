<nav id="navbar">
    <div class="max-w-7xl mx-auto flex items-center justify-between">
        <a href="{{ route('home') }}" class="nav-logo font-serif text-2xl lg:text-3xl tracking-widest text-sage-900 font-light transition-all duration-300 cursor-pointer" wire:navigate>
            GEMBOL<span class="text-sage-500">JATI</span>
        </a>
        <ul class="hidden md:flex items-center gap-8 text-xs tracking-widest uppercase font-sans font-medium text-sage-700">
            <li><a href="{{ route('home') }}" class="hover:text-sage-900 transition-colors duration-200 relative group" wire:navigate>Beranda
                <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-sage-500 transition-all duration-300 group-hover:w-full"></span>
            </a></li>
            <li><a href="{{ route('products') }}" class="hover:text-sage-900 transition-colors duration-200 relative group" wire:navigate>Koleksi
                <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-sage-500 transition-all duration-300 group-hover:w-full"></span>
            </a></li>
            <li><a href="{{ route('about') }}" class="hover:text-sage-900 transition-colors duration-200 relative group" wire:navigate>Tentang
                <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-sage-500 transition-all duration-300 group-hover:w-full"></span>
            </a></li>
            <li><a href="{{ route('home') }}#faq" class="hover:text-sage-900 transition-colors duration-200 relative group">FAQ
                <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-sage-500 transition-all duration-300 group-hover:w-full"></span>
            </a></li>
            <li><a href="{{ route('contact') }}" class="hover:text-sage-900 transition-colors duration-200 relative group" wire:navigate>Kontak
                <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-sage-500 transition-all duration-300 group-hover:w-full"></span>
            </a></li>
        </ul>
        <div class="flex items-center gap-3">
            <button id="search-btn" class="text-sage-700 hover:text-sage-900 transition-colors p-2 rounded-full hover:bg-sage-100" aria-label="Cari">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/></svg>
            </button>
            <button id="wishlist-btn" class="relative text-sage-700 hover:text-sage-900 transition-colors p-2 rounded-full hover:bg-sage-100" aria-label="Wishlist">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/></svg>
                <span id="wishlist-badge" class="hidden absolute -top-1 -right-1 bg-gold text-charcoal text-[10px] w-4 h-4 rounded-full flex items-center justify-center font-sans font-bold">0</span>
            </button>
            <button id="open-cart" class="relative text-sage-700 hover:text-sage-900 transition-colors p-2 rounded-full hover:bg-sage-100" aria-label="Keranjang">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z"/></svg>
                <span id="cart-badge" class="hidden absolute -top-1 -right-1 bg-sage-500 text-white text-[10px] w-4 h-4 rounded-full flex items-center justify-center font-sans font-bold">0</span>
            </button>
            @auth
            <a href="{{ route('admin.dashboard') }}" class="text-sage-700 hover:text-sage-900 transition-colors p-2 rounded-full hover:bg-sage-100 hidden md:block" aria-label="Akun">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/></svg>
            </a>
            @else
            <a href="{{ route('login') }}" class="text-sage-700 hover:text-sage-900 transition-colors p-2 rounded-full hover:bg-sage-100 hidden md:block" aria-label="Login">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9"/></svg>
            </a>
            @endauth
            <div class="theme-toggle ml-1 hidden md:block" id="theme-toggle" role="switch" aria-label="Toggle dark mode"></div>
            <button id="mobile-menu-btn" class="md:hidden text-sage-700 p-2 rounded-full hover:bg-sage-100" aria-label="Menu" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/></svg>
            </button>
        </div>
    </div>
    
    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden mt-3 bg-cream/95 backdrop-blur-md border border-sage-200 px-6 py-4 space-y-3 rounded-lg shadow-lg">
        <a href="{{ route('home') }}" class="block text-sm font-medium text-sage-800 tracking-wide hover:text-sage-500 py-2" wire:navigate>Beranda</a>
        <a href="{{ route('products') }}" class="block text-sm font-medium text-sage-800 tracking-wide hover:text-sage-500 py-2" wire:navigate>Koleksi</a>
        <a href="{{ route('about') }}" class="block text-sm font-medium text-sage-800 tracking-wide hover:text-sage-500 py-2" wire:navigate>Tentang</a>
        <a href="{{ route('home') }}#faq" class="block text-sm font-medium text-sage-800 tracking-wide hover:text-sage-500 py-2">FAQ</a>
        <a href="{{ route('contact') }}" class="block text-sm font-medium text-sage-800 tracking-wide hover:text-sage-500 py-2" wire:navigate>Kontak</a>
        <div class="pt-3 border-t border-sage-200">
            <p class="text-xs text-sage-500 mb-2">Mode Tampilan</p>
            <div class="theme-toggle" id="theme-toggle-mobile"></div>
        </div>
    </div>
</nav>
