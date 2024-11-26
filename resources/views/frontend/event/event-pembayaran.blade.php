@extends('layouts.user')

@section('content')
    @include('components.breadcrumb', [
        'before' => [
            [
                'url' => route('home'),
                'name' => 'Beranda',
            ],
            [
                'url' => route('event', $event->slug),
                'name' => $event->name,
            ],
            [
                'url' => route('event.tickets', $event->slug),
                'name' => 'Pilih Tiket',
            ],
            [
                'url' => route('event.data-diri', $event->slug),
                'back' => true,
                'name' => 'Data Diri',
            ],
        ],
        'active' => 'Pembayaran',
    ])

    <div class="mt-8 grid grid-cols-12 gap-8 min-h-[80vh]">
        <div class="col-span-8 h-fit flex flex-col gap-5">
            <div class="border border-teal-700 text-white rounded-md shadow-md overflow-hidden">
                <div class="p-5 bg-gradient-to-r from-teal-400 to-teal-500">
                    <span class="text-center block">Virtual Account</span>
                </div>
                <div class="p-5 flex flex-col gap-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                            <input id="bca" type="radio" value="BCA" name="pembayaran"
                                class="w-4 h-4 text-teal-600 bg-gray-100 border-gray-300 focus:ring-teal-500 dark:focus:ring-teal-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="bca"
                                class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 flex items-center gap-2">
                                <img src="{{ asset('imgs/bca.png') }}" class="w-[50px] border p-2" alt="">
                                BCA
                            </label>
                        </div>
                        <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                            <input id="bri" type="radio" value="BRI" name="pembayaran"
                                class="w-4 h-4 text-teal-600 bg-gray-100 border-gray-300 focus:ring-teal-500 dark:focus:ring-teal-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="bri"
                                class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 flex items-center gap-2">
                                <img src="{{ asset('imgs/bri.png') }}" class="w-[50px] border p-2" alt="">
                                BRI
                            </label>
                        </div>
                        <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                            <input id="mandiri" type="radio" value="MANDIRI" name="pembayaran"
                                class="w-4 h-4 text-teal-600 bg-gray-100 border-gray-300 focus:ring-teal-500 dark:focus:ring-teal-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="mandiri"
                                class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 flex items-center gap-2">
                                <img src="{{ asset('imgs/mandiri.png') }}" class="w-[50px] border p-2" alt="">
                                Mandiri
                            </label>
                        </div>
                        <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                            <input id="bni" type="radio" value="BNI" name="pembayaran"
                                class="w-4 h-4 text-teal-600 bg-gray-100 border-gray-300 focus:ring-teal-500 dark:focus:ring-teal-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="bni"
                                class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 flex items-center gap-2">
                                <img src="{{ asset('imgs/bni.png') }}" class="w-[50px] border p-2" alt="">
                                BNI
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border border-teal-700 text-white rounded-md shadow-md overflow-hidden">
                <div class="p-5 bg-gradient-to-r from-teal-400 to-teal-500">
                    <span class="text-center block">E-Wallet & Qris</span>
                </div>
                <div class="p-5 flex flex-col gap-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                            <input id="qris" type="radio" value="QRIS" name="pembayaran"
                                class="w-4 h-4 text-teal-600 bg-gray-100 border-gray-300 focus:ring-teal-500 dark:focus:ring-teal-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="qris"
                                class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 flex items-center gap-2">
                                <img src="{{ asset('imgs/qris.png') }}" class="w-[50px] border p-2" alt="">
                                QRIS
                            </label>
                        </div>
                        <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                            <input id="dana" type="radio" value="DANA" name="pembayaran"
                                class="w-4 h-4 text-teal-600 bg-gray-100 border-gray-300 focus:ring-teal-500 dark:focus:ring-teal-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="dana"
                                class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 flex items-center gap-2">
                                <img src="{{ asset('imgs/dana.png') }}" class="w-[50px] border p-2" alt="">
                                Dana
                            </label>
                        </div>
                        <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                            <input id="spay" type="radio" value="SPAY" name="pembayaran"
                                class="w-4 h-4 text-teal-600 bg-gray-100 border-gray-300 focus:ring-teal-500 dark:focus:ring-teal-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="spay"
                                class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 flex items-center gap-2">
                                <img src="{{ asset('imgs/spay.png') }}" class="w-[50px] border p-2" alt="">
                                Shoope Pay
                            </label>
                        </div>
                        <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                            <input id="ovo" type="radio" value="OVO" name="pembayaran"
                                class="w-4 h-4 text-teal-600 bg-gray-100 border-gray-300 focus:ring-teal-500 dark:focus:ring-teal-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="ovo"
                                class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 flex items-center gap-2">
                                <img src="{{ asset('imgs/ovo.png') }}" class="w-[50px] border p-2" alt="">
                                OVO
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-4 h-fit sticky top-[110px] bg-white border border-teal-700 shadow-md rounded-md">
            <h1 class="poppins-semibold text-teal-700 text-xl p-5 pb-0">Detail Pesanan</h1>
            <div class="p-5 pb-0">
                <img src="{{ upload_asset($event->banner) }}" class="rounded-md" alt="">
                <div class="mt-3">
                    <span class="text-lg poppins-medium">{{ $event->name }}</span>
                </div>
            </div>
            <div class="flex flex-col gap-4 poppins-medium p-5 border-b border-teal-700">
                <div class="flex items-center gap-2">
                    <i class="fa-regular fa-calendar flex justify-center w-[30px]"></i>
                    <span class="text-[14px]">{{ $event->start_date->translatedFormat('l, d F Y') }}</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="fa-regular fa-clock flex justify-center w-[30px]"></i>
                    <span class="text-[14px]">{{ $event->start_date->translatedFormat('H:i') }} WIB</span>
                </div>
                <div class="flex gap-2">
                    <i class="fa-regular fa-location-dot flex justify-center w-[50px]"></i>
                    <div class="flex flex-col gap-1">
                        <span class="text-[14px] leading-[17px]">
                            {{ $event->building_name }} | {{ $event->address }}
                        </span>
                        <a target="_blank" href="{{ $event->maps_link }}" class="text-sm text-teal-700">Buka di
                            Google
                            Maps</a>
                    </div>
                </div>
            </div>
            <div class="p-4 flex justify-between border-b border-teal-700">
                <span class="text-sm">Subtotal</span>
                <span class="text-sm poppins-semibold">{{ money_format($data_ticket['sub_total']) }}</span>
            </div>
            <div class="p-4 flex flex-col gap-2 border-b border-teal-700">
                <div class="flex justify-between ">
                    <span class="text-sm">Pajak</span>
                    <span class="text-sm poppins-semibold">
                        {{ $data_ticket['tax'] }}%
                        ({{ money_format($data_ticket['tax_amount']) }})
                    </span>
                </div>
                <div class="flex justify-between ">
                    <span class="text-sm">Internet Fee</span>
                    <span class="text-sm poppins-semibold">Rp. 0</span>
                </div>
            </div>
            <div class="p-4 flex justify-between border-b border-teal-700">
                <span class="text-base">Total</span>
                <span class="text-sm poppins-semibold">{{ money_format($data_ticket['total']) }}</span>
            </div>
            <div class="p-4 flex flex-col gap-3">
                <div class="flex items-center rounded-md justify-between text-teal-700 bg-opacity-80 text-sm mb-3">
                    <span>Punya Kode Promo?</span>
                    <button>Tambahkan</button>
                </div>
                <form action="{{ route('event.payment', $event->slug) }}" class="border w-full" method="POST">
                    @csrf
                    <input type="hidden" name="data_ticket" value="{{ json_encode($data_ticket) }}">
                    <input type="hidden" name="event_id" value="{{ $event->id }}">
                    <input type="hidden" name="metode_pembayaran" id="metode_pembayaran" value="">
                    <button type="submit"
                        class="text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 w-full text-center dark:bg-teal-600 dark:hover:bg-teal-700 focus:outline-none dark:focus:ring-teal-800 duration-200">
                        Bayar Sekarang ({{ money_format($data_ticket['total']) }})
                    </button>
                </form>
                {{-- <a href="{{ route('event.data-diri', 1) }}" type="button"
                    class="text-teal-700 border border-teal-700 hover:bg-teal-800 hover:bg-opacity-20 focus:ring-4 focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 w-full text-center dark:bg-teal-600 dark:hover:bg-teal-700 focus:outline-none dark:focus:ring-teal-800 duration-200">
                    Kembali ke Data diri
                </a> --}}
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="module">
        $("input[name='pembayaran']").change(changeMethod);

        function changeMethod() {
            const value = $("input[name='pembayaran']:checked").val();
            $("#metode_pembayaran").val(value);
        }
    </script>
@endsection
