<x-header-layout>

    <x-slot:title>
        Riwayat - Laporan
    </x-slot:title>

    <x-slot:judul>
        Riwayat Laporan
    </x-slot:judul>

    <div class="p-6 pt-28">
        <div class="flex justify-between items-center mb-6 gap-2">
            @php
                $filters = [
                    'all' => ['Semua', 'bg-blue-500'],
                    'menunggu' => ['Menunggu', 'bg-yellow-500'],
                    'diproses' => ['Diproses', 'bg-orange-500'],
                    'selesai' => ['Selesai', 'bg-green-600']
                ];
            @endphp

            @foreach ($filters as $key => $label)
                <button onclick="filterReports('{{ $key }}')"
                    class="px-3 py-2 text-white rounded-full shadow-sm hover:shadow-md transition {{ $label[1] }}">
                    {{ $label[0] }}
                </button>
            @endforeach
        </div>

        <div id="report-list" class="space-y-4">
            @forelse ($laporan as $item)
                <div
                    class="report-item p-5 bg-white rounded-xl border border-gray-200 shadow-sm hover:shadow-md hover:border-gray-300 transition">

                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3">
                        <div>
                            <h3 class="font-semibold text-gray-900 text-lg">{{ $item->judul }}</h3>

                            <p class="text-sm text-gray-500 mt-1 flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                                </svg>
                                {{ $item->updated_at->translatedFormat('l, d F Y') }}
                            </p>
                        </div>

                        <span class="inline-flex items-center px-3 py-1.5 text-xs font-medium rounded-full border
                            @if($item->status == 'selesai')
                                bg-green-100 text-green-800 border-green-200
                            @elseif($item->status == 'diproses')
                                bg-orange-100 text-orange-800 border-orange-200
                            @elseif($item->status == 'menunggu')
                                bg-yellow-100 text-yellow-800 border-yellow-200
                            @else
                                bg-gray-100 text-gray-800 border-gray-200
                            @endif">
                            {{ ucfirst($item->status) }}
                        </span>
                    </div>

                    <div class="mt-4">
                        <a href="/laporan/show/{{ $item->id }}" class="text-sm inline-flex items-center gap-1 text-blue-600 font-medium hover:underline">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25a2.25 2.25 
                                        0 0 0-2.25-2.25h-7.5a2.25 2.25 
                                        0 0 0-2.25 2.25v13.5a2.25 2.25 
                                        0 0 0 2.25 2.25h7.5a2.25 2.25 
                                        0 0 0 2.25-2.25V15M9 
                                        12h12m0 0-3 3m3-3-3-3" />
                            </svg>
                            Lihat Detail
                        </a>
                    </div>

                </div>
            @empty
                <div id="empty-default" class="p-8 bg-white rounded-xl shadow-sm border text-center">
                    <h3 class="text-lg font-medium text-gray-900">Belum ada laporan</h3>
                    <p class="text-sm text-gray-500 mt-1">Ayo buat laporan pertamamu!</p>
                </div>
            @endforelse

            <div id="empty-filter" class="hidden p-8 text-center bg-gray-100 border rounded-xl text-gray-600">
                Tidak ada laporan dengan status ini.
            </div>
        </div>
    </div>

    <script src="{{ asset('js/filterbutton.js') }}"></script>

</x-header-layout>