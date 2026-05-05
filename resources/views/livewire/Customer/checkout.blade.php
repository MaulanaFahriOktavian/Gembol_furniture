<div class="min-h-screen bg-cream py-12 px-6">
    <div class="max-w-6xl mx-auto">
        
        <!-- Header -->
        <div class="mb-8 text-center">
            <h1 class="font-serif text-4xl text-sage-900 font-light">Checkout</h1>
            <p class="text-sage-500 mt-2 font-sans">Lengkapi data untuk memproses pesanan Anda</p>
        </div>

        <div class="grid lg:grid-cols-3 gap-8">
            
            <!-- FORMULIR (Kiri - 2/3) -->
            <div class="lg:col-span-2 space-y-6">
                
                <!-- Data Penerima -->
                <div class="bg-white p-6 rounded-lg shadow-sm border border-sage-100">
                    <h3 class="font-serif text-xl text-sage-900 mb-4 border-b border-sage-100 pb-2">📍 Alamat Pengiriman</h3>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="md:col-span-2">
                            <label class="block text-xs font-sans uppercase tracking-wider text-sage-500 mb-1">Nama Lengkap</label>
                            <input wire:model="name" type="text" class="w-full bg-cream border border-sage-200 rounded p-3 text-sage-900 focus:ring-2 focus:ring-sage-500 outline-none @error('name') border-red-500 @enderror" placeholder="Nama sesuai identitas">
                            @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-xs font-sans uppercase tracking-wider text-sage-500 mb-1">Nomor WhatsApp</label>
                            <input wire:model="phone" type="text" class="w-full bg-cream border border-sage-200 rounded p-3 text-sage-900 focus:ring-2 focus:ring-sage-500 outline-none @error('phone') border-red-500 @enderror" placeholder="0812xxxxxxxx">
                            @error('phone') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-xs font-sans uppercase tracking-wider text-sage-500 mb-1">Alamat Lengkap</label>
                            <textarea wire:model="address" rows="3" class="w-full bg-cream border border-sage-200 rounded p-3 text-sage-900 focus:ring-2 focus:ring-sage-500 outline-none @error('address') border-red-500 @enderror" placeholder="Nama jalan, No. rumah, RT/RW, Kelurahan, Kecamatan, Kota"></textarea>
                            @error('address') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-xs font-sans uppercase tracking-wider text-sage-500 mb-1">Catatan Pesanan (Opsional)</label>
                            <input wire:model="notes" type="text" class="w-full bg-cream border border-sage-200 rounded p-3 text-sage-900 focus:ring-2 focus:ring-sage-500 outline-none" placeholder="Contoh: Tolong antar setelah jam 5 sore">
                        </div>
                    </div>
                </div>

                <!-- Metode Pembayaran (Placeholder) -->
                <div class="bg-white p-6 rounded-lg shadow-sm border border-sage-100">
                    <h3 class="font-serif text-xl text-sage-900 mb-4 border-b border-sage-100 pb-2">💳 Metode Pembayaran</h3>
                    <div class="space-y-3">
                        <label class="flex items-center gap-3 p-4 border-2 border-sage-500 bg-sage-50 rounded-lg cursor-pointer">
                            <input type="radio" name="payment" checked class="w-4 h-4 text-sage-600">
                            <div>
                                <span class="font-sans text-sm text-sage-800 font-medium block">Transfer Bank / E-Wallet (Manual)</span>
                                <span class="text-xs text-sage-500">Konfirmasi pembayaran via WhatsApp setelah order</span>
                            </div>
                        </label>
                        <label class="flex items-center gap-3 p-4 border border-sage-200 rounded-lg cursor-pointer opacity-50">
                            <input type="radio" name="payment" disabled class="w-4 h-4 text-sage-600">
                            <div>
                                <span class="font-sans text-sm text-sage-800 font-medium block">Payment Gateway (Coming Soon)</span>
                                <span class="text-xs text-sage-500">Midtrans / Xendit integration</span>
                            </div>
                        </label>
                    </div>
                </div>

            </div>

            <!-- RINGKASAN (Kanan - 1/3) -->
            <div class="lg:col-span-1">
                <div class="bg-white p-6 rounded-lg shadow-sm border border-sage-100 sticky top-24">
                    <h3 class="font-serif text-xl text-sage-900 mb-4 border-b border-sage-100 pb-2">📋 Ringkasan Pesanan</h3>
                    
                    <!-- List Items -->
                    <div class="space-y-4 max-h-64 overflow-y-auto mb-6 pr-2">
                        @foreach($cartItems as $item)
                        @php
                            $name = is_array($item) ? ($item['name'] ?? 'Produk') : ($item->product->name ?? 'Produk');
                            $price = is_array($item) ? ($item['price'] ?? 0) : ($item->product->price ?? 0);
                            $qty = is_array($item) ? ($item['qty'] ?? 1) : ($item->qty ?? 1);
                            $img = is_array($item) ? ($item['img'] ?? '') : ($item->product->images[0] ?? '');
                        @endphp
                        <div class="flex gap-3">
                            <div class="w-16 h-16 bg-sage-100 rounded overflow-hidden shrink-0">
                                <img src="{{ $img ?: asset('images/placeholder.jpg') }}" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-sans text-sage-900 line-clamp-1">{{ $name }}</p>
                                <p class="text-xs text-sage-500">{{ $qty }} × Rp {{ number_format($price, 0, ',', '.') }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Total Calculation -->
                    <div class="border-t border-sage-100 pt-4 space-y-2 font-sans text-sm text-sage-600">
                        <div class="flex justify-between">
                            <span>Subtotal</span>
                            <span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Ongkos Kirim</span>
                            <span class="text-green-600 font-medium">Gratis</span>
                        </div>
                        <div class="flex justify-between font-bold text-sage-900 text-lg pt-2 border-t border-sage-100">
                            <span>Total</span>
                            <span>Rp {{ number_format($grandTotal, 0, ',', '.') }}</span>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button wire:click="placeOrder" wire:loading.attr="disabled" 
                            class="mt-6 w-full bg-sage-800 hover:bg-sage-900 disabled:opacity-50 disabled:cursor-not-allowed text-white font-sans font-bold uppercase tracking-wider py-3.5 rounded-lg transition-colors flex items-center justify-center gap-2">
                        <span wire:loading.remove>✅ Buat Pesanan</span>
                        <span wire:loading>⏳ Memproses...</span>
                    </button>

                    <p class="text-center text-xs text-sage-400 mt-4">
                        Dengan memesan, Anda menyetujui <a href="#" class="underline hover:text-sage-600">syarat & ketentuan</a> kami.
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>