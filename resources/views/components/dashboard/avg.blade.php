@props(['avgResolutionDays'])

<div class="col-span-3 bg-card flex flex-col justify-between gap-6 rounded-xl border">
    <div class="grid items-start gap-1.5 px-6 pt-6 ">
        <div class="flex items-center justify-between">
            <h4 data-slot="card-title" class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-chart-column h-4 w-4 text-purple-600" aria-hidden="true">
                    <path d="M3 3v16a2 2 0 0 0 2 2h16"></path>
                    <path d="M18 17V9"></path>
                    <path d="M13 17V5"></path>
                    <path d="M8 17v-3"></path>
                </svg>
                Avg Resolution Time
            </h4>
        </div>
    </div>

    <div class="px-6 pb-4">
        <div class="flex justify-between">
            <h4 class="flex items-center gap-2 text-base font-medium text-indigo-700">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="h-4 w-4 text-purple-600" aria-hidden="true">
                    <circle cx="12" cy="12" r="10"></circle>
                    <polyline points="12,6 12,12 16,14"></polyline>
                </svg>
                Rata-rata Waktu Penyelesaian
            </h4>
            <p class="text-3xl font-bold text-indigo-900 mb-2"> {{ $avgResolutionDays }} Hari</p>
        </div>
        @php
            $progress = min(100, ($avgResolutionDays / 6) * 100);
        @endphp

        <div class="w-full bg-gray-200 rounded-full h-2">
            <div class="bg-gradient-to-r from-purple-500 to-indigo-500 h-2 rounded-full"
                style="width: {{ $progress }}%;">
            </div>
        </div>

    </div>

    <p class="px-6 pb-6 text-sm text-muted-foreground italic">
        Berdasarkan laporan yang selesai
    </p>

</div>