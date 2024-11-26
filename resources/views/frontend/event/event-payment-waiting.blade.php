@extends('layouts.user')

@section('content')
    <div class="flex flex-col items-center w-full justify-center min-h-[50vh]">
        <div class="flex flex-col items-center text-center gap-1">
            <h1 class="poppins-semibold lg:text-xl text-lg">Selesaikan pembayaran dalam</h1>
            <span class="poppins-semibold tlg:ext-2xl text-xl text-teal-700 w-[200px] text-center" id="countdown"
                data-batas-akhir-pembayaran="">00:00:00</span>
            <span class="text-gray-700 mt-2 lg:text-base text-sm">Batas Akhir Pembayaran</span>
            <h1 class="poppins-semibold lg:text-xl text-[15px] text-teal-700">
                {{ formatDate(json_decode($transaction->payment)->expiration_date) }}</h1>
        </div>

        {{-- Kalau metode pembayaran QR --}}
        @if (false)
            <div class="flex justify-center mt-10">
                {!! showQR($data['virtual_account'], 200) !!}
            </div>
        @endif

        <div class="lg:w-[45%] w-[95%] mt-10 border rounded-lg">
            <div class="flex items-center justify-between p-5 border-b">
                <h1 class="poppins-semibold">BCA</h1>
                <img src="/imgs/bca.png" class="w-[70px]">
            </div>
            {{-- Kalau Metode Pembayaran VA --}}
            @if (true)
                <div class="flex items-center justify-between p-5 border-b">
                    <h1 class="lg:text-sm text-xs">Nomor Virtual Account</h1>
                    <div class="flex items-center gap-2">
                        <span
                            class="poppins-semibold lg:text-base text-sm">{{ json_decode($transaction->payment)->data }}</span>
                        <i id="btn-salin-va" data-virtual-account="909090909090"
                            class="cursor-pointer fa-regular fa-copy text-teal-700 hover:text-teal-800 text-semibold"></i>
                    </div>
                </div>
            @endif
            <div class="flex items-center justify-between p-5 border-b">
                <h1 class="lg:text-sm text-xs">Total Tagihan</h1>
                <div class="flex items-center gap-2">
                    <span class="poppins-semibold lg:text-base text-sm">{{ money_format($transaction->total) }}</span>
                    <span data-modal-target="detail-transaksi-modal" data-modal-toggle="detail-transaksi-modal"
                        class="cursor-pointer text-teal-700 hover:text-teal-800 poppins-semibold lg:text-base text-sm">Lihat
                        Detail</span>
                </div>
            </div>
            <div class="flex justify-between p-5 border-b">
                <h1 class="lg:text-sm text-xs">Status Pembayaran</h1>
                <div class="flex items-center gap-2 lg:text-sm text-xs text-right">
                    <span class="poppins-semibold text-sm text-yellow-500">Menunggu Pembayaran</span>
                    {{-- @if ($data['status_pembayaran'] == 'Menunggu Pembayaran')
                        <span class="poppins-semibold text-sm text-yellow-500">{{ $data['status_pembayaran'] }}</span>
                    @elseif($data['status_pembayaran'] == 'Sudah Dibayar')
                        <span class="poppins-semibold text-sm text-green-500">{{ $data['status_pembayaran'] }}</span>
                    @else
                        <span class="poppins-semibold text-sm text-red-500">{{ $data['status_pembayaran'] }}</span>
                    @endif --}}
                </div>
            </div>
        </div>

        <div class="lg:w-[45%] w-[95%] flex gap-3 lg:mt-8 mt-5">
            <a href="{{ route('transaction') }}"
                class="text-center lg:py-2.5 py-2 flex-[1] text-sm poppins-semibold rounded-lg hover:bg-teal-700 hover:bg-opacity-20 text-teal-700 border border-teal-700">
                Lihat Transaksi
            </a>
            <a href="{{ route('home') }}"
                class="text-center lg:py-2.5 py-2 flex-[1] text-sm poppins-semibold rounded-lg text-white bg-teal-700 hover:bg-teal-800 duration-300 hover:bg-primary-hover">
                Kembali ke beranda
            </a>
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
