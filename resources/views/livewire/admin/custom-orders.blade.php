<div>
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-serif text-white">Custom Orders</h2>
    </div>

    @if (session()->has('message'))
        <div class="bg-green-900 border border-green-800 text-green-200 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('message') }}</span>
        </div>
    @endif

    <div class="bg-charcoal-950 border border-charcoal-800 rounded-lg overflow-hidden">
        <div class="p-4 border-b border-charcoal-800 flex gap-4">
            <input wire:model.live.debounce.300ms="search" type="text" placeholder="Search name, email, phone..." class="flex-1 md:w-1/3 bg-charcoal-900 border border-charcoal-700 text-white rounded px-4 py-2 text-sm focus:outline-none focus:border-gold-500">
            <select wire:model.live="statusFilter" class="bg-charcoal-900 border border-charcoal-700 text-white rounded px-4 py-2 text-sm focus:outline-none focus:border-gold-500">
                <option value="">All Statuses</option>
                <option value="pending">Pending</option>
                <option value="reviewed">Reviewed</option>
                <option value="in_progress">In Progress</option>
                <option value="completed">Completed</option>
                <option value="cancelled">Cancelled</option>
            </select>
        </div>
        
        <table class="w-full text-left text-sm text-charcoal-300">
            <thead class="text-xs uppercase bg-charcoal-900 border-b border-charcoal-800 text-charcoal-400">
                <tr>
                    <th class="px-6 py-4 font-medium">Customer Details</th>
                    <th class="px-6 py-4 font-medium">Request Details</th>
                    <th class="px-6 py-4 font-medium">Budget</th>
                    <th class="px-6 py-4 font-medium">Status</th>
                    <th class="px-6 py-4 font-medium text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($customOrders as $order)
                    <tr class="border-b border-charcoal-800 hover:bg-charcoal-800/50 transition-colors align-top">
                        <td class="px-6 py-4">
                            <p class="font-medium text-white">{{ $order->name }}</p>
                            <p class="text-xs text-charcoal-500">{{ $order->email }}</p>
                            <p class="text-xs text-charcoal-500">{{ $order->phone }}</p>
                            <p class="text-[10px] text-charcoal-600 mt-1">{{ $order->created_at->format('d M Y, H:i') }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-xs leading-relaxed whitespace-pre-wrap">{{ $order->details }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-gold-500 font-medium">{{ $order->budget ? 'Rp ' . number_format($order->budget, 0, ',', '.') : 'Not specified' }}</span>
                        </td>
                        <td class="px-6 py-4">
                            @php
                                $statusColors = [
                                    'pending' => 'bg-yellow-900/50 text-yellow-500 border-yellow-800',
                                    'reviewed' => 'bg-blue-900/50 text-blue-400 border-blue-800',
                                    'in_progress' => 'bg-purple-900/50 text-purple-400 border-purple-800',
                                    'completed' => 'bg-green-900/50 text-green-400 border-green-800',
                                    'cancelled' => 'bg-red-900/50 text-red-400 border-red-800',
                                ];
                                $colorClass = $statusColors[$order->status] ?? 'bg-charcoal-800 text-charcoal-300 border-charcoal-700';
                            @endphp
                            <span class="px-2 py-1 text-xs rounded border {{ $colorClass }} uppercase tracking-wider font-semibold">
                                {{ str_replace('_', ' ', $order->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <select wire:change="updateStatus({{ $order->id }}, $event.target.value)" class="bg-charcoal-900 border border-charcoal-700 text-white rounded px-2 py-1 text-xs focus:outline-none focus:border-gold-500">
                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="reviewed" {{ $order->status == 'reviewed' ? 'selected' : '' }}>Reviewed</option>
                                <option value="in_progress" {{ $order->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-charcoal-500">No custom orders found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="p-4 border-t border-charcoal-800">
            {{ $customOrders->links() }}
        </div>
    </div>
</div>
