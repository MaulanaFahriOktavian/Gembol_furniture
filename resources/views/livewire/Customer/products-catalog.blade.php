<div class="pt-20 bg-beige-100 min-h-screen pb-24">
    <!-- Header -->
    <div class="bg-charcoal-900 py-16 px-4 sm:px-6 lg:px-8 text-center relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1555041469-a586c61ea9bc?q=80&w=2000&auto=format&fit=crop')] bg-cover bg-center opacity-10"></div>
        <div class="relative z-10 max-w-3xl mx-auto">
            <h1 class="text-4xl md:text-5xl font-serif text-white mb-4">Our Collections</h1>
            <p class="text-beige-200 font-light max-w-xl mx-auto">Browse our complete range of premium teak wood furniture. Each piece is crafted to bring warmth and elegance to your space.</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12">
        <div class="flex flex-col md:flex-row gap-8">
            
            <!-- Filters Sidebar -->
            <div class="w-full md:w-64 flex-shrink-0">
                <div class="sticky top-28 space-y-8">
                    <!-- Search -->
                    <div>
                        <h3 class="text-sm font-sans font-medium uppercase tracking-widest text-charcoal-900 mb-4">Search</h3>
                        <div class="relative">
                            <input wire:model.live.debounce.300ms="search" type="text" placeholder="Search products..." class="w-full bg-transparent border-b border-charcoal-300 py-2 text-sm focus:outline-none focus:border-gold-500 transition-colors placeholder-charcoal-400">
                        </div>
                    </div>

                    <!-- Categories -->
                    <div>
                        <h3 class="text-sm font-sans font-medium uppercase tracking-widest text-charcoal-900 mb-4">Categories</h3>
                        <div class="space-y-3">
                            <div class="flex items-center">
                                <input wire:model.live="category" type="radio" id="cat_all" value="" class="text-gold-500 focus:ring-gold-500 border-charcoal-300">
                                <label for="cat_all" class="ml-2 text-sm text-charcoal-700 cursor-pointer">All Categories</label>
                            </div>
                            @foreach($categories as $cat)
                            <div class="flex items-center">
                                <input wire:model.live="category" type="radio" id="cat_{{ $cat->id }}" value="{{ $cat->id }}" class="text-gold-500 focus:ring-gold-500 border-charcoal-300">
                                <label for="cat_{{ $cat->id }}" class="ml-2 text-sm text-charcoal-700 cursor-pointer">{{ $cat->name }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Sort -->
                    <div>
                        <h3 class="text-sm font-sans font-medium uppercase tracking-widest text-charcoal-900 mb-4">Sort By</h3>
                        <select wire:model.live="sort" class="w-full bg-transparent border-b border-charcoal-300 py-2 text-sm focus:outline-none focus:border-gold-500 transition-colors">
                            <option value="latest">Latest Arrivals</option>
                            <option value="price_asc">Price: Low to High</option>
                            <option value="price_desc">Price: High to Low</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Product Grid -->
            <div class="flex-1">
                <div wire:loading.delay class="w-full text-center py-12">
                    <div class="inline-block w-8 h-8 border-2 border-gold-500 border-t-transparent rounded-full animate-spin"></div>
                </div>

                <div wire:loading.remove.delay class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse($products as $product)
                    <div class="group cursor-pointer">
                        <a href="{{ route('product.show', $product->slug) }}" class="block">
                            <div class="relative overflow-hidden aspect-[4/5] bg-beige-200 mb-4">
                                <img src="{{ !empty($product->images) ? $product->images[0] : asset('images/product.png') }}" class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-700" alt="{{ $product->name }}">
                                @if($product->is_featured)
                                <div class="absolute top-4 left-4 bg-charcoal-900 text-white text-[10px] uppercase tracking-widest px-3 py-1">Featured</div>
                                @endif
                            </div>
                            <div class="flex justify-between items-start">
                                <div>
                                    <p class="text-[10px] uppercase tracking-widest text-charcoal-400 mb-1">{{ $product->category->name ?? 'Furniture' }}</p>
                                    <h3 class="font-serif text-xl text-charcoal-900 group-hover:text-gold-600 transition-colors">{{ $product->name }}</h3>
                                </div>
                                <p class="font-medium text-charcoal-900">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                            </div>
                        </a>
                    </div>
                    @empty
                    <div class="col-span-full text-center py-20 bg-white/50 border border-charcoal-200">
                        <p class="text-charcoal-500 mb-2">No products found matching your criteria.</p>
                        <button wire:click="$set('search', '')" class="text-gold-500 hover:text-gold-600 text-sm font-medium uppercase tracking-widest">Clear Search</button>
                    </div>
                    @endforelse
                </div>

                <div class="mt-12">
                    {{ $products->links() }}
                </div>
            </div>
            
        </div>
    </div>
</div>
