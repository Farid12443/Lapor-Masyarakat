<x-admin-layout>
    <x-slot:judul>
        Reports Management
    </x-slot:judul>
    <x-slot:subjudul>
        View, manage, and track all citizen reports
    </x-slot:subjudul>

    <div class="flex flex-col gap-6 rounded-xl border">
        <div class="items-start p-6">
            <div class="flex items-center justify-between">
                <h4 data-slot="card-title" class="leading-none flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-funnel h-5 w-5" aria-hidden="true">
                        <path
                            d="M10 20a1 1 0 0 0 .553.895l2 1A1 1 0 0 0 14 21v-7a2 2 0 0 1 .517-1.341L21.74 4.67A1 1 0 0 0 21 3H3a1 1 0 0 0-.742 1.67l7.225 7.989A2 2 0 0 1 10 14z">
                        </path>
                    </svg>
                    Reports Management
                </h4>
            </div>
        </div>

        <div class="flex items-center justify-between px-6">
            <div class="flex items-center gap-3">
                <div class="relative">
                    <svg class="absolute left-3 top-1/2 -translate-y-1/2 h-4 w-4 text-gray-500"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="2">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.34-4.34"></path>
                    </svg>
                    <input type="text" placeholder="Search reports..."
                        class="py-2 rounded-md border border-gray-300 bg-gray-100 pl-10 pr-3 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-400">
                </div>

                <div
                    class="flex py-2 items-center gap-2 rounded-md border border-gray-300 bg-gray-100 px-3 text-sm text-gray-700">
                    <span>
                        All Statuses
                    </span>
                    <svg class="h-4 w-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path d="m6 9 6 6 6-6"></path>
                    </svg>
                </div>

                <div
                    class="flex py-2 items-center gap-2 rounded-md border border-gray-300 bg-gray-100 px-3 text-sm text-gray-700">
                    <span>
                        All Category
                    </span>
                    <svg class="h-4 w-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path d="m6 9 6 6 6-6"></path>
                    </svg>
                </div>
            </div>

            <div class="flex items-center gap-3">
                <button
                    class="flex py-2 items-center gap-2 rounded-md border border-gray-300 bg-white px-4 text-sm text-gray-700 transition hover:bg-gray-100">
                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"></path>
                        <path d="M21 3v5h-5"></path>
                        <path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"></path>
                        <path d="M8 16H3v5"></path>
                    </svg>
                    Refresh
                </button>

                <button
                    class="flex py-2 items-center gap-2 rounded-md border border-gray-300 bg-white px-4 text-sm text-gray-700 transition hover:bg-gray-100">
                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path d="M12 15V3"></path>
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                        <path d="m7 10 5 5 5-5"></path>
                    </svg>
                    Export
                </button>
            </div>
        </div>
        <div class="px-6 pb-6">
            <div class="overflow-x-auto rounded-md border">
                <table class="w-full text-sm">
                    <!-- HEADER -->
                    <thead class="border-b bg-gray-50">
                        <tr>
                            <th class="px-3 py-2 text-left font-medium text-gray-700">Report</th>
                            <th class="px-3 py-2 text-left font-medium text-gray-700">Category</th>
                            <th class="px-3 py-2 text-left font-medium text-gray-700">Status</th>
                            <th class="px-3 py-2 text-left font-medium text-gray-700">Location</th>
                            <th class="px-3 py-2 text-left font-medium text-gray-700">Submitted By</th>
                            <th class="px-3 py-2 text-left font-medium text-gray-700">Date</th>
                            <th class="px-3 py-2 text-left font-medium text-gray-700">Actions</th>
                        </tr>
                    </thead>

                    <!-- BODY -->
                    <tbody class="divide-y">
                        <tr class="hover:bg-gray-50 transition">
                            <!-- Report -->
                            <td class="px-3 py-2">
                                <p class="font-medium text-gray-900">
                                    Large Pothole on Main Street
                                </p>
                                <p class="text-sm text-gray-500 truncate max-w-xs">
                                    Deep pothole causing damage to vehicles near the intersection...
                                </p>
                            </td>

                            <!-- Category -->
                            <td class="px-3 py-2">
                                <span
                                    class="inline-flex items-center rounded-md border px-2 py-0.5 text-xs font-medium text-gray-700">
                                    Pothole
                                </span>
                            </td>

                            <!-- Status -->
                            <td class="px-3 py-2">
                                <span
                                    class="inline-flex items-center rounded-md bg-yellow-100 px-2 py-0.5 text-xs font-medium text-yellow-800">
                                    Pending
                                </span>
                            </td>

                            <!-- Location -->
                            <td class="px-3 py-2">
                                <div class="flex items-center gap-1 text-sm text-gray-700">
                                    <svg class="h-3 w-3 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path
                                            d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0" />
                                        <circle cx="12" cy="10" r="3" />
                                    </svg>
                                    123 Main Street, Downtown
                                </div>
                            </td>

                            <!-- Submitted By -->
                            <td class="px-3 py-2">
                                <div class="flex items-center gap-1 text-sm text-gray-700">
                                    <svg class="h-3 w-3 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <circle cx="12" cy="7" r="4" />
                                        <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                                    </svg>
                                    John Smith
                                </div>
                            </td>

                            <!-- Date -->
                            <td class="px-3 py-2">
                                <div class="flex items-center gap-1 text-sm text-gray-700">
                                    <svg class="h-3 w-3 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <rect x="3" y="4" width="18" height="18" rx="2" />
                                        <path d="M8 2v4M16 2v4M3 10h18" />
                                    </svg>
                                    Dec 10, 2024
                                </div>
                            </td>

                            <!-- Actions -->
                            <td class="px-3 py-2">
                                <button
                                    class="flex h-8 w-8 items-center justify-center rounded-md hover:bg-gray-200 transition">
                                    <svg class="h-4 w-4 text-gray-600" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path
                                            d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0" />
                                        <circle cx="12" cy="12" r="3" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</x-admin-layout>