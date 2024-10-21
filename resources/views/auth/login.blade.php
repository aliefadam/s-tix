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
            <h1 class="text-3xl poppins-bold text-teal-700">LOGIN</h1>
            <form action="" method="POST" class="w-[80%] mt-8">
                @csrf
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
                <div class="mb-5 flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="default-checkbox" type="checkbox" value=""
                            class="w-4 h-4 text-teal-600 bg-gray-100 border-gray-300 rounded focus:ring-teal-500 dark:focus:ring-teal-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            Ingat Saya
                        </label>
                    </div>
                    <div class="">
                        <a href="{{ route('forgot-password') }}"
                            class="text-sm font-medium hover:text-teal-700 hover:underline">
                            Lupa Kata Sandi?
                        </a>
                    </div>
                </div>
                <div class="mb-5 mt-6 flex justify-center">
                    <button type="submit"
                        class="text-white bg-teal-700 hover:bg-teal-800 focus:outline-none focus:ring-4 focus:ring-teal-300 font-medium rounded-full text-sm px-5 py-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800 w-[80%]">Login</button>
                </div>
                <div class="flex items-center gap-3 mb-5">
                    <hr class="flex-[1]">
                    <span class="text-xs">Atau login dengan</span>
                    <hr class="flex-[1]">
                </div>
                <div class="mb-5 flex justify-center">
                    <a href="{{ route('login.google') }}"
                        class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 w-[80%] flex items-center justify-center gap-2 ">
                        <img src="{{ asset('imgs/google.png') }}" class="w-[15px]" alt="">
                        Google
                    </a>
                </div>
                <div class="flex justify-center gap-1 text-sm">
                    <span>Belum punya akun?</span>
                    <a href="{{ route('register') }}" class="text-teal-700 hover:underline poppins-medium">Daftar</a>
                </div>
            </form>
        </div>
    </main>
@endsection
