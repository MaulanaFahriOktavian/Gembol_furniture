{{-- resources/views/livewire/admin/dashboard.blade.php --}}
<div class="space-y-6">
    {{-- Stats Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        {{-- Total Revenue --}}
        <div class="bg-white p-6 rounded-lg shadow-sm border border-sage-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-sage-500 font-sans">Total Pendapatan</p>
                    <p class="text-2xl font-bold text-sage-900 font-serif mt-1">
                        Rp {{ number_format($stats['total_revenue'] ?? 0, 0, ',', '.') }}
                    </p>
                </div>
                <div class="w-12 h-12 rounded-full bg-sage-100 flex items-center justify-center">
                    <svg class="w-6 h-6 text-sage-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Total Orders --}}
        <div class="bg-white p-6 rounded-lg shadow-sm border border-sage-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-sage-500 font-sans">Total Pesanan</p>
                    <p class="text-2xl font-bold text-sage-900 font-serif mt-1">
                        {{ $stats['total_orders'] ?? 0 }}
                    </p>
                </div>
                <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Total Products --}}
        <div class="bg-white p-6 rounded-lg shadow-sm border border-sage-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-sage-500 font-sans">Produk Aktif</p>
                    <p class="text-2xl font-bold text-sage-900 font-serif mt-1">
                        {{ $stats['total_products'] ?? 0 }}
                    </p>
                </div>
                <div class="w-12 h-12 rounded-full bg-orange-100 flex items-center justify-center">
                    <svg class="w-6 h-6 text-orange-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Total Customers --}}
        <div class="bg-white p-6 rounded-lg shadow-sm border border-sage-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-sage-500 font-sans">Pelanggan</p>
                    <p class="text-2xl font-bold text-sage-900 font-serif mt-1">
                        {{ $stats['total_customers'] ?? 0 }}
                    </p>
                </div>
                <div class="w-12 h-12 rounded-full bg-purple-100 flex items-center justify-center">
                    <svg class="w-6 h-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    {{-- Recent Orders Table --}}
    <div class="bg-white rounded-lg shadow-sm border border-sage-100 overflow-hidden">
        <div class="p-6 border-b border-sage-100 flex items-center justify-between">
            <h3 class="text-lg font-semibold text-sage-900 font-serif">Pesanan Terbaru</h3>
            <a href="{{ route('admin.orders') }}" class="text-sm text-sage-600 hover:text-sage-800 font-sans">
                Lihat Semua →
            </a>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-sage-50 text-sage-600 text-xs uppercase font-sans font-medium">
                    <tr>
                        <th class="px-6 py-4">ID Pesanan</th>
                        <th class="px-6 py-4">Pelanggan</th>
                        <th class="px-6 py-4">Tanggal</th>
                        <th class="px-6 py-4">Total</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-sage-100">
                    @forelse($recentOrders as $order)
                    <tr class="hover:bg-sage-50/50 transition-colors">
                        <td class="px-6 py-4 font-medium text-sage-700 font-sans text-sm">
                            #{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}
                        </td>
                        <td class="px-6 py-4 font-sans text-sm text-sage-800">
                            {{ $order->user->name ?? 'Guest' }}
                        </td>
                        <td class="px-6 py-4 font-sans text-sm text-sage-500">
                            {{ $order->created_at->format('d M Y') }}
                        </td>
                        <td class="px-6 py-4 font-sans text-sm font-semibold text-sage-800">
                            Rp {{ number_format($order->total, 0, ',', '.') }}
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 text-xs rounded-full font-sans font-medium
                                @if($order->status === 'completed') bg-green-100 text-green-800
                                @elseif($order->status === 'processing') bg-blue-100 text-blue-800
                                @elseif($order->status === 'pending') bg-yellow-100 text-yellow-800
                                @elseif($order->status === 'cancelled') bg-red-100 text-red-800
                                @else bg-sage-100 text-sage-800 @endif">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <a href="#" class="text-sage-600 hover:text-sage-900 font-sans text-sm">
                                Detail
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center">
                            <svg class="w-12 h-12 text-sage-300 mx-auto mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                            </svg>
                            <p class="text-sage-500 font-sans text-sm">Belum ada pesanan masuk.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Quick Actions --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <a href="{{ route('admin.products') }}" class="bg-white p-6 rounded-lg shadow-sm border border-sage-100 hover:border-sage-300 transition-colors group">
            <div class="flex items-center gap-4">
                <div class="w-10 h-10 rounded-lg bg-sage-100 flex items-center justify-center group-hover:bg-sage-200 transition-colors">
                    <svg class="w-5 h-5 text-sage-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.5v15m7.5-7.5h-15"/>
                    </svg>
                </div>
                <div>
                    <p class="font-sans font-semibold text-sage-900">Tambah Produk</p>
                    <p class="font-sans text-xs text-sage-500">Buat produk baru</p>
                </div>
            </div>
        </a>
        
        <a href="#" class="bg-white p-6 rounded-lg shadow-sm border border-sage-100 hover:border-sage-300 transition-colors group">
            <div class="flex items-center gap-4">
                <div class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center group-hover:bg-blue-200 transition-colors">
                    <svg class="w-5 h-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                </div>
                <div>
                    <p class="font-sans font-semibold text-sage-900">Laporan Penjualan</p>
                    <p class="font-sans text-xs text-sage-500">Analisis bulanan</p>
                </div>
            </div>
        </a>
        
        <a href="#" class="bg-white p-6 rounded-lg shadow-sm border border-sage-100 hover:border-sage-300 transition-colors group">
            <div class="flex items-center gap-4">
                <div class="w-10 h-10 rounded-lg bg-purple-100 flex items-center justify-center group-hover:bg-purple-200 transition-colors">
                    <svg class="w-5 h-5 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="font-sans font-semibold text-sage-900">Pengaturan Toko</p>
                    <p class="font-sans text-xs text-sage-500">Konfigurasi umum</p>
                </div>
            </div>
        </a>
    </div>
</div>