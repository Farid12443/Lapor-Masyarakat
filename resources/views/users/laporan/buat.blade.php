<x-header-layout>

    <x-slot:title>
       Laporan - {{ $kategori->nama_kategori }}
    </x-slot:title>

    <x-slot:judul>
        Buat Laporan Anda
    </x-slot:judul>

    {{-- Leaflet --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    

    <div class="p-6 pt-28">
        <div class="bg-linear-to-b from-blue-400 to-blue-600 text-white p-6 rounded-t-xl shadow-md">
            <div class="flex items-center gap-4">
                <div class="w-15 h-15 bg-{{ $kategori->warna }}-100 text-{{ $kategori->warna }}-600 rounded-[] flex items-center justify-center">
                    @switch($kategori->id)
                        @case(1)
                            {{-- Infrastruktur --}}
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 6.75V15m6-6v8.25m.503 3.498l4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 00-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0z" />
                        </svg>
                        @break

                        @case(2)
                            {{-- Kebersihan --}}
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                        @break

                        @case(3)
                            {{-- Keamanan --}}
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.623 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                            </svg>
                        @break

                        @case(4)
                            {{-- administrasi --}}
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        @break

                        @case(5)
                            {{-- sosial --}}
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                            </svg>
                        @break

                        @case(6)
                            {{-- fasilitas umum --}}
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Z" />
                            </svg>
                        @break

                        @case(7)
                            {{-- listrik --}}
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                            </svg>

                        @break

                        @default
                            {{-- lainya --}}
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                            </svg>
                    @endswitch
                </div>
           
                <div>
                    <h1 class="text-2xl font-bold">{{ $kategori->nama_kategori }}</h1>
                    <p class="text-indigo-100 mt-1">{{ $kategori->deskripsi }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white shadow-md rounded-b-xl p-6 space-y-6">
            {{-- FORM CARD --}}
            <form action="/laporan/kirim" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <input type="hidden" name="kategori_id" value="{{ $kategori->id }}">

                {{-- Judul --}}
                <div>
                    <label class="text-sm font-medium text-gray-700">Judul Laporan <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="judul" required
                        class="mt-2 w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Masukkan judul laporan">
                </div>

                {{-- Isi --}}
                <div>
                    <label class="text-sm font-medium text-gray-700">Deskripsi Kejadian <span
                            class="text-red-500">*</span></label>
                    <textarea name="deskripsi" rows="5" required
                        class="mt-2 w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none"
                        placeholder="Jelaskan masalah secara detail..."></textarea>
                </div>

                {{-- Foto --}}
                <div>
                    <label class="text-sm font-medium text-gray-700">Foto (Opsional)</label>
                    
                    <!-- Tombol utama untuk membuka modal -->
                    <button id="openModalBtn" type="button" class="mt-2 w-full border border-gray-300 rounded-xl px-4 py-3 bg-blue-50 text-blue-700 hover:bg-blue-100 transition">
                        Pilih Foto
                    </button>
                    
                    <!-- Input file tersembunyi untuk kamera -->
                    <input 
                        type="file" 
                        id="cameraInput" 
                        accept="image/*"
                        capture="environment"
                        class="hidden"
                    >
                    
                    <!-- Input file tersembunyi untuk galeri -->
                    <input 
                        type="file" 
                        id="galleryInput" 
                        accept="image/*"
                        class="hidden"
                    >

                    <input 
                        type="file" 
                        id="mainInput" 
                        name="foto_laporan" 
                        accept="image/*"
                        class="hidden">

                    
                    <p class="text-xs text-gray-500 mt-1">JPG/PNG, maks 5MB</p>
                    
                    <!-- Preview gambar yang dipilih -->
                    <div id="imagePreview" class="mt-4 hidden">
                        <img id="previewImg" class="w-full h-48 object-cover rounded-lg border">
                        <button id="removeImageBtn" class="mt-2 text-red-500 text-sm" type="button">Hapus Gambar</button>
                    </div>
                </div>

                {{-- Lokasi --}}
                <div>
                    <label class="text-sm font-medium text-gray-700">Lokasi Kejadian <span class="text-red-500">*</span></label>
                    <div class="w-full mt-2 space-y-3">

                        <!-- Tombol ambil lokasi -->
                        <button id="btnLokasi"
                            type="button"
                            class="px-4 py-2 bg-blue-600 text-white text-sm rounded-lg shadow hover:bg-blue-700 active:scale-95 transition">
                            Dapatkan Lokasi Saya
                        </button>

                        <!-- Wrapper map -->
                        <div id="map" class="w-full h-64 rounded-xl border border-gray-300 shadow"></div>

                        <!-- Hidden input -->
                        <input type="hidden" id="latitude" name="latitude">
                        <input type="hidden" id="longitude" name="longitude">
                    </div>

                </div>

                {{-- Submit --}}
                <button type="submit"
                    class="w-full py-3 bg-blue-600 text-white rounded-xl font-semibold hover:bg-blue-700 shadow-lg active:scale-95 transition">
                    Kirim Laporan
                </button>
            </form>

        </div>
    </div>

    <div id="modal" class="fixed inset-0 bg-black/40 backdrop-blur-sm flex items-center justify-center z-5000 opacity-0 pointer-events-none transition-all duration-300">

            <div class="bg-white p-6 rounded-2xl shadow-xl w-full max-w-sm mx-4">

                <!-- Header -->
                <h3 class="text-xl font-semibold text-gray-800 mb-4 text-center">
                    Pilih Sumber Foto
                </h3>

                <!-- Tombol kamera & galeri -->
                <div class="space-y-3">
                    <button id="cameraBtn" type="button"
                        class="w-full py-3 bg-blue-600 text-white rounded-xl font-medium hover:bg-blue-700 transition active:scale-95">
                        Ambil dari Kamera
                    </button>

                    <button id="galleryBtn" type="button"
                        class="w-full py-3 bg-green-600 text-white rounded-xl font-medium hover:bg-green-700 transition active:scale-95">
                        Pilih dari Galeri
                    </button>
                </div>

                <!-- Tombol batal -->
                <button id="closeModalBtn" type="button"
                    class="mt-5 w-full py-2.5 text-gray-600 bg-gray-100 rounded-xl hover:bg-gray-200 transition active:scale-95">
                    Batal
                </button>
            </div>
    </div>
    
    {{-- Leaflet JS --}}
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="{{ asset('js/map.js') }}"></script>
    <script src="{{ asset('js/camera.js') }}"></script>

</x-header-layout>
