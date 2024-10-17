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
        ],
        'active' => 'Pilih Tiket',
    ])

    <div class="mt-8 grid grid-cols-12 gap-8 min-h-[80vh]">
        <div class="col-span-8 h-fit">
            <div class="border p-5 bg-gradient-to-r from-teal-500 to-teal-700 text-white rounded-md">
                <span class="text-center block">Kategori Tiket</span>
            </div>
            <div class="flex flex-col mt-5 gap-5">
                <div class="border border-teal-700 shadow-md rounded-md flex items-center justify-between p-5">
                    <div class="flex flex-col gap-2">
                        <span class="">Early Bird</span>
                        <span class="poppins-semibold">Rp. 75.000</span>
                    </div>
                    <div class="">
                        <button type="button"
                            class="text-teal-700 border border-teal-700 hover:bg-teal-700 hover:bg-opacity-20 focus:ring-4 focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-teal-600 dark:hover:bg-teal-700 focus:outline-none dark:focus:ring-teal-800">
                            Tambah
                        </button>
                    </div>
                </div>
                <div class="border border-teal-700 shadow-md rounded-md flex items-center justify-between p-5">
                    <div class="flex flex-col gap-2">
                        <span class="">Presale 1</span>
                        <span class="poppins-semibold">Rp. 95.000</span>
                    </div>
                    <div class="">
                        <button type="button"
                            class="text-teal-700 border border-teal-700 hover:bg-teal-700 hover:bg-opacity-20 focus:ring-4 focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-teal-600 dark:hover:bg-teal-700 focus:outline-none dark:focus:ring-teal-800">
                            Tambah
                        </button>
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
            <div class="p-4 flex justify-center">
                <a href="{{ route('event.data-diri', 1) }}" type="button"
                    class="text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 w-full text-center dark:bg-teal-600 dark:hover:bg-teal-700 focus:outline-none dark:focus:ring-teal-800">
                    Checkout
                </a>
            </div>
        </div>
    </div>
@endsection
