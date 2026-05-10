<div>
    <!-- BREADCRUMB -->
    <div class="pt-24 pb-4 px-6 lg:px-14 bg-cream border-b border-sage-100">
      <div class="max-w-7xl mx-auto">
        <nav class="flex items-center gap-2 font-sans text-xs text-sage-500">
          <a href="{{ route('home') }}" class="hover:text-sage-700 transition-colors" wire:navigate>Beranda</a>
          <span class="text-sage-300">›</span>
          <a href="{{ route('products') }}" class="hover:text-sage-700 transition-colors" wire:navigate>Koleksi</a>
          <span class="text-sage-300">›</span>
          <a href="{{ route('products') }}" class="hover:text-sage-700 transition-colors" wire:navigate>Ruang Tamu</a>
          <span class="text-sage-300">›</span>
          <span class="text-sage-700 font-medium">Sofa Lounge Velvet Sagara</span>
        </nav>
      </div>
    </div>

    <!-- PRODUCT DETAIL MAIN -->
    <main class="px-6 lg:px-14 py-10 bg-cream">
      <div class="max-w-7xl mx-auto">
        <div class="grid lg:grid-cols-2 gap-12 xl:gap-20">

          <!-- LEFT: GALLERY -->
          <div class="flex flex-col gap-4">
            <div id="main-img-wrap" class="relative overflow-hidden bg-parchment aspect-[4/3] lg:aspect-[3/3.2]" onclick="openZoom()">
              <img id="main-img"
                src="https://images.unsplash.com/photo-1555041469-a586c61ea9bc?q=80&w=1200&auto=format&fit=crop"
                alt="Sofa Lounge Velvet Sagara"
                class="w-full h-full object-cover" />
              <div class="absolute bottom-4 right-4 bg-white/80 backdrop-blur-sm px-3 py-1.5 flex items-center gap-1.5 text-xs font-sans text-sage-600 shadow-sm pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607zM10.5 7.5v6m3-3h-6"/></svg>
                Perbesar
              </div>
              <div class="absolute top-4 left-4 flex flex-col gap-2">
                <span class="bg-sage-700 text-white text-xs px-3 py-1 font-sans font-medium tracking-wide">TERLARIS</span>
                <span class="bg-gold text-white text-xs px-3 py-1 font-sans font-medium tracking-wide">NEW 2026</span>
              </div>
              <button id="wishlist-btn-detail" onclick="toggleWishlistDetail(event)" class="absolute top-4 right-4 bg-white/90 rounded-full w-9 h-9 flex items-center justify-center text-sage-400 hover:text-red-400 transition-colors shadow-sm" aria-label="Tambah ke wishlist">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" id="heart-icon-detail" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/></svg>
              </button>
            </div>
            <div class="grid grid-cols-5 gap-2">
              <div class="thumb-item active overflow-hidden aspect-square bg-parchment" data-src="https://images.unsplash.com/photo-1555041469-a586c61ea9bc?q=80&w=1200&auto=format&fit=crop" onclick="switchImg(this)">
                <img src="https://images.unsplash.com/photo-1555041469-a586c61ea9bc?q=80&w=200&auto=format&fit=crop" class="w-full h-full object-cover" alt="Thumb 1" />
              </div>
              <div class="thumb-item overflow-hidden aspect-square bg-parchment" data-src="https://images.unsplash.com/photo-1567538096630-e0c55bd6374c?q=80&w=1200&auto=format&fit=crop" onclick="switchImg(this)">
                <img src="https://images.unsplash.com/photo-1567538096630-e0c55bd6374c?q=80&w=200&auto=format&fit=crop" class="w-full h-full object-cover" alt="Thumb 2" />
              </div>
              <div class="thumb-item overflow-hidden aspect-square bg-parchment" data-src="https://images.unsplash.com/photo-1493663284031-b7e3aefcae8e?q=80&w=1200&auto=format&fit=crop" onclick="switchImg(this)">
                <img src="https://images.unsplash.com/photo-1493663284031-b7e3aefcae8e?q=80&w=200&auto=format&fit=crop" class="w-full h-full object-cover" alt="Thumb 3" />
              </div>
              <div class="thumb-item overflow-hidden aspect-square bg-parchment" data-src="https://images.unsplash.com/photo-1586023492125-27b2c045efd7?q=80&w=1200&auto=format&fit=crop" onclick="switchImg(this)">
                <img src="https://images.unsplash.com/photo-1586023492125-27b2c045efd7?q=80&w=200&auto=format&fit=crop" class="w-full h-full object-cover" alt="Thumb 4" />
              </div>
              <div class="thumb-item overflow-hidden aspect-square bg-parchment" data-src="https://images.unsplash.com/photo-1616594039964-ae9021a400a0?q=80&w=1200&auto=format&fit=crop" onclick="switchImg(this)">
                <img src="https://images.unsplash.com/photo-1616594039964-ae9021a400a0?q=80&w=200&auto=format&fit=crop" class="w-full h-full object-cover" alt="Thumb 5" />
              </div>
            </div>
          </div>

          <!-- RIGHT: PRODUCT INFO -->
          <div class="flex flex-col gap-6">
            <div>
              <p class="font-sans text-xs tracking-widest uppercase text-sage-500 mb-2">Ruang Tamu · Sofa & Kursi</p>
              <h1 class="font-serif text-3xl lg:text-4xl font-light text-sage-900 leading-tight mb-3">
                Sofa Lounge Velvet<br/><em class="not-italic text-sage-600">Sagara Series</em>
              </h1>
              <div class="flex items-center gap-3 mb-1">
                <div class="stars flex gap-0.5">★★★★★</div>
                <span class="font-sans text-sm font-medium text-sage-800">5.01</span>
                <span class="font-sans text-xs text-sage-400">(127 ulasan)</span>
                <span class="text-sage-200">·</span>
                <span class="font-sans text-xs text-sage-500">342 terjual</span>
              </div>
              <div class="flex items-center gap-2 mt-2">
                <span class="w-2 h-2 rounded-full bg-emerald-500 inline-block"></span>
                <span class="font-sans text-xs text-sage-600 font-medium">Stok tersedia</span>
                <span class="font-sans text-xs text-sage-400">· Tersisa 8 unit</span>
              </div>
            </div>

            <div class="py-4 border-y border-sage-100">
              <div class="flex items-end gap-3">
                <p class="font-serif text-4xl text-sage-900 font-light">Rp 12.500.000</p>
                <p class="font-sans text-sm text-sage-400 line-through mb-1">Rp 15.000.000</p>
                <span class="bg-red-50 text-red-600 text-xs font-sans font-semibold px-2 py-1 mb-1">-17%</span>
              </div>
              <p class="font-sans text-xs text-sage-400 mt-1">atau cicil mulai <span class="text-sage-700 font-semibold">Rp 1.042.000/bln</span> (12 bulan)</p>
            </div>

            <p class="font-sans text-sm text-sage-600 leading-relaxed font-light">
              Sofa lounge premium dengan rangka kayu jati solid dan lapisan velvet Italia pilihan. Desain modern organik yang menghadirkan keseimbangan antara estetika dan kenyamanan tertinggi — sempurna untuk ruang tamu yang bercerita.
            </p>

            <!-- Variant Picker: Warna Kain -->
            <div>
              <p class="font-sans text-xs tracking-widest uppercase text-sage-500 mb-3 font-medium">
                Warna Kain: <span id="swatch-label" class="text-sage-800 font-semibold normal-case tracking-normal">Hijau Zamrud</span>
              </p>
              <div class="flex gap-3 flex-wrap">
                <div class="swatch active" style="background:#2D6A4F;" data-name="Hijau Zamrud" onclick="selectSwatch(this)" title="Hijau Zamrud"></div>
                <div class="swatch" style="background:#5C4033;" data-name="Cokelat Tembakau" onclick="selectSwatch(this)" title="Cokelat Tembakau"></div>
                <div class="swatch" style="background:#3A3A5C;" data-name="Biru Tengah Malam" onclick="selectSwatch(this)" title="Biru Tengah Malam"></div>
                <div class="swatch" style="background:#8B7355;" data-name="Krem Sand" onclick="selectSwatch(this)" title="Krem Sand"></div>
                <div class="swatch" style="background:#C4A882;" data-name="Nude Champagne" onclick="selectSwatch(this)" title="Nude Champagne"></div>
                <div class="swatch border-2 border-sage-200" style="background:#F2F0EA;" data-name="Putih Bone" onclick="selectSwatch(this)" title="Putih Bone"></div>
              </div>
            </div>

            <!-- Finishing Kayu -->
            <div>
              <p class="font-sans text-xs tracking-widest uppercase text-sage-500 mb-3 font-medium">
                Finishing Kayu: <span id="finish-label" class="text-sage-800 font-semibold normal-case tracking-normal">Natural Jati</span>
              </p>
              <div class="flex gap-2 flex-wrap">
                <button class="finish-btn font-sans text-xs px-4 py-2 border border-sage-700 bg-sage-700 text-white font-medium" data-name="Natural Jati" onclick="selectFinish(this)">Natural Jati</button>
                <button class="finish-btn font-sans text-xs px-4 py-2 border border-sage-200 text-sage-600 font-medium hover:border-sage-400" data-name="Dark Walnut" onclick="selectFinish(this)">Dark Walnut</button>
                <button class="finish-btn font-sans text-xs px-4 py-2 border border-sage-200 text-sage-600 font-medium hover:border-sage-400" data-name="White Wash" onclick="selectFinish(this)">White Wash</button>
                <button class="finish-btn font-sans text-xs px-4 py-2 border border-sage-200 text-sage-600 font-medium hover:border-sage-400" data-name="Ebony Black" onclick="selectFinish(this)">Ebony Black</button>
              </div>
            </div>

            <!-- Quantity -->
            <div class="flex items-center gap-4">
              <p class="font-sans text-xs tracking-widest uppercase text-sage-500 font-medium">Qty:</p>
              <div class="flex items-center border border-sage-200 rounded">
                <button class="qty-btn" onclick="changeQty(-1)">−</button>
                <span id="qty-display" class="font-sans text-sm font-semibold text-sage-900 w-10 text-center">1</span>
                <button class="qty-btn" onclick="changeQty(1)">+</button>
              </div>
              <p class="font-sans text-xs text-sage-400">Maks. 5 unit / pemesanan</p>
            </div>

            <!-- CTA Buttons -->
            <div class="flex flex-col gap-3">
              <button id="main-atc-btn" onclick="addToCartMain()" class="btn-sage w-full py-4 text-sm font-sans font-semibold flex items-center justify-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z"/></svg>
                TAMBAHKAN KE KERANJANG
              </button>
              <a href="https://wa.me/6281231311811?text=Halo%20Gembol%20Jati%20Furniture%2C%20saya%20tertarik%20dengan%20Sofa%20Lounge%20Velvet%20Sagara" target="_blank" class="btn-wa w-full py-4 text-sm font-sans font-semibold flex items-center justify-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.123.556 4.116 1.529 5.845L.057 23.617a.5.5 0 00.612.612l5.772-1.472A11.957 11.957 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.6a9.593 9.593 0 01-4.883-1.335l-.35-.208-3.627.925.954-3.527-.228-.362A9.558 9.558 0 012.4 12C2.4 6.698 6.698 2.4 12 2.4S21.6 6.698 21.6 12 17.302 21.6 12 21.6z"/></svg>
                CHAT WHATSAPP: 0812-3131-1811
              </a>
            </div>

            <!-- Trust Badges -->
            <div class="grid grid-cols-3 gap-3 pt-4 border-t border-sage-100">
              <div class="flex flex-col items-center text-center gap-1.5">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-sage-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12"/></svg>
                <p class="font-sans text-xs text-sage-600 font-medium">Gratis Ongkir</p>
                <p class="font-sans text-xs text-sage-400">Se-Indonesia</p>
              </div>
              <div class="flex flex-col items-center text-center gap-1.5">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-sage-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/></svg>
                <p class="font-sans text-xs text-sage-600 font-medium">Garansi 5 Thn</p>
                <p class="font-sans text-xs text-sage-400">Cacat struktural</p>
              </div>
              <div class="flex flex-col items-center text-center gap-1.5">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-sage-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1"><path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99"/></svg>
                <p class="font-sans text-xs text-sage-600 font-medium">Retur 30 Hari</p>
                <p class="font-sans text-xs text-sage-400">Tanpa syarat</p>
              </div>
            </div>
          </div>
        </div>

        <!-- TABS SECTION -->
        <div class="mt-20">
          <div class="border-b border-sage-200 flex gap-8 mb-10 overflow-x-auto whitespace-nowrap">
            <button class="tab-btn active pb-4 font-sans text-sm font-medium text-sage-500" data-tab="spesifikasi" onclick="switchTab('spesifikasi', this)">Spesifikasi</button>
            <button class="tab-btn pb-4 font-sans text-sm font-medium text-sage-500" data-tab="deskripsi" onclick="switchTab('deskripsi', this)">Deskripsi Lengkap</button>
            <button class="tab-btn pb-4 font-sans text-sm font-medium text-sage-500" data-tab="ulasan" onclick="switchTab('ulasan', this)">Ulasan (127)</button>
          </div>

          <!-- Tab: Spesifikasi -->
          <div id="tab-spesifikasi" class="tab-content">
            <div class="grid md:grid-cols-2 gap-8 lg:gap-16">
              <div>
                <h3 class="font-serif text-2xl font-light text-sage-900 mb-6">Spesifikasi Produk</h3>
                <table class="w-full">
                  <tbody>
                    <tr class="spec-row"><td class="py-3.5 font-sans text-xs tracking-widest uppercase text-sage-400 font-medium w-40">Material Rangka</td><td class="py-3.5 font-sans text-sm text-sage-800">Kayu Jati Solid Grade A</td></tr>
                    <tr class="spec-row"><td class="py-3.5 font-sans text-xs tracking-widest uppercase text-sage-400 font-medium">Material Kain</td><td class="py-3.5 font-sans text-sm text-sage-800">Velvet Italia 380 GSM</td></tr>
                    <tr class="spec-row"><td class="py-3.5 font-sans text-xs tracking-widest uppercase text-sage-400 font-medium">Busa</td><td class="py-3.5 font-sans text-sm text-sage-800">Busa HR-Foam 35D + Serat Dakron</td></tr>
                    <tr class="spec-row"><td class="py-3.5 font-sans text-xs tracking-widest uppercase text-sage-400 font-medium">Dimensi (P × L × T)</td><td class="py-3.5 font-sans text-sm text-sage-800 font-semibold">220 cm × 90 cm × 82 cm</td></tr>
                    <tr class="spec-row"><td class="py-3.5 font-sans text-xs tracking-widest uppercase text-sage-400 font-medium">Tinggi Duduk</td><td class="py-3.5 font-sans text-sm text-sage-800">44 cm dari lantai</td></tr>
                    <tr class="spec-row"><td class="py-3.5 font-sans text-xs tracking-widest uppercase text-sage-400 font-medium">Kapasitas Duduk</td><td class="py-3.5 font-sans text-sm text-sage-800">3 Orang</td></tr>
                    <tr class="spec-row"><td class="py-3.5 font-sans text-xs tracking-widest uppercase text-sage-400 font-medium">Berat Produk</td><td class="py-3.5 font-sans text-sm text-sage-800">68 kg</td></tr>
                    <tr class="spec-row"><td class="py-3.5 font-sans text-xs tracking-widest uppercase text-sage-400 font-medium">Kapasitas Beban</td><td class="py-3.5 font-sans text-sm text-sage-800">Max. 300 kg</td></tr>
                    <tr><td class="py-3.5 font-sans text-xs tracking-widest uppercase text-sage-400 font-medium">Estimasi PO</td><td class="py-3.5"><span class="font-sans text-sm text-sage-800 font-semibold">14–21 hari kerja</span><p class="font-sans text-xs text-sage-400 mt-0.5">Pre-order · dibuat khusus sesuai pilihan</p></td></tr>
                  </tbody>
                </table>
              </div>
              <div>
                <h3 class="font-serif text-2xl font-light text-sage-900 mb-6">Dimensi Visual</h3>
                <div class="bg-parchment p-8 flex items-center justify-center">
                  <svg viewBox="0 0 340 220" xmlns="http://www.w3.org/2000/svg" class="w-full max-w-xs">
                    <rect x="40" y="130" width="260" height="50" rx="4" fill="#cddccd"/>
                    <rect x="50" y="80" width="240" height="60" rx="6" fill="#a9c3a9"/>
                    <rect x="50" y="130" width="110" height="40" rx="3" fill="#7da47d" opacity="0.7"/>
                    <rect x="170" y="130" width="110" height="40" rx="3" fill="#7da47d" opacity="0.7"/>
                    <rect x="30" y="100" width="28" height="60" rx="6" fill="#a9c3a9"/>
                    <rect x="282" y="100" width="28" height="60" rx="6" fill="#a9c3a9"/>
                    <rect x="50" y="178" width="12" height="18" rx="2" fill="#5a865a"/>
                    <rect x="278" y="178" width="12" height="18" rx="2" fill="#5a865a"/>
                    <line x1="30" y1="208" x2="310" y2="208" stroke="#456945" stroke-width="1" stroke-dasharray="4 2"/>
                    <line x1="30" y1="203" x2="30" y2="213" stroke="#456945" stroke-width="1.5"/>
                    <line x1="310" y1="203" x2="310" y2="213" stroke="#456945" stroke-width="1.5"/>
                    <text x="170" y="218" text-anchor="middle" font-family="Plus Jakarta Sans,sans-serif" font-size="9" fill="#456945" font-weight="600">220 cm</text>
                    <line x1="10" y1="80" x2="10" y2="196" stroke="#456945" stroke-width="1" stroke-dasharray="4 2"/>
                    <line x1="5" y1="80" x2="15" y2="80" stroke="#456945" stroke-width="1.5"/>
                    <line x1="5" y1="196" x2="15" y2="196" stroke="#456945" stroke-width="1.5"/>
                    <text x="4" y="142" text-anchor="middle" font-family="Plus Jakarta Sans,sans-serif" font-size="9" fill="#456945" font-weight="600" transform="rotate(-90, 4, 142)">82 cm</text>
                    <text x="170" y="60" text-anchor="middle" font-family="Plus Jakarta Sans,sans-serif" font-size="9" fill="#7da47d">Kedalaman: 90 cm</text>
                  </svg>
                </div>
                <div class="mt-6 space-y-3">
                  <h4 class="font-sans text-xs tracking-widest uppercase text-sage-500 font-medium mb-4">Keunggulan Material</h4>
                  <div class="flex items-start gap-3"><div class="w-1.5 h-1.5 rounded-full bg-sage-400 mt-2 shrink-0"></div><p class="font-sans text-sm text-sage-700 font-light">Kayu jati dari hutan terkelola bersertifikat SVLK — tahan rayap alami</p></div>
                  <div class="flex items-start gap-3"><div class="w-1.5 h-1.5 rounded-full bg-sage-400 mt-2 shrink-0"></div><p class="font-sans text-sm text-sage-700 font-light">Velvet Italia anti-noda dengan lapisan nano-coating khusus</p></div>
                  <div class="flex items-start gap-3"><div class="w-1.5 h-1.5 rounded-full bg-sage-400 mt-2 shrink-0"></div><p class="font-sans text-sm text-sage-700 font-light">Busa HR-Foam tidak kempes hingga 10 tahun pemakaian normal</p></div>
                  <div class="flex items-start gap-3"><div class="w-1.5 h-1.5 rounded-full bg-sage-400 mt-2 shrink-0"></div><p class="font-sans text-sm text-sage-700 font-light">Jahitan triple-stitch pada semua sambungan kain</p></div>
                </div>
              </div>
            </div>
          </div>

          <!-- Tab: Deskripsi -->
          <div id="tab-deskripsi" class="tab-content hidden">
            <div class="max-w-3xl">
              <h3 class="font-serif text-2xl font-light text-sage-900 mb-6">Tentang Produk Ini</h3>
              <div class="font-sans text-sm text-sage-700 font-light leading-relaxed space-y-5">
                <p>Sofa Lounge Velvet Sagara lahir dari filosofi sederhana: furnitur yang baik harus terasa seperti pelukan. Setiap detail dari sofa ini dirancang dengan satu tujuan — memberikan kenyamanan tertinggi setelah hari yang panjang.</p>
                <p>Rangka kayu jati solid yang kami gunakan dipanen dari hutan berkelanjutan di Jawa Tengah, kemudian dikeringkan selama minimal 6 bulan sebelum diolah. Proses ini memastikan kayu tidak akan menyusut, melengkung, atau retak seiring waktu — bahkan di iklim tropis yang lembap sekalipun.</p>
                <p>Lapisan velvet kami diimpor langsung dari pabrik tekstil Italia di Bergamo — dikenal menghasilkan velvet dengan serat yang lembut, tebal, dan tahan pudar meski terkena sinar matahari langsung. Tersedia dalam 6 pilihan warna yang semuanya dirancang untuk berharmoni dengan berbagai palet interior modern Indonesia.</p>
                <p>Produk ini dibuat secara pre-order (PO) — setiap unit dikerjakan oleh pengrajin kami di Jepara sesuai konfigurasi warna dan finishing yang Anda pilih. Ini bukan hanya sofa. Ini adalah karya yang diciptakan khusus untuk Anda.</p>
              </div>
              <div class="mt-8 bg-sage-50 border-l-4 border-sage-400 p-5">
                <p class="font-sans text-xs tracking-widest uppercase text-sage-500 font-medium mb-2">Catatan Perawatan</p>
                <ul class="font-sans text-sm text-sage-700 font-light space-y-1.5">
                  <li>· Bersihkan dengan kain lembab, jangan gunakan deterjen berbahan keras</li>
                  <li>· Hindari paparan sinar matahari langsung lebih dari 4 jam/hari</li>
                  <li>· Rotasi bantal duduk setiap 3 bulan untuk keausan merata</li>
                  <li>· Olesi rangka kayu dengan wood oil setiap 12 bulan</li>
                </ul>
              </div>
            </div>
          </div>

          <!-- Tab: Ulasan -->
          <div id="tab-ulasan" class="tab-content hidden">
            <div class="grid md:grid-cols-3 gap-12">
              <div class="text-center">
                <p class="font-serif text-7xl font-light text-sage-900">5.01</p>
                <div class="stars flex gap-1 justify-center my-3">★★★★★</div>
                <p class="font-sans text-sm text-sage-500">127 ulasan</p>
                <div class="mt-6 space-y-2 text-left">
                  <div class="flex items-center gap-2"><span class="font-sans text-xs text-sage-500 w-4">5</span><div class="flex-1 bg-sage-100 h-2"><div class="bg-sage-500 h-2" style="width:92%"></div></div><span class="font-sans text-xs text-sage-400 w-8">92%</span></div>
                  <div class="flex items-center gap-2"><span class="font-sans text-xs text-sage-500 w-4">4</span><div class="flex-1 bg-sage-100 h-2"><div class="bg-sage-500 h-2" style="width:6%"></div></div><span class="font-sans text-xs text-sage-400 w-8">6%</span></div>
                  <div class="flex items-center gap-2"><span class="font-sans text-xs text-sage-500 w-4">3</span><div class="flex-1 bg-sage-100 h-2"><div class="bg-sage-500 h-2" style="width:1%"></div></div><span class="font-sans text-xs text-sage-400 w-8">1%</span></div>
                  <div class="flex items-center gap-2"><span class="font-sans text-xs text-sage-500 w-4">2</span><div class="flex-1 bg-sage-100 h-2"><div class="bg-sage-500 h-2" style="width:1%"></div></div><span class="font-sans text-xs text-sage-400 w-8">1%</span></div>
                  <div class="flex items-center gap-2"><span class="font-sans text-xs text-sage-500 w-4">1</span><div class="flex-1 bg-sage-100 h-2"><div class="bg-sage-500 h-2" style="width:0%"></div></div><span class="font-sans text-xs text-sage-400 w-8">0%</span></div>
                </div>
              </div>
              <div class="md:col-span-2 space-y-6">
                <div class="border-b border-sage-100 pb-6">
                  <div class="flex items-center gap-3 mb-2">
                    <div class="w-9 h-9 rounded-full bg-sage-200 flex items-center justify-center font-serif text-sage-700 text-sm font-semibold">AR</div>
                    <div>
                      <p class="font-sans font-semibold text-sage-900 text-sm">Amelia Rasyid</p>
                      <p class="font-sans text-xs text-sage-400">Surabaya · 3 minggu lalu</p>
                    </div>
                    <div class="stars flex gap-0.5 ml-auto">★★★★★</div>
                  </div>
                  <p class="font-serif text-base text-sage-700 font-light italic leading-relaxed">"Sofa ini benar-benar mengubah ruang tamu saya. Velvet-nya lembut sekali dan warna hijau zamrudnya persis seperti di foto. Pengiriman aman dari Jepara, dikemas dengan sangat baik."</p>
                </div>
                <div class="border-b border-sage-100 pb-6">
                  <div class="flex items-center gap-3 mb-2">
                    <div class="w-9 h-9 rounded-full bg-sage-200 flex items-center justify-center font-serif text-sage-700 text-sm font-semibold">BW</div>
                    <div>
                      <p class="font-sans font-semibold text-sage-900 text-sm">Budi Wicaksono</p>
                      <p class="font-sans text-xs text-sage-400">Bandung · 1 bulan lalu</p>
                    </div>
                    <div class="stars flex gap-0.5 ml-auto">★★★★★</div>
                  </div>
                  <p class="font-serif text-base text-sage-700 font-light italic leading-relaxed">"Sudah 6 bulan dipakai setiap hari, kondisi masih sangat bagus. Rangka kayunya kokoh sekali, tidak ada bunyi-bunyian. Gembol Jati memang benar-benar menjaga kualitas!"</p>
                </div>
                <div class="border-b border-sage-100 pb-6">
                  <div class="flex items-center gap-3 mb-2">
                    <div class="w-9 h-9 rounded-full bg-sage-200 flex items-center justify-center font-serif text-sage-700 text-sm font-semibold">SN</div>
                    <div>
                      <p class="font-sans font-semibold text-sage-900 text-sm">Sinta Noviana</p>
                      <p class="font-sans text-xs text-sage-400">Yogyakarta · 2 bulan lalu</p>
                    </div>
                    <div class="stars flex gap-0.5 ml-auto">★★★★★</div>
                  </div>
                  <p class="font-serif text-base text-sage-700 font-light italic leading-relaxed">"Tim Gembol Jati sangat responsif saat saya konsultasi desain. Hasilnya, ruangan saya sekarang terasa seperti dari majalah interior. Sangat merekomendasikan!"</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <!-- RELATED PRODUCTS -->
    <section class="py-20 px-6 lg:px-14 bg-parchment">
      <div class="max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
          <div>
            <p class="text-xs tracking-widest uppercase font-sans font-medium text-sage-500 mb-2">Mungkin Kamu Suka</p>
            <h2 class="font-serif text-3xl lg:text-4xl font-light text-sage-900">Produk Serupa</h2>
          </div>
          <a href="{{ route('products') }}" class="btn-outline-sage px-7 py-3 text-xs font-sans font-semibold inline-block self-start md:self-auto" wire:navigate>LIHAT SEMUA →</a>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
          <!-- Related 1 -->
          <a href="{{ route('products.show', 'kursi-santai') }}" class="product-card bg-white rounded-lg overflow-hidden cursor-pointer group block">
            <div class="relative overflow-hidden aspect-square">
              <img src="https://images.unsplash.com/photo-1567538096630-e0c55bd6374c?q=80&w=600&auto=format&fit=crop" alt="Kursi Santai Velvet" class="w-full h-full object-cover" />
              <div class="absolute top-3 left-3 bg-sage-700 text-white text-xs px-2.5 py-1 font-sans font-medium tracking-wide">TERLARIS</div>
            </div>
            <div class="p-5">
              <p class="font-sans text-xs tracking-widest uppercase text-sage-400 mb-1">Ruang Tamu</p>
              <h4 class="font-serif text-lg text-sage-900 font-light mb-1">Kursi Santai Velvet</h4>
              <div class="stars flex gap-0.5 mb-3">★★★★<span class="font-sans text-xs text-sage-400 ml-1">4.8</span></div>
              <div class="flex items-center justify-between">
                <p class="font-sans font-semibold text-sage-800">Rp 4.500.000</p>
              </div>
            </div>
          </a>
          <!-- Related 2 -->
          <a href="{{ route('products.show', 'meja-kopi') }}" class="product-card bg-white rounded-lg overflow-hidden cursor-pointer group block">
            <div class="relative overflow-hidden aspect-square">
              <img src="https://images.unsplash.com/photo-1532372320572-cda25653a26d?q=80&w=600&auto=format&fit=crop" alt="Meja Kopi Kayu Jati" class="w-full h-full object-cover" />
            </div>
            <div class="p-5">
              <p class="font-sans text-xs tracking-widest uppercase text-sage-400 mb-1">Ruang Tamu</p>
              <h4 class="font-serif text-lg text-sage-900 font-light mb-1">Meja Kopi Kayu Jati</h4>
              <div class="stars flex gap-0.5 mb-3">★★★★<span class="font-sans text-xs text-sage-400 ml-1">4.7</span></div>
              <div class="flex items-center justify-between">
                <p class="font-sans font-semibold text-sage-800">Rp 3.200.000</p>
              </div>
            </div>
          </a>
          <!-- Related 3 -->
          <a href="{{ route('products.show', 'ottoman') }}" class="product-card bg-white rounded-lg overflow-hidden cursor-pointer group block">
            <div class="relative overflow-hidden aspect-square">
              <img src="https://images.unsplash.com/photo-1586023492125-27b2c045efd7?q=80&w=600&auto=format&fit=crop" alt="Ottoman Bundar" class="w-full h-full object-cover" />
              <div class="absolute top-3 left-3 bg-gold text-white text-xs px-2.5 py-1 font-sans font-medium tracking-wide">BARU</div>
            </div>
            <div class="p-5">
              <p class="font-sans text-xs tracking-widest uppercase text-sage-400 mb-1">Ruang Tamu</p>
              <h4 class="font-serif text-lg text-sage-900 font-light mb-1">Ottoman Bundar Boucle</h4>
              <div class="stars flex gap-0.5 mb-3">★★★★★<span class="font-sans text-xs text-sage-400 ml-1">4.9</span></div>
              <div class="flex items-center justify-between">
                <p class="font-sans font-semibold text-sage-800">Rp 2.100.000</p>
              </div>
            </div>
          </a>
          <!-- Related 4 -->
          <a href="{{ route('products.show', 'lampu-rotan') }}" class="product-card bg-white rounded-lg overflow-hidden cursor-pointer group block">
            <div class="relative overflow-hidden aspect-square">
              <img src="https://images.unsplash.com/photo-1493663284031-b7e3aefcae8e?q=80&w=600&auto=format&fit=crop" alt="Lampu Lantai Rattan" class="w-full h-full object-cover" />
            </div>
            <div class="p-5">
              <p class="font-sans text-xs tracking-widest uppercase text-sage-400 mb-1">Dekorasi</p>
              <h4 class="font-serif text-lg text-sage-900 font-light mb-1">Lampu Lantai Rattan</h4>
              <div class="stars flex gap-0.5 mb-3">★★★★<span class="font-sans text-xs text-sage-400 ml-1">4.6</span></div>
              <div class="flex items-center justify-between">
                <p class="font-sans font-semibold text-sage-800">Rp 1.850.000</p>
              </div>
            </div>
          </a>
        </div>
      </div>
    </section>

    <!-- Image Zoom Modal -->
    <div id="zoom-overlay" class="fixed inset-0 bg-black/90 z-[60] opacity-0 pointer-events-none flex items-center justify-center p-4" onclick="closeZoom()">
      <img id="zoom-img" src="" alt="Zoom" class="max-w-full max-h-full object-contain" onclick="event.stopPropagation()" />
      <button class="absolute top-4 right-4 text-white/70 hover:text-white" aria-label="Tutup zoom">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
      </button>
    </div>

    <!-- ===== SCRIPT UNTUK HALAMAN DETAIL ===== -->
    @push('scripts')
    <script>
    // ===== GALLERY =====
    window.switchImg = function(thumb) {
      document.querySelectorAll('.thumb-item').forEach(t => t.classList.remove('active'));
      thumb.classList.add('active');
      const mainImg = document.getElementById('main-img');
      mainImg.classList.add('fade');
      setTimeout(() => {
        mainImg.src = thumb.dataset.src;
        mainImg.classList.remove('fade');
      }, 200);
    };

    // ===== ZOOM =====
    window.openZoom = function() {
      document.getElementById('zoom-img').src = document.getElementById('main-img').src;
      const overlay = document.getElementById('zoom-overlay');
      overlay.classList.remove('pointer-events-none', 'opacity-0');
      overlay.classList.add('opacity-100');
      document.body.style.overflow = 'hidden';
    };
    window.closeZoom = function() {
      const overlay = document.getElementById('zoom-overlay');
      overlay.classList.add('opacity-0');
      setTimeout(() => overlay.classList.add('pointer-events-none'), 300);
      document.body.style.overflow = '';
    };

    // ===== SWATCH & FINISH =====
    window.selectSwatch = function(el) {
      document.querySelectorAll('.swatch').forEach(s => s.classList.remove('active'));
      el.classList.add('active');
      document.getElementById('swatch-label').textContent = el.dataset.name;
    };
    window.selectFinish = function(el) {
      document.querySelectorAll('.finish-btn').forEach(b => {
        b.classList.remove('border-sage-700', 'bg-sage-700', 'text-white');
        b.classList.add('border-sage-200', 'text-sage-600');
      });
      el.classList.add('border-sage-700', 'bg-sage-700', 'text-white');
      el.classList.remove('border-sage-200', 'text-sage-600');
      document.getElementById('finish-label').textContent = el.dataset.name;
    };

    // ===== QUANTITY =====
    let qty = 1;
    window.changeQty = function(delta) {
      qty = Math.max(1, Math.min(5, qty + delta));
      document.getElementById('qty-display').textContent = qty;
    };

    // ===== TABS =====
    window.switchTab = function(name, btn) {
      document.querySelectorAll('.tab-content').forEach(t => t.classList.add('hidden'));
      document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
      document.getElementById('tab-' + name).classList.remove('hidden');
      btn.classList.add('active');
    };

    // ===== WISHLIST DETAIL =====
    window.toggleWishlistDetail = function(e) {
      e.stopPropagation();
      const icon = document.getElementById('heart-icon-detail');
      const isWishlisted = icon.getAttribute('fill') === '#f87171';
      if (!isWishlisted) {
        state.wishlist.push({ name:'Sofa Lounge Velvet Sagara', price:12500000, img:document.getElementById('main-img').src, id:Date.now() });
        icon.setAttribute('fill', '#f87171');
        icon.setAttribute('stroke', '#f87171');
        showToast('Ditambahkan ke wishlist', 'success');
      } else {
        state.wishlist = state.wishlist.filter(i => i.name !== 'Sofa Lounge Velvet Sagara');
        icon.setAttribute('fill', 'none');
        icon.setAttribute('stroke', 'currentColor');
        showToast('Dihapus dari wishlist', 'info');
      }
      localStorage.setItem('gemboljati_wishlist', JSON.stringify(state.wishlist));
      updateWishlistUI();
    };

    // ===== ADD TO CART MAIN =====
    window.addToCartMain = function() {
      const name = 'Sofa Lounge Velvet Sagara';
      const price = 12500000;
      const img = document.getElementById('main-img').src;
      const existing = state.cart.find(i => i.name === name);
      if (existing) {
        existing.qty += qty;
        showToast('Jumlah produk diperbarui', 'success');
      } else {
        state.cart.push({ name, price, img, qty });
        showToast('Produk ditambahkan ke keranjang', 'success');
      }
      saveCart(); updateCartUI(); openCart();
    };
    </script>
    @endpush
</div>