<div class="space-y-6">
    {{-- Flash Message --}}
    @if(session()->has('message'))
    <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg flex items-center gap-2">
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
        {{ session('message') }}
    </div>
    @endif

    {{-- Header & Filters --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <h2 class="text-2xl font-bold text-sage-900 font-serif">Daftar Produk</h2>
        <button wire:click="openCreateModal" class="bg-sage-700 hover:bg-sage-800 text-white px-5 py-2.5 rounded-lg font-sans text-sm font-medium transition-colors flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Tambah Produk
        </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <input wire:model.live.debounce.300ms="search" type="text" placeholder="Cari nama produk..." 
               class="w-full px-4 py-2.5 border border-sage-200 rounded-lg focus:ring-2 focus:ring-sage-400 focus:border-transparent font-sans text-sm" />
        
        <select wire:model.live="statusFilter" class="w-full px-4 py-2.5 border border-sage-200 rounded-lg focus:ring-2 focus:ring-sage-400 font-sans text-sm bg-white">
            <option value="all">Semua Status</option>
            <option value="active">Aktif</option>
            <option value="draft">Draft</option>
            <option value="archived">Arsip</option>
        </select>

        <select wire:model.live="categoryFilter" class="w-full px-4 py-2.5 border border-sage-200 rounded-lg focus:ring-2 focus:ring-sage-400 font-sans text-sm bg-white">
            <option value="">Semua Kategori</option>
            @foreach($categories as $cat)
            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @endforeach
        </select>
    </div>

    {{-- Table --}}
    <div class="bg-white rounded-lg shadow-sm border border-sage-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-sage-50 text-sage-600 text-xs uppercase font-sans font-medium">
                    <tr>
                        <th class="px-6 py-4">Produk</th>
                        <th class="px-6 py-4">Kategori</th>
                        <th class="px-6 py-4">Harga</th>
                        <th class="px-6 py-4">Stok</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-sage-100">
                    @forelse($products as $product)
                    <tr class="hover:bg-sage-50/50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-4">
                                <img src="{{ $product->images[0] ? Storage::url($product->images[0]) : asset('images/placeholder.jpg') }}" 
                                     class="w-12 h-12 rounded-lg object-cover bg-sage-100" alt="{{ $product->name }}">
                                <div>
                                    <p class="font-sans font-semibold text-sage-900 text-sm">{{ $product->name }}</p>
                                    <p class="font-sans text-xs text-sage-400">Slug: {{ $product->slug }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 font-sans text-sm text-sage-600">{{ $product->category->name ?? '-' }}</td>
                        <td class="px-6 py-4 font-sans text-sm font-medium text-sage-800">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                        <td class="px-6 py-4 font-sans text-sm {{ $product->stock > 5 ? 'text-green-600' : ($product->stock > 0 ? 'text-yellow-600' : 'text-red-600') }}">
                            {{ $product->stock }}
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2.5 py-1 text-xs rounded-full font-sans font-medium
                                {{ $product->status === 'active' ? 'bg-green-100 text-green-800' : 
                                   ($product->status === 'draft' ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800') }}">
                                {{ ucfirst($product->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <button wire:click="openEditModal({{ $product->id }})" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors" title="Edit">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                </button>
                                <button wire:click="delete({{ $product->id }})" class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors" title="Hapus">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-sage-500 font-sans text-sm">
                            Tidak ada produk ditemukan. Coba ubah filter atau tambahkan produk baru.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="px-6 py-4 border-t border-sage-100">
            {{ $products->links() }}
        </div>
    </div>

    {{-- Modal Create/Edit --}}
    @if($showModal)
    <div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-charcoal/60 backdrop-blur-sm" wire:keydown.escape="closeModal">
        <div class="bg-white rounded-xl shadow-premium w-full max-w-2xl max-h-[90vh] overflow-y-auto" @click.away="closeModal">
            <div class="flex items-center justify-between px-6 py-4 border-b border-sage-100">
                <h3 class="text-lg font-semibold text-sage-900 font-serif">{{ $editId ? 'Edit Produk' : 'Tambah Produk Baru' }}</h3>
                <button wire:click="closeModal" class="text-sage-400 hover:text-sage-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <form wire:submit.prevent="save" class="p-6 space-y-5">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block font-sans text-sm font-medium text-sage-700 mb-1">Nama Produk</label>
                        <input wire:model="name" type="text" class="w-full px-4 py-2.5 border border-sage-200 rounded-lg focus:ring-2 focus:ring-sage-400 font-sans text-sm @error('name') border-red-300 @enderror" />
                        @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block font-sans text-sm font-medium text-sage-700 mb-1">Kategori</label>
                        <select wire:model="category_id" class="w-full px-4 py-2.5 border border-sage-200 rounded-lg focus:ring-2 focus:ring-sage-400 font-sans text-sm bg-white @error('category_id') border-red-300 @enderror">
                            <option value="">Pilih Kategori</option>
                            @foreach($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                    <div>
                        <label class="block font-sans text-sm font-medium text-sage-700 mb-1">Harga (Rp)</label>
                        <input wire:model="price" type="number" step="0.01" class="w-full px-4 py-2.5 border border-sage-200 rounded-lg focus:ring-2 focus:ring-sage-400 font-sans text-sm @error('price') border-red-300 @enderror" />
                        @error('price') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block font-sans text-sm font-medium text-sage-700 mb-1">Stok</label>
                        <input wire:model="stock" type="number" class="w-full px-4 py-2.5 border border-sage-200 rounded-lg focus:ring-2 focus:ring-sage-400 font-sans text-sm @error('stock') border-red-300 @enderror" />
                        @error('stock') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block font-sans text-sm font-medium text-sage-700 mb-1">Status</label>
                        <select wire:model="status" class="w-full px-4 py-2.5 border border-sage-200 rounded-lg focus:ring-2 focus:ring-sage-400 font-sans text-sm bg-white">
                            <option value="active">Aktif</option>
                            <option value="draft">Draft</option>
                            <option value="archived">Arsip</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block font-sans text-sm font-medium text-sage-700 mb-1">Deskripsi</label>
                    <textarea wire:model="description" rows="3" class="w-full px-4 py-2.5 border border-sage-200 rounded-lg focus:ring-2 focus:ring-sage-400 font-sans text-sm @error('description') border-red-300 @enderror"></textarea>
                    @error('description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block font-sans text-sm font-medium text-sage-700 mb-1">Gambar Produk</label>
                    <div class="border-2 border-dashed border-sage-200 rounded-lg p-4 text-center hover:bg-sage-50 transition-colors">
                        <input wire:model.live="images" type="file" multiple accept="image/*" class="hidden" id="imgUpload" />
                        <label for="imgUpload" class="cursor-pointer flex flex-col items-center gap-2">
                            <svg class="w-8 h-8 text-sage-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <span class="font-sans text-sm text-sage-600">Klik untuk upload gambar (Maks. 2MB/file)</span>
                        </label>
                    </div>
                    @error('images.*') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    
                    {{-- Preview --}}
                    <div class="flex flex-wrap gap-3 mt-4">
                        @foreach($existingImages as $path)
                        <div class="relative w-20 h-20 rounded-lg overflow-hidden border border-sage-200">
                            <img src="{{ Storage::url($path) }}" class="w-full h-full object-cover" />
                        </div>
                        @endforeach
                        @foreach($images as $temp)
                        <div class="relative w-20 h-20 rounded-lg overflow-hidden border border-sage-200 bg-sage-100">
                            <img src="{{ $temp->temporaryUrl() }}" class="w-full h-full object-cover" />
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="flex justify-end gap-3 pt-4 border-t border-sage-100">
                    <button type="button" wire:click="closeModal" class="px-5 py-2.5 text-sm font-sans text-sage-600 hover:bg-sage-100 rounded-lg transition-colors">Batal</button>
                    <button type="submit" class="px-5 py-2.5 bg-sage-700 hover:bg-sage-800 text-white text-sm font-sans font-medium rounded-lg transition-colors flex items-center gap-2">
                        <span wire:loading.remove wire:target="save">💾 Simpan</span>
                        <span wire:loading wire:target="save">⏳ Menyimpan...</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endif
</div>