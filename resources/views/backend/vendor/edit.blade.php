@extends('layouts.admin')

@section('content')
    <div class="mt-3">
        @include('components.breadcrumb', [
            'before' => [
                [
                    'url' => route('admin.vendor.index'),
                    'name' => 'Vendor',
                ],
            ],
            'active' => 'Edit Vendor',
        ])
    </div>

    <div class="mt-5 p-5 bg-white shadow-md rounded-md overflow-hidden w-1/2">
        <h1 class="text-xl poppins-medium text-teal-700">Edit Vendor</h1>
        <form action="{{ route('admin.vendor.update', $vendor->user->id) }}" method="POST" class="mt-5">
            @csrf
            @method('PUT')
            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                    Vendor</label>
                <input type="text" id="name" name="name" value="{{ $vendor->user->name }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500" />
            </div>
            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email
                    Vendor</label>
                <input type="email" id="email" name="email" value="{{ $vendor->user->email }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500" />
            </div>
            <div class="flex flex-col gap-1 mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori
                    Service</label>
                <div class="grid grid-cols-2 gap-2">
                    <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                        <input @checked($vendor->category == 'Semi Full Service') id="category-1" type="radio" value="Semi Full Service"
                            name="category"
                            class="w-4 h-4 text-teal-600 bg-gray-100 border-gray-300 focus:ring-teal-500 dark:focus:ring-teal-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="category-1"
                            class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            Semi Full Service
                        </label>
                    </div>
                    <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                        <input @checked($vendor->category == 'Full Service') id="category-2" type="radio" value="Full Service"
                            name="category"
                            class="w-4 h-4 text-teal-600 bg-gray-100 border-gray-300 focus:ring-teal-500 dark:focus:ring-teal-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="category-2"
                            class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            Full Service
                        </label>
                    </div>
                </div>
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
