@props(['recentReports'])

<div class="col-span-5 flex flex-col gap-6 rounded-xl border">
    <div class="grid items-start gap-1.5 px-6 pt-6 ">
        <div class="flex items-center justify-between">
            <h4 data-slot="card-title" class="leading-none flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-activity h-5 w-5" aria-hidden="true">
                    <path d="M22 12h-2.48a2 2 0 0 0-1.93 1.46l-2.35 8.36a.25.25 0 0 1-.48 0
                           L9.24 2.18a.25.25 0 0 0-.48 0l-2.35 8.36A2 2 0 0 1 4.49 12H2" />
                </svg>
                Recent Reports
            </h4>

            <a href="/admin/reports"
                class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium border h-8 rounded-md gap-1.5 px-3 hover:bg-[#F3F4F7] transition-colors cursor-pointer">
                View All
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-arrow-right h-4 w-4 ml-2" aria-hidden="true">
                    <path d="M5 12h14" />
                    <path d="m12 5 7 7-7 7" />
                </svg>
            </a>
        </div>
    </div>

    <div class="p-6 ">
        <div class="space-y-4">

            {{-- item --}}
            @forelse ($recentReports as $item)
                <div onclick="openModalShow(this)" data-judul="{{ $item->judul }}"
                    data-kategori="{{ $item->kategori->nama_kategori }}" data-deskripsi="{{ $item->deskripsi_laporan }}"
                    data-nama="{{ $item->user->nama }}" data-email="{{ $item->user->email }}" data-id="{{ $item->id }}"
                    data-buat="{{ $item->created_at->translatedFormat('M d, h:i A') }}"
                    data-tanggal="{{ $item->updated_at->translatedFormat('M d, h:i A') }}"
                    data-no_hp="{{ $item->user->no_hp }}" data-foto="{{ $item->foto_laporan }}"
                    data-latitude="{{ $item->latitude }}" data-longitude="{{ $item->longitude }}"
                    data-status="{{ $item->status }}"
                    class="flex items-start gap-3 p-3 rounded-lg border bg-white hover:bg-[#F3F4F7] transition-colors cursor-pointer">

                    @switch($item->status)
                        @case('menunggu')
                            <div class="w-2 h-2 rounded-full mt-2 bg-orange-500"></div>
                        @break

                        @case('diproses')
                            <div class="w-2 h-2 rounded-full mt-2 bg-blue-500"></div>
                        @break

                        @case('selesai')
                            
                            <div class="w-2 h-2 rounded-full mt-2 bg-green-500"></div>
                        @break

                        @default
                        <div class="w-2 h-2 rounded-full mt-2 bg-gray-500"></div>
                    @endswitch
                  

                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-2">
                            <p class="font-medium">
                                {{ $item->judul }}
                            </p>
                            <span class="text-xs">
                                {{ $item->kategori->nama_kategori }}
                            </span>
                        </div>

                        <p class="lokasi-text text-sm text-muted-foreground truncate mb-1">
                            Memuat lokasi...
                        </p>

                        <script>
                            document.addEventListener('DOMContentLoaded', function () {

                                document.querySelectorAll('[data-latitude]').forEach(card => {

                                    const latitude = card.dataset.latitude;
                                    const longitude = card.dataset.longitude;
                                    const lokasiEl = card.querySelector('.lokasi-text');

                                    if (!latitude || !longitude || !lokasiEl) return;

                                    fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${latitude}&lon=${longitude}`)
                                        .then(res => res.json())
                                        .then(data => {
                                            const a = data.address || {};

                                            const dusun = a.hamlet;
                                            const desa = a.village || a.road;
                                            const kelurahan = a.suburb || a.neighbourhood;

                                            const lokasi = [dusun, desa, kelurahan]
                                                .filter(Boolean)
                                                .join(', ');

                                            lokasiEl.innerText = lokasi || 'Lokasi tidak tersedia';
                                        })
                                        .catch(() => {
                                            lokasiEl.innerText = 'Lokasi tidak tersedia';
                                        });

                                });

                            });
                        </script>

                        <div class="flex flex-row items-center gap-2 text-xs">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="lucide lucide-calendar h-3 w-3" aria-hidden="true">
                                <path d="M8 2v4" />
                                <path d="M16 2v4" />
                                <rect width="18" height="18" x="3" y="4" rx="2" />
                                <path d="M3 10h18" />
                            </svg>

                            <span>{{ $item->updated_at->translatedFormat('M d, h:i A') }}</span>
                            <span>•</span>

                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="lucide lucide-users h-3 w-3" aria-hidden="true">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                <path d="M16 3.128a4 4 0 0 1 0 7.744" />
                                <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                                <circle cx="9" cy="7" r="4" />
                            </svg>

                            <span>{{ $item->user->nama }}</span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="flex items-center justify-center gap-3 p-3 rounded-lg bg-white">
                    <span>
                        Belum ada laporan masuk
                    </span>
                </div>
            @endforelse
        </div>
    </div>
</div>