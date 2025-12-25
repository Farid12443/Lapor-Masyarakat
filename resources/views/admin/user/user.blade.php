<x-admin-layout>
    <x-slot:judul>
        User Management
    </x-slot:judul>
    <x-slot:subjudul>
        View, manage, and track all Users
    </x-slot:subjudul>
    <div class="flex flex-col gap-6 rounded-xl border">
        <div class="items-start p-6">
            <div class="flex items-center justify-between">
                <h4 data-slot="card-title" class="leading-none flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-funnel h-5 w-5" aria-hidden="true">
                        <path
                            d="M10 20a1 1 0 0 0 .553.895l2 1A1 1 0 0 0 14 21v-7a2 2 0 0 1 .517-1.341L21.74 4.67A1 1 0 0 0 21 3H3a1 1 0 0 0-.742 1.67l7.225 7.989A2 2 0 0 1 10 14z">
                        </path>
                    </svg>
                    User Management
                </h4>
            </div>
        </div>

        <div class="flex items-center justify-between px-6">
            <form action="/admin/user" method="GET" class="flex items-center gap-3">

                {{-- SEARCH --}}
                <div class="relative w-64">
                    <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="m21 21-4.34-4.34"></path>
                        </svg>
                    </div>

                    <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="Search nama..."
                        class="w-full rounded-md border px-9 py-2 text-sm focus:ring focus:ring-blue-200">

                    @if(request('keyword'))
                        <a href="{{ url()->current() }}?{{ http_build_query(request()->except('keyword')) }}"
                            class="absolute inset-y-0 right-3 flex items-center text-gray-400 hover:text-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </a>
                    @endif
                </div>
            </form>


            <div class="flex items-center gap-3">
                <button type="button"
                    onclick="this.classList.add('animate-spin-once'); setTimeout(()=>location.reload(),300)"
                    class="group flex items-center gap-2 rounded-md border border-gray-300 bg-white px-4 py-2 text-sm text-gray-700 transition hover:bg-gray-100">
                    <svg class="h-4 w-4 transition-transform group-active:rotate-180" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8" />
                        <path d="M21 3v5h-5" />
                        <path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16" />
                        <path d="M8 16H3v5" />
                    </svg>
                    Refresh
                </button>
            </div>
        </div>
        <div class="px-6 pb-6">
            <div class="overflow-x-auto rounded-md border">
                <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nama
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Email
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Alamat
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                No HP
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200">
                        @forelse ($user as $item)
                            <tr onclick="openModalShowUser(this)" data-id="{{ $item->id }}"
                                data-nama="{{ $item->nama }}" data-email="{{ $item->email }}"
                                data-foto="{{ $item->foto_profil }}" data-no_hp="{{ $item->no_hp }}"
                                data-alamat="{{ $item->alamat }}" data-riwayat-laporan='@json($item->laporans)'
                                data-registrasi="{{ $item->created_at->translatedFormat('M d, h:i A') }}" title="lihat detail"
                                class="hover:bg-blue-50 transition-colors duration-200">

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <p class="font-semibold text-gray-900">
                                        {{ Str::title($item->nama) }}
                                    </p>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-gray-700">
                                    {{ $item->email }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-2 text-sm text-gray-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor"
                                            class="text-blue-500 w-4 h-4 flex-shrink-0">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                        </svg>
                                        <span>{{ $item->alamat }}</span>
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-2 text-sm text-gray-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor"
                                            class="text-green-500 w-4 h-4 flex-shrink-0">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                                        </svg>
                                        <span>{{ $item->no_hp }}</span>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="px-6 py-8 text-center text-gray-500" colspan="5">
                                    <div class="flex flex-col items-center">
                                        <svg class="w-12 h-12 text-gray-400 mb-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                            </path>
                                        </svg>
                                        Belum Ada Data
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <x-users.modalDetail />
    <script src="{{ asset('js/modalUsers.js') }}"></script>

</x-admin-layout>