<aside id="cart-sidebar" class="fixed top-0 right-0 h-full w-full sm:w-[400px] bg-cream z-50 shadow-2xl transform transition-transform duration-300 translate-x-full">
    <!-- Header -->
    <div class="flex items-center justify-between px-6 py-4 border-b border-sage-200 bg-white">
        <h2 class="font-serif text-xl text-sage-900">Keranjang Belanja ({{ $totalQty }})</h2>
        <button onclick="document.getElementById('cart-sidebar').classList.add('translate-x-full')" 
                class="text-sage-500 hover:text-sage-800 transition-colors">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
    </div>

    <!-- Items -->
    <div class="flex-1 overflow-y-auto p-6 space-y-4 h-[calc(100vh-180px)]">
        @if(count($cartItems) === 0)
            <div class="text-center py-12 text-sage-500">
                <svg class="w-12 h-12 mx-auto mb-3 opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                <p>Keranjang masih kosong</p>
            </div>
        @else
            @foreach($cartItems as $index => $item)
            <div class="flex gap-4 bg-white p-3 rounded-lg border border-sage-100">
                @php
                    $img = is_array($item) ? ($item['img'] ?? asset('images/placeholder.jpg')) : ($item->product->images[0] ?? asset('images/placeholder.jpg'));
                    $name = is_array($item) ? ($item['name'] ?? 'Produk') : ($item->product->name ?? 'Produk');
                    $price = is_array($item) ? ($item['price'] ?? 0) : ($item->product->price ?? 0);
                    $qty = is_array($item) ? ($item['qty'] ?? 1) : ($item->qty ?? 1);
                @endphp
                <img src="{{ $img }}" class="w-16 h-16 object-cover rounded bg-sage-100" />
                <div class="flex-1">
                    <p class="font-sans text-sm text-sage-900 line-clamp-1">{{ $name }}</p>
                    <p class="text-sage-600 text-xs mt-1">Rp {{ number_format($price, 0, ',', '.') }}</p>
                    <div class="flex items-center gap-2 mt-2">
                        <button wire:click="updateQty({{ $index }}, {{ $qty - 1 }})" class="w-6 h-6 rounded bg-sage-100 hover:bg-sage-200 flex items-center justify-center text-sage-700">−</button>
                        <span class="text-sm font-medium w-6 text-center">{{ $qty }}</span>
                        <button wire:click="updateQty({{ $index }}, {{ $qty + 1 }})" class="w-6 h-6 rounded bg-sage-100 hover:bg-sage-200 flex items-center justify-center text-sage-700">+</button>
                        <button wire:click="removeItem({{ $index }})" class="ml-auto text-red-400 hover:text-red-600 text-xs">Hapus</button>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
    </div>

    <!-- Footer -->
    @if(count($cartItems) > 0)
    <div class="absolute bottom-0 left-0 right-0 bg-white border-t border-sage-200 p-6">
        <div class="flex justify-between items-center mb-4">
            <span class="text-sage-600 font-sans">Subtotal</span>
            <span class="text-lg font-bold text-sage-900 font-serif">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
        </div>
        <a href="{{ route('checkout') }}" class="block w-full bg-sage-800 hover:bg-sage-900 text-white text-center py-3 rounded-lg font-sans font-semibold transition-colors">
            Checkout Sekarang
        </a>
    </div>
    @endif
</aside>