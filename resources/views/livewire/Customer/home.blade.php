{{-- SINGLE ROOT ELEMENT (WAJIB untuk Livewire) --}}
<div id="landing-view" class="view-section active">
    
    <!-- ===== HERO SECTION ===== -->
    <section id="hero" class="hero">
        <div class="hero-bg">
            <img src="https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?q=80&w=2000&auto=format&fit=crop" 
                 alt="Interior mewah dengan furniture premium VoktaStyle" 
                 loading="eager" />
        </div>
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <p class="reveal text-xs md:text-sm font-sans font-semibold tracking-[0.35em] uppercase mb-6 text-sage-200/90" style="transition-delay:0.1s">
                Koleksi Furniture Premium 2025
            </p>
            <h1 class="reveal font-serif text-5xl md:text-7xl lg:text-8xl font-light leading-tight mb-7 text-white" style="transition-delay:0.2s">
                Ruang yang<br/><em class="not-italic text-sage-300 font-normal">Bercerita</em>
            </h1>
            <p class="reveal font-sans font-light text-white/90 text-lg max-w-2xl mx-auto mb-10 leading-relaxed" style="transition-delay:0.3s">
                Dari tangan pengrajin terbaik Indonesia — setiap detail dirancang dengan hati untuk menciptakan rumah yang benar-benar terasa seperti rumah.
            </p>
            <div class="reveal flex flex-wrap justify-center gap-4" style="transition-delay:0.4s">
                <a href="#produk" class="btn-primary px-9 py-4 text-xs font-sans">LIHAT KOLEKSI</a>
                <a href="#tentang" class="btn-outline px-9 py-4 text-xs font-sans">CERITA KAMI</a>
            </div>
            <div class="reveal mt-12 flex flex-wrap justify-center gap-6 text-white/75 text-xs font-sans" style="transition-delay:0.5s">
                <span class="flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12.75L11.25 15 15 9.75M12 3v18m0-18c-4.97 0-9 4.03-9 9s4.03 9 9 9 9-4.03 9-9-4.03-9-9-9z"/>
                    </svg>
                    Garansi 5 Tahun
                </span>
                <span class="flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6"/>
                    </svg>
                    Pengiriman Gratis
                </span>
                <span class="flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Konsultasi Gratis
                </span>
            </div>
        </div>
        <a href="#produk" class="absolute bottom-9 left-1/2 -translate-x-1/2 bounce-slow text-white/70 hover:text-white transition-colors" aria-label="Scroll ke bawah">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
            </svg>
        </a>
    </section>

    <!-- ===== MARQUEE STRIP ===== -->
    <div class="bg-sage-700 text-white py-3 overflow-hidden">
        <div class="marquee-track whitespace-nowrap">
            <span class="font-serif italic text-sage-100 text-base mx-10"> Kayu Jati Premium Bersertifikat</span>
            <span class="text-sage-300 mx-6">✦</span>
            <span class="font-serif italic text-sage-100 text-base mx-10">Buatan Tangan Pengrajin Lokal</span>
            <span class="text-sage-300 mx-6">✦</span>
            <span class="font-serif italic text-sage-100 text-base mx-10">Pengiriman Gratis Se-Indonesia</span>
            <span class="text-sage-300 mx-6">✦</span>
            <span class="font-serif italic text-sage-100 text-base mx-10">Garansi 5 Tahun Penuh</span>
            <span class="text-sage-300 mx-6">✦</span>
            <span class="font-serif italic text-sage-100 text-base mx-10">Konsultasi Desain Gratis</span>
            <span class="text-sage-300 mx-6">✦</span>
            <span class="font-serif italic text-sage-100 text-base mx-10">Kayu Jati Premium Bersertifikat</span>
            <span class="text-sage-300 mx-6">✦</span>
            <span class="font-serif italic text-sage-100 text-base mx-10">Buatan Tangan Pengrajin Lokal</span>
            <span class="text-sage-300 mx-6">✦</span>
            <span class="font-serif italic text-sage-100 text-base mx-10">Pengiriman Gratis Se-Indonesia</span>
            <span class="text-sage-300 mx-6">✦</span>
            <span class="font-serif italic text-sage-100 text-base mx-10">Garansi 5 Tahun Penuh</span>
            <span class="text-sage-300 mx-6">✦</span>
            <span class="font-serif italic text-sage-100 text-base mx-10">Konsultasi Desain Gratis</span>
        </div>
    </div>

    <!-- ===== KATEGORI UNGGULAN ===== -->
    <section class="py-28 px-6 lg:px-14 bg-white relative overflow-hidden">
        <div class="absolute inset-0 bg-pattern-dots opacity-50 pointer-events-none"></div>
        <div class="max-w-7xl mx-auto relative">
            <div class="text-center mb-16 reveal">
                <p class="text-xs tracking-widest uppercase font-sans font-semibold text-sage-500 mb-3">Jelajahi Koleksi</p>
                <h2 class="font-serif text-4xl lg:text-5xl font-light text-sage-900">Kategori Unggulan</h2>
                <span class="divider-sage"></span>
                <p class="font-sans text-sage-500 text-sm max-w-2xl mx-auto mt-4">
                    Setiap kategori dirancang dengan perhatian penuh terhadap detail, fungsi, dan estetika timeless.
                </p>
            </div>
            
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
    
    {{-- ✅ 1. MULAI LOOP (Pastikan ada baris ini) --}}
    @forelse($featuredProducts as $index => $product)

    <!-- Produk Card -->
    <div class="product-card bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 group cursor-pointer"
         data-id="{{ $product->id }}"
         data-name="{{ $product->name }}"
         data-price="{{ $product->price }}"
         onclick="showProductDetail('{{ $product->slug }}')">
        
        <div class="relative overflow-hidden aspect-square">
            {{-- Gunakan optional chaining (?) untuk menghindari error jika gambar kosong --}}
            <img src="{{ $product->images[0] ?? asset('images/placeholder.jpg') }}" 
                 alt="{{ $product->name }}" 
                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" 
                 loading="lazy" />
            
            @if($product->is_featured)
            <div class="absolute top-3 left-3 bg-sage-700 text-white text-xs px-2.5 py-1 font-sans font-semibold rounded-sm">
                TERLARIS
            </div>
            @endif
        </div>
        
        <div class="p-5">
            <p class="font-sans text-[10px] tracking-widest uppercase text-sage-400 font-semibold mb-1">
                {{ $product->category->name }}
            </p>
            <h4 class="font-serif text-lg text-sage-900 font-light mb-1 line-clamp-1">
                {{ $product->name }}
            </h4>
            <div class="flex items-center justify-between mt-3">
                <p class="font-serif font-semibold text-sage-800">
                    Rp {{ number_format($product->price, 0, ',', '.') }}
                </p>
                <button wire:click.stop="$dispatch('cart:add', { 
                    id: {{ $product->id }},        {{-- ✅ Key: 'id' --}}
                    qty: 1, 
                    name: '{{ addslashes($product->name) }}',
                    price: {{ $product->price }},
                    img: '{{ $product->images[0] ?? asset('images/placeholder.jpg') }}',
                    variant: '',
                    finish: ''
                })" 
                class="add-to-cart bg-sage-700 text-white w-10 h-10 rounded-full flex items-center justify-center hover:bg-sage-900 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.5v15m7.5-7.5h-15"/></svg>
                </button>
            </div>
        </div>
    </div>

    {{-- ✅ 2. AKHIR LOOP (Pastikan ada baris ini) --}}
    @empty
    <div class="col-span-4 text-center py-12">
        <p class="text-sage-500">Belum ada produk unggulan.</p>
    </div>
    @endforelse

