<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>

    {{-- tailwind css --}}
    @vite('resources/css/app.css')

<body class="bg-[#F3F3F3]">

    <section class="flex items-center justify-center min-h-screen px-6 py-12">
        <div class="w-full flex flex-col max-w-md bg-white shadow-lg rounded-2xl p-8">

            <h1 class="text-3xl font-semibold text-center text-[#6477DB]">
                Login Admin
            </h1>
            <p class="text-center text-gray-500 mt-2">Masukkan username dan password Anda</p>
            <div class="mx-auto pt-4">
                @if ($errors->has('login'))
                    <div class="text-red-500 text-sm">
                        {{ $errors->first('login') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="text-green-500 text-sm">
                        {{ session('success') }}
                    </div>
                @endif
            </div>

            <form class="mt-8 space-y-4" action="{{ route('admin.login') }}" method="POST">
                @csrf

                <div>
                    <label class="block mb-1 text-sm font-semibold text-gray-700">Username</label>
                    <input type="text" name="username"
                        class="w-full p-3 border rounded-xl text-sm focus:border-[#6477DB] focus:ring-[#6477DB]"
                        placeholder="username" required value="{{ old('username') }}" />
                </div>

                <div>
                    <label class="block mb-1 text-sm font-semibold text-gray-700">Password</label>
                    <input type="password" name="password"
                        class="w-full p-3 border rounded-xl text-sm focus:border-[#6477DB] focus:ring-[#6477DB]"
                        placeholder="••••••••" required />
                </div>

                <button type="submit"
                    class="w-full py-3 mt-2 text-white bg-[#6477DB] font-medium rounded-xl hover:bg-[#5062bb] transition">
                    Login
                </button>
            </form>

        </div>
    </section>

</body>

</html>