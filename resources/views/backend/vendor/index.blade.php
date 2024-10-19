@extends('layouts.admin')

@section('content')
    <div class="flex justify-between mt-3">
        @include('components.breadcrumb', [
            'active' => 'Vendor',
        ])
    </div>

    <div class="mt-5 bg-white shadow-md rounded-md overflow-hidden">
        <div class="relative">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400" id="dataTable">
                <thead class="text-xs text-teal-700 uppercase border-b border-t dark:text-teal-400">
                    <tr>
                        <th scope="col" class="px-6 py-5">
                            No
                        </th>
                        <th scope="col" class="px-6 py-5">
                            Nama Vendor
                        </th>
                        <th scope="col" class="px-6 py-5">
                            Kategori Service
                        </th>
                        <th scope="col" class="px-6 py-5">
                            Bergabung Pada
                        </th>
                        <th scope="col" class="px-6 py-5">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-5">
                            1
                        </td>
                        <td class="px-6 py-5">
                            Smarista Smart Festival x FestaFest
                        </td>
                        <td class="px-6 py-5">
                            Full Service
                        </td>
                        <td class="px-6 py-5">
                            3 Januari 2022
                        </td>
                        <td class="px-6 py-5">
                            <button class="w-[30px] py-1" data-dropdown-toggle="dropdown">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>
                            <div id="dropdown"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-32 dark:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdownDefaultButton">
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            Detail
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            Edit
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            Hapus
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-5">
                            2
                        </td>
                        <td class="px-6 py-5">
                            Culinary Carnival 2022
                        </td>
                        <td class="px-6 py-5">
                            Full Service
                        </td>
                        <td class="px-6 py-5">
                            10 Februari 2022
                        </td>
                        <td class="px-6 py-5">
                            <button class="w-[30px] py-1" data-dropdown-toggle="dropdown-2">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>
                            <div id="dropdown-2"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-32 dark:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdownDefaultButton">
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            Detail
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            Edit
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            Hapus
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>

                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-5">
                            3
                        </td>
                        <td class="px-6 py-5">
                            Festive Music Fiesta
                        </td>
                        <td class="px-6 py-5">
                            Semi Full Service
                        </td>
                        <td class="px-6 py-5">
                            24 Maret 2022
                        </td>
                        <td class="px-6 py-5">
                            <button class="w-[30px] py-1" data-dropdown-toggle="dropdown-3">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>
                            <div id="dropdown-3"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-32 dark:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdownDefaultButton">
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            Detail
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            Edit
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            Hapus
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
@endsection
