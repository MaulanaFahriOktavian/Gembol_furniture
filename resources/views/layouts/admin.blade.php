<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - VoktaStyle</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @livewireStyles
</head>
<body class="bg-gray-100 font-sans text-gray-800">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside class="w-64 bg-sage-900 text-white flex flex-col hidden md:flex">
            <div class="p-6 text-2xl font-serif font-bold tracking-widest">
                VOKTA<span class="text-sage-400">STYLE</span>
            </div>
            <nav class="flex-1 px-4 space-y-2">
                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-3 rounded hover:bg-sage-800 {{ request()->routeIs('admin.dashboard') ? 'bg-sage-800 text-sage-300' : '' }}">
                    📊 Dashboard
                </a>
                <a href="{{ route('admin.products') }}" class="block px-4 py-3 rounded hover:bg-sage-800 {{ request()->routeIs('admin.products') ? 'bg-sage-800 text-sage-300' : '' }}">
                    📦 Produk
                </a>
                <a href="{{ route('admin.orders') }}" class="block px-4 py-3 rounded hover:bg-sage-800 {{ request()->routeIs('admin.orders') ? 'bg-sage-800 text-sage-300' : '' }}">
                    🛒 Pesanan
                </a>
            </nav>
            <div class="p-4 border-t border-sage-800">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 text-sm hover:text-sage-300">
                        🚪 Keluar
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-y-auto">
            <!-- Top Header -->
            <header class="bg-white shadow p-4 flex justify-between items-center">
                <h2 class="text-xl font-semibold text-sage-900">
                    @yield('title', 'Dashboard')
                </h2>
                <div class="flex items-center gap-4">
                    <span class="text-sm text-gray-500">Halo, <strong>Admin</strong></span>
                    <div class="w-8 h-8 rounded-full bg-sage-200"></div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="p-8">
                {{ $slot }}
            </main>
        </div>
    </div>
    @livewireScripts
</body>
</html>