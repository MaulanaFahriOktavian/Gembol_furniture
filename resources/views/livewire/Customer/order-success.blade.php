<div class="min-h-screen bg-cream py-16 px-6 flex items-center justify-center">
    <div class="max-w-2xl w-full">
        
        <!-- Success Card -->
        <div class="bg-white rounded-2xl shadow-lg border border-sage-100 overflow-hidden">
            
            <!-- Header -->
            <div class="bg-gradient-to-r from-sage-600 to-sage-800 px-8 py-10 text-center">
                <div class="w-20 h-20 mx-auto mb-4 bg-white/20 rounded-full flex items-center justify-center">
                    <svg class="w-10 h-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <h1 class="font-serif text-3xl text-white font-light">Pesanan Berhasil!</h1>
                <p class="text-sage-200 mt-2 font-sans">Terima kasih telah berbelanja di VoktaStyle</p>
            </div>

            <!-- Content -->
            <div class="p-8 space-y-6">
                
                <!-- Order Info -->
                <div class="bg-sage-50 rounded-lg p-5">
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-sm text-sage-500 font-sans">Nomor Order</span>
                        <span class="font-mono font-bold text-sage-900">#{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-sage-500 font-sans">Status</span>
                        <span class="px-3 py-1 bg-yellow-100 text-yellow-800 text-xs font-medium rounded-full">
                            Menunggu Konfirmasi
                        </span>
                    </div>
                </div>

                <!-- Order Summary -->
                <div>
                    <h3 class="font-serif text-lg text-sage-900 mb-3">Ringkasan Pesanan</h3>
                    <div class="space-y-3">
                        @foreach($order->orderItems as $item)
                        <div class="flex items-start gap-3 pb-3 border-b border-sage-100 last:border-0">
                            <img src="{{ $item->product->images[0] ?? asset('images/placeholder.jpg') }}" 
                                 class="w-14 h-14 rounded object-cover bg-sage-100">
                            <div class="flex-1 min-w-0">
                                <p class="font-sans text-sm text-sage-900 line-clamp-1">{{ $item->name }}</p>
                                @if($item->variant || $item->finish)
                                <p class="text-xs text-sage-400">
                                    {{ $item->variant }}{{ $item->variant && $item->finish ? ' • ' : '' }}{{ $item->finish }}
                                </p>
                                @endif
                                <p class="text-xs text-sage-500 mt-1">{{ $item->qty }} × Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                            </div>
                            <span class="font-medium text-sage-800 text-sm">
                                Rp {{ number_format($item->price * $item->qty, 0, ',', '.') }}
                            </span>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Total -->
                <div class="border-t border-sage-200 pt-4">
                    <div class="flex justify-between items-center">
                        <span class="font-sans text-sage-600">Total Pembayaran</span>
                        <span class="font-serif text-2xl text-sage-900 font-bold">
                            Rp {{ number_format($order->total, 0, ',', '.') }}
                        </span>
                    </div>
                </div>

                <!-- WhatsApp CTA -->
                <div class="bg-green-50 border border-green-200 rounded-lg p-5 text-center">
                    <p class="font-sans text-sm text-green-800 mb-4">
                        📱 Konfirmasi pesanan Anda via WhatsApp untuk proses lebih cepat
                    </p>
                    <a href="https://wa.me/6281234567890?text={{ $whatsappMessage }}" 
                       target="_blank"
                       class="inline-flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white font-sans font-semibold px-6 py-3 rounded-lg transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
                            <path d="M12 0C5.373 0 0 5.373 0 12c0 2.123.556 4.116 1.529 5.845L.057 23.617a.5.5 0 00.612.612l5.772-1.472A11.957 11.957 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.6a9.593 9.593 0 01-4.883-1.335l-.35-.208-3.627.925.954-3.527-.228-.362A9.558 9.558 0 012.4 12C2.4 6.698 6.698 2.4 12 2.4S21.6 6.698 21.6 12 17.302 21.6 12 21.6z"/>
                        </svg>
                        Konfirmasi via WhatsApp
                    </a>
                </div>

                <!-- Secondary Actions -->
                <div class="flex flex-col sm:flex-row gap-3 pt-2">
                    <a href="{{ route('home') }}" class="flex-1 text-center px-4 py-3 border border-sage-200 rounded-lg font-sans text-sm text-sage-600 hover:bg-sage-50 transition-colors">
                        ← Kembali Belanja
                    </a>
                    <a href="https://wa.me/6281234567890" target="_blank" class="flex-1 text-center px-4 py-3 bg-sage-100 hover:bg-sage-200 rounded-lg font-sans text-sm text-sage-800 transition-colors">
                        Chat Customer Service
                    </a>
                </div>

            </div>
        </div>

        <!-- Info Box -->
        <div class="mt-8 text-center">
            <p class="font-sans text-xs text-sage-400">
                💡 Tips: Simpan nomor order <strong>#{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</strong> untuk referensi
            </p>
            <p class="font-sans text-xs text-sage-400 mt-1">
                Kami akan menghubungi Anda via WhatsApp dalam 1×24 jam untuk konfirmasi pembayaran
            </p>
        </div>

    </div>
    {{-- Auto redirect ke WA setelah 3 detik --}}
<script>
setTimeout(() => {
    const waLink = document.querySelector('a[href*="wa.me"]');
    if (waLink && !sessionStorage.getItem('wa_clicked_{{ $order->id }}')) {
        // Tampilkan konfirmasi dulu
        if (confirm('📱 Buka WhatsApp untuk konfirmasi pesanan?')) {
            sessionStorage.setItem('wa_clicked_{{ $order->id }}', '1');
            waLink.click();
        }
    }
}, 3000);
</script>
</div>