<div id="modalShowUser" class="fixed inset-0 z-50 hidden items-center justify-end bg-black/50"
    onclick="closeModalShowUser()">

    <div class="flex h-screen w-full max-w-xl flex-col bg-white shadow-xl" onclick="event.stopPropagation()">
        <div class="sticky top-0 z-10 flex items-center justify-between border-b bg-white px-6 py-4">
            <div>
                <h2 id="modal-judul" class="text-lg font-semibold text-gray-800">
                    Detail User
                </h2>
                <p class="text-sm text-gray-500">
                    ID User: <span id="modal-id"></span>
                </p>
            </div>

            <button onclick="closeModalShowUser()" class="text-gray-500 hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <div class="flex-1 space-y-6 overflow-y-auto px-6 py-6">
            <div class="flex flex-col items-center gap-3">
                <img id="modal-foto-profil" class="h-32 w-32 rounded-full border object-cover" src="" alt="Foto Profil">

                <p class="text-sm font-medium text-gray-600">
                    Foto Profil
                </p>
            </div>

            <div class="space-y-3">
                <h3 class="text-sm font-semibold text-gray-700">
                    Informasi Kontak
                </h3>

                <div class="space-y-2 text-sm text-gray-600">
                    <p><strong>Nama:</strong> <span id="modal-nama"></span></p>
                    <p><strong>Email:</strong> <span id="modal-email"></span></p>
                    <p><strong>No HP:</strong> <span id="modal-no-hp"></span></p>
                    <p><strong>Alamat:</strong> <span id="modal-alamat"></span></p>
                </div>
            </div>

            <div class="space-y-3 border-b pb-6">
                <h3 class="text-sm font-semibold text-gray-700">
                    Informasi Akun
                </h3>

                <div class="space-y-2 text-sm text-gray-600">
                    <p>
                        <strong>Tanggal Registrasi:</strong>
                        <span id="modal-registrasi"></span>
                    </p>
                    <p>
                        <strong>Last Login:</strong>
                        <span id="modal-last_login"></span>
                    </p>
                </div>
            </div>

            <div class="space-y-3">
                <h3 class="text-sm font-semibold text-gray-700">
                    Riwayat Laporan
                </h3>

                <div class="pb-6">
                    <div class="overflow-x-auto rounded-md border">
                        <table class="w-full text-sm">
                            <thead class="border-b bg-gray-50">
                                <tr>
                                    <th class="px-3 py-2 text-left font-medium text-gray-700">No</th>
                                    <th class="px-3 py-2 text-left font-medium text-gray-700">Report</th>
                                    <th class="px-3 py-2 text-left font-medium text-gray-700">Category</th>
                                    <th class="px-3 py-2 text-left font-medium text-gray-700">Status</th>
                                    <th class="px-3 py-2 text-left font-medium text-gray-700">Date</th>
                                </tr>
                            </thead>

                            <tbody id="riwayat-container">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>