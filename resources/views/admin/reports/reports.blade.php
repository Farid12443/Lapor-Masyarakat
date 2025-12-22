<x-admin-layout>
    <x-slot:judul>
        Reports Management
    </x-slot:judul>
    <x-slot:subjudul>
        View, manage, and track all citizen reports
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
                    Reports Management
                </h4>
            </div>
        </div>

        <div class="flex items-center justify-between px-6">
            <form action="/admin/reports" method="GET" class="flex items-center gap-3">

                {{-- SEARCH --}}
                <div class="relative w-64">
                    <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="m21 21-4.34-4.34"></path>
                        </svg>
                    </div>

                    <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="Search reports..."
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

                {{-- FILTER STATUS --}}
                <div class="relative">
                    <select name="status" onchange="this.form.submit()"
                        class="appearance-none w-full rounded-md border border-gray-300 bg-gray-100 px-3 py-2 pr-8 text-sm text-gray-700 focus:outline-none">
                        <option value="">All Statuses</option>
                        <option value="menunggu">Menunggu</option>
                        <option value="diproses">Diproses</option>
                        <option value="selesai">Selesai</option>
                    </select>

                    <svg class="pointer-events-none absolute right-2 top-1/2 h-4 w-4 -translate-y-1/2 text-gray-500"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="2">
                        <path d="m6 9 6 6 6-6" />
                    </svg>
                </div>

                {{-- FILTER KATEGORI --}}
                <div class="relative">
                    <select name="kategori" onchange="this.form.submit()" class="appearance-none
 rounded-md border border-gray-300 bg-gray-100 px-3 py-2 text-sm text-gray-700 focus:outline-none">
                        <option value="">All Category</option>
                        @foreach ($categories as $kategori)
                            <option value="{{ $kategori->id }}" {{ request('kategori') == $kategori->id ? 'selected' : '' }}>
                                {{ $kategori->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                    <svg class="pointer-events-none absolute right-2 top-1/2 h-4 w-4 -translate-y-1/2 text-gray-500"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="2">
                        <path d="m6 9 6 6 6-6" />
                    </svg>
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


                <button
                    class="flex py-2 items-center gap-2 rounded-md border border-gray-300 bg-white px-4 text-sm text-gray-700 transition hover:bg-gray-100">
                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path d="M12 15V3"></path>
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                        <path d="m7 10 5 5 5-5"></path>
                    </svg>
                    Export
                </button>
            </div>
        </div>
        <div class="px-6 pb-6">
            <div class="overflow-x-auto rounded-md border">
                <table class="w-full text-sm">
                    <thead class="border-b bg-gray-50">
                        <tr>
                            <th class="px-3 py-2 text-left font-medium text-gray-700">Report</th>
                            <th class="px-3 py-2 text-left font-medium text-gray-700">Category</th>
                            <th class="px-3 py-2 text-left font-medium text-gray-700">Status</th>
                            <th class="px-3 py-2 text-left font-medium text-gray-700">Submitted By</th>
                            <th class="px-3 py-2 text-left font-medium text-gray-700">Date</th>
                            <th class="px-3 py-2 text-left font-medium text-gray-700">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y">
                        @forelse ($reports as $item)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-3 py-2">
                                    <p class="font-medium text-gray-900">
                                        {{ Str::title($item->judul) }}
                                    </p>
                                    <p class="text-sm text-gray-500 truncate max-w-xs">
                                        {{$item->deskripsi_laporan}}
                                    </p>
                                </td>

                                <td class="px-3 py-2">
                                    <span
                                        class="inline-flex items-center rounded-md border px-2 py-0.5 text-xs font-medium text-gray-700">
                                        {{ $item->kategori->nama_kategori }}
                                    </span>
                                </td>

                                <td class="px-3 py-2">
                                    @switch($item->status)
                                        @case('menunggu')
                                            <span
                                                class="inline-flex items-center rounded-md bg-yellow-100 px-2 py-0.5 text-xs font-medium text-yellow-800">
                                                Menunggu
                                            </span>
                                        @break

                                        @case('diproses')
                                            <span
                                                class="inline-flex items-center rounded-md bg-blue-100 px-2 py-0.5 text-xs font-medium text-blue-800">
                                                Diproses
                                            </span>
                                        @break

                                        @case('selesai')
                                            <span
                                                class="inline-flex items-center rounded-md bg-green-100 px-2 py-0.5 text-xs font-medium text-green-800">
                                                Selesai
                                            </span>
                                        @break

                                        @default
                                            <span
                                                class="inline-flex items-center rounded-md bg-gray-100 px-2 py-0.5 text-xs font-medium text-gray-800">
                                                Tidak diketahui
                                            </span>
                                    @endswitch
                                </td>

                                <td class="px-3 py-2">
                                    <div class="flex items-center gap-1 text-sm text-gray-700">
                                        <svg class="h-3 w-3 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <circle cx="12" cy="7" r="4" />
                                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                                        </svg>
                                        {{ $item->user->nama }}
                                    </div>
                                </td>

                                <td class="px-3 py-2">
                                    <div class="flex items-center gap-1 text-sm text-gray-700">
                                        <svg class="h-3 w-3 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <rect x="3" y="4" width="18" height="18" rx="2" />
                                            <path d="M8 2v4M16 2v4M3 10h18" />
                                        </svg>
                                        {{ $item->updated_at->translatedFormat('M d, h:i A') }}
                                    </div>
                                </td>

                                <td class="flex item-center justify-start py-2 gap-2">
                                    <button onclick="openModalShow(this)" data-judul="{{ $item->judul }}"
                                        data-kategori="{{ $item->kategori->nama_kategori }}"
                                        data-deskripsi="{{ $item->deskripsi_laporan }}" data-nama="{{ $item->user->nama }}"
                                        data-email="{{ $item->user->email }}" data-id="{{ $item->id }}"
                                        data-buat="{{ $item->created_at->translatedFormat('M d, h:i A') }}"
                                        data-tanggal="{{ $item->updated_at->translatedFormat('M d, h:i A') }}"
                                        data-no_hp="{{ $item->user->no_hp }}" data-foto="{{ $item->foto_laporan }}"
                                        data-latitude="{{ $item->latitude }}" data-longitude="{{ $item->longitude }}"
                                        data-status="{{ $item->status }}"
                                        class="flex h-8 w-8 items-center justify-center rounded-md hover:bg-gray-200 transition">
                                        <svg class="h-4 w-4 text-gray-600" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path
                                                d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0" />
                                            <circle cx="12" cy="12" r="3" />
                                        </svg>
                                    </button>
                                    <button onclick="openEditModal(this)" data-id-laporan="{{ $item->id }}"
                                        data-judul-laporan="{{ $item->judul }}"
                                        data-deskripsi-laporan="{{ $item->deskripsi_laporan }}"
                                        data-kategori-laporan="{{ $item->kategori->nama_kategori }}"
                                        data-tanggal-laporan="{{ $item->updated_at->format('d M Y') }}"
                                        data-nama-pelapor="{{ $item->user->nama }}"
                                        data-status-laporan="{{ $item->status }}"
                                        class="flex h-8 w-8 items-center justify-center rounded-md hover:bg-gray-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="h-4 w-4 text-gray-600">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="py-4 text-center text-gray-500" colspan="6">
                                    Belum Ada Data
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <x-dashboard.detaiLaporanModal />

        <x-reports.modalEdit />

        <script src="{{ asset('js/dashboard.js') }}"></script>
        <script src="{{ asset('js/modalEdit.js') }}"></script>

    </div>

</x-admin-layout>