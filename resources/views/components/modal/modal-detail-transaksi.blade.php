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
