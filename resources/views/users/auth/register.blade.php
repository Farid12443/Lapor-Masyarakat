<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>

    {{-- tailwind css --}}
    @vite('resources/css/app.css')
</head>

<body class="bg-[#F3F3F3]">

    <section class="flex items-center justify-center min-h-screen px-6 py-12">
        <div class="w-full max-w-md bg-white shadow-lg rounded-2xl p-8">

            <h1 class="text-3xl font-semibold text-center text-[#6477DB]">Buat Akun</h1>
            <p class="text-center text-gray-500 mt-2">Masukkan data Anda untuk melanjutkan</p>

            <form class="mt-8 space-y-4" action="/register" method="POST">
                @csrf
                @method('POST')
                <div class="relative">
                    <label class="block mb-1 text-sm font-semibold text-gray-700">Nama</label>
                    <div
                        class="flex items-center p-3 border rounded-xl text-sm focus:border-[#6477DB] focus:ring-[#6477DB]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5 text-gray-400 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>
                        <input type="text" name="name" class="w-full focus:outline-none" value="{{ old('name') }}"
                            placeholder="Masukkan nama lengkap Anda" required />
                    </div>
                    @error('name')
                        <div class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="relative">
                    <label class="block mb-1 text-sm font-semibold text-gray-700">Email</label>
                    <div
                        class="flex items-center p-3 border rounded-xl text-sm focus:border-[#6477DB] focus:ring-[#6477DB]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5 text-gray-400 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                        </svg>
                        <input type="email" name="email" class="w-full focus:outline-none" value="{{ old('email') }}"
                            placeholder="email@domain.com" required />
                    </div>
                    @error('email')
                        <div class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="relative">
                    <label class="block mb-1 text-sm font-semibold text-gray-700">Alamat</label>
                    <div
                        class="flex items-center p-3 border rounded-xl text-sm focus:border-[#6477DB] focus:ring-[#6477DB]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5 text-gray-400 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25s-7.5-4.108-7.5-11.25a7.5 7.5 0 1115 0z" />
                        </svg>
                        <input type="text" name="alamat" value="{{ old('alamat') }}" class="w-full focus:outline-none"
                            placeholder="Jl. Contoh No. 123, Kota" required />
                    </div>
                    @error('alamat')
                        <div class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="relative">
                    <label class="block mb-1 text-sm font-semibold text-gray-700">Nomor HP</label>
                    <div
                        class="flex items-center p-3 border rounded-xl text-sm focus:border-[#6477DB] focus:ring-[#6477DB]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5 text-gray-400 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                        </svg>
                        <input type="tel" name="nomor_hp" value="{{ old('nomor_hp') }}"
                            class="w-full focus:outline-none" placeholder="081234567890" required />
                    </div>
                    @error('nomor_hp')
                        <div class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="relative">
                    <label class="block mb-1 text-sm font-semibold text-gray-700">Password</label>
                    <div
                        class="flex items-center p-3 border rounded-xl text-sm focus:border-[#6477DB] focus:ring-[#6477DB]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5 text-gray-400 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />
                        </svg>
                        <input type="password" id="password" name="password" class="w-full focus:outline-none"
                            placeholder="Minimal 8 karakter" required />
                        <button type="button" onclick="togglePassword('password')"
                            class="ml-2 text-gray-400 hover:text-gray-600" aria-label="Toggle password visibility">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-5" id="eye-password">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </button>
                    </div>
                    @error('password')
                        <div class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="relative">
                    <label class="block mb-1 text-sm font-semibold text-gray-700">Konfirmasi Password</label>
                    <div
                        class="flex items-center p-3 border rounded-xl text-sm focus:border-[#6477DB] focus:ring-[#6477DB]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5 text-gray-400 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />
                        </svg>
                        <input type="password" id="confirm-password" name="password_confirmation"
                            class="w-full focus:outline-none" placeholder="Ulangi password Anda" required />
                        <button type="button" onclick="togglePassword('confirm-password')"
                            class="ml-2 text-gray-400 hover:text-gray-600"
                            aria-label="Toggle confirm password visibility">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-5" id="eye-confirm-password">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                            </svg>
                        </button>
                    </div>
                    @error('password_confirmation')
                        <div class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full py-3 mt-2 text-white bg-[#6477DB] font-medium rounded-xl hover:bg-[#5062bb] transition">
                    Buat Akun
                </button>

                <p class="text-sm text-center text-gray-600 mt-4">
                    Sudah punya akun?
                    <a href="/login" class="text-[#6477DB] font-semibold hover:underline">Login</a>
                </p>
            </form>
        </div>
    </section>

    <script>
        function togglePassword(inputId) {
            const input = document.getElementById(inputId);
            const eyeIcon = document.getElementById('eye-' + inputId);
            if (input.type === 'password') {
                input.type = 'text';
                eyeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />'; // Eye-off icon
            } else {
                input.type = 'password';
                eyeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />'; // Eye icon
            }
        }
    </script>

</body>

</html>