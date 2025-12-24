<aside class="w-full h-screen bg-[#FFFFFF] flex flex-col border-r border-black col-span-1">
    <div class="flex items-center gap-3 px-6 py-5 text-xl font-bold border-b border-slate-700">
        <div class="bg-black p-2 rounded-lg">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6 text-gray-200">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
            </svg>
        </div>
        <div class="flex flex-col">
            <span>LaporAdmin</span>
            <span class="text-sm font-[400] text-gray-800">Report Management</span>
        </div>
    </div>
    <nav class="flex-1 px-4 py-6 space-y-6 text-lg">
        <a href="/admin/" class="flex items-center block gap-3 px-4 py-2 rounded-lg text-black hover:bg-[#E9EBEF]
            {{ request()->is('admin') ? 'bg-[#E9EBEF]' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-6"
                aria-hidden="true">
                <rect width="7" height="9" x="3" y="3" rx="1"></rect>
                <rect width="7" height="5" x="14" y="3" rx="1"></rect>
                <rect width="7" height="9" x="14" y="12" rx="1"></rect>
                <rect width="7" height="5" x="3" y="16" rx="1"></rect>
            </svg>
            <span>
                Dashboard
            </span>
        </a>
        <a href="/admin/reports" class="flex gap-3 items-center px-4 py-2 rounded-lg text-black hover:bg-[#E9EBEF]
            {{ request()->is('admin/reports*') ? 'bg-[#E9EBEF]' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-6"
                aria-hidden="true">
                <path
                    d="M6 22a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h8a2.4 2.4 0 0 1 1.704.706l3.588 3.588A2.4 2.4 0 0 1 20 8v12a2 2 0 0 1-2 2z">
                </path>
                <path d="M14 2v5a1 1 0 0 0 1 1h5"></path>
                <path d="M10 9H8"></path>
                <path d="M16 13H8"></path>
                <path d="M16 17H8"></path>
            </svg>
            <span>
                Laporan
            </span>
        </a>
        <a href="/admin/user" class="flex items-center gap-3 block px-4 py-2 rounded-lg text-black hover:bg-[#E9EBEF] 
             {{ request()->is('admin/user*') ? 'bg-[#E9EBEF]' : '' }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-6"
            aria-hidden="true">
            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
            <path d="M16 3.128a4 4 0 0 1 0 7.744"></path>
            <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
            <circle cx="9" cy="7" r="4"></circle>
        </svg>
        <span>
            Pengguna
        </span>
        </a>
        <a href="#" class="flex gap-3 items-center block px-4 py-2 rounded-lg text-black hover:bg-[#E9EBEF]">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-6"
                aria-hidden="true">
                <path d="M3 3v16a2 2 0 0 0 2 2h16"></path>
                <path d="M18 17V9"></path>
                <path d="M13 17V5"></path>
                <path d="M8 17v-3"></path>
            </svg>
            <span>
                Analisis
            </span>
        </a>
    </nav>
    <div class="px-6 py-4 border-t border-slate-700">

        <button type="button" onclick="LogoutModal()"
            class="w-full flex items-center gap-5 justify-center bg-red-500 hover:bg-red-600 text-white py-2 rounded-lg">
            <span>Logout</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
            </svg>
        </button>
    </div>
</aside>