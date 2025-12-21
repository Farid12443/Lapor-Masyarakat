<x-admin-layout>
    <x-slot:judul>
        Dashboard Overview
    </x-slot:judul>
    <x-slot:subjudul>
        Welcome back! Here's what's happening with civic reports today.
    </x-slot:subjudul>
    {{-- card --}}
    <div class="grid grid-cols-8 gap-6">
        <x-dashboard.totalReports :totalReports="$totalReports" :totalPercent="$totalPercent" />

        <x-dashboard.pending :pendingThisMonth="$pendingThisMonth" :pendingPercent="$pendingPercent" />

        <x-dashboard.inProgres :inProgresThisMonth="$inProgresThisMonth" :inProgresPercent="$inProgresPercent" />

        <x-dashboard.resolved :resolvedThisMonth="$resolvedThisMonth" :resolvedPercent="$resolvedPercent" />

        <x-dashboard.recentReports :recentReports="$recentReports" />

        <x-dashboard.avg :avgResolutionDays="$avgResolutionDays" />

        <x-dashboard.detaiLaporanModal />
    </div>

    <script src="{{ asset('js/dashboard.js') }}"></script>

</x-admin-layout>