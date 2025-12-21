<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil</title>

    {{-- tailwind css --}}
    @vite('resources/css/app.css')

</head>

<body class="bg-gray-100">

    {{-- header profile --}}
    <div class="bg-linear-to-b from-blue-400 to-blue-600 text-white rounded-b-3xl p-6 shadow-lg">
        <div class="flex items-center justify-between">
            <div class="flex flex-row items-center gap-4 pt-1.5">
                <a href="/profil">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                    </svg>
                </a>
                <span class="text-xl font-semibold">Edit Profil</span>
            </div>
        </div>

        <div class="flex flex-col items-center mt-4">
            <div class="relative flex items-center justify-center">
                <img src="{{ asset('foto_profil_user/' . $user->foto_profil ?? 'default.png') }}" alt="Foto Profil"
                    class="w-25 h-25 rounded-4xl object-cover ring-2 ring-green-500/20">
                <button onclick="openEditModal()"
                    class="absolute -bottom-2 -right-2 bg-blue-600 text-white w-8 h-8 rounded-full shadow-sm hover:bg-blue-700 transition flex items-center justify-center"
                    aria-label="Edit Foto Profil">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                        <path d="M12 9a3.75 3.75 0 1 0 0 7.5A3.75 3.75 0 0 0 12 9Z" />
                        <path fill-rule="evenodd"
                            d="M9.344 3.071a49.52 49.52 0 0 1 5.312 0c.967.052 1.83.585 2.332 1.39l.821 1.317c.24.383.645.643 1.11.71.386.054.77.113 1.152.177 1.432.239 2.429 1.493 2.429 2.909V18a3 3 0 0 1-3 3h-15a3 3 0 0 1-3-3V9.574c0-1.416.997-2.67 2.429-2.909.382-.064.766-.123 1.151-.178a1.56 1.56 0 0 1.11-.71l.822-1.315a2.942 2.942 0 0 1 2.332-1.39ZM6.75 12.75a5.25 5.25 0 1 1 10.5 0 5.25 5.25 0 0 1-10.5 0Zm12-1.5a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>

            <h2 class="text-xl font-semibold mt-3">{{ $user->nama ?? 'Nama Pengguna' }}</h2>

            <p class="text-sm opacity-90 mt-1">
                {{ $user->email }}
            </p>
        </div>
    </div>

    {{-- form edit --}}
    <div class="p-6">
        <form action="/editprofil" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- nama --}}
            <div class="flex items-center justify-between bg-white shadow-md rounded-2xl p-4 mt-6">
                <div class="flex items-center gap-3 flex-1">
                    <div class="w-10 h-10 flex items-center justify-center rounded-full bg-blue-100 text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <label class="font-medium text-gray-700 text-sm">Nama</label>
                        <input type="text" name="nama" value="{{ $user->nama }}"
                            class="border-0 w-full p-0 mt-1 bg-transparent focus:outline-none">
                    </div>
                </div>
            </div>

            {{-- tanggal_lahir --}}
            <div class="flex items-center justify-between bg-white shadow-md rounded-2xl p-4 mt-6">
                <div class="flex items-center gap-3 flex-1">

                    <div class="w-10 h-10 flex items-center justify-center rounded-full bg-orange-100 text-orange-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5a2.25 2.25 0 0 0 2.25-2.25m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5a2.25 2.25 0 0 1 2.25 2.25v7.5" />
                        </svg>
                    </div>

                    <div class="flex-1">
                        <label class="font-medium text-gray-700 text-sm">Tanggal Lahir</label>

                        <input type="date" name="tanggal_lahir" value="{{ $user->tanggal_lahir }}"
                            class="border-0 w-full p-0 mt-1 bg-transparent focus:outline-none">
                    </div>
                </div>

                <style>
                    input[type="date"]::-webkit-calendar-picker-indicator {
                        display: none;
                        -webkit-appearance: none;
                    }
                </style>
            </div>

            {{-- almat --}}
            <div class="flex items-center justify-between bg-white shadow-md rounded-2xl p-4 mt-6">
                <div class="flex items-center gap-3 flex-1">
                    <div class="w-10 h-10 flex items-center justify-center rounded-full bg-green-100 text-green-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25s-7.5-4.108-7.5-11.25a7.5 7.5 0 1115 0z" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <label class="font-medium text-gray-700 text-sm">Alamat</label>
                        <input type="text" name="alamat" value="{{ $user->alamat }}"
                            class="border-0 w-full p-0 mt-1 bg-transparent focus:outline-none">
                    </div>
                </div>
            </div>

            {{-- no_telp --}}
            <div class="flex items-center justify-between bg-white shadow-md rounded-2xl p-4 mt-6">
                <div class="flex items-center gap-3 flex-1">
                    <div class="w-10 h-10 flex items-center justify-center rounded-full bg-purple-100 text-purple-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <label class="font-medium text-gray-700 text-sm">Nomor Telepon</label>
                        <input type="text" name="no_hp" value="{{ $user->no_hp }}"
                            class="border-0 w-full p-0 mt-1 bg-transparent focus:outline-none">
                    </div>
                </div>
            </div>

            <button
                class="w-full bg-linear-to-b from-blue-400 to-blue-600 text-white py-3 rounded-2xl mt-6 font-semibold shadow-md hover:bg-gray-800 transition">
                Simpan Perubahan
            </button>
        </form>
    </div>

    {{-- modal --}}
    <x-modal />
</body>

</html>