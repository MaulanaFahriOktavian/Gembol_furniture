<div>
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold text-white font-serif">Order Management</h2>
            <p class="text-charcoal-400 font-sans text-sm mt-1">Manage incoming orders and shipments.</p>
        </div>
        
        <select wire:model.live="statusFilter" class="bg-charcoal-900 border border-charcoal-700 text-white rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gold-500 font-sans">
            <option value="">All Statuses</option>
            <option value="pending">Pending Confirmation</option>
            <option value="processing">Processing</option>
            <option value="shipped">Shipped</option>
            <option value="completed">Completed</option>
            <option value="cancelled">Cancelled</option>
        </select>
    </div>

    @if (session()->has('message'))
        <div class="mb-6 p-4 bg-green-900/50 border border-green-800 text-green-300 rounded-lg shadow-sm font-sans text-sm">
            {{ session('message') }}
        </div>
    @endif

    <div class="bg-charcoal-950 rounded-lg shadow-sm border border-charcoal-800 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-charcoal-900 border-b border-charcoal-800">
                    <tr>
                        <th class="px-6 py-4 text-xs uppercase tracking-widest font-medium text-charcoal-400 font-sans">Order Info</th>
                        <th class="px-6 py-4 text-xs uppercase tracking-widest font-medium text-charcoal-400 font-sans">Customer</th>
                        <th class="px-6 py-4 text-xs uppercase tracking-widest font-medium text-charcoal-400 font-sans">Total</th>
                        <th class="px-6 py-4 text-xs uppercase tracking-widest font-medium text-charcoal-400 font-sans">Status</th>
                        <th class="px-6 py-4 text-xs uppercase tracking-widest font-medium text-charcoal-400 font-sans text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-charcoal-800">
                    @forelse($orders as $order)
                        <tr class="hover:bg-charcoal-800/50 transition-colors">
                            <td class="px-6 py-4">
                                <span class="font-sans text-sm font-semibold text-white">#{{ $order->order_number }}</span>
                                <div class="text-xs text-charcoal-500 mt-1 font-sans">{{ $order->created_at->format('d M Y, H:i') }}</div>
                            </td>
                            <td class="px-6 py-4 text-sm text-charcoal-300 font-sans">
                                <div class="font-medium text-white">{{ $order->name }}</div>
                                <div class="text-xs text-charcoal-500 mt-1">{{ $order->phone }}</div>
                            </td>
                            <td class="px-6 py-4 font-medium text-gold-500 font-sans">
                                {{ $order->formatted_total ?? 'Rp ' . number_format($order->total ?? 0, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4">
                                @php
                                    $st = $order->status;
                                    $colorClass = 'bg-charcoal-800 text-charcoal-300 border-charcoal-700';
                                    if ($st === 'completed') $colorClass = 'bg-green-900/50 text-green-400 border-green-800';
                                    elseif ($st === 'processing') $colorClass = 'bg-blue-900/50 text-blue-400 border-blue-800';
                                    elseif ($st === 'shipped') $colorClass = 'bg-purple-900/50 text-purple-400 border-purple-800';
                                    elseif ($st === 'pending') $colorClass = 'bg-yellow-900/50 text-yellow-500 border-yellow-800';
                                    elseif ($st === 'cancelled') $colorClass = 'bg-red-900/50 text-red-400 border-red-800';
                                @endphp
                                <span class="px-2.5 py-1 text-[10px] uppercase tracking-widest rounded border font-sans font-medium {{ $colorClass }}">
                                    {{ $order->status_label['text'] ?? ucfirst($st) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex items-center justify-center gap-3">
                                    <select wire:change="updateStatus({{ $order->id }}, $event.target.value)" 
                                            class="bg-charcoal-900 border border-charcoal-700 text-white rounded px-2 py-1.5 text-xs focus:outline-none focus:border-gold-500 font-sans">
                                        @foreach(['pending', 'processing', 'shipped', 'completed', 'cancelled'] as $st)
                                            <option value="{{ $st }}" {{ $order->status == $st ? 'selected' : '' }}>
                                                {{ ucfirst($st) }}
                                            </option>
                                        @endforeach
                                    </select>

                                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $order->phone) }}?text={{ urlencode('Hello ' . $order->name . ', this is BeWood regarding your order ' . $order->order_number) }}" 
                                       target="_blank" class="p-2 bg-charcoal-800 text-green-500 hover:text-green-400 hover:bg-charcoal-700 rounded transition-colors" title="WhatsApp">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.123.556 4.116 1.529 5.845L.057 23.617a.5.5 0 00.612.612l5.772-1.472A11.957 11.957 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.6a9.593 9.593 0 01-4.883-1.335l-.35-.208-3.627.925.954-3.527-.228-.362A9.558 9.558 0 012.4 12C2.4 6.698 6.698 2.4 12 2.4S21.6 6.698 21.6 12 17.302 21.6 12 21.6z"/></svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-8 text-center text-charcoal-500 font-sans italic">No orders found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="p-4 border-t border-charcoal-800 bg-charcoal-950">
                {{ $orders->links() }}
            </div>
        </div>
    </div>
</div>