<div class="modal-transaction-detail p-4 md:p-5 space-y-4 h-[500px] overflow-y-auto scrollbar">
    <div class="space-y-4">
        <div class="flex justify-between">
            <span class="lg:text-sm text-xs">Status</span>
            <span class="lg:text-sm text-xs text-gray-600">Menunggu Pembayaran</span>
        </div>
        <div class="flex justify-between">
            <span class="lg:text-sm text-xs">No Invoice</span>
            <span class="lg:text-sm text-xs text-gray-600">INV-TESTING</span>
        </div>
        <div class="flex justify-between">
            <span class="lg:text-sm text-xs">Tanggal Pembelian</span>
            <span class="lg:text-sm text-xs text-gray-600 text-right">
                Kamis, 27 Oktober 2024 - 20:00 WIB
            </span>
        </div>
    </div>
    <hr>
    <div class="">
        <h1 class="poppins-semibold lg:text-base text-sm">Detail Produk</h1>
        <div class="mt-4 flex flex-col gap-4">
            {{-- Looping Bagian Ini --}}
            <div class="flex gap-3 border shadow-sm rounded-lg p-3">
                <div class="flex-[2]">
                    <div class="flex gap-3">
                        <img src="{{ asset('imgs/event-1.jpg') }}"
                            class="border w-[200px] h-[80px] object-cover rounded-md">
                        <div class="flex flex-col">
                            <span class="poppins-medium lg:text-base text-sm block !leading-[20px]">
                                Smarista Smart Festival x FestaFest
                            </span>
                            <span class="lg:text-sm text-xs mt-2">
                                1 Tiket
                                X
                                Rp. 100,000
                            </span>
                        </div>
                    </div>
                </div>
                <div class="flex-[1] flex flex-col gap-1 items-end">
                    <span class="lg:text-sm text-xs text-right">Total Harga</span>
                    <span class="poppins-semibold leading-none lg:text-base text-sm lg:inline block lg:mt-0 mt-1">
                        Rp. 100,000
                    </span>
                </div>
            </div>
            {{-- Sampai Bagian Ini --}}
        </div>
    </div>
    <hr>
    <div class="space-y-4">
        <h1 class="poppins-semibold lg:text-base text-sm">Detail Pembeli</h1>
        <div class="flex justify-between">
            <span class="lg:text-sm text-xs flex-[3]">Email</span>
            <span class="lg:text-sm text-xs flex-[2] text-gray-600 text-end">aliefadam6@gmail.com</span>
        </div>
        <div class="flex justify-between">
            <span class="lg:text-sm text-xs flex-[3]">Nama</span>
            <span class="lg:text-sm text-xs flex-[2] text-gray-600 text-end">Alief Adam</span>
        </div>
    </div>
    <hr>
    <div class="space-y-4">
        <h1 class="poppins-semibold lg:text-base text-sm">Detail Pengunjung</h1>
        <div id="accordion-collapse" data-accordion="collapse">
            <div class="mb-3">
                <h2 id="accordion-collapse-heading-2">
                    <button type="button"
                        class="flex items-center justify-between w-full p-4 rounded-md rtl:text-right text-gray-500 border border-b border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                        data-accordion-target="#accordion-collapse-body-2" aria-expanded="false"
                        aria-controls="accordion-collapse-body-2">
                        <span class="">Data Pengunjung 1</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5 5 1 1 5" />
                        </svg>
                    </button>
                </h2>
                <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
                    <div class="p-5 border border-b space-y-4 border-gray-200 dark:border-gray-700">
                        <div class="flex justify-between">
                            <span class="lg:text-sm text-xs flex-[3]">Email</span>
                            <span class="lg:text-sm text-xs flex-[2] text-gray-600 text-end">aliefadam6@gmail.com</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="lg:text-sm text-xs flex-[3]">Nama Lengkap</span>
                            <span class="lg:text-sm text-xs flex-[2] text-gray-600 text-end">Alief Adam</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="lg:text-sm text-xs flex-[3]">Jenis Kelamin</span>
                            <span class="lg:text-sm text-xs flex-[2] text-gray-600 text-end">Laki-laki</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="lg:text-sm text-xs flex-[3]">Tanggal Lahir</span>
                            <span class="lg:text-sm text-xs flex-[2] text-gray-600 text-end">21 Juli 2003</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="lg:text-sm text-xs flex-[3]">Nomor Identitas</span>
                            <span class="lg:text-sm text-xs flex-[2] text-gray-600 text-end">909090909090</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <h2 id="accordion-collapse-heading-3">
                    <button type="button"
                        class="flex items-center justify-between w-full p-4 rounded-md rtl:text-right text-gray-500 border border-b border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                        data-accordion-target="#accordion-collapse-body-3" aria-expanded="false"
                        aria-controls="accordion-collapse-body-3">
                        <span class="">Data Pengunjung 2</span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5 5 1 1 5" />
                        </svg>
                    </button>
                </h2>
                <div id="accordion-collapse-body-3" class="hidden" aria-labelledby="accordion-collapse-heading-3">
                    <div class="p-5 border border-b space-y-4 border-gray-200 dark:border-gray-700">
                        <div class="flex justify-between">
                            <span class="lg:text-sm text-xs flex-[3]">Email</span>
                            <span class="lg:text-sm text-xs flex-[2] text-gray-600 text-end">fajaradam6@gmail.com</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="lg:text-sm text-xs flex-[3]">Nama Lengkap</span>
                            <span class="lg:text-sm text-xs flex-[2] text-gray-600 text-end">Fajar Adam</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="lg:text-sm text-xs flex-[3]">Jenis Kelamin</span>
                            <span class="lg:text-sm text-xs flex-[2] text-gray-600 text-end">Laki-laki</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="lg:text-sm text-xs flex-[3]">Tanggal Lahir</span>
                            <span class="lg:text-sm text-xs flex-[2] text-gray-600 text-end">21 Agustus 2003</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="lg:text-sm text-xs flex-[3]">Nomor Identitas</span>
                            <span class="lg:text-sm text-xs flex-[2] text-gray-600 text-end">909090909090</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="space-y-4">
        <h1 class="poppins-semibold lg:text-base text-sm">Rincian Pembayaran</h1>
        <div class="flex justify-between">
            <span class="lg:text-sm text-xs flex-[3]">Metode Pembayaran</span>
            <span class="lg:text-sm text-xs flex-[2] text-gray-600 text-end">BCA</span>
        </div>
        <div class="flex justify-between">
            <span class="lg:text-sm text-xs flex-[3]">Nomor VA</span>
            <span class="lg:text-sm text-xs flex-[2] text-gray-600 text-end">909090909090</span>
        </div>
        <div class="flex justify-between">
            <span class="lg:text-sm text-xs flex-[3]">
                Total Harga (1 Tiket)
            </span>
            <span class="lg:text-sm text-xs flex-[2] text-gray-600 text-end">
                Rp. 100,000
            </span>
        </div>
        <div class="flex justify-between">
            <span class="lg:text-sm text-xs flex-[3]">
                Internet Fee
            </span>
            <span class="lg:text-sm text-xs flex-[2] text-gray-600 text-end">
                Rp. 2,000
            </span>
        </div>
        <div class="flex justify-between">
            <span class="lg:text-sm text-xs flex-[3]">
                Pajak
            </span>
            <span class="lg:text-sm text-xs flex-[2] text-gray-600 text-end">
                Rp. 500
            </span>
        </div>
        <div class="flex justify-between poppins-semibold">
            <span class="lg:text-[15px] text-[14px] flex-[3]">Total Belanja</span>
            <span class="lg:text-[15px] text-[14px] flex-[2] text-gray-600 text-end">Rp. 102,500</span>
        </div>
    </div>
</div>
