@props(['totalReports', 'totalPercent'])

<div class="col-span-2 bg-white rounded-xl shadow flex flex-col gap-4 p-6 rounded-xl border">
    <div class="flex flex-row items-center justify-between">
        <h4 class="text-sm font-medium">Total Reports</h4>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-file-text h-4 w-4 text-blue-600" aria-hidden="true">
            <path
                d="M6 22a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h8a2.4 2.4 0 0 1 1.704.706l3.588 3.588A2.4 2.4 0 0 1 20 8v12a2 2 0 0 1-2 2z">
            </path>
            <path d="M14 2v5a1 1 0 0 0 1 1h5"></path>
            <path d="M10 9H8"></path>
            <path d="M16 13H8"></path>
            <path d="M16 17H8"></path>
        </svg>
    </div>
    <div class="flex flex-col gap-1.5">
        <span class="text-2xl font-bold">{{ $totalReports }}</span>
        <div>
            <div class="flex items-center text-xs text-red-600">
                @if ($totalPercent >= 0)
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-trending-up h-4 w-4 text-green-600" aria-hidden="true">
                        <path d="M16 7h6v6"></path>
                        <path d="m22 7-8.5 8.5-5-5L2 17"></path>
                    </svg>
                @else
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-trending-down h-4 w-4 text-red-600" aria-hidden="true">
                        <path d="M16 17h6v-6"></path>
                        <path d="m22 17-8.5-8.5-5 5L2 7"></path>
                    </svg>
                @endif
                <span class="ml-1
                            {{ $totalPercent >= 0 ? 'text-green-600' : 'text-red-600' }}">

                    {{ $totalPercent >= 0 ? '+' : '' }}{{ $totalPercent }}% from last month</span>
            </div>
            <p class="text-xs text-muted-foreground mt-1">All time submissions</p>
        </div>
    </div>
</div>