<div>
    {{-- modal foto profil --}}
    <div id="editModalProfil" class="fixed inset-0 bg-black/50 items-center justify-center hidden z-50">
        <div class="bg-white rounded-lg shadow-lg p-6 w-11/12 max-w-md">

            <h2 class="text-xl font-semibold mb-4 text-gray-800">Ubah Foto Profil</h2>
            <form id="uploadForm" action="/profil" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Pilih Gambar</label>
                    <input type="file" id="fileInput" name="foto" accept="image/*"
                        class="border border-gray-300 rounded-lg p-2 w-full mb-2 focus:ring-2 focus:ring-blue-500">
                    <p class="text-xs text-gray-500">Pilih dari galeri atau ambil foto baru dari kamera.</p>
                </div>
            </form>

            <div class="flex justify-end gap-3">
                <button onclick="closeEditModal()"
                    class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">Batal
                </button>

                <button type="submit" form="uploadForm"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Simpan
                </button>
            </div>
        </div>
    </div>

    {{-- modal Password --}}
    <div id="editModalPassword" class="fixed inset-0 bg-black/50 items-center justify-center hidden z-50">
        <div class="bg-white rounded-lg shadow-lg p-6 w-11/12 max-w-md">

            <h2 class="text-xl font-semibold mb-4 text-gray-800">Ubah Password</h2>
            <form action="/profil/password" method="POST">
                @csrf
                @method('PUT')

                <div class="flex flex-col gap-4">
                    <div class="relative">
                        <label class="block mb-1 text-sm font-semibold text-gray-700">Password Lama</label>
                        <div
                            class="flex items-center p-3 border rounded-xl text-sm focus:border-[#6477DB] focus:ring-[#6477DB]">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-5 text-gray-400 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />
                            </svg>
                            <input type="password" id="password" name="password_lama" class="w-full focus:outline-none"
                                placeholder="Masukan password lama" required />

                            <button type="button" onclick="togglePassword('password')"
                                class="ml-2 text-gray-400 hover:text-gray-600" aria-label="Toggle password visibility">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-5" id="eye-password">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </button>
                        </div>
                        @error('password_lama', 'password')
                            <div class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                        @if ($errors->password->any())
                            <script>
                                document.getElementById('editModalPassword').classList.remove('hidden');
                                document.getElementById('editModalPassword').classList.add('flex');
                            </script>
                        @endif

                    </div>

                    <div class="relative">
                        <label class="block mb-1 text-sm font-semibold text-gray-700">Password Baru</label>
                        <div
                            class="flex items-center p-3 border rounded-xl text-sm focus:border-[#6477DB] focus:ring-[#6477DB]">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-5 text-gray-400 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />
                            </svg>
                            <input type="password" id="confirm-password" name="password_baru"
                                class="w-full focus:outline-none" placeholder="Masukan password baru" required />

                            <button type="button" onclick="togglePassword('confirm-password')"
                                class="ml-2 text-gray-400 hover:text-gray-600"
                                aria-label="Toggle confirm password visibility">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-5" id="eye-confirm-password">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </button>
                        </div>
                        @error('password_baru', 'password')
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
                            <input type="password" id="confirm-password-new" name="password_baru_confirmation"
                                class="w-full focus:outline-none" placeholder="Konfirmasi password baru" required />

                            <button type="button" onclick="togglePassword('confirm-password-new')"
                                class="ml-2 text-gray-400 hover:text-gray-600"
                                aria-label="Toggle confirm password visibility">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-5"
                                    id="eye-confirm-password-new">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </button>
                        </div>
                        @error('password_baru_confirmation', 'password')
                            <div class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="flex justify-end gap-3 mt-4">
                    <button onclick="closeEditModalPassword()"
                        class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">Batal</button>

                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Modal Ubah Email --}}
    <div id="editModalEmail" class="fixed inset-0 bg-black/50 items-center justify-center hidden z-50">
        <div class="bg-white rounded-lg shadow-lg p-6 w-11/12 max-w-md">

            <h2 class="text-xl font-semibold mb-4 text-gray-800">Ubah Email</h2>

            <form action="/profil/email" method="POST">
                @csrf
                @method('PUT')

                <div class="flex flex-col gap-4">

                    {{-- Email Baru --}}
                    <div class="relative">
                        <label class="block mb-1 text-sm font-semibold text-gray-700">Email Baru</label>
                        <div class="flex items-center p-3 border rounded-xl text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-5 text-gray-400 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                            </svg>

                            <input type="email" name="email_baru" class="w-full focus:outline-none"
                                placeholder="Masukkan email baru" required />
                        </div>

                        @error('email_baru', 'email')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror

                        {{-- Buka otomatis kalau ada error --}}
                        @if ($errors->email->any())
                            <script>
                                document.getElementById('editModalEmail').classList.remove('hidden');
                                document.getElementById('editModalEmail').classList.add('flex');
                            </script>
                        @endif
                    </div>

                    {{-- pssword konfirmasi --}}
                    <div class="relative">
                        <label class="block mb-1 text-sm font-semibold text-gray-700">Password</label>
                        <div class="flex items-center p-3 border rounded-xl text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-5 text-gray-400 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />
                            </svg>

                            <input type="password" id="password-confirm-email" name="password"
                                class="w-full focus:outline-none" placeholder="Masukkan password akun" required />

                            <button type="button" onclick="togglePassword('password-confirm-email')"
                                class="ml-2 text-gray-400 hover:text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-5"
                                    id="eye-password-confirm-email">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </button>
                        </div>

                        @error('password', 'email')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="flex justify-end gap-3 mt-4">
                    <button type="button" onclick="closeEditModalEmail()"
                        class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">Batal</button>

                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        Simpan
                    </button>
                </div>

            </form>
        </div>
    </div>

    {{-- modal logout --}}
    <div id="modalLogout" class="fixed inset-0 bg-black/50 items-center justify-center hidden z-50">
        <div class="bg-white rounded-lg shadow-lg p-6 w-11/12 max-w-md">

            <h2 class="text-xl font-semibold mb-4 text-gray-800">Konfirmasi Logout</h2>

            <p class="text-gray-600 mb-4">
                Apakah kamu yakin ingin logout?
            </p>

            <form action="/profil/logout" method="POST">
                @csrf

                <div class="flex justify-end gap-3 mt-4">
                    <button type="button" onclick="closeModalLogout()"
                        class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">
                        Batal
                    </button>

                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                        Logout
                    </button>
                </div>
            </form>
        </div>
    </div>


</div>

<script src="{{ asset('js/script.js') }}"></script>

