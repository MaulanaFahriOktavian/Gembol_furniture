<div class="min-h-screen bg-cream py-12 px-6">
    <div class="max-w-6xl mx-auto">
        
        <!-- Header -->
        <h1 class="font-serif text-4xl text-sage-900 mb-8 text-center">Checkout</h1>

        <div class="grid lg:grid-cols-3 gap-8">
            
            <!-- FORMULIR (Kiri) -->
            <div class="lg:col-span-2 space-y-6">
                
                <!-- Data Penerima -->
                <div class="bg-white p-6 rounded-lg shadow-sm border border-sage-100">
                    <h3 class="font-serif text-xl text-sage-900 mb-4 border-b border-sage-100 pb-2">Data Penerima</h3>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-sans uppercase tracking-wider text-sage-500 mb-1">Nama Lengkap</label>
                            <input wire:model="name" type="text" class="w-full bg-cream border border-sage-200 rounded p-3 text-sage-900 focus:ring-2 focus:ring-sage-500 outline-none" placeholder="Nama sesuai KTP">
                        </div>
                        <div>
                            <label class="block text-xs font-sans uppercase tracking-wider text-sage-500 mb-1">No. WhatsApp</label>
                            <input wire:model="phone" type="text" class="w-full bg-cream border border-sage-200 rounded p-3 text-sage-900 focus:ring-2 focus:ring-sage-500 outline-none" placeholder="0812xxxxxxxx">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-xs font-sans uppercase tracking-wider text-sage-500 mb-1">Alamat Lengkap</label>
                            <textarea wire:model="address" rows="3" class="w-full bg-cream border border-sage-200 rounded p-3 text-sage-900 focus:ring-2 focus:ring-sage-500 outline-none" placeholder="Nama Jalan, No. Rumah, RT/RW, Kelurahan, Kecamatan"></textarea>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-xs font-sans uppercase tracking-wider text-sage-500 mb-1">Catatan (Opsional)</label>
                            <input wire:model="notes" type="text" class="w-full bg-cream border border-sage-200 rounded p-3 text-sage-900 focus:ring-2 focus:ring-sage-500 outline-none" placeholder="Contoh: Tolong taruh di teras depan">
                        </div>
                    </div>
                </div>

                <!-- Metode Pembayaran (Placeholder) -->
                <div class="bg-white p-6 rounded-lg shadow-sm border border-sage-100">
                    <h3 class="font-serif text-xl text-sage-900 mb-4 border-b border-sage-100 pb-2">Metode Pembayaran</h3>
                    <div class="flex items-center gap-3 p-4 border-2 border-sage-500 bg-sage-50 rounded-lg">
                        <div class="w-5 h-5 rounded-full border-4 border-sage-700"></div>
                        <span class="font-sans text-sm text-sage-800 font-medium">Transfer Bank / E-Wallet (Manual)</span>
                    </div>
                </div>

            </div>

            <!-- RINGKASAN (Kanan) -->
            <div class="lg:col-span-1">
                <div class="bg-white p-6 rounded-lg shadow-sm border border-sage-100 sticky top-24">
                    <h3 class="font-serif text-xl text-sage-900 mb-4 border-b border-sage-100 pb-2">Ringkasan Belanja</h3>
                    
                    <div class="space-y-4 max-h-64 overflow-y-auto mb-6 pr-2">
                        @foreach($cartItems as $item)
                        @php
                            $name = is_array($item) ? ($item['name'] ?? 'Produk') : ($item->product->name ?? 'Produk');
                            $price = is_array($item) ? ($item['price'] ?? 0) : ($item->product->price ?? 0);
                            $qty = is_array($item) ? ($item['qty'] ?? 1) : ($item->qty ?? 1);
                            $img = is_array($item) ? ($item['img'] ?? '') : ($item->product->primaryImage->path ?? '');
                        @endphp
                        <div class="flex gap-3">
                            <div class="w-16 h-16 bg-sage-100 rounded overflow-hidden shrink-0">
                                <img src="{{ $img }}" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <p class="text-sm font-sans text-sage-900 line-clamp-1">{{ $name }}</p>
                                <p class="text-xs text-sage-500">{{ $qty }} x Rp {{ number_format($price, 0, ',', '.') }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="border-t border-sage-100 pt-4 space-y-2 font-sans text-sm text-sage-600">
                        <div class="flex justify-between">
                            <span>Subtotal</span>
                            <span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Ongkir</span>
                            <span>Gratis</span>
                        </div>
                        <div class="flex justify-between font-bold text-sage-900 text-lg pt-2 border-t border-sage-100">
                            <span>Total</span>
                            <span>Rp {{ number_format($grandTotal, 0, ',', '.') }}</span>
                        </div>
                    </div>

                    <button wire:click="placeOrder" wire:loading.attr="disabled" 
                            class="mt-6 w-full btn-sage py-3 font-sans font-bold uppercase tracking-wider flex items-center justify-center gap-2">
                        <span wire:loading.remove>Pesan Sekarang</span>
                        <span wire:loading>Memproses...</span>
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>