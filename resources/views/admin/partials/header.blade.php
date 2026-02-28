<header class="bg-white shadow px-6 py-4 flex justify-between">
    <h1 class="text-lg font-semibold">
        @yield('page-title', 'Dashboard')
    </h1>

    <div>
        {{ auth()->user()->name ?? 'Admin' }}
    </div>
</header>
