<nav class="max-w-7xl mx-auto">
    {{-- NAVBAR --}}
    <div
        class="fixed top-0 left-0 w-full flex items-center justify-between px-6 py-4 md:px-10 bg-white z-50 border-b border-gray-200">
        {{-- Logo --}}
        <a href="/" class="flex items-center space-x-2">
            <h1 class="text-2xl font-bold text-blue-600">LAPOR!</h1>
        </a>

        <div class="flex flex-row items-center space-x-6">
            {{-- lonceng notif --}}
            <div class="flex items-center">
                <a href="/" class="relative flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                    </svg>
                    <span
                        class="absolute -top-2 -right-2 bg-orange-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">
                        10
                    </span>
                </a>
            </div>

            {{-- Profile --}}
            <div class="flex items-center">
                <a href="/profil"> <img src="{{ asset('foto_profil_user/' . (Auth::user()->foto_profil ?? 'default.jpg')) }}" alt="Foto Profil"
                    class="w-10 h-10 rounded-full object-cover border border-gray-300 shadow-sm">
                </a>
            </div>
        </div>
    </div>
</nav>