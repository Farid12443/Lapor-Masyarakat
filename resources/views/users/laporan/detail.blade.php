<x-header-layout>
    <x-slot:title>
        Detail - Laporan Desa
    </x-slot:title>

    <x-slot:judul>
        Detail Laporan
    </x-slot:judul>

    <div class="p-6 pt-28 space-y-6">

        {{-- CARD UTAMA --}}
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200 space-y-4">

            {{-- TITLE + STATUS --}}
            <div class="space-y-2">
                <h1 class="text-2xl font-bold text-gray-900 leading-tight">
                    {{ $data->judul }}
                </h1>

                <p class="text-gray-500 text-sm flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                    </svg>

                    {{ $data->created_at->translatedFormat('l, d F Y - H:i') }}
                </p>

                {{-- STATUS BADGE --}}
                <span class="inline-block mt-2 px-4 py-1.5 rounded-full text-xs font-semibold tracking-wide
                    @if($data->status == 'selesai')
                        bg-green-100 text-green-700
                    @elseif($data->status == 'diproses')
                        bg-orange-100 text-orange-700
                    @elseif($data->status == 'menunggu')
                        bg-yellow-100 text-yellow-700
                    @else
                        bg-gray-100 text-gray-700
                    @endif
                ">
                    {{ strtoupper($data->status) }}
                </span>
            </div>

            {{-- GARIS PEMBATAS TIPIS --}}
            <hr class="border-gray-200">

            {{-- KATEGORI --}}
            <div>
                <h3 class="text-sm font-semibold text-gray-500">Kategori</h3>
                <p class="text-gray-800 text-base font-medium mt-1">
                    {{ $data->kategori->nama_kategori }}
                </p>
            </div>

            {{-- DESKRIPSI --}}
            <div>
                <h3 class="text-sm font-semibold text-gray-500">Isi Laporan</h3>
                <p class="text-gray-700 text-base leading-relaxed mt-1">
                    {{ $data->deskripsi_laporan }}
                </p>
            </div>
        </div>


        {{-- FOTO LAPORAN --}}
        @if ($data->foto_laporan)
            <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-200">
                <h3 class="text-sm font-semibold text-gray-500 mb-3">Foto Laporan</h3>

                <img src="{{ asset('foto_laporan/' . $data->foto_laporan) }}"
                    class="w-full rounded-xl shadow-sm object-cover max-h-[350px] mx-auto">
            </div>
        @endif


        {{-- MAP LOCATION --}}
        @if ($data->latitude && $data->longitude)
            <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-200 space-y-3">
                <h3 class="text-sm font-semibold text-gray-500">Lokasi Kejadian</h3>

                <div id="map" class="w-full h-72 rounded-xl overflow-hidden shadow-sm"></div>

                <p class="text-gray-500 text-sm">
                    Koordinat:
                    <span class="font-medium text-gray-700">
                        {{ $data->latitude }}, {{ $data->longitude }}
                    </span>
                </p>
            </div>
        @endif

        <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css">
        <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const latitude = {{ $data->latitude }};
                const longitude = {{ $data->longitude }};

                const map = L.map('map').setView([latitude, longitude], 16);

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '© OpenStreetMap'
                }).addTo(map);

                const marker = L.marker([latitude, longitude]).addTo(map);

                // pastikan marker selalu di tengah
                map.invalidateSize();

                // reverse geocoding (alamat)
                fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${latitude}&lon=${longitude}`)
                    .then(res => res.json())
                    .then(data => {
                        marker.bindPopup(`
                    <b>Lokasi Kejadian</b><br>
                    ${data.display_name}
                `).openPopup();
                    })
                    .catch(() => {
                        marker.bindPopup("Alamat tidak ditemukan");
                    });
            });
        </script>


    </div>
</x-header-layout>