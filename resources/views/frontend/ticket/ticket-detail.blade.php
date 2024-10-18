@extends('layouts.user')

@section('content')
    @include('components.breadcrumb', [
        'before' => [
            [
                'url' => route('home'),
                'name' => 'Beranda',
            ],
            [
                'url' => route('ticket'),
                'name' => 'Tiket',
            ],
        ],
        'active' => 'E-Tiket Smarista Smart Festival x FestaFest',
    ])

    <div class="mt-10 min-h-[50vh]">
        <h1 class="text-center text-3xl poppins-bold text-teal-700">E-Tiket</h1>

        <div class="mt-8 flex justify-center">
            <div class="border border-teal-700 rounded-md shadow-md w-1/2 grid grid-cols-2 gap-5">
                <div class="flex flex-col items-center gap-8 p-5">
                    <div class="flex flex-col items-center gap-1">
                        <span class="text-sm text-gray-600">Nama Event</span>
                        <span class="block text-center">Smarista Smart Festival x FestaFest</span>
                    </div>
                    <div class="flex flex-col items-center gap-1">
                        <span class="text-sm text-gray-600">Tanggal Event</span>
                        <span class="block text-center">20 September 2024</span>
                    </div>
                    <div class="flex flex-col items-center gap-1">
                        <span class="text-sm text-gray-600">Jumlah Tiket</span>
                        <span class="block text-center">1 Tiket</span>
                    </div>
                </div>
                <div class="flex flex-col items-center gap-8 p-5">
                    <div class="flex flex-col items-center gap-1">
                        <span class="text-sm text-gray-600">Nomor Invoice</span>
                        <span>INV-TESTING</span>
                    </div>
                    <div class="flex flex-col items-center gap-1">
                        <span class="text-sm text-gray-600">Tanggal Transaksi</span>
                        <span>Kamis, 27 September 2024 - 20:00</span>
                    </div>
                    <div class="flex flex-col items-center gap-1">
                        <span class="text-sm text-gray-600">Total Pembayaran</span>
                        <span>Rp. 100,000</span>
                    </div>
                </div>
                <div class="col-span-2 p-5 border-t border-b border-teal-700 -mt-5">
                    <span class="text-center block text-sm">
                        Anda dapat melihat daftar E-Ticket dengan menekan tombol "Lihat E-Ticket" atau Anda dapat langsung
                        mendownload E-ticket yang terlampir dalam Email ini
                    </span>
                </div>
                <div class="col-span-2 p-5 -mt-5 flex justify-center items-center gap-5">
                    <button type="button" data-modal-target="detail-transaksi-modal"
                        data-modal-toggle="detail-transaksi-modal"
                        class="text-center lg:py-2.5 py-2 flex-[1] text-sm poppins-semibold rounded-lg hover:bg-teal-700 hover:bg-opacity-20 text-teal-700 border border-teal-700 duration-200">
                        Detail Transaksi
                    </button>
                    <button type="button" data-modal-target="e-ticket-modal" data-modal-toggle="e-ticket-modal"
                        class="text-center lg:py-2.5 py-2 flex-[1] text-sm poppins-semibold rounded-lg text-white bg-teal-700 hover:bg-teal-800 duration-200">
                        Lihat E-Ticket
                    </button>
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

    <!-- Detail Transaksi modal -->
    <div id="e-ticket-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-[99999] justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 overflow-hidden">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="lg:text-lg text-sm font-semibold text-gray-900 dark:text-white">
                        E-Ticket
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="e-ticket-modal">
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
                    @include('components.modal.modal-e-ticket')
                </div>
            </div>
        </div>
    </div>
@endsection
