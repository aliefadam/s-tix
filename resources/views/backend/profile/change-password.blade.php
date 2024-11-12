@extends('layouts.admin')

@section('content')
    <div class="flex justify-between mt-3">
        @include('components.breadcrumb', [
            'active' => 'Ganti Password',
        ])
    </div>

    <div class="mt-5 p-5 bg-white shadow-md rounded-md overflow-hidden w-1/2">
        <h1 class="text-xl poppins-medium text-teal-700">Ganti Password</h1>
        <form action="{{ route('admin.changePasswordPost') }}" method="POST" class="mt-5">
            @csrf
            <div class="mb-5">
                <label for="old_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kata Sandi
                    Lama</label>
                <input type="password" id="old_password" name="old_password"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500" />
            </div>
            <div class="mb-5">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kata Sandi
                    Baru</label>
                <input type="password" id="password" name="password"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500" />
            </div>
            <div class="mb-5">
                <label for="password_confirmation"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konfirmasi Kata
                    Sandi
                    Baru</label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500" />
            </div>
            <div class="flex justify-end">
                <button type="submit"
                    class="text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-teal-600 dark:hover:bg-teal-700 focus:outline-none dark:focus:ring-teal-800">
                    Simpan
                </button>
            </div>
        </form>
    </div>
@endsection
