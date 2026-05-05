{{-- SINGLE ROOT ELEMENT --}}
<div id="product-detail-view" class="view-section active">
    
    {{-- Breadcrumb --}}
    <div class="pt-24 pb-4 px-6 lg:px-14 bg-cream">
        <div class="max-w-7xl mx-auto">
            <nav class="flex items-center gap-2 font-sans text-xs text-sage-500">
                <a href="{{ route('home') }}" class="hover:text-sage-700 transition-colors">Beranda</a>
                <span class="bc-sep">›</span>
                <a href="{{ route('home') }}#produk" class="hover:text-sage-700 transition-colors">{{ $product->category->name }}</a>
                <span class="bc-sep">›</span>
                <span class="text-sage-700 font-medium">{{ $product->name }}</span>
            </nav>
        </div>
    </div>

    {{-- Main Product Section --}}
    <main class="px-6 lg:px-14 py-10 bg-cream">
        <div class="max-w-7xl mx-auto">
            <div class="grid lg:grid-cols-2 gap-12 xl:gap-20">
                
                {{-- LEFT: GALLERY --}}
                <div class="flex flex-col gap-4">
                    <div class="relative overflow-hidden bg-parchment aspect-[4/3] lg:aspect-[3/3.2]">
                        <img id="main-img" src="{{ $product->images[$activeImageIndex]?->path ?? 'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?q=80&w=1200' }}" 
                             alt="{{ $product->name }}" class="w-full h-full object-cover transition-opacity duration-300" />
                        @if($product->is_featured)
                        <span class="absolute top-4 left-4 bg-sage-700 text-white text-xs px-3 py-1 font-sans font-medium tracking-wide">TERLARIS</span>
                        @endif
                        <button wire:click="addToCart" class="absolute bottom-4 right-4 bg-sage-700 text-white px-4 py-2 rounded-full text-xs font-semibold hover:bg-sage-800 transition-colors shadow-lg flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.5v15m7.5-7.5h-15"/></svg>
                            BELI SEKARANG
                        </button>
                    </div>
                    
                    <div class="grid grid-cols-5 gap-2">
                        @foreach($product->images as $index => $image)
                        <div class="thumb-item {{ $loop->first ? 'active' : '' }} overflow-hidden aspect-square bg-parchment cursor-pointer border-2 {{ $loop->first ? 'border-sage-700' : 'border-transparent' }} rounded-lg"
                             wire:click="changeImage({{ $index }})">
                            <img src="{{ $image->path }}" class="w-full h-full object-cover" alt="Thumbnail {{ $loop->iteration }}" />
                        </div>
                        @endforeach
                        {{-- Fallback jika gambar < 5 --}}
                        @for($i = $product->images->count(); $i < 5; $i++)
                        <div class="thumb-item opacity-40 overflow-hidden aspect-square bg-parchment rounded-lg"></div>
                        @endfor
                    </div>
                </div>

                {{-- RIGHT: PRODUCT INFO --}}
                <div class="flex flex-col gap-6">
                    <div>
                        <p class="font-sans text-xs tracking-widest uppercase text-sage-500 mb-2">{{ $product->category->name }}</p>
                        <h1 class="font-serif text-3xl lg:text-4xl font-light text-sage-900 leading-tight mb-3">{{ $product->name }}</h1>
                        <div class="flex items-center gap-3 mb-1">
                            <div class="stars flex text-gold">★★★★★</div>
                            <span class="font-sans text-sm font-medium text-sage-800">{{ number_format($product->rating_average, 1) }}</span>
                            <span class="font-sans text-xs text-sage-400">({{ $product->review_count }} ulasan)</span>
                            <span class="text-sage-200">·</span>
                            <span class="font-sans text-xs text-sage-500">{{ $product->sold_count }} terjual</span>
                        </div>
                        <div class="flex items-center gap-2 mt-2">
                            <span class="w-2 h-2 rounded-full {{ $product->stock > 0 ? 'bg-emerald-500' : 'bg-red-500' }}"></span>
                            <span class="font-sans text-xs text-sage-600 font-medium">{{ $product->stock > 0 ? 'Stok tersedia' : 'Habis' }}</span>
                            @if($product->stock > 0 && $product->stock <= 5)
                            <span class="font-sans text-xs text-red-500 font-medium">Tersisa {{ $product->stock }} unit</span>
                            @endif
                        </div>
                    </div>

                    <div class="py-4 border-y border-sage-100">
                        <div class="flex items-end gap-3">
                            <p class="font-serif text-4xl text-sage-900 font-light">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                            @if($product->discount_price)
                            <p class="font-sans text-sm text-sage-400 line-through mb-1">Rp {{ number_format($product->discount_price, 0, ',', '.') }}</p>
                            <span class="bg-red-50 text-red-600 text-xs font-sans font-semibold px-2 py-1 mb-1">-{{ $product->discount_percentage }}%</span>
                            @endif
                        </div>
                    </div>

                    <p class="font-sans text-sm text-sage-600 leading-relaxed font-light">{{ Str::limit($product->description, 200) }}</p>

                    {{-- Variant Picker --}}
                    @if($product->variants)
                    <div>
                        <p class="font-sans text-xs tracking-widest uppercase text-sage-500 mb-3 font-medium">
                            Varian: <span class="text-sage-800 font-semibold normal-case tracking-normal">{{ $selectedVariant }}</span>
                        </p>
                        <div class="flex gap-3 flex-wrap">
                            @foreach($product->variants as $variant)
                            <button wire:click="selectVariant('{{ $variant }}')" 
                                    class="w-8 h-8 rounded-full border-2 transition-all {{ $selectedVariant === $variant ? 'border-sage-700 scale-110 shadow-md' : 'border-sage-200 hover:border-sage-400' }}"
                                    style="background: {{ strtolower($variant) === 'default' ? '#e5e7eb' : '#' . substr(md5($variant), 0, 6) }}">
                            </button>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    {{-- Finishing --}}
                    @if($product->finishes)
                    <div>
                        <p class="font-sans text-xs tracking-widest uppercase text-sage-500 mb-3 font-medium">
                            Finishing: <span class="text-sage-800 font-semibold normal-case tracking-normal">{{ $selectedFinish }}</span>
                        </p>
                        <div class="flex gap-2 flex-wrap">
                            @foreach($product->finishes as $finish)
                            <button wire:click="selectFinish('{{ $finish }}')" 
                                    class="font-sans text-xs px-4 py-2 border transition-all {{ $selectedFinish === $finish ? 'border-sage-700 bg-sage-700 text-white' : 'border-sage-200 text-sage-600 hover:border-sage-400' }}">
                                {{ $finish }}
                            </button>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    {{-- Quantity --}}
                    <div class="flex items-center gap-4">
                        <p class="font-sans text-xs tracking-widest uppercase text-sage-500 font-medium">Qty:</p>
                        <div class="flex items-center border border-sage-300 rounded overflow-hidden">
                            <button wire:click="changeQty(-1)" class="w-10 h-10 flex items-center justify-center text-sage-600 hover:bg-sage-100 transition-colors">−</button>
                            <span class="w-12 text-center font-sans text-sm font-semibold text-sage-900">{{ $qty }}</span>
                            <button wire:click="changeQty(1)" class="w-10 h-10 flex items-center justify-center text-sage-600 hover:bg-sage-100 transition-colors">+</button>
                        </div>
                        <p class="font-sans text-xs text-sage-400">Maks. {{ min($product->stock, 10) }} unit</p>
                    </div>

                    {{-- CTA Buttons --}}
                    <div class="flex flex-col gap-3">
                        <button wire:click="addToCart" class="btn-sage w-full py-4 text-sm font-sans font-semibold flex items-center justify-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.5v15m7.5-7.5h-15"/></svg>
                            TAMBAHKAN KE KERANJANG
                        </button>
                        <a href="https://wa.me/6281234567890?text=Halo VoktaStyle, saya tertarik dengan {{ urlencode($product->name) }}" target="_blank" class="btn-wa w-full py-4 text-sm font-sans font-semibold flex items-center justify-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/></svg>
                            CHAT WHATSAPP
                        </a>
                    </div>

                    {{-- Trust Badges --}}
                    <div class="grid grid-cols-3 gap-3 pt-4 border-t border-sage-100">
                        <div class="flex flex-col items-center text-center gap-1.5">
                            <svg class="w-5 h-5 text-sage-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12"/></svg>
                            <p class="font-sans text-xs text-sage-600 font-medium">Gratis Ongkir</p>
                        </div>
                        <div class="flex flex-col items-center text-center gap-1.5">
                            <svg class="w-5 h-5 text-sage-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/></svg>
                            <p class="font-sans text-xs text-sage-600 font-medium">Garansi 5 Thn</p>
                        </div>
                        <div class="flex flex-col items-center text-center gap-1.5">
                            <svg class="w-5 h-5 text-sage-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99"/></svg>
                            <p class="font-sans text-xs text-sage-600 font-medium">Retur 30 Hari</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- TABS --}}
            <div class="mt-20">
                <div class="border-b border-sage-200 flex gap-8 mb-10">
                    <button class="tab-btn active pb-4 font-sans text-sm font-medium text-sage-500" data-tab="spesifikasi">Spesifikasi</button>
                    <button class="tab-btn pb-4 font-sans text-sm font-medium text-sage-500" data-tab="deskripsi">Deskripsi</button>
                    <button class="tab-btn pb-4 font-sans text-sm font-medium text-sage-500" data-tab="ulasan">Ulasan ({{ $product->review_count }})</button>
                </div>

                <div id="tab-spesifikasi" class="tab-content">
                    <div class="grid md:grid-cols-2 gap-8">
                        <div>
                            <h3 class="font-serif text-2xl font-light text-sage-900 mb-6">Spesifikasi Produk</h3>
                            <table class="w-full">
                                <tbody>
                                    @if($product->specifications)
                                        @foreach($product->specifications as $key => $value)
                                        <tr class="spec-row border-b border-sage-100">
                                            <td class="py-3.5 font-sans text-xs tracking-widest uppercase text-sage-400 font-medium w-40">{{ $key }}</td>
                                            <td class="py-3.5 font-sans text-sm text-sage-800">{{ $value }}</td>
                                        </tr>
                                        @endforeach
                                    @else
                                        <tr><td colspan="2" class="py-4 text-sage-500">Belum ada spesifikasi.</td></tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div id="tab-deskripsi" class="tab-content hidden">
                    <div class="max-w-3xl prose font-sans text-sm text-sage-700 font-light leading-relaxed">
                        {!! nl2br(e($product->description)) !!}
                    </div>
                </div>

                <div id="tab-ulasan" class="tab-content hidden">
                    <div class="grid md:grid-cols-3 gap-12">
                        <div class="text-center">
                            <p class="font-serif text-7xl font-light text-sage-900">{{ number_format($product->rating_average, 1) }}</p>
                            <div class="stars flex gap-1 justify-center my-3">★★★★★</div>
                            <p class="font-sans text-sm text-sage-500">{{ $product->review_count }} ulasan</p>
                        </div>
                        <div class="md:col-span-2 space-y-6">
                            @forelse($product->reviews as $review)
                            <div class="border-b border-sage-100 pb-6">
                                <div class="flex items-center gap-3 mb-2">
                                    <div class="w-9 h-9 rounded-full bg-sage-200 flex items-center justify-center font-serif text-sage-700 text-sm font-semibold">
                                        {{ substr($review->user->name, 0, 2) }}
                                    </div>
                                    <div>
                                        <p class="font-sans font-semibold text-sage-900 text-sm">{{ $review->user->name }}</p>
                                        <p class="font-sans text-xs text-sage-400">{{ $review->created_at->diffForHumans() }}</p>
                                    </div>
                                    <div class="stars flex gap-0.5 ml-auto">★★★★★</div>
                                </div>
                                <p class="font-serif text-base text-sage-700 font-light italic leading-relaxed">{{ $review->comment }}</p>
                            </div>
                            @empty
                            <p class="text-sage-500">Belum ada ulasan untuk produk ini.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    {{-- Tab Switching JS (Pure UI, no Livewire reload) --}}
    <script>
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
                document.querySelectorAll('.tab-content').forEach(c => c.classList.add('hidden'));
                btn.classList.add('active');
                document.getElementById('tab-' + btn.dataset.tab).classList.remove('hidden');
            });
        });
    });
    </script>
</div>