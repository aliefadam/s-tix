@extends('layouts.user')

@section('content')
    @include('components.breadcrumb', [
        'before' => [
            [
                'url' => route('home'),
                'name' => 'Beranda',
            ],
        ],
        'active' => 'Transaksi',
    ])

    <div class="mt-10">
        <h1 class="text-center text-3xl poppins-bold text-teal-700">Transaksi</h1>
        <div class="lg:w-full w-full mt-10">
            <div class="bg-white rounded-lg shadow-lg border p-5 lg:block hidden" id="filter-container">
                <div class="flex gap-3">
                    <div class="relative lg:flex-[2] flex-[1.5]">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <i class="fa-regular fa-magnifying-glass"></i>
                        </div>
                        <input type="text" id="keyword"
                            class="bg-gray-50 border border-gray-300 text-gray-900 lg:text-sm text-xs rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full ps-10 p-2.5 "
                            placeholder="Cari transaksimu ...">
                    </div>
                    <select id="categories"
                        class=" flex-[1] bg-gray-50 border border-gray-300 text-gray-900 lg:text-sm text-xs rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5">
                        <option selected value="all">Semua Kategori</option>
                        <option value="pesanan_sukses">Pesanan Sukses</option>
                        <option value="pesanan_kadaluarsa">Pesanan Kadaluarsa</option>
                        <option value="pesanan_kadaluarsa">Pesanan Dibatalkan</option>
                        <option value="menunggu_pembayaran">Menunggu Pembayaran</option>
                    </select>
                </div>
            </div>
            <div id="history-container" class="lg:mt-5 flex flex-col gap-5">
                <div class="bg-white rounded-lg shadow-lg border lg:p-5 p-3">
                    <div class="flex items-center justify-between text-sm lg:gap-0 gap-3">
                        <span class="lg:text-sm text-xs text-gray-700 poppins-medium">Belanja Pada 27 September 2024 - 20:00
                            WIB</span>
                        <div class="flex items-center lg:text-sm text-xs text-center gap-3">
                            <span class="bg-amber-100 text-amber-600 poppins-semibold px-4 py-2.5 rounded-md">
                                Menunggu Pembayaran
                            </span>
                        </div>
                    </div>
                    <div class="flex justify-between mt-5">
                        <div class="flex-[2] flex flex-col gap-5">
                            <div class="flex">
                                <div class="flex-[3] flex-col gap-3">
                                    <div class="flex lg:gap-5 gap-3">
                                        <img src="{{ asset('imgs/event-1.jpg') }}" class="lg:w-[200px] w-[80px] rounded-md">
                                        <div class="flex flex-col gap-1">
                                            <span class="poppins-medium">Smarista Smart Festival x FestaFest</span>
                                            <span class="text-sm">
                                                1 Tiket
                                                X
                                                Rp. 100,000
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex-[1] flex flex-col gap-2 items-end">
                            <span class="text-sm leading-none">Total Transaksi</span>
                            <span class="poppins-semibold">Rp. 100,000</span>
                        </div>
                    </div>

                    <div class="flex justify-end gap-2 mt-5">
                        <button data-order-id="" data-modal-target="detail-transaksi-modal"
                            data-modal-toggle="detail-transaksi-modal"
                            class="btn-detail-transaksi w-[220px] text-center lg:text-sm text-xs px-3 py-2 rounded-lg poppins-semibold text-teal-700 border border-teal-700 cursor-pointer hover:bg-teal-800 hover:bg-opacity-20 duration-200">
                            <i class="fa-regular fa-eye mr-1"></i>
                            Lihat Detail Transaksi
                        </button>
                        <?php $order['status'] = 'Menunggu Pembayaran'; ?>
                        @if ($order['status'] == 'Menunggu Pembayaran')
                            <button data-order-id="" data-modal-target="pembatalan-transaksi-modal"
                                data-modal-toggle="pembatalan-transaksi-modal"
                                class="btn-batalkan-transaksi w-[220px] text-center lg:text-sm text-xs px-3 py-2 rounded-lg border border-red-700 text-red-700 poppins-semibold cursor-pointer hover:bg-red-800 hover:bg-opacity-20 duration-200">
                                <i class="fa-regular fa-ban mr-1"></i>
                                Batalkan Transaksi
                            </button>
                        @elseif($order['status'] == 'Dalam Pengiriman')
                            <span data-order-id=""
                                class="btn-terima-pesanan w-[220px] text-center lg:text-sm text-xs px-3 py-2 rounded-lg bg-green-700 poppins-semibold text-white cursor-pointer hover:bg-green-800">
                                <i class="fa-regular fa-person-carry-box mr-1.5"></i>
                                Pesanan Telah Diterima
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Detail Transaksi modal -->
    <div id="detail-transaksi-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-[99999] justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 overflow-hidden">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="lg:text-lg text-sm font-semibold text-gray-900 dark:text-white">
                        Detail Transaksi
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="detail-transaksi-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div id="detail-transaksi-body">
                    @include('components.modal.modal-detail-transaksi')
                </div>
            </div>
        </div>
    </div>
@endsection
