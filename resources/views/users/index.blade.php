<x-app-layout>
    {{-- title --}}
    <x-slot:title>
        Home - Laporan Desa
    </x-slot:title>

    {{-- header --}}
    <div class="bg-white shadow-sm rounded-xl p-4 flex items-center gap-4">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">
                Halo, {{ $data->nama }} 👋
            </h2>
            <p class="text-gray-600 mt-1 text-sm">
                Laporan kamu aman. Silakan buat laporan baru kapan pun.
            </p>
        </div>
    </div>


    {{-- banner info --}}
    <div
        class="mt-6 bg-linear-to-r from-blue-500 to-blue-600 text-white p-4 rounded-xl shadow-lg relative overflow-hidden">
        {{-- Tambahkan ikon latar --}}
        <div class="absolute inset-0 opacity-10">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-full h-full">
                <path
                    d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
            </svg>
        </div>
        <p class="font-medium text-lg relative z-10">Ayo laporkan permasalahan di sekitarmu.</p>
        <p class="text-sm mt-1 opacity-90 relative z-10">Pihak berwenang akan memproses laporanmu dengan cepat dan aman.
        </p>
    </div>

    {{-- buat laporan --}}
    <div class="mt-6">
        <a href="/laporan/kategori"
            class="block bg-linear-to-r from-indigo-500 to-indigo-600 text-white rounded-xl p-5 shadow-md hover:shadow-lg active:scale-95 transition-all duration-200 ease-in-out">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-lg font-semibold">Buat Laporan</p>
                    <p class="text-sm text-indigo-100">Sampaikan keluhan atau saran kamu</p>
                </div>
                <span class="text-3xl">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                    </svg>
                </span>
            </div>
        </a>
    </div>

    {{-- statistik laporan --}}
    <div class="mt-6 grid grid-cols-2 gap-4">
        <div class="bg-green-100 p-4 rounded-xl text-center">
            <p class="text-2xl font-bold text-green-600">{{ $laporan_selesai->count() ?? 0 }}</p>
            <p class="text-sm text-green-700">Laporan Selesai</p>
        </div>
        <div class="bg-yellow-100 p-4 rounded-xl text-center">
            <p class="text-2xl font-bold text-yellow-600">{{ $laporan_diproses->count() ?? 0 }}</p>
            <p class="text-sm text-yellow-700">Sedang Diproses</p>
        </div>
    </div>

    {{-- riwayat laporan --}}
    <div class="mt-8">
        <div class="flex items-center justify-between mb-3">
            <h3 class="text-xl font-semibold">Riwayat Laporan</h3>
            <a href="/laporan/riwayat" class="text-blue-500 text-sm hover:underline">Lihat Semua</a>
        </div>

        <div class="space-y-4">
            @forelse ($laporan as $item)
                <div
                    class="p-4 bg-white rounded-xl shadow-sm border border-gray-200 hover:shadow-lg hover:border-gray-300 transition-all duration-200 ease-in-out">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                        <div class="flex-1">
                            <h3 class="font-semibold text-gray-900 text-lg leading-tight">{{ $item->judul }}</h3>
                            <p class="text-sm text-gray-500 mt-1 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="size-4 mr-1">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5a2.25 2.25 0 0 0 2.25-2.25m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5a2.25 2.25 0 0 1 2.25 2.25v7.5" />
                                </svg>
                                {{ $item->updated_at->translatedFormat('l, d F Y') }}
                            </p>
                        </div>
                        <div class="flex-shrink-0">
                            <span class="inline-flex items-center px-3 py-1.5 text-xs font-medium rounded-full 
                                @if($item->status == 'selesai') bg-green-100 text-green-800 border border-green-200
                                @elseif($item->status == 'diproses') bg-yellow-100 text-yellow-800 border border-yellow-200
                                @else bg-gray-100 text-gray-800 border border-gray-200 @endif">
                                @if($item->status == 'selesai')
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="size-4 mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                @elseif($item->status == 'diproses')
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="size-4 mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="size-4 mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" />
                                    </svg>
                                @endif
                                {{ ucfirst($item->status) }}
                            </span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="p-8 bg-gray-50 rounded-xl shadow-sm border border-gray-200 text-center">
                    <div class="flex justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-16 text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5.586a1 1 0 0 1 .707.293l5.414 5.414a1 1 0 0 1 .293.707V19a2 2 0 0 1-2 2z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada laporan</h3>
                    <p class="text-sm text-gray-500 mb-4">Mulai buat laporan pertama Anda untuk melacak kemajuan!</p>
                    <a href="#"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-4 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Buat Laporan Baru
                    </a>
                </div>
            @endforelse
        </div>
    </div>

</x-app-layout>