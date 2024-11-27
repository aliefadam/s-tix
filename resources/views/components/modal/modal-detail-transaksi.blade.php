<div class="modal-transaction-detail p-4 md:p-5 space-y-4 h-[500px] overflow-y-auto scrollbar">
    <div class="space-y-4">
        <div class="flex justify-between">
            <span class="lg:text-sm text-xs">Status</span>
            <span class="lg:text-sm text-xs text-gray-600">{{ $transaction->status }}</span>
        </div>
        <div class="flex justify-between">
            <span class="lg:text-sm text-xs">No Invoice</span>
            <span class="lg:text-sm text-xs text-gray-600">{{ $transaction->invoice }}</span>
        </div>
        <div class="flex justify-between">
            <span class="lg:text-sm text-xs">Tanggal Pembelian</span>
            <span class="lg:text-sm text-xs text-gray-600 text-right">
                {{ formatDate($transaction->created_at) }}
            </span>
        </div>
    </div>
    <hr>
    <div class="">
        <h1 class="poppins-semibold lg:text-base text-sm">Detail Produk</h1>
        <div class="mt-4 flex flex-col gap-4">
            <div class="border shadow-sm rounded-lg p-3">
                <div class="flex gap-3">
                    <div class="flex-[3]">
                        <div class="flex gap-3">
                            <img src="{{ upload_asset($transaction->event->banner) }}"
                                class="border w-[200px] h-[100px] object-cover rounded-md">
                            <div class="flex flex-col">
                                <span class="poppins-medium lg:text-base text-sm block !leading-[20px]">
                                    {{ $transaction->event->name }}
                                </span>
                                <span class="lg:text-sm text-gray-600 text-xs mt-1">
                                    <ul class="flex flex-col gap-1 mt-1">
                                        @foreach ($transaction->transaction_detail->where('ticket_id', '!=', null)->groupBy('ticket_id') as $detail)
                                            @foreach ($detail as $ticket)
                                                <li class="">
                                                    {{ getTicket($ticket->ticket_id)->name }} x
                                                    {{ $detail->count() }} :
                                                    {{ money_format(getTicket($ticket->ticket_id)->price) }}
                                                </li>
                                            @endforeach
                                        @endforeach
                                    </ul>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="flex-[1] flex flex-col items-end">
                        <span class="lg:text-sm text-xs text-right">Total Harga</span>
                        <span class="poppins-semibold leading-none lg:text-base text-sm lg:inline block lg:mt-0 mt-1">
                            {{ money_format(getTotalTicket($transaction->id)) }}
                        </span>
                    </div>
                </div>
                <div class="mt-3">
                    <span class="text-sm">Detail Event :
                        <a class="text-blue-600 hover:underline" target="_blank"
                            href="/event/{{ $transaction->event->slug }}">{{ url('/event/' . $transaction->event->slug) }}</a>
                    </span>
                </div>
            </div>
            {{-- Sampai Bagian Ini --}}
        </div>
    </div>
    <hr>
    <div class="space-y-4">
        @php
            $pembeli = getDataPembeli($transaction->id);
        @endphp
        <h1 class="poppins-semibold lg:text-base text-sm">Detail Pembeli</h1>
        <div class="flex justify-between">
            <span class="lg:text-sm text-xs flex-[3]">Email</span>
            <span class="lg:text-sm text-xs flex-[2] text-gray-600 text-end">{{ $pembeli->email }}</span>
        </div>
        <div class="flex justify-between">
            <span class="lg:text-sm text-xs flex-[3]">Nama</span>
            <span class="lg:text-sm text-xs flex-[2] text-gray-600 text-end">{{ $pembeli->name }}</span>
        </div>
        <div class="flex justify-between">
            <span class="lg:text-sm text-xs flex-[3]">Jenis Kelamin</span>
            <span class="lg:text-sm text-xs flex-[2] text-gray-600 text-end">{{ $pembeli->gender }}</span>
        </div>
        <div class="flex justify-between">
            <span class="lg:text-sm text-xs flex-[3]">Tanggal Lahir</span>
            <span
                class="lg:text-sm text-xs flex-[2] text-gray-600 text-end">{{ concatDate($pembeli->year, $pembeli->month, $pembeli->day) }}</span>
        </div>
        <div class="flex justify-between">
            <span class="lg:text-sm text-xs flex-[3]">Tipe Identitas</span>
            <span class="lg:text-sm text-xs flex-[2] text-gray-600 text-end">{{ $pembeli->identity_type }}</span>
        </div>
        <div class="flex justify-between">
            <span class="lg:text-sm text-xs flex-[3]">Nomor Identitas</span>
            <span class="lg:text-sm text-xs flex-[2] text-gray-600 text-end">{{ $pembeli->identity_number }}</span>
        </div>
    </div>
    <hr>
    <div class="space-y-4">
        <h1 class="poppins-semibold lg:text-base text-sm">Detail Pengunjung</h1>
        <div id="accordion-collapse" data-accordion="collapse">
            @foreach (getDataPengunjung($transaction->id) as $pengunjung)
                <div class="mb-3">
                    <h2 id="accordion-collapse-heading-{{ $loop->iteration }}">
                        <button type="button"
                            class="flex items-center justify-between w-full p-4 rounded-md rtl:text-right text-gray-500 border border-b border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                            data-accordion-target="#accordion-collapse-body-{{ $loop->iteration }}"
                            aria-expanded="false" aria-controls="accordion-collapse-body-{{ $loop->iteration }}">
                            <span class="">Data Pengunjung {{ $loop->iteration }}</span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M9 5 5 1 1 5" />
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-collapse-body-{{ $loop->iteration }}" class="hidden"
                        aria-labelledby="accordion-collapse-heading-{{ $loop->iteration }}">
                        <div class="p-5 border border-b space-y-4 border-gray-200 dark:border-gray-700">
                            <div class="flex justify-between">
                                <span class="lg:text-sm text-xs flex-[3]">Jenis Tiket</span>
                                <span
                                    class="lg:text-sm text-xs flex-[2] text-gray-600 text-end">{{ getTicket($pengunjung->ticket_id)->name }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="lg:text-sm text-xs flex-[3]">Email</span>
                                <span
                                    class="lg:text-sm text-xs flex-[2] text-gray-600 text-end">{{ $pengunjung->email }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="lg:text-sm text-xs flex-[3]">Nama Lengkap</span>
                                <span
                                    class="lg:text-sm text-xs flex-[2] text-gray-600 text-end">{{ $pengunjung->name }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="lg:text-sm text-xs flex-[3]">Jenis Kelamin</span>
                                <span
                                    class="lg:text-sm text-xs flex-[2] text-gray-600 text-end">{{ $pengunjung->gender }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="lg:text-sm text-xs flex-[3]">Tanggal Lahir</span>
                                <span
                                    class="lg:text-sm text-xs flex-[2] text-gray-600 text-end">{{ concatDate($pengunjung->year, $pengunjung->month, $pengunjung->day) }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="lg:text-sm text-xs flex-[3]">Tipe Identitas</span>
                                <span
                                    class="lg:text-sm text-xs flex-[2] text-gray-600 text-end">{{ $pengunjung->identity_type }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="lg:text-sm text-xs flex-[3]">Nomor Identitas</span>
                                <span
                                    class="lg:text-sm text-xs flex-[2] text-gray-600 text-end">{{ $pengunjung->identity_number }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <hr>
    <div class="space-y-4">
        <h1 class="poppins-semibold lg:text-base text-sm">Rincian Pembayaran</h1>
        @php
            $payment = json_decode($transaction->payment);
        @endphp
        <div class="flex justify-between">
            <span class="lg:text-sm text-xs flex-[3]">Metode Pembayaran</span>
            <span class="lg:text-sm text-xs flex-[2] text-gray-600 text-end">{{ $payment->method }}</span>
        </div>
        <div class="flex justify-between">
            <span class="lg:text-sm text-xs flex-[3]">Nomor VA</span>
            <span class="lg:text-sm text-xs flex-[2] text-gray-600 text-end">{{ $payment->data }}</span>
        </div>
        <div class="flex justify-between">
            <span class="lg:text-sm text-xs flex-[3]">
                Total Harga (1 Tiket)
            </span>
            <span class="lg:text-sm text-xs flex-[2] text-gray-600 text-end">
                {{ money_format(getTotalTicket($transaction->id)) }}
            </span>
        </div>
        <div class="flex justify-between">
            <span class="lg:text-sm text-xs flex-[3]">
                Internet Fee
            </span>
            <span class="lg:text-sm text-xs flex-[2] text-gray-600 text-end">
                {{ money_format($transaction->internet_fee) }}
            </span>
        </div>
        <div class="flex justify-between">
            <span class="lg:text-sm text-xs flex-[3]">
                Pajak
            </span>
            <span class="lg:text-sm text-xs flex-[2] text-gray-600 text-end">
                {{ $transaction->tax_percent }}% ({{ money_format($transaction->tax_amount) }})
            </span>
        </div>
        <div class="flex justify-between poppins-semibold">
            <span class="lg:text-[15px] text-[14px] flex-[3]">Total Belanja</span>
            <span
                class="lg:text-[15px] text-[14px] flex-[2] text-gray-600 text-end">{{ money_format($transaction->total) }}</span>
        </div>
    </div>
</div>
