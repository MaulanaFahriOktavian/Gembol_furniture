<nav x-data="{ scrolled: false, mobileMenuOpen: false }" 
     @scroll.window="scrolled = (window.pageYOffset > 20)"
     :class="{ 'glass-card text-charcoal-800': scrolled, 'bg-transparent text-charcoal-800': !scrolled, 'dark:text-beige-100': true }"
     class="fixed top-0 inset-x-0 z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20 items-center">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ route('home') }}" class="font-serif text-2xl font-bold tracking-widest uppercase">
                    BeWood<span class="text-gold-500">.</span>
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex space-x-8 items-center">
                <a href="{{ route('home') }}" class="text-sm font-medium uppercase tracking-widest hover:text-gold-500 transition-colors">Home</a>
                <a href="{{ route('about') ?? '#' }}" class="text-sm font-medium uppercase tracking-widest hover:text-gold-500 transition-colors">About</a>
                <a href="{{ route('products') ?? '#' }}" class="text-sm font-medium uppercase tracking-widest hover:text-gold-500 transition-colors">Collections</a>
                <a href="{{ route('gallery') ?? '#' }}" class="text-sm font-medium uppercase tracking-widest hover:text-gold-500 transition-colors">Gallery</a>
                <a href="{{ route('contact') ?? '#' }}" class="text-sm font-medium uppercase tracking-widest hover:text-gold-500 transition-colors">Contact</a>
            </div>

            <!-- Actions -->
            <div class="hidden md:flex items-center space-x-4">
                <a href="{{ route('custom-request') ?? '#' }}" class="px-5 py-2 border border-gold-500 text-gold-500 hover:bg-gold-500 hover:text-white transition-all text-sm uppercase tracking-wider font-medium">Custom Order</a>
            </div>

            <!-- Mobile menu button -->
            <div class="flex items-center md:hidden">
                <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="hover:text-gold-500 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path x-show="mobileMenuOpen" style="display: none;" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="mobileMenuOpen" x-transition class="md:hidden glass-card absolute top-20 inset-x-0 border-t border-white/20 shadow-xl">
        <div class="px-4 pt-2 pb-6 space-y-1">
            <a href="{{ route('home') }}" class="block px-3 py-3 text-base font-medium uppercase tracking-widest hover:text-gold-500">Home</a>
            <a href="{{ route('about') ?? '#' }}" class="block px-3 py-3 text-base font-medium uppercase tracking-widest hover:text-gold-500">About</a>
            <a href="{{ route('products') ?? '#' }}" class="block px-3 py-3 text-base font-medium uppercase tracking-widest hover:text-gold-500">Collections</a>
            <a href="{{ route('gallery') ?? '#' }}" class="block px-3 py-3 text-base font-medium uppercase tracking-widest hover:text-gold-500">Gallery</a>
            <a href="{{ route('contact') ?? '#' }}" class="block px-3 py-3 text-base font-medium uppercase tracking-widest hover:text-gold-500">Contact</a>
            <a href="{{ route('custom-request') ?? '#' }}" class="block px-3 py-3 mt-4 text-center border border-gold-500 text-gold-500 font-medium uppercase tracking-widest hover:bg-gold-500 hover:text-white transition">Custom Order</a>
        </div>
    </div>
</nav>
