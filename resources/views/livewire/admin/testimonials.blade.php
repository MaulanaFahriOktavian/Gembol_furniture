<div>
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-serif text-white">Testimonials</h2>
        <button wire:click="openCreateModal" class="bg-gold-500 hover:bg-gold-600 text-white px-4 py-2 rounded-md text-sm font-medium transition-colors">
            + Add Testimonial
        </button>
    </div>

    @if (session()->has('message'))
        <div class="bg-green-900 border border-green-800 text-green-200 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('message') }}</span>
        </div>
    @endif

    <div class="bg-charcoal-950 border border-charcoal-800 rounded-lg overflow-hidden">
        <div class="p-4 border-b border-charcoal-800">
            <input wire:model.live.debounce.300ms="search" type="text" placeholder="Search by customer name..." class="w-full md:w-1/3 bg-charcoal-900 border border-charcoal-700 text-white rounded px-4 py-2 text-sm focus:outline-none focus:border-gold-500">
        </div>
        
        <table class="w-full text-left text-sm text-charcoal-300">
            <thead class="text-xs uppercase bg-charcoal-900 border-b border-charcoal-800 text-charcoal-400">
                <tr>
                    <th class="px-6 py-4 font-medium">Customer</th>
                    <th class="px-6 py-4 font-medium">Rating</th>
                    <th class="px-6 py-4 font-medium">Content</th>
                    <th class="px-6 py-4 font-medium">Status</th>
                    <th class="px-6 py-4 font-medium text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($testimonials as $item)
                    <tr class="border-b border-charcoal-800 hover:bg-charcoal-800/50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                @if($item->image_path)
                                    <img src="{{ asset('storage/' . $item->image_path) }}" class="w-10 h-10 rounded-full object-cover border border-charcoal-700">
                                @else
                                    <div class="w-10 h-10 rounded-full bg-charcoal-800 flex items-center justify-center text-gold-500 font-serif border border-charcoal-700">
                                        {{ substr($item->customer_name, 0, 1) }}
                                    </div>
                                @endif
                                <div>
                                    <p class="font-medium text-white">{{ $item->customer_name }}</p>
                                    <p class="text-xs text-charcoal-500">{{ $item->role ?? 'Customer' }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-gold-500">
                            {{ str_repeat('★', $item->rating) }}{{ str_repeat('☆', 5 - $item->rating) }}
                        </td>
                        <td class="px-6 py-4 text-xs">
                            <p class="truncate w-48">{{ Str::limit($item->content, 50) }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <button wire:click="toggleStatus({{ $item->id }})" class="px-2 py-1 text-xs rounded {{ $item->is_active ? 'bg-green-900/50 text-green-400 border border-green-800' : 'bg-red-900/50 text-red-400 border border-red-800' }}">
                                {{ $item->is_active ? 'Active' : 'Inactive' }}
                            </button>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <button wire:click="openEditModal({{ $item->id }})" class="text-gold-500 hover:text-gold-400 mr-3">Edit</button>
                            <button wire:click="delete({{ $item->id }})" class="text-red-500 hover:text-red-400" onclick="confirm('Are you sure?') || event.stopImmediatePropagation()">Delete</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-charcoal-500">No testimonials found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="p-4 border-t border-charcoal-800">
            {{ $testimonials->links() }}
        </div>
    </div>

    <!-- Modal -->
    @if($showModal)
    <div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/70 backdrop-blur-sm">
        <div class="bg-charcoal-900 rounded-lg max-w-lg w-full border border-charcoal-700 shadow-2xl">
            <div class="flex justify-between items-center p-6 border-b border-charcoal-800">
                <h3 class="text-lg font-serif text-white">{{ $editId ? 'Edit Testimonial' : 'Add Testimonial' }}</h3>
                <button wire:click="closeModal" class="text-charcoal-400 hover:text-white">&times;</button>
            </div>
            
            <form wire:submit.prevent="save" class="p-6 space-y-4 text-sm">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-charcoal-300 mb-1">Customer Name</label>
                        <input type="text" wire:model="customer_name" class="w-full bg-charcoal-950 border border-charcoal-700 rounded px-3 py-2 text-white focus:outline-none focus:border-gold-500">
                        @error('customer_name') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-charcoal-300 mb-1">Role / Location (Optional)</label>
                        <input type="text" wire:model="role" class="w-full bg-charcoal-950 border border-charcoal-700 rounded px-3 py-2 text-white focus:outline-none focus:border-gold-500">
                        @error('role') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-charcoal-300 mb-1">Rating (1-5)</label>
                    <input type="number" wire:model="rating" min="1" max="5" class="w-full bg-charcoal-950 border border-charcoal-700 rounded px-3 py-2 text-white focus:outline-none focus:border-gold-500">
                    @error('rating') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-charcoal-300 mb-1">Review Content</label>
                    <textarea wire:model="content" rows="4" class="w-full bg-charcoal-950 border border-charcoal-700 rounded px-3 py-2 text-white focus:outline-none focus:border-gold-500"></textarea>
                    @error('content') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-charcoal-300 mb-1">Avatar / Image (Optional)</label>
                    <input type="file" wire:model="image" class="w-full text-charcoal-300">
                    @error('image') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    
                    @if ($image)
                        <div class="mt-2">
                            <p class="text-xs text-charcoal-400 mb-1">Preview:</p>
                            <img src="{{ $image->temporaryUrl() }}" class="w-12 h-12 object-cover rounded-full">
                        </div>
                    @elseif ($existingImage)
                        <div class="mt-2">
                            <p class="text-xs text-charcoal-400 mb-1">Current Image:</p>
                            <img src="{{ asset('storage/' . $existingImage) }}" class="w-12 h-12 object-cover rounded-full">
                        </div>
                    @endif
                </div>

                <div class="flex items-center mt-2">
                    <input type="checkbox" wire:model="is_active" id="is_active_testi" class="rounded bg-charcoal-950 border-charcoal-700 text-gold-500 focus:ring-gold-500">
                    <label for="is_active_testi" class="ml-2 text-charcoal-300">Active (Visible on frontend)</label>
                </div>

                <div class="pt-4 flex justify-end gap-3">
                    <button type="button" wire:click="closeModal" class="px-4 py-2 text-charcoal-300 hover:text-white transition-colors">Cancel</button>
                    <button type="submit" class="bg-gold-500 hover:bg-gold-600 text-white px-6 py-2 rounded transition-colors">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endif
</div>
