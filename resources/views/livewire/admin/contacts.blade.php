<div>
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-serif text-white">Contact Messages</h2>
    </div>

    @if (session()->has('message'))
        <div class="bg-green-900 border border-green-800 text-green-200 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('message') }}</span>
        </div>
    @endif

    <div class="bg-charcoal-950 border border-charcoal-800 rounded-lg overflow-hidden">
        <div class="p-4 border-b border-charcoal-800 flex gap-4">
            <input wire:model.live.debounce.300ms="search" type="text" placeholder="Search name, email, subject..." class="flex-1 md:w-1/3 bg-charcoal-900 border border-charcoal-700 text-white rounded px-4 py-2 text-sm focus:outline-none focus:border-gold-500">
            <select wire:model.live="filterRead" class="bg-charcoal-900 border border-charcoal-700 text-white rounded px-4 py-2 text-sm focus:outline-none focus:border-gold-500">
                <option value="">All Messages</option>
                <option value="unread">Unread</option>
                <option value="read">Read</option>
            </select>
        </div>
        
        <table class="w-full text-left text-sm text-charcoal-300">
            <thead class="text-xs uppercase bg-charcoal-900 border-b border-charcoal-800 text-charcoal-400">
                <tr>
                    <th class="px-6 py-4 font-medium">Status</th>
                    <th class="px-6 py-4 font-medium">Sender</th>
                    <th class="px-6 py-4 font-medium">Subject</th>
                    <th class="px-6 py-4 font-medium">Date</th>
                    <th class="px-6 py-4 font-medium text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($contacts as $message)
                    <tr class="border-b border-charcoal-800 hover:bg-charcoal-800/50 transition-colors cursor-pointer {{ !$message->is_read ? 'bg-charcoal-800/20' : '' }}" wire:click="viewContact({{ $message->id }})">
                        <td class="px-6 py-4">
                            @if(!$message->is_read)
                                <span class="w-3 h-3 rounded-full bg-gold-500 inline-block shadow-[0_0_8px_rgba(234,179,8,0.5)]"></span>
                            @else
                                <span class="w-3 h-3 rounded-full bg-charcoal-600 inline-block"></span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <p class="font-medium {{ !$message->is_read ? 'text-white font-bold' : 'text-charcoal-200' }}">{{ $message->name }}</p>
                            <p class="text-xs text-charcoal-500">{{ $message->email }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <p class="{{ !$message->is_read ? 'text-white font-semibold' : 'text-charcoal-300' }}">{{ $message->subject }}</p>
                            <p class="text-xs text-charcoal-500 truncate w-48">{{ $message->message }}</p>
                        </td>
                        <td class="px-6 py-4 text-xs text-charcoal-500">
                            {{ $message->created_at->format('d M Y') }}<br>
                            {{ $message->created_at->format('H:i') }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <button wire:click.stop="delete({{ $message->id }})" class="text-red-500 hover:text-red-400" onclick="confirm('Delete this message?') || event.stopImmediatePropagation()">
                                <svg class="w-5 h-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-charcoal-500">No messages found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="p-4 border-t border-charcoal-800">
            {{ $contacts->links() }}
        </div>
    </div>

    <!-- View Message Modal -->
    @if($showModal && $viewingContact)
    <div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/70 backdrop-blur-sm">
        <div class="bg-charcoal-900 rounded-lg max-w-2xl w-full border border-charcoal-700 shadow-2xl flex flex-col max-h-[90vh]">
            <div class="flex justify-between items-center p-6 border-b border-charcoal-800">
                <h3 class="text-lg font-serif text-white">Message Details</h3>
                <div class="flex items-center gap-4">
                    <button wire:click="markAsUnread({{ $viewingContact->id }})" class="text-xs text-charcoal-400 hover:text-gold-500">Mark Unread</button>
                    <button wire:click="closeModal" class="text-charcoal-400 hover:text-white">&times;</button>
                </div>
            </div>
            
            <div class="p-8 overflow-y-auto flex-1">
                <div class="mb-8">
                    <h4 class="text-2xl font-serif text-white mb-2">{{ $viewingContact->subject }}</h4>
                    <div class="flex justify-between items-center text-sm text-charcoal-400 border-b border-charcoal-800 pb-4">
                        <div>
                            <span class="font-medium text-charcoal-200">{{ $viewingContact->name }}</span> 
                            &lt;<a href="mailto:{{ $viewingContact->email }}" class="text-gold-500 hover:underline">{{ $viewingContact->email }}</a>&gt;
                            @if($viewingContact->phone)
                                <br>Phone: <a href="tel:{{ $viewingContact->phone }}" class="hover:text-gold-500">{{ $viewingContact->phone }}</a>
                            @endif
                        </div>
                        <div class="text-right">
                            {{ $viewingContact->created_at->format('d F Y, H:i') }}
                        </div>
                    </div>
                </div>
                
                <div class="prose prose-invert max-w-none text-charcoal-300 font-sans leading-relaxed whitespace-pre-wrap">
                    {{ $viewingContact->message }}
                </div>
            </div>
            
            <div class="p-6 border-t border-charcoal-800 bg-charcoal-950 flex justify-between rounded-b-lg">
                <button wire:click="delete({{ $viewingContact->id }})" class="text-red-500 hover:text-red-400 text-sm font-medium" onclick="confirm('Delete this message?') || event.stopImmediatePropagation()">Delete Message</button>
                <div class="flex gap-3">
                    <button wire:click="closeModal" class="px-4 py-2 text-charcoal-300 hover:text-white transition-colors text-sm">Close</button>
                    <a href="mailto:{{ $viewingContact->email }}?subject=RE: {{ urlencode($viewingContact->subject) }}" class="bg-gold-500 hover:bg-gold-600 text-white px-6 py-2 rounded transition-colors text-sm font-medium inline-flex items-center">
                        Reply via Email
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
