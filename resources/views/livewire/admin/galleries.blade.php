<div>
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-serif text-white">Gallery</h2>
        <button wire:click="openCreateModal" class="bg-gold-500 hover:bg-gold-600 text-white px-4 py-2 rounded-md text-sm font-medium transition-colors">
            + Add New Image
        </button>
    </div>

    @if (session()->has('message'))
        <div class="bg-green-900 border border-green-800 text-green-200 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('message') }}</span>
        </div>
    @endif

    <div class="bg-charcoal-950 border border-charcoal-800 rounded-lg overflow-hidden">
        <div class="p-4 border-b border-charcoal-800">
            <input wire:model.live.debounce.300ms="search" type="text" placeholder="Search gallery..." class="w-full md:w-1/3 bg-charcoal-900 border border-charcoal-700 text-white rounded px-4 py-2 text-sm focus:outline-none focus:border-gold-500">
        </div>
        
        <table class="w-full text-left text-sm text-charcoal-300">
            <thead class="text-xs uppercase bg-charcoal-900 border-b border-charcoal-800 text-charcoal-400">
                <tr>
                    <th class="px-6 py-4 font-medium">Image</th>
                    <th class="px-6 py-4 font-medium">Title</th>
                    <th class="px-6 py-4 font-medium">Status</th>
                    <th class="px-6 py-4 font-medium text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($galleries as $item)
                    <tr class="border-b border-charcoal-800 hover:bg-charcoal-800/50 transition-colors">
                        <td class="px-6 py-4">
                            <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->title }}" class="w-16 h-16 object-cover rounded border border-charcoal-700">
                        </td>
                        <td class="px-6 py-4 font-medium text-white">{{ $item->title }}</td>
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
                        <td colspan="4" class="px-6 py-8 text-center text-charcoal-500">No gallery items found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="p-4 border-t border-charcoal-800">
            {{ $galleries->links() }}
        </div>
    </div>

    <!-- Modal -->
    @if($showModal)
    <div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/70 backdrop-blur-sm">
        <div class="bg-charcoal-900 rounded-lg max-w-lg w-full border border-charcoal-700 shadow-2xl">
            <div class="flex justify-between items-center p-6 border-b border-charcoal-800">
                <h3 class="text-lg font-serif text-white">{{ $editId ? 'Edit Gallery Item' : 'Add Gallery Item' }}</h3>
                <button wire:click="closeModal" class="text-charcoal-400 hover:text-white">&times;</button>
            </div>
            
            <form wire:submit.prevent="save" class="p-6 space-y-4 text-sm">
                <div>
                    <label class="block text-charcoal-300 mb-1">Title</label>
                    <input type="text" wire:model="title" class="w-full bg-charcoal-950 border border-charcoal-700 rounded px-3 py-2 text-white focus:outline-none focus:border-gold-500">
                    @error('title') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-charcoal-300 mb-1">Description (Optional)</label>
                    <textarea wire:model="description" rows="3" class="w-full bg-charcoal-950 border border-charcoal-700 rounded px-3 py-2 text-white focus:outline-none focus:border-gold-500"></textarea>
                    @error('description') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-charcoal-300 mb-1">Image</label>
                    <input type="file" wire:model="image" class="w-full text-charcoal-300">
                    @error('image') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    
                    @if ($image)
                        <div class="mt-2">
                            <p class="text-xs text-charcoal-400 mb-1">Preview:</p>
                            <img src="{{ $image->temporaryUrl() }}" class="w-24 h-24 object-cover rounded">
                        </div>
                    @elseif ($existingImage)
                        <div class="mt-2">
                            <p class="text-xs text-charcoal-400 mb-1">Current Image:</p>
                            <img src="{{ asset('storage/' . $existingImage) }}" class="w-24 h-24 object-cover rounded">
                        </div>
                    @endif
                </div>

                <div class="flex items-center mt-2">
                    <input type="checkbox" wire:model="is_active" id="is_active" class="rounded bg-charcoal-950 border-charcoal-700 text-gold-500 focus:ring-gold-500">
                    <label for="is_active" class="ml-2 text-charcoal-300">Active (Visible on frontend)</label>
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