</div>
        </div>
    </section>

    <!-- ===== PRODUK UNGGULAN ===== -->
    <section id="produk" class="py-28 px-6 lg:px-14 bg-parchment relative">
        <div class="absolute inset-0 bg-gradient-to-b from-transparent via-parchment to-white pointer-events-none"></div>
        <div class="max-w-7xl mx-auto relative">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-4 reveal">
                <div>
                    <p class="text-xs tracking-widest uppercase font-sans font-semibold text-sage-500 mb-3">Koleksi Terlaris</p>
                    <h2 class="font-serif text-4xl lg:text-5xl font-light text-sage-900">Produk Unggulan</h2>
                    <p class="font-sans text-sage-500 text-sm mt-2 max-w-md">Dipilih berdasarkan kualitas, desain, dan kepuasan pelanggan.</p>
                </div>
                <div class="flex items-center gap-3">
                    <select class="font-sans text-xs text-sage-600 bg-white border border-sage-200 rounded px-3 py-2 focus:outline-none focus:border-sage-400">
                        <option>Urutkan: Terbaru</option>
                        <option>Harga: Rendah ke Tinggi</option>
                        <option>Harga: Tinggi ke Rendah</option>
                        <option>Terlaris</option>
                        <option>Rating Tertinggi</option>
                    </select>
                    <a href="#" class="btn-outline-sage px-6 py-2.5 text-xs font-sans font-semibold inline-flex items-center gap-1">
                        LIHAT SEMUA
                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse($featuredProducts as $index => $product)
                <!-- Produk Card -->
                <div class="product-card bg-white rounded-lg overflow-hidden reveal delay-{{ $index * 100 }} cursor-pointer group"
                     data-id="{{ $product->id }}"
                     data-name="{{ $product->name }}"
                     data-price="{{ $product->price }}"
                     data-img="{{ $product->primaryImage?->path ?? 'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?q=80&w=600&auto=format&fit=crop' }}"
                     data-desc="{{ $product->short_description ?? $product->description }}"
                     data-category="{{ $product->category->name }}"
                     data-reviews="{{ $product->review_count }}">
                    
                    <div class="relative overflow-hidden aspect-square">
                        <img src="{{ $product->primaryImage?->path ?? 'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?q=80&w=600&auto=format&fit=crop' }}" 
                             alt="{{ $product->name }}" 
                             class="w-full h-full object-cover" 
                             loading="lazy" />
                        
                        @if($product->is_featured)
                        <div class="absolute top-3 left-3 bg-sage-700 text-white text-[10px] px-2.5 py-1 font-sans font-semibold tracking-wide rounded-sm">
                            TERLARIS
                        </div>
                        @endif
                        
                        <div class="absolute inset-0 bg-charcoal/0 group-hover:bg-charcoal/10 transition-colors duration-300"></div>
                        
                        <div class="absolute top-3 right-3 flex flex-col gap-2 opacity-0 group-hover:opacity-100 transition-all duration-200 translate-x-2 group-hover:translate-x-0">
                            <button class="wishlist-btn bg-white/95 rounded-full w-9 h-9 flex items-center justify-center hover:text-gold transition-colors shadow-sm" 
                                    aria-label="Tambah ke wishlist"
                                    onclick="event.stopPropagation(); toggleWishlist(this)">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/>
                                </svg>
                            </button>
                            <button class="quick-view-btn bg-white/95 rounded-full w-9 h-9 flex items-center justify-center hover:text-sage-600 transition-colors shadow-sm" 
                                    aria-label="Lihat cepat"
                                    onclick="event.stopPropagation(); openQuickViewFromCard(this)">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                    
                    <div class="p-5">
                        <p class="font-sans text-[10px] tracking-widest uppercase text-sage-400 font-semibold mb-1">
                            {{ $product->category->name }}
                        </p>
                        <h4 class="font-serif text-lg text-sage-900 font-light mb-1 line-clamp-1">
                            {{ $product->name }}
                        </h4>
                        <p class="font-sans text-xs text-sage-400 mb-3">
                            {{ $product->variants[0] ?? 'Default' }}
                        </p>
                        <div class="flex items-center justify-between">
                            <p class="font-serif font-semibold text-sage-800">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </p>
                            <button class="add-to-cart bg-sage-700 text-white w-10 h-10 rounded-full flex items-center justify-center hover:bg-sage-900 transition-colors duration-200 shrink-0 shadow-sm" 
                                    aria-label="Tambah ke keranjang"
                                    onclick="event.stopPropagation(); addToCartFromCard(this)">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-4 text-center py-12">
                    <p class="text-sage-500 text-lg">Belum ada produk unggulan.</p>
                    <p class="text-sage-400 text-sm mt-2">Tambahkan produk melalui admin dashboard.</p>
                </div>
                @endforelse
            </div>

            <div class="text-center mt-12 reveal">
                <button class="btn-outline px-8 py-3 text-xs font-sans font-semibold inline-flex items-center gap-2">
                    MUAT LEBIH BANYAK
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                    </svg>
                </button>
            </div>
        </div>
    </section>

    <!-- ===== MENGAPA VOKTASTYLE ===== -->
    <section id="tentang" class="py-28 px-6 lg:px-14 bg-sage-900 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-radial from-sage-800/30 via-transparent to-transparent pointer-events-none"></div>
        <div class="max-w-7xl mx-auto relative">
            <div class="text-center mb-16 reveal">
                <p class="text-xs tracking-widest uppercase font-sans font-semibold text-sage-400 mb-3">Filosofi Kami</p>
                <h2 class="font-serif text-4xl lg:text-5xl font-light text-white">Mengapa VoktaStyle?</h2>
                <span class="divider-sage" style="background: linear-gradient(90deg, transparent, #7da47d, transparent)"></span>
                <p class="font-sans text-sage-400 text-sm max-w-2xl mx-auto mt-4">
                    Kami percaya furniture bukan sekadar benda, tapi warisan yang menemani cerita hidup Anda.
                </p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-12">
                <div class="text-center reveal delay-100">
                    <div class="w-20 h-20 mx-auto mb-6 rounded-full border-2 border-sage-600 flex items-center justify-center bg-sage-800/50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-sage-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"/>
                        </svg>
                    </div>
                    <h3 class="font-serif text-2xl text-white font-light mb-4">Kayu Pilihan Premium</h3>
                    <p class="font-sans text-sage-400 font-light leading-relaxed text-sm">
                        Kami hanya menggunakan kayu jati, walnut, dan oak bersertifikat legal — dipilih satu per satu oleh master pengrajin untuk memastikan tekstur, kepadatan, dan kekuatan terbaik.
                    </p>
                </div>
                
                <div class="text-center reveal delay-200">
                    <div class="w-20 h-20 mx-auto mb-6 rounded-full border-2 border-sage-600 flex items-center justify-center bg-sage-800/50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-sage-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12"/>
                        </svg>
                    </div>
                    <h3 class="font-serif text-2xl text-white font-light mb-4">Pengiriman Aman & Terproteksi</h3>
                    <p class="font-sans text-sage-400 font-light leading-relaxed text-sm">
                        Pengemasan berlapis khusus furniture dengan busa anti-guncang dan asuransi penuh. Dikirim ke seluruh Indonesia — gratis tanpa minimal pembelian untuk order di atas Rp 5.000.000.
                    </p>
                </div>
                
                <div class="text-center reveal delay-300">
                    <div class="w-20 h-20 mx-auto mb-6 rounded-full border-2 border-sage-600 flex items-center justify-center bg-sage-800/50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-sage-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/>
                        </svg>
                    </div>
                    <h3 class="font-serif text-2xl text-white font-light mb-4">Garansi 5 Tahun Penuh</h3>
                    <p class="font-sans text-sage-400 font-light leading-relaxed text-sm">
                        Kami percaya penuh pada setiap karya yang kami buat. Jika ada cacat struktural dalam 5 tahun, kami perbaiki atau ganti — tanpa pertanyaan, tanpa biaya tersembunyi.
                    </p>
                </div>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mt-20 pt-14 border-t border-sage-800">
                <div class="text-center reveal delay-100">
                    <p class="font-serif text-4xl text-sage-300 font-light">7K+</p>
                    <p class="font-sans text-xs tracking-widest uppercase text-sage-600 mt-2">Pelanggan Puas</p>
                </div>
                <div class="text-center reveal delay-200">
                    <p class="font-serif text-4xl text-sage-300 font-light">250+</p>
                    <p class="font-sans text-xs tracking-widest uppercase text-sage-600 mt-2">Produk Unik</p>
                </div>
                <div class="text-center reveal delay-300">
                    <p class="font-serif text-4xl text-sage-300 font-light">12</p>
                    <p class="font-sans text-xs tracking-widest uppercase text-sage-600 mt-2">Tahun Berpengalaman</p>
                </div>
                <div class="text-center reveal delay-400">
                    <p class="font-serif text-4xl text-sage-300 font-light">38</p>
                    <p class="font-sans text-xs tracking-widest uppercase text-sage-600 mt-2">Kota Terjangkau</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== FAQ SECTION ===== -->
    <section id="faq" class="py-28 px-6 lg:px-14 bg-white">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-16 reveal">
                <p class="text-xs tracking-widest uppercase font-sans font-semibold text-sage-500 mb-3">Bantuan</p>
                <h2 class="font-serif text-4xl lg:text-5xl font-light text-sage-900">Pertanyaan Umum</h2>
                <span class="divider-sage"></span>
            </div>
            
            <div class="space-y-2">
                <div class="accordion-item reveal">
                    <button class="accordion-btn" aria-expanded="false" aria-controls="faq1">
                        <span class="font-sans text-sage-800 font-medium">Berapa lama waktu pengiriman?</span>
                        <svg class="accordion-icon w-5 h-5 text-sage-400 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div id="faq1" class="accordion-content">
                        <div class="pb-4 font-sans text-sage-600 text-sm leading-relaxed">
                            <p>Waktu pengiriman bervariasi tergantung lokasi:</p>
                            <ul class="list-disc list-inside mt-2 space-y-1">
                                <li>Jabodetabek: 2-4 hari kerja</li>
                                <li>Jawa & Bali: 5-7 hari kerja</li>
                                <li>Luar Jawa: 7-14 hari kerja</li>
                            </ul>
                            <p class="mt-3">Semua pengiriman dilengkapi asuransi dan tracking real-time.</p>
                        </div>
                    </div>
                </div>
                
                <div class="accordion-item reveal delay-100">
                    <button class="accordion-btn" aria-expanded="false" aria-controls="faq2">
                        <span class="font-sans text-sage-800 font-medium">Apakah ada layanan konsultasi desain?</span>
                        <svg class="accordion-icon w-5 h-5 text-sage-400 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div id="faq2" class="accordion-content">
                        <div class="pb-4 font-sans text-sage-600 text-sm leading-relaxed">
                            <p>Ya! Kami menawarkan konsultasi desain gratis via WhatsApp atau video call. Tim desainer kami akan membantu Anda:</p>
                            <ul class="list-disc list-inside mt-2 space-y-1">
                                <li>Memilih produk yang sesuai dengan ruang Anda</li>
                                <li>Menyusun layout yang optimal</li>
                                <li>Memberikan rekomendasi warna dan material</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="accordion-item reveal delay-200">
                    <button class="accordion-btn" aria-expanded="false" aria-controls="faq3">
                        <span class="font-sans text-sage-800 font-medium">Bagaimana cara perawatan furniture kayu?</span>
                        <svg class="accordion-icon w-5 h-5 text-sage-400 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div id="faq3" class="accordion-content">
                        <div class="pb-4 font-sans text-sage-600 text-sm leading-relaxed">
                            <p>Untuk menjaga keindahan furniture kayu VoktaStyle:</p>
                            <ul class="list-disc list-inside mt-2 space-y-1">
                                <li>Hindari paparan sinar matahari langsung dalam waktu lama</li>
                                <li>Bersihkan dengan kain lembut dan sedikit air, hindari bahan kimia keras</li>
                                <li>Oleskan minyak kayu alami setiap 6-12 bulan untuk menjaga kelembapan</li>
                                <li>Gunakan alas untuk barang panas atau basah di atas permukaan</li>
                            </ul>
                            <p class="mt-3">Panduan perawatan lengkap akan disertakan dalam setiap pembelian.</p>
                        </div>
                    </div>
                </div>
                
                <div class="accordion-item reveal delay-300">
                    <button class="accordion-btn" aria-expanded="false" aria-controls="faq4">
                        <span class="font-sans text-sage-800 font-medium">Apakah bisa custom ukuran atau desain?</span>
                        <svg class="accordion-icon w-5 h-5 text-sage-400 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div id="faq4" class="accordion-content">
                        <div class="pb-4 font-sans text-sage-600 text-sm leading-relaxed">
                            <p>Kami menerima pesanan custom untuk produk tertentu dengan ketentuan:</p>
                            <ul class="list-disc list-inside mt-2 space-y-1">
                                <li>Minimal order 1 unit untuk produk custom</li>
                                <li>Waktu produksi 4-8 minggu tergantung kompleksitas</li>
                                <li>DP 50% diperlukan untuk memulai produksi</li>
                                <li>Konsultasi desain gratis termasuk dalam layanan custom</li>
                            </ul>
                            <p class="mt-3">Hubungi kami via WhatsApp untuk diskusi lebih lanjut.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== TESTIMONIAL ===== -->
    <section class="py-28 px-6 lg:px-14 bg-parchment">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16 reveal">
                <p class="text-xs tracking-widest uppercase font-sans font-semibold text-sage-500 mb-3">Cerita Pelanggan</p>
                <h2 class="font-serif text-4xl lg:text-5xl font-light text-sage-900">Kata Mereka</h2>
                <span class="divider-sage"></span>
                <p class="font-sans text-sage-500 text-sm max-w-2xl mx-auto mt-4">
                    Pengalaman nyata dari keluarga Indonesia yang telah mempercayakan rumah mereka pada VoktaStyle.
                </p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-lg shadow-sm reveal delay-100 border border-sage-100">
                    <div class="flex items-center gap-1 mb-4 text-gold">★★★★★</div>
                    <p class="font-serif text-lg text-sage-800 font-light leading-relaxed italic mb-6">
                        "Sofa yang saya pesan tiba dalam kondisi sempurna. Kualitas kayu dan kainnya jauh melampaui ekspektasi. Layanan pengiriman pun sangat profesional — timnya bahkan membantu menata di ruang tamu saya."
                    </p>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-gradient-to-br from-sage-200 to-sage-300 flex items-center justify-center font-serif text-sage-800 font-semibold text-sm">AR</div>
                        <div>
                            <p class="font-sans font-semibold text-sage-900 text-sm">Amelia Rasyid</p>
                            <p class="font-sans text-xs text-sage-500">Surabaya • Kursi Santai Velvet</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white p-8 rounded-lg shadow-sm reveal delay-200 border border-sage-100">
                    <div class="flex items-center gap-1 mb-4 text-gold">★★★★★</div>
                    <p class="font-serif text-lg text-sage-800 font-light leading-relaxed italic mb-6">
                        "Meja makan dari kayu jati yang saya beli sudah 2 tahun, tidak ada tanda-tanda kerusakan sama sekali. VoktaStyle memang benar-benar menjaga kualitas. Bahkan setelah hujan deras, kayu tetap stabil."
                    </p>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-gradient-to-br from-sage-200 to-sage-300 flex items-center justify-center font-serif text-sage-800 font-semibold text-sm">BW</div>
                        <div>
                            <p class="font-sans font-semibold text-sage-900 text-sm">Budi Wicaksono</p>
                            <p class="font-sans text-xs text-sage-500">Bandung • Meja Makan Kayu Jati</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white p-8 rounded-lg shadow-sm reveal delay-300 border border-sage-100">
                    <div class="flex items-center gap-1 mb-4 text-gold">★★★★★</div>
                    <p class="font-serif text-lg text-sage-800 font-light leading-relaxed italic mb-6">
                        "Tim VoktaStyle sangat responsif saat saya konsultasi desain untuk kamar tidur. Hasilnya, ruangan saya sekarang terasa seperti dari majalah interior. Sangat merekomendasikan untuk yang ingin rumah estetik dan fungsional!"
                    </p>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-gradient-to-br from-sage-200 to-sage-300 flex items-center justify-center font-serif text-sage-800 font-semibold text-sm">SN</div>
                        <div>
                            <p class="font-sans font-semibold text-sage-900 text-sm">Sinta Noviana</p>
                            <p class="font-sans text-xs text-sage-500">Yogyakarta • Paket Kamar Tidur</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-12 reveal">
                <a href="#" class="inline-flex items-center gap-2 text-sage-600 hover:text-sage-800 font-sans text-sm transition-colors">
                    Baca lebih banyak ulasan
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- ===== INSTAGRAM FEED ===== -->
    <section class="py-16 px-6 lg:px-14 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="flex items-center justify-between mb-8 reveal">
                <div>
                    <p class="text-xs tracking-widest uppercase font-sans font-semibold text-sage-500 mb-1">@voktastyle</p>
                    <h3 class="font-serif text-2xl text-sage-900 font-light">Inspirasi dari Komunitas</h3>
                </div>
                <a href="#" class="text-sage-600 hover:text-sage-800 font-sans text-sm flex items-center gap-1 transition-colors">
                    Ikuti di Instagram
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
                    </svg>
                </a>
            </div>
            
            <div class="insta-grid reveal">
                <div class="insta-item rounded-lg"></div>
                <div class="insta-item rounded-lg"></div>
                <div class="insta-item rounded-lg"></div>
                <div class="insta-item rounded-lg"></div>
                <div class="insta-item rounded-lg"></div>
                <div class="insta-item rounded-lg"></div>
            </div>
        </div>
    </section>

    <!-- ===== CTA BANNER ===== -->
    <section class="py-24 px-6 lg:px-14 bg-gradient-to-br from-sage-100 to-cream relative overflow-hidden">
        <div class="absolute top-0 right-0 w-96 h-96 bg-gold/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2 pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 w-80 h-80 bg-sage-300/10 rounded-full blur-3xl translate-y-1/2 -translate-x-1/2 pointer-events-none"></div>
        
        <div class="max-w-3xl mx-auto text-center relative reveal">
            <p class="text-xs tracking-widest uppercase font-sans font-semibold text-sage-500 mb-4">Mulai Transformasi</p>
            <h2 class="font-serif text-4xl md:text-5xl font-light text-sage-900 mb-6">Wujudkan Rumah Impianmu</h2>
            <p class="font-sans font-light text-sage-600 text-base leading-relaxed mb-10 max-w-xl mx-auto">
                Bergabung dengan lebih dari 7.000 keluarga Indonesia yang telah mempercayakan keindahan dan kenyamanan rumah mereka kepada VoktaStyle.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="#produk" class="btn-primary px-10 py-4 text-xs font-sans font-semibold">BELANJA SEKARANG</a>
                <a href="https://wa.me/6281234567890" target="_blank" class="btn-outline-sage px-10 py-4 text-xs font-sans font-semibold inline-flex items-center gap-2">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
                        <path d="M12 0C5.373 0 0 5.373 0 12c0 2.123.556 4.116 1.529 5.845L.057 23.617a.5.5 0 00.612.612l5.772-1.472A11.957 11.957 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.6a9.593 9.593 0 01-4.883-1.335l-.35-.208-3.627.925.954-3.527-.228-.362A9.558 9.558 0 012.4 12C2.4 6.698 6.698 2.4 12 2.4S21.6 6.698 21.6 12 17.302 21.6 12 21.6z"/>
                    </svg>
                    KONSULTASI GRATIS
                </a>
            </div>
            <div class="flex flex-wrap justify-center gap-6 mt-12 text-xs text-sage-500">
                <span class="flex items-center gap-1">
                    <svg class="w-4 h-4 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Pembayaran Aman
                </span>
                <span class="flex items-center gap-1">
                    <svg class="w-4 h-4 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Garansi Uang Kembali 14 Hari
                </span>
                <span class="flex items-center gap-1">
                    <svg class="w-4 h-4 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Dukungan 24/7
                </span>
            </div>
        </div>
    </section>

    {{-- Scripts untuk animasi reveal & interaktivitas --}}
    <script>
    document.addEventListener('DOMContentLoaded', () => {
        // Reveal animations
        const reveals = document.querySelectorAll('.reveal');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if(entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, { threshold: 0.1 });
        
        reveals.forEach(el => observer.observe(el));

        // Accordion FAQ
        document.querySelectorAll('.accordion-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                const content = document.getElementById(btn.getAttribute('aria-controls'));
                const isExpanded = btn.getAttribute('aria-expanded') === 'true';
                
                document.querySelectorAll('.accordion-btn').forEach(b => {
                    b.setAttribute('aria-expanded', 'false');
                    document.getElementById(b.getAttribute('aria-controls')).classList.remove('open');
                });
                
                if (!isExpanded) {
                    btn.setAttribute('aria-expanded', 'true');
                    content.classList.add('open');
                }
            });
        });

        // Smooth scroll untuk anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });
    });
    </script>

</div>