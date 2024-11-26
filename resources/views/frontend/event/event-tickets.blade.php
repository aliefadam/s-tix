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
        ],
        'active' => 'Pilih Tiket',
    ])

    <form action="{{ route('event.data-diri', $event->slug) }}" method="POST">
        @csrf
        <div class="mt-8 grid grid-cols-12 gap-8 min-h-[80vh]">
            <div class="col-span-8 h-fit">
                <div class="border p-5 bg-gradient-to-r from-teal-500 to-teal-700 text-white rounded-md">
                    <span class="text-center block">Kategori Tiket</span>
                </div>
                <div class="flex flex-col mt-5 gap-5">
                    @foreach ($event->ticket as $ticket)
                        <div class="border border-teal-700 shadow-md rounded-md flex items-center justify-between p-5">
                            <div class="flex flex-col gap-2">
                                <span class="">{{ $ticket->name }}</span>
                                <span class="poppins-semibold">{{ money_format($ticket->price) }}</span>
                            </div>
                            <div class="flex items-center gap-3 action">
                                <input type="hidden" class="price" value="{{ $ticket->price }}">
                                <button type="button"
                                    class="btn-minus text-red-700 border-2 border-red-700 hover:bg-red-700 hover:bg-opacity-20 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">
                                    <i class="fa-solid fa-minus"></i>
                                </button>
                                <input type="number" name="count[{{ $ticket->id }}]" readonly value="0"
                                    class="poppins-medium count text-center bg-gray-100 border border-black text-gray-900 text-sm rounded-lg focus:ring-black focus:border-black block w-[80px] p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-black-500 dark:focus:border-black-500" />
                                <button type="button"
                                    class="btn-plus text-teal-700 border-2 border-teal-700 hover:bg-teal-700 hover:bg-opacity-20 focus:ring-4 focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-teal-600 dark:hover:bg-teal-700 focus:outline-none dark:focus:ring-teal-800">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-span-4 h-fit sticky top-[110px] bg-white border border-teal-700 shadow-md rounded-md">
                <h1 class="poppins-semibold text-teal-700 text-xl p-5 pb-0">Detail Pesanan</h1>
                <div class="p-5 pb-0">
                    <img src="{{ asset('imgs/event-1.jpg') }}" class="rounded-md" alt="">
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
                        <span class="text-[14px]">{{ $event->start_time->format('H:i') }} WIB</span>
                    </div>
                    <div class="flex gap-2">
                        <i class="fa-regular fa-location-dot flex justify-center w-[50px]"></i>
                        <div class="flex flex-col gap-1">
                            <span class="text-[14px] leading-[17px]">
                                {{ $event->building_name }} | {{ $event->address }}
                            </span>
                            <a target="_blank" href="{{ $event->maps_link }}" class="text-sm text-teal-700">Buka di Google
                                Maps</a>
                        </div>
                    </div>
                </div>
                <div class="p-4 flex justify-between border-b border-teal-700">
                    <span class="text-sm" id="total-ticket">0 Tiket Dipesan</span>
                    <span class="text-sm poppins-semibold" id="total">
                        Rp 0
                    </span>
                </div>
                <div class="p-4 flex justify-center">
                    <button type="submit"
                        class="text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 w-full text-center dark:bg-teal-600 dark:hover:bg-teal-700 focus:outline-none dark:focus:ring-teal-800">
                        Checkout
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('script')
    <script type="module">
        $(".btn-minus").click(function() {
            setCounter($(this), "minus");
        });
        $(".btn-plus").click(function() {
            setCounter($(this), "plus");
        });

        function setCounter(self, type) {
            const countElement = self.closest(".action").find(".count");
            const count = +countElement.val();

            if (type == "plus") {
                countElement.val(count + 1);
            } else {
                if (count > 0) {
                    countElement.val(count - 1);
                }
            }

            calculateTotalTicket();
        }

        function calculateTotalTicket() {
            let total = 0;
            let totalTicket = 0;
            $(".action").each(function() {
                const count = +$(this).find(".count").val();
                const price = +$(this).find(".price").val();
                total += count * price;
                totalTicket += count;
            });
            $("#total").html(formatMoney(total));
            $("#total-ticket").html(`${totalTicket} Tiket Dipesan`);
        }
    </script>
@endsection
