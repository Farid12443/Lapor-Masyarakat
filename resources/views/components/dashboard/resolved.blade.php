@props(['resolvedThisMonth', 'resolvedPercent'])

<div class="col-span-2 bg-white rounded-xl shadow flex flex-col gap-4 p-6 rounded-xl border">
    <div class="flex flex-row items-center justify-between">
        <h4 class="text-sm font-medium">Resolved</h4>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-circle-check-big h-4 w-4 text-green-600" aria-hidden="true">
            <path d="M21.801 10A10 10 0 1 1 17 3.335"></path>
            <path d="m9 11 3 3L22 4"></path>
        </svg>
    </div>
    <div class="flex flex-col gap-1.5">
        <span class="text-2xl font-bold">{{ $resolvedThisMonth }}</span>
        <div>
            <div class="flex items-center text-xs text-red-600">
                @if ($resolvedPercent >= 0)
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
                            {{ $resolvedPercent >= 0 ? 'text-green-600' : 'text-red-600' }}">

                    {{ $resolvedPercent >= 0 ? '+' : '' }}{{ $resolvedPercent }}% from last month</span>
            </div>
            <p class="text-xs text-muted-foreground mt-1">Awaiting assignment</p>
        </div>
    </div>
</div>