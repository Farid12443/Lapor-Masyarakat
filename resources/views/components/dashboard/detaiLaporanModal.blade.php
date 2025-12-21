<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css">
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>


<div id="modalshow" class="fixed inset-0 bg-black/50 items-center justify-end hidden z-50" onclick="closeModalShow()">
    <div class="flex flex-col space-y-6 bg-white rounded-lg shadow-lg px-6 pb-6 h-screen w-2xl overflow-y-auto "
        onclick="event.stopPropagation()">
        <div class="flex flex-row justify-between items-start sticky pb-4 pt-6 top-0 bg-white">
            <div class="flex flex-col gap-1.5">
                <h2 id="modal-judul" class="font-semibold">
                    JudulNyaNanti
                </h2>
                <div class="flex items-center gap-2 text-sm">
                    <p>ID Laporan: <span id="modal-id"></span> </p>
                    <span class="h-5 w-0.5 bg-black"></span>
                    <p>Kategori: <span id="modal-kategori"></span></p>
                </div>
            </div>
            <button onclick="closeModalShow()">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="size-6">
                    <path d="M18 6 6 18"></path>
                    <path d="m6 6 12 12"></path>
                </svg>
            </button>
        </div>
        <div class="space-y-6">
            <div class="flex items-center gap-4">
                <div>
                    <label data-slot="label" class="flex items-center gap-2 font-medium text-sm">Status</label>
                    <div class="mt-1">
                        <button type="button"
                            class="border-input flex items-center justify-between gap-2 rounded-md border bg-input-background px-3 py-2 text-sm whitespace-nowrap">
                            <span id="modal-status">Pending</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <div class="flex flex-col">
            <label class="flex items-center gap-2 font-medium text-sm">Deskripsi</label>
            <p id="modal-deskripsi" class="mt-2 text-sm text-muted-foreground leading-relaxed">Deep pothole
                causing damage to
                vehicles near the intersection of Main St and Oak Ave. Multiple residents have reported tire
                damage.
            </p>
        </div>

        <div class="flex flex-col space-y-2">
            <label class="flex items-center gap-2 font-medium text-sm">Dikirim Oleh</label>
            <div class="space-y-1">
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-user h-4 w-4 text-muted-foreground" aria-hidden="true">
                        <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    <span id="modal-nama" class="text-sm">John Smith</span>
                </div>
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-mail h-4 w-4 text-muted-foreground" aria-hidden="true">
                        <path d="m22 7-8.991 5.727a2 2 0 0 1-2.009 0L2 7"></path>
                        <rect x="2" y="4" width="20" height="16" rx="2"></rect>
                    </svg>
                    <span id="modal-email" class="text-sm text-muted-foreground">john.smith@email.com</span>
                </div>
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-phone h-4 w-4 text-muted-foreground" aria-hidden="true">
                        <path
                            d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384">
                        </path>
                    </svg>
                    <span id="modal-no_hp" class="text-sm text-muted-foreground">(555) 123-4567</span>
                </div>
            </div>
        </div>

        <div>
            <label class="flex items-center gap-2 font-medium text-sm">Dikirim</label>
            <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-calendar h-4 w-4 text-muted-foreground" aria-hidden="true">
                    <path d="M8 2v4"></path>
                    <path d="M16 2v4"></path>
                    <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                    <path d="M3 10h18"></path>
                </svg>
                <p id="modal-buat" class="text-sm text-muted-foreground">Dec 10, 2024, 09:30 AM</p>
            </div>


        </div>

        <div>
            <label class="flex items-center gap-2 font-medium text-sm">Pembaruan Terakhir</label>
            <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-clock h-4 w-4 text-muted-foreground" aria-hidden="true">
                    <path d="M12 6v6l4 2"></path>
                    <circle cx="12" cy="12" r="10"></circle>
                </svg>
                <p id="modal-tanggal" class="text-sm text-muted-foreground">Dec 10, 2024, 09:30 AM</p>
            </div>
        </div>

        <hr>

        <div>
            <div class="flex items-center gap-2 mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-camera h-4 w-4 text-muted-foreground" aria-hidden="true">
                    <path
                        d="M13.997 4a2 2 0 0 1 1.76 1.05l.486.9A2 2 0 0 0 18.003 7H20a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h1.997a2 2 0 0 0 1.759-1.048l.489-.904A2 2 0 0 1 10.004 4z">
                    </path>
                    <circle cx="12" cy="13" r="3"></circle>
                </svg>
                <label data-slot="label" class="flex items-center gap-2 font-medium text-sm">Bukti Foto</label>
            </div>
            <div class="grid grid-cols-2 gap-2">
                <img id="modal-foto" src="" alt="Report image" class="w-full h-auto object-cover rounded-md border">

            </div>
        </div>

        <div>
            <div class="flex items-center gap-2 mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-map-pin h-4 w-4 text-muted-foreground mt-0.5" aria-hidden="true">
                    <path
                        d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0">
                    </path>
                    <circle cx="12" cy="10" r="3"></circle>
                </svg>
                <label data-slot="label" class="flex items-center gap-2 font-medium text-sm">Lokasi</label>
            </div>

            <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-200 space-y-3">

                <div id="map" class="min-w-lg  h-72 rounded-xl overflow-hidden shadow-sm"></div>

                <p class="text-gray-500  text-sm">
                    Koordinat:
                    <span class="font-medium text-gray-700" id="modal-latitude"></span>
                    <span class="font-medium text-gray-700">,</span>
                    <span class="font-medium text-gray-700" id="modal-longitude"></span>
                </p>
            </div>


            <script>
                const latitude = document.getElementById('modal-latitude').innerText;
                const longitude = document.getElementById('modal-longitude').innerText;


                const map = L.map('map').setView([latitude, longitude], 15);

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '© OpenStreetMap'
                }).addTo(map);

                const marker = L.marker([latitude, longitude]).addTo(map);
            </script>
        </div>
    </div>
</div>
</div>