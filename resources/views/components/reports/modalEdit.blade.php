<div id="editModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50"
    onclick="closeEditModal()">

    <div class="w-full max-w-lg bg-white rounded-xl shadow-lg" onclick="event.stopPropagation()">
        <form id="editForm" method="POST">
            @csrf
            @method('PUT')

            <div
                class="flex items-center justify-between px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-indigo-50 to-white rounded-t-xl">
                <h2 class="text-xl font-bold text-gray-800 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6 text-indigo-600">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                    </svg>
                    Edit Laporan
                </h2>

                <button onclick="closeEditModal()"
                    class="text-gray-400 hover:text-gray-600 transition-colors duration-200 p-1 rounded-full hover:bg-gray-100"
                    type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>


            <div class="px-6 py-6 space-y-6">

                <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                    <p class="text-sm font-medium text-gray-500 mb-1">Judul Laporan</p>
                    <p id="modal-judulLaporan" class="text-gray-900 font-semibold text-base">
                        Deskripsi laporan akan muncul di sini
                    </p>
                </div>

                <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                    <p class="text-sm font-medium text-gray-500 mb-1">Deskripsi</p>
                    <p id="modal-deskripsiLaporan" class="text-gray-900 text-sm leading-relaxed">
                        Deskripsi laporan akan muncul di sini
                    </p>
                </div>

                <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                    <p class="text-sm font-medium text-gray-500 mb-1">Kategori Laporan</p>
                    <p id="modal-kategoriLaporan" class="text-gray-900 font-medium">
                        Kategori Laporan
                    </p>
                </div>

                <div
                    class="flex items-center gap-4 text-sm text-gray-600 bg-gray-50 p-3 rounded-lg border border-gray-200">
                    <div class="flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5a2.25 2.25 0 002.25-2.25m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5a2.25 2.25 0 012.25 2.25v7.5" />
                        </svg>
                        <span id="modal-tanggalLaporan">12 Des 2025</span>
                    </div>
                    <span class="text-gray-400">•</span>
                    <div class="flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>
                        <span id="modal-namaPelapor">Nama Pelapor</span>
                    </div>
                </div>

                <div class="relative">
                    <label class="mb-2 flex items-center gap-2 text-sm font-semibold text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Status Laporan
                    </label>

                    <div class="relative">
                        <select name="status" id="modal-statusLaporan"
                            class="appearance-none w-full rounded-lg border border-gray-300 bg-white px-3 py-2.5 pr-10 text-sm shadow-sm transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500">
                            <option value="menunggu">Menunggu</option>
                            <option value="diproses">Diproses</option>
                            <option value="selesai">Selesai</option>
                        </select>

                        <svg class="pointer-events-none absolute right-3 top-1/2 h-4 w-4 -translate-y-1/2 text-gray-500"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2">
                            <path d="m6 9 6 6 6-6" />
                        </svg>
                    </div>
                </div>


            </div>

            <div class="flex justify-end gap-3 px-6 py-4 border-t border-gray-200 bg-gray-50 rounded-b-xl">
                <button onclick="closeEditModal()" type="button"
                    class="px-5 py-2.5 text-sm font-medium rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-100 hover:border-gray-400 transition-all duration-200">
                    Batal
                </button>

                <button type="submit"
                    class="px-5 py-2.5 text-sm font-medium rounded-lg bg-indigo-600 text-white hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all duration-200 shadow-sm">
                    Simpan Status
                </button>
            </div>
        </form>
    </div>
</div>