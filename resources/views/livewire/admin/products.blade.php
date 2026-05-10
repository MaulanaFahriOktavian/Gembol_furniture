<div class="space-y-6">
    {{-- Flash Message --}}
    @if(session()->has('message'))
    <div class="bg-green-900 border border-green-800 text-green-200 px-4 py-3 rounded-lg flex items-center gap-2">
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
        {{ session('message') }}
    </div>
    @endif

    {{-- Header & Filters --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <h2 class="text-2xl font-bold text-white font-serif">Products</h2>
        <button wire:click="openCreateModal" class="bg-gold-500 hover:bg-gold-600 text-white px-5 py-2.5 rounded-lg font-sans text-sm font-medium transition-colors flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Add Product
        </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <input wire:model.live.debounce.300ms="search" type="text" placeholder="Search product name..." 
               class="w-full px-4 py-2.5 bg-charcoal-900 border border-charcoal-700 text-white rounded-lg focus:ring-2 focus:ring-gold-500 focus:border-transparent font-sans text-sm placeholder-charcoal-500" />
        
        <select wire:model.live="statusFilter" class="w-full px-4 py-2.5 bg-charcoal-900 border border-charcoal-700 text-white rounded-lg focus:ring-2 focus:ring-gold-500 font-sans text-sm">
            <option value="all">All Statuses</option>
            <option value="active">Active</option>
            <option value="draft">Draft</option>
            <option value="archived">Archived</option>
        </select>

        <select wire:model.live="categoryFilter" class="w-full px-4 py-2.5 bg-charcoal-900 border border-charcoal-700 text-white rounded-lg focus:ring-2 focus:ring-gold-500 font-sans text-sm">
            <option value="">All Categories</option>
            @foreach($categories as $cat)
            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @endforeach
        </select>
    </div>

    {{-- Table --}}
    <div class="bg-charcoal-950 rounded-lg shadow-sm border border-charcoal-800 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-charcoal-900 text-charcoal-400 text-xs uppercase font-sans font-medium border-b border-charcoal-800">
                    <tr>
                        <th class="px-6 py-4">Product</th>
                        <th class="px-6 py-4">Category</th>
                        <th class="px-6 py-4">Price</th>
                        <th class="px-6 py-4">Stock</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-charcoal-800">
                    @forelse($products as $product)
                    <tr class="hover:bg-charcoal-800/50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-4">
                                <img src="{{ !empty($product->images) ? Storage::url($product->images[0]) : asset('images/product.png') }}" 
                                     class="w-12 h-12 rounded-lg object-cover bg-charcoal-800 border border-charcoal-700" alt="{{ $product->name }}">
                                <div>
                                    <p class="font-sans font-semibold text-white text-sm">{{ $product->name }}</p>
                                    <p class="font-sans text-xs text-charcoal-500">Slug: {{ $product->slug }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 font-sans text-sm text-charcoal-300">{{ $product->category->name ?? '-' }}</td>
                        <td class="px-6 py-4 font-sans text-sm font-medium text-gold-500">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                        <td class="px-6 py-4 font-sans text-sm {{ $product->stock > 5 ? 'text-green-500' : ($product->stock > 0 ? 'text-yellow-500' : 'text-red-500') }}">
                            {{ $product->stock }}
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2.5 py-1 text-[10px] uppercase tracking-widest rounded border font-sans font-medium
                                {{ $product->status === 'active' ? 'bg-green-900/50 text-green-400 border-green-800' : 
                                   ($product->status === 'draft' ? 'bg-yellow-900/50 text-yellow-500 border-yellow-800' : 'bg-charcoal-800 text-charcoal-300 border-charcoal-700') }}">
                                {{ $product->status }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <button wire:click="openEditModal({{ $product->id }})" class="p-2 text-blue-400 hover:text-blue-300 transition-colors" title="Edit">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                </button>
                                <button wire:click="delete({{ $product->id }})" class="p-2 text-red-500 hover:text-red-400 transition-colors" title="Delete">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-charcoal-500 font-sans text-sm">
                            No products found.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="px-6 py-4 border-t border-charcoal-800">
            {{ $products->links() }}
        </div>
    </div>

    {{-- Modal Create/Edit --}}
    @if($showModal)
    <div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/70 backdrop-blur-sm" wire:keydown.escape="closeModal">
        <div class="bg-charcoal-900 rounded-xl border border-charcoal-700 shadow-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto" @click.away="closeModal">
            <div class="flex items-center justify-between px-6 py-4 border-b border-charcoal-800">
                <h3 class="text-lg font-semibold text-white font-serif">{{ $editId ? 'Edit Product' : 'Add New Product' }}</h3>
                <button wire:click="closeModal" class="text-charcoal-400 hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <form wire:submit.prevent="save" class="p-6 space-y-5">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block font-sans text-sm font-medium text-charcoal-300 mb-1">Product Name</label>
                        <input wire:model="name" type="text" class="w-full px-4 py-2.5 bg-charcoal-950 border border-charcoal-700 text-white rounded-lg focus:ring-2 focus:ring-gold-500 font-sans text-sm @error('name') border-red-500 @enderror" />
                        @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block font-sans text-sm font-medium text-charcoal-300 mb-1">Category</label>
                        <select wire:model="category_id" class="w-full px-4 py-2.5 bg-charcoal-950 border border-charcoal-700 text-white rounded-lg focus:ring-2 focus:ring-gold-500 font-sans text-sm @error('category_id') border-red-500 @enderror">
                            <option value="">Select Category</option>
                            @foreach($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                    <div>
                        <label class="block font-sans text-sm font-medium text-charcoal-300 mb-1">Price (Rp)</label>
                        <input wire:model="price" type="number" step="0.01" class="w-full px-4 py-2.5 bg-charcoal-950 border border-charcoal-700 text-white rounded-lg focus:ring-2 focus:ring-gold-500 font-sans text-sm @error('price') border-red-500 @enderror" />
                        @error('price') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block font-sans text-sm font-medium text-charcoal-300 mb-1">Stock</label>
                        <input wire:model="stock" type="number" class="w-full px-4 py-2.5 bg-charcoal-950 border border-charcoal-700 text-white rounded-lg focus:ring-2 focus:ring-gold-500 font-sans text-sm @error('stock') border-red-500 @enderror" />
                        @error('stock') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block font-sans text-sm font-medium text-charcoal-300 mb-1">Status</label>
                        <select wire:model="status" class="w-full px-4 py-2.5 bg-charcoal-950 border border-charcoal-700 text-white rounded-lg focus:ring-2 focus:ring-gold-500 font-sans text-sm">
                            <option value="active">Active</option>
                            <option value="draft">Draft</option>
                            <option value="archived">Archived</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block font-sans text-sm font-medium text-charcoal-300 mb-1">Description</label>
                    <textarea wire:model="description" rows="3" class="w-full px-4 py-2.5 bg-charcoal-950 border border-charcoal-700 text-white rounded-lg focus:ring-2 focus:ring-gold-500 font-sans text-sm @error('description') border-red-500 @enderror"></textarea>
                    @error('description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block font-sans text-sm font-medium text-charcoal-300 mb-1">Product Images</label>
                    <div class="border-2 border-dashed border-charcoal-700 bg-charcoal-950 rounded-lg p-4 text-center hover:bg-charcoal-800 transition-colors">
                        <input wire:model.live="images" type="file" multiple accept="image/*" class="hidden" id="imgUpload" />
                        <label for="imgUpload" class="cursor-pointer flex flex-col items-center gap-2">
                            <svg class="w-8 h-8 text-charcoal-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <span class="font-sans text-sm text-charcoal-400">Click to upload images (Max 2MB/file)</span>
                        </label>
                    </div>
                    @error('images.*') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    
                    {{-- Preview --}}
                    <div class="flex flex-wrap gap-3 mt-4">
                        @foreach($existingImages as $path)
                        <div class="relative w-20 h-20 rounded-lg overflow-hidden border border-charcoal-700">
                            <img src="{{ Storage::url($path) }}" class="w-full h-full object-cover" />
                        </div>
                        @endforeach
                        @foreach($images as $temp)
                        <div class="relative w-20 h-20 rounded-lg overflow-hidden border border-charcoal-700 bg-charcoal-800">
                            <img src="{{ $temp->temporaryUrl() }}" class="w-full h-full object-cover" />
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="flex justify-end gap-3 pt-4 border-t border-charcoal-800">
                    <button type="button" wire:click="closeModal" class="px-5 py-2.5 text-sm font-sans text-charcoal-400 hover:text-white rounded-lg transition-colors">Cancel</button>
                    <button type="submit" class="px-5 py-2.5 bg-gold-500 hover:bg-gold-600 text-white text-sm font-sans font-medium rounded-lg transition-colors flex items-center gap-2">
                        <span wire:loading.remove wire:target="save">Save</span>
                        <span wire:loading wire:target="save">Saving...</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endif
</div>