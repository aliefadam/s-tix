@extends('layouts.user')

@section('content')
    @include('components.breadcrumb', [
        'before' => [
            [
                'url' => route('home'),
                'name' => 'Beranda',
            ],
            [
                'url' => route('event', 1),
                'name' => 'Smarista Smart Festival x FestaFest',
            ],
            [
                'url' => route('event.tickets', 1),
                'name' => 'Pilih Tiket',
            ],
        ],
        'active' => 'Data Diri',
    ])

    <div class="mt-8 grid grid-cols-12 gap-8 min-h-[80vh]">
        <div class="col-span-8 h-fit flex flex-col gap-10">
            <div class="border border-teal-700 text-white rounded-md shadow-md overflow-hidden">
                <div class="p-5 bg-gradient-to-r from-teal-400 to-teal-500">
                    <span class="text-center block">Detail Pembeli</span>
                </div>
                <div class="p-5 flex flex-col gap-4">
                    <div class="">
                        <label for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                            required />
                        <span class="text-xs poppins-medium text-teal-700 mt-2 block">Email ini digunakan untuk mengirim
                            E-Ticket</span>
                    </div>
                    <div class="">
                        <label for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                        <input type="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                            required />
                    </div>
                    <div class="">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                            Lahir</label>
                        <div class="grid grid-cols-3 gap-5">
                            <select id="countries"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                                <option selected>Tanggal</option>
                                @for ($i = 1; $i <= 31; $i++)
                                    <option>{{ $i }}</option>
                                @endfor
                            </select>
                            <select id="countries"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                                <option selected>Bulan</option>
                                @for ($i = 1; $i <= 12; $i++)
                                    <option>{{ $i }}</option>
                                @endfor
                            </select>
                            <select id="countries"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                                <option selected>Tahun</option>
                                @for ($i = date('Y'); $i >= date('Y') - 100; $i--)
                                    <option>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                            Kelamin</label>
                        <div class="grid grid-cols-2 gap-5">
                            <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                <input id="bordered-radio-1" type="radio" value="" name="bordered-radio"
                                    class="w-4 h-4 text-teal-600 bg-gray-100 border-gray-300 focus:ring-teal-500 dark:focus:ring-teal-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="bordered-radio-1"
                                    class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Laki-laki</label>
                            </div>
                            <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                <input id="bordered-radio-2" type="radio" value="" name="bordered-radio"
                                    class="w-4 h-4 text-teal-600 bg-gray-100 border-gray-300 focus:ring-teal-500 dark:focus:ring-teal-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="bordered-radio-2"
                                    class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Perempuan</label>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                            Identitas</label>
                        <div class="flex">
                            <label for="search-dropdown"
                                class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Your Email</label>
                            <button id="dropdown-button" data-dropdown-toggle="dropdown"
                                class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600"
                                type="button">Pilih Identitas <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg></button>
                            <div id="dropdown"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                                    <li>
                                        <button type="button"
                                            class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">KTP</button>
                                    </li>
                                    <li>
                                        <button type="button"
                                            class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Passport</button>
                                    </li>
                                    <li>
                                        <button type="button"
                                            class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">SIM</button>
                                    </li>
                                </ul>
                            </div>
                            <div class="relative w-full">
                                <input type="search" id="search-dropdown"
                                    class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-teal-500"
                                    required />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="border border-teal-700 text-white rounded-md shadow-md overflow-hidden">
                <div class="p-5 flex justify-between items-center bg-gradient-to-r from-teal-400 to-teal-500">
                    <span class="text-center block">Detail Pengunjung 1</span>
                    <span class="text-center block">
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="checkbox" value="" class="sr-only peer" checked>
                            <div
                                class="shadow-md relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-teal-300 dark:peer-focus:ring-teal-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:w-5 after:h-5 after:transition-all dark:border-gray-600 peer-checked:bg-teal-600">
                            </div>
                            <span class="ms-3 text-sm font-medium text-white dark:text-gray-300">Samakan denga data
                                pembeli</span>
                        </label>
                    </span>
                </div>
                <div class="p-5 flex flex-col gap-4">
                    <div class="">
                        <label for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                            required />
                        <span class="text-xs poppins-medium text-teal-700 mt-2 block">Email ini digunakan untuk mengirim
                            E-Ticket</span>
                    </div>
                    <div class="">
                        <label for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                        <input type="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                            required />
                    </div>
                    <div class="">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                            Lahir</label>
                        <div class="grid grid-cols-3 gap-5">
                            <select id="countries"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                                <option selected>Tanggal</option>
                                @for ($i = 1; $i <= 31; $i++)
                                    <option>{{ $i }}</option>
                                @endfor
                            </select>
                            <select id="countries"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                                <option selected>Bulan</option>
                                @for ($i = 1; $i <= 12; $i++)
                                    <option>{{ $i }}</option>
                                @endfor
                            </select>
                            <select id="countries"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                                <option selected>Tahun</option>
                                @for ($i = date('Y'); $i >= date('Y') - 100; $i--)
                                    <option>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                            Kelamin</label>
                        <div class="grid grid-cols-2 gap-5">
                            <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                <input id="bordered-radio-1" type="radio" value="" name="bordered-radio"
                                    class="w-4 h-4 text-teal-600 bg-gray-100 border-gray-300 focus:ring-teal-500 dark:focus:ring-teal-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="bordered-radio-1"
                                    class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Laki-laki</label>
                            </div>
                            <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                <input id="bordered-radio-2" type="radio" value="" name="bordered-radio"
                                    class="w-4 h-4 text-teal-600 bg-gray-100 border-gray-300 focus:ring-teal-500 dark:focus:ring-teal-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="bordered-radio-2"
                                    class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Perempuan</label>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                            Identitas</label>
                        <div class="flex">
                            <label for="search-dropdown"
                                class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Your Email</label>
                            <button id="dropdown-button" data-dropdown-toggle="dropdown"
                                class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600"
                                type="button">Pilih Identitas <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg></button>
                            <div id="dropdown"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdown-button">
                                    <li>
                                        <button type="button"
                                            class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">KTP</button>
                                    </li>
                                    <li>
                                        <button type="button"
                                            class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Passport</button>
                                    </li>
                                    <li>
                                        <button type="button"
                                            class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">SIM</button>
                                    </li>
                                </ul>
                            </div>
                            <div class="relative w-full">
                                <input type="search" id="search-dropdown"
                                    class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-teal-500"
                                    required />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-4 h-fit sticky top-[110px] bg-white border border-teal-700 shadow-md rounded-md">
            <h1 class="poppins-semibold text-teal-700 text-xl p-5 pb-0">Detail Pesanan</h1>
            <div class="p-5 pb-0">
                <img src="{{ asset('imgs/event-1.jpg') }}" class="rounded-md" alt="">
                <div class="mt-3">
                    <span class="text-lg poppins-medium">Smarista Smart Festival x FestaFest</span>
                </div>
            </div>
            <div class="flex flex-col gap-4 poppins-medium p-5 border-b border-teal-700">
                <div class="flex items-center gap-2">
                    <i class="fa-regular fa-calendar flex justify-center w-[30px]"></i>
                    <span class="text-[14px]">24 September 2024</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="fa-regular fa-clock flex justify-center w-[30px]"></i>
                    <span class="text-[14px]">12.00 WIB</span>
                </div>
                <div class="flex gap-2">
                    <i class="fa-regular fa-location-dot flex justify-center w-[50px]"></i>
                    <div class="flex flex-col gap-1">
                        <span class="text-[14px] leading-[17px]">
                            SMA NEGERI 1 TULUNGAGUNG | Jl. Fatahilah, Botoran, Tulungagung Regency, East
                            Java, Indonesia
                        </span>
                        <a href="/" class="text-sm text-teal-700">Petunjuk Arah</a>
                    </div>
                </div>
            </div>
            <div class="p-4 flex justify-between border-b border-teal-700">
                <span class="text-sm">0 Tiket Dipesan</span>
                <span class="text-sm poppins-semibold">Rp. 0</span>
            </div>
            <div class="p-4 flex justify-between border-b border-teal-700">
                <span class="text-sm">Subtotal</span>
                <span class="text-sm poppins-semibold">Rp. 0</span>
            </div>
            <div class="p-4 flex justify-between border-b border-teal-700">
                <span class="text-sm">Pajak</span>
                <span class="text-sm poppins-semibold">Rp. 0</span>
            </div>
            <div class="p-4 flex justify-between border-b border-teal-700">
                <span class="text-base">Total</span>
                <span class="text-sm poppins-semibold">Rp. 0</span>
            </div>
            <div class="p-4 flex flex-col gap-5">
                <div class="flex items-center rounded-md justify-between text-teal-700 bg-opacity-80 text-sm">
                    <span>Punya Kode Promo?</span>
                    <button>Tambahkan</button>
                </div>
                <a href="{{ route('event.pembayaran', 1) }}" type="button"
                    class="text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 w-full text-center dark:bg-teal-600 dark:hover:bg-teal-700 focus:outline-none dark:focus:ring-teal-800">
                    Pilih Metode Pembayaran
                </a>
            </div>
        </div>
    </div>
@endsection
