@props(['inProgresThisMonth', 'inProgresPercent'])

<div class="col-span-2 bg-white rounded-xl shadow flex flex-col gap-4 p-6 rounded-xl border">
    <div class="flex flex-row items-center justify-between">
        <h4 class="text-sm font-medium">In Progress</h4>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-trending-up h-4 w-4 text-blue-600" aria-hidden="true">
            <path d="M16 7h6v6"></path>
            <path d="m22 7-8.5 8.5-5-5L2 17"></path>
        </svg>
    </div>
    <div class="flex flex-col gap-1.5">
        <span class="text-2xl font-bold">{{ $inProgresThisMonth }}</span>
        <div>
            <div class="flex items-center text-xs text-red-600">
                @if ($inProgresPercent >= 0)
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
                            {{ $inProgresPercent >= 0 ? 'text-green-600' : 'text-red-600' }}">

                    {{ $inProgresPercent >= 0 ? '+' : '' }}{{ $inProgresPercent }}% from last month</span>
            </div>
            <p class="text-xs text-muted-foreground mt-1">Successfully completed</p>
        </div>
    </div>
</div>