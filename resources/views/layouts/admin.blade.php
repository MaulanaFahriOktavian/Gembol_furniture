<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - BeWood</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-charcoal-900 font-sans text-beige-100 min-h-screen flex selection:bg-gold-500 selection:text-white antialiased">
    
    <!-- Sidebar -->
    <aside class="w-64 border-r border-charcoal-800 bg-charcoal-950 hidden md:flex flex-col">
        <div class="h-20 flex items-center px-8 border-b border-charcoal-800">
            <span class="font-serif text-2xl text-gold-500 tracking-widest">BeWood.</span>
        </div>
        <nav class="flex-1 py-8 px-4 space-y-2 overflow-y-auto">
            <p class="text-[10px] uppercase tracking-widest text-charcoal-500 font-medium px-4 mb-4">Management</p>
            <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 rounded text-sm transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-charcoal-800 text-gold-500' : 'text-charcoal-300 hover:bg-charcoal-800 hover:text-white' }}">
                <svg class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                Dashboard
            </a>
            <a href="{{ route('admin.products') }}" class="flex items-center px-4 py-3 rounded text-sm transition-colors {{ request()->routeIs('admin.products') ? 'bg-charcoal-800 text-gold-500' : 'text-charcoal-300 hover:bg-charcoal-800 hover:text-white' }}">
                <svg class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                Products
            </a>
            <a href="{{ route('admin.orders') }}" class="flex items-center px-4 py-3 rounded text-sm transition-colors {{ request()->routeIs('admin.orders') ? 'bg-charcoal-800 text-gold-500' : 'text-charcoal-300 hover:bg-charcoal-800 hover:text-white' }}">
                <svg class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                Orders
            </a>
            <a href="{{ route('admin.galleries') }}" class="flex items-center px-4 py-3 rounded text-sm transition-colors {{ request()->routeIs('admin.galleries') ? 'bg-charcoal-800 text-gold-500' : 'text-charcoal-300 hover:bg-charcoal-800 hover:text-white' }}">
                <svg class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                Gallery
            </a>
            <a href="{{ route('admin.testimonials') }}" class="flex items-center px-4 py-3 rounded text-sm transition-colors {{ request()->routeIs('admin.testimonials') ? 'bg-charcoal-800 text-gold-500' : 'text-charcoal-300 hover:bg-charcoal-800 hover:text-white' }}">
                <svg class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                Testimonials
            </a>
            <a href="{{ route('admin.custom-orders') }}" class="flex items-center px-4 py-3 rounded text-sm transition-colors {{ request()->routeIs('admin.custom-orders') ? 'bg-charcoal-800 text-gold-500' : 'text-charcoal-300 hover:bg-charcoal-800 hover:text-white' }}">
                <svg class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                Custom Orders
            </a>
            <a href="{{ route('admin.contacts') }}" class="flex items-center px-4 py-3 rounded text-sm transition-colors {{ request()->routeIs('admin.contacts') ? 'bg-charcoal-800 text-gold-500' : 'text-charcoal-300 hover:bg-charcoal-800 hover:text-white' }}">
                <svg class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                Messages
            </a>
        </nav>
        <div class="p-4 border-t border-charcoal-800">
            <form method="POST" action="/logout">
                @csrf
                <button type="submit" class="w-full flex items-center px-4 py-3 text-sm text-charcoal-400 hover:text-white transition-colors">
                    <svg class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    Sign Out
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 flex flex-col min-w-0 bg-charcoal-900">
        <!-- Header -->
        <header class="h-20 flex items-center justify-between px-8 border-b border-charcoal-800 bg-charcoal-900/50 backdrop-blur-md sticky top-0 z-10">
            <h1 class="font-serif text-xl text-white">{{ $title ?? 'Dashboard' }}</h1>
            <div class="flex items-center gap-4">
                <button class="text-charcoal-400 hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                </button>
                <div class="w-8 h-8 rounded bg-charcoal-800 border border-charcoal-700 flex items-center justify-center text-sm font-medium text-gold-500">
                    A
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <div class="flex-1 p-8 overflow-y-auto">
            <div class="max-w-7xl mx-auto">
                {{ $slot }}
            </div>
        </div>
    </main>

    @livewireScripts
</body>
</html>