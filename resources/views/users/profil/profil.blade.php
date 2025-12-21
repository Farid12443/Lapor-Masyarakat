<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>

    {{-- tailwind css --}}
    @vite('resources/css/app.css')

</head>

<body>

    {{-- header profile --}}
    <div class="bg-linear-to-b from-blue-400 to-blue-600 text-white rounded-b-3xl p-6 shadow-lg">
        <div class="flex items-center justify-between">
            <div class="flex flex-row items-center gap-4">
                <a href="/">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                    </svg>
                </a>
                <span class="text-xl font-semibold">Profil Saya</span>
            </div>

            {{-- Edit Profile Button --}}
            <a href="/profil/editprofil"
                class="bg-white/30 text-white px-3 py-3 rounded-2xl text-xs font-semibold shadow hover:bg-white/50 transition">
                Edit Profil
            </a>
        </div>

        {{-- Avatar --}}
        <div class="flex flex-col items-center mt-4">
            <div class="relative flex items-center justify-center">
                <img src="{{ asset('foto_profil_user/' . $data->foto_profil ?? 'default.png') }}" alt="Foto Profil"
                    class="w-25 h-25 rounded-4xl object-cover ring-2 ring-green-500/20">
                <button onclick="openEditModal()"
                    class="absolute -bottom-2 -right-2 bg-blue-600 text-white w-8 h-8 rounded-full shadow-sm hover:bg-blue-700 transition flex items-center justify-center"
                    aria-label="Edit Foto Profil">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                        <path d="M12 9a3.75 3.75 0 1 0 0 7.5A3.75 3.75 0 0 0 12 9Z" />
                        <path fill-rule="evenodd"
                            d="M9.344 3.071a49.52 49.52 0 0 1 5.312 0c.967.052 1.83.585 2.332 1.39l.821 1.317c.24.383.645.643 1.11.71.386.054.77.113 1.152.177 1.432.239 2.429 1.493 2.429 2.909V18a3 3 0 0 1-3 3h-15a3 3 0 0 1-3-3V9.574c0-1.416.997-2.67 2.429-2.909.382-.064.766-.123 1.151-.178a1.56 1.56 0 0 0 1.11-.71l.822-1.315a2.942 2.942 0 0 1 2.332-1.39ZM6.75 12.75a5.25 5.25 0 1 1 10.5 0 5.25 5.25 0 0 1-10.5 0Zm12-1.5a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>

            {{-- Nama --}}
            <h2 class="text-xl font-semibold mt-3">{{ $data->nama ?? 'Nama Pengguna' }}</h2>

            {{-- ID / Email --}}
            <p class="text-sm opacity-90 mt-1">
                {{ $data->email ?? 'email@domain.com' }}
            </p>
        </div>
    </div>

    {{-- grid menu --}}
    <div class="p-6">
        {{-- Riwayat Laporan --}}
        <a href="/laporan/riwayat"
            class="flex items-center justify-between bg-white shadow-md rounded-2xl p-4 mt-6 hover:bg-gray-100 transition-all duration-200">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 flex items-center justify-center rounded-full bg-violet-100 text-violet-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <span class="font-medium text-gray-700">Riwayat Laporan</span>
            </div>
            <span class="text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </span>
        </a>

        {{-- Ubah Password --}}
        <a onclick="openEditModalPassword()"
            class="flex items-center justify-between bg-white shadow-md rounded-2xl p-4 mt-6 hover:bg-gray-100 transition-all duration-200">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 flex items-center justify-center rounded-full bg-blue-100 text-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />
                    </svg>
                </div>
                <span class="font-medium text-gray-700">Ubah Password</span>
            </div>
            <span class="text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </span>
        </a>

        {{-- Ubah Email --}}
        <a onclick="openEditModalEmail()"
            class="flex items-center justify-between bg-white shadow-md rounded-2xl p-4 mt-6 hover:bg-gray-100 transition-all duration-200">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 flex items-center justify-center rounded-full bg-indigo-100 text-indigo-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                    </svg>
                </div>
                <span class="font-medium text-gray-700">Ubah Email</span>
            </div>
            <span class="text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </span>
        </a>

        {{-- Logout --}}
        <a onclick="openLogoutModal()"
            class="flex items-center justify-between bg-white shadow-md rounded-2xl p-4 mt-6 hover:bg-gray-100 transition-all duration-200">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 flex items-center justify-center rounded-full bg-red-100 text-red-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                    </svg>
                </div>
                <span class="font-medium text-red-600">Logout</span>
            </div>
            <span class="text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </span>
        </a>
    </div>

    {{-- modal --}}
    <x-modal />

</body>

</html>