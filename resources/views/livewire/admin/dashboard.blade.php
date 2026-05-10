<div class="space-y-6">
    {{-- Stats Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        {{-- Total Revenue --}}
        <div class="bg-charcoal-950 p-6 rounded-lg shadow-sm border border-charcoal-800">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-charcoal-400 font-sans uppercase tracking-widest">Total Revenue</p>
                    <p class="text-2xl font-bold text-white font-serif mt-1">
                        Rp {{ number_format($stats['total_revenue'] ?? 0, 0, ',', '.') }}
                    </p>
                </div>
                <div class="w-12 h-12 rounded-full bg-gold-900/30 border border-gold-900 flex items-center justify-center">
                    <svg class="w-6 h-6 text-gold-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Total Orders --}}
        <div class="bg-charcoal-950 p-6 rounded-lg shadow-sm border border-charcoal-800">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-charcoal-400 font-sans uppercase tracking-widest">Total Orders</p>
                    <p class="text-2xl font-bold text-white font-serif mt-1">
                        {{ $stats['total_orders'] ?? 0 }}
                    </p>
                </div>
                <div class="w-12 h-12 rounded-full bg-blue-900/30 border border-blue-900 flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Total Products --}}
        <div class="bg-charcoal-950 p-6 rounded-lg shadow-sm border border-charcoal-800">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-charcoal-400 font-sans uppercase tracking-widest">Active Products</p>
                    <p class="text-2xl font-bold text-white font-serif mt-1">
                        {{ $stats['total_products'] ?? 0 }}
                    </p>
                </div>
                <div class="w-12 h-12 rounded-full bg-emerald-900/30 border border-emerald-900 flex items-center justify-center">
                    <svg class="w-6 h-6 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Total Customers --}}
        <div class="bg-charcoal-950 p-6 rounded-lg shadow-sm border border-charcoal-800">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-charcoal-400 font-sans uppercase tracking-widest">Customers</p>
                    <p class="text-2xl font-bold text-white font-serif mt-1">
                        {{ $stats['total_customers'] ?? 0 }}
                    </p>
                </div>
                <div class="w-12 h-12 rounded-full bg-purple-900/30 border border-purple-900 flex items-center justify-center">
                    <svg class="w-6 h-6 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    {{-- Recent Orders Table --}}
    <div class="bg-charcoal-950 rounded-lg shadow-sm border border-charcoal-800 overflow-hidden">
        <div class="p-6 border-b border-charcoal-800 flex items-center justify-between">
            <h3 class="text-lg font-semibold text-white font-serif">Recent Orders</h3>
            <a href="{{ route('admin.orders') }}" class="text-sm text-gold-500 hover:text-gold-400 font-sans transition-colors">
                View All →
            </a>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-charcoal-900 text-charcoal-400 text-xs uppercase font-sans font-medium border-b border-charcoal-800">
                    <tr>
                        <th class="px-6 py-4">Order ID</th>
                        <th class="px-6 py-4">Customer</th>
                        <th class="px-6 py-4">Date</th>
                        <th class="px-6 py-4">Total</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-charcoal-800">
                    @forelse($recentOrders as $order)
                    <tr class="hover:bg-charcoal-800/50 transition-colors">
                        <td class="px-6 py-4 font-medium text-white font-sans text-sm">
                            #{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}
                        </td>
                        <td class="px-6 py-4 font-sans text-sm text-charcoal-200">
                            {{ $order->user->name ?? 'Guest' }}
                        </td>
                        <td class="px-6 py-4 font-sans text-sm text-charcoal-400">
                            {{ $order->created_at->format('d M Y') }}
                        </td>
                        <td class="px-6 py-4 font-sans text-sm font-semibold text-gold-500">
                            Rp {{ number_format($order->total, 0, ',', '.') }}
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 text-[10px] uppercase tracking-widest rounded border font-sans font-medium
                                @if($order->status === 'completed') bg-green-900/50 text-green-400 border-green-800
                                @elseif($order->status === 'processing') bg-blue-900/50 text-blue-400 border-blue-800
                                @elseif($order->status === 'pending') bg-yellow-900/50 text-yellow-500 border-yellow-800
                                @elseif($order->status === 'cancelled') bg-red-900/50 text-red-400 border-red-800
                                @else bg-charcoal-800 text-charcoal-300 border-charcoal-700 @endif">
                                {{ $order->status }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="text-charcoal-400 hover:text-white font-sans text-sm transition-colors">
                                Details
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center">
                            <svg class="w-12 h-12 text-charcoal-600 mx-auto mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                            </svg>
                            <p class="text-charcoal-500 font-sans text-sm">No orders found.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>