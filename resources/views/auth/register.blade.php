@extends('layouts.auth')

@section('content')
    <main class="shadow-md w-[70%] grid grid-cols-2 rounded-md overflow-hidden">
        <div class="bg-gradient-to-r from-teal-600 to-teal-700 h-[80vh] flex flex-col justify-center items-center relative">
            <h1 class="text-3xl poppins-black text-white">S-TIX</h1>
            <p class="text-center mt-2 text-white leading-[20px]">
                Temukan Event Favorit, Kelola Tiket dengan Mudah, Nikmati Pengalaman Tanpa Hambatan
            </p>
            <div class="absolute bottom-5">
                <span class="text-sm text-white">S-TIX 1.0.0</span>
            </div>
        </div>
        <div class="bg-white h-[80vh] flex flex-col justify-center items-center">
            <h1 class="text-3xl poppins-bold text-teal-700">REGISTER</h1>
            <form action="{{ route('register.post') }}" method="POST" class="w-[80%] mt-8">
                @csrf
                <div class="mb-5">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                    <div class="flex">
                        <span
                            class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                            <i class="fa-solid fa-user"></i>
                        </span>
                        <input type="text" id="name" name="name"
                            class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-teal-500 focus:border-teal-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                            placeholder="John Doe">
                    </div>
                </div>
                <div class="mb-5">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <div class="flex">
                        <span
                            class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                            <i class="fa-solid fa-user"></i>
                        </span>
                        <input type="email" id="email" name="email"
                            class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-teal-500 focus:border-teal-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                            placeholder="emailanda@example.com">
                    </div>
                </div>
                <div class="mb-5">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kata
                        Sandi</label>
                    <div class="flex">
                        <span
                            class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                            <i class="fa-solid fa-lock"></i>
                        </span>
                        <input type="password" id="password" name="password"
                            class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-teal-500 focus:border-teal-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                            placeholder="*********">
                    </div>
                </div>
                <div class="mb-5">
                    <label for="password_confirmation"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konfirmasi
                        Kata
                        Sandi</label>
                    <div class="flex">
                        <span
                            class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                            <i class="fa-solid fa-lock"></i>
                        </span>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-teal-500 focus:border-teal-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                            placeholder="*********">
                    </div>
                </div>
                <div class="mb-6 mt-8 flex justify-center">
                    <button type="submit"
                        class="text-white bg-teal-700 hover:bg-teal-800 focus:outline-none focus:ring-4 focus:ring-teal-300 font-medium rounded-full text-sm px-5 py-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800 w-[70%]">Register</button>
                </div>
                <div class="flex justify-center gap-1 text-sm">
                    <span>Sudah punya akun?</span>
                    <a href="{{ route('login') }}" class="text-teal-700 hover:underline poppins-medium">Masuk</a>
                </div>
            </form>
        </div>
    </main>
@endsection
