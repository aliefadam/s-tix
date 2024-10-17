@extends('layouts.user')

@section('content')
    @include('components.breadcrumb', [
        'before' => [
            [
                'url' => route('home'),
                'name' => 'Beranda',
            ],
        ],
        'active' => 'Smarista Smart Festival x FestaFest',
    ])

    <div class="mt-8 grid grid-cols-12 gap-8 min-h-[80vh]">
        <div class="col-span-8 h-fit">
            <img src="{{ asset('imgs/event-1.jpg') }}" class="w-full h-[500px] object-cover" alt="">
            <div class="mt-5 border-b border-teal-700 pb-5">
                <h1 class="text-2xl poppins-semibold">Deskripsi</h1>
                <p class="leading-[22px] mt-2 text-justify">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. In, ab porro! Molestias et accusantium minima
                    beatae quasi eius natus enim a blanditiis nostrum, nam sunt hic suscipit reiciendis quas quidem
                    repellendus possimus! Beatae quidem, consequuntur eveniet nulla nisi ipsum deserunt! Quasi maxime iusto
                    exercitationem nemo sapiente. Eaque, et tenetur! Sit, eligendi tenetur veniam, eius voluptatem commodi
                    accusantium nulla ducimus facere fugiat, recusandae eos quis amet corporis officia veritatis illo.
                    Architecto recusandae repudiandae quaerat asperiores quod nesciunt esse debitis? Numquam tempora eum
                    architecto neque ipsam voluptates consequuntur soluta, accusamus deleniti eos nostrum dolore dignissimos
                    cumque sit sapiente atque aperiam qui? Quasi.
                </p>
            </div>

            <div class="mt-5">
                <h1 class="text-2xl poppins-semibold">Lineup</h1>
                <div class="grid grid-cols-4 gap-5 mt-5">
                    <div class="border border-teal-700 rounded-lg shadow-sm overflow-hidden">
                        <img src="{{ asset('imgs/lineup-1.jpg') }}"
                            class="border-b border-teal-700 w-full h-[250px] object-cover" alt="">
                        <div class="p-5">
                            <h1 class="text-center text-teal-700 poppins-semibold">Meiska</h1>
                        </div>
                    </div>
                    <div class="border border-teal-700 rounded-lg shadow-sm overflow-hidden">
                        <img src="{{ asset('imgs/lineup-2.jpg') }}"
                            class="border-b border-teal-700 w-full h-[250px] object-cover" alt="">
                        <div class="p-5">
                            <h1 class="text-center text-teal-700 poppins-semibold">Aftershine</h1>
                        </div>
                    </div>
                    <div class="border border-teal-700 rounded-lg shadow-sm overflow-hidden">
                        <img src="{{ asset('imgs/lineup-3.jpg') }}"
                            class="border-b border-teal-700 w-full h-[250px] object-cover" alt="">
                        <div class="p-5">
                            <h1 class="text-center text-teal-700 poppins-semibold">Avogato</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-4 h-fit sticky top-[110px] bg-white border border-teal-700 shadow-md rounded-md">
            <h1 class="poppins-semibold text-teal-700 text-xl p-5 pb-0">Smarista Smart Festival x FestaFest</h1>
            <div class="flex flex-col gap-4 poppins-medium p-5 pb-2">
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
            <div class="mt-3 flex flex-col gap-4 border-t border-teal-700 p-5">
                <div class="flex flex-col gap-1">
                    <span class="text-[14px] text-gray-700">Dibuat Oleh</span>
                    <span class="uppercase poppins-medium">OSIS SMA NEGERI 1 TULUNGAGUNG X FestaFest</span>
                </div>
                <div class="flex flex-col gap-1">
                    <span class="text-[14px] text-gray-700">Mulai Dari</span>
                    <span class="uppercase poppins-medium">Rp. 75.000</span>
                </div>
                <div class="mt-1 flex justify-center">
                    <a href="{{ route('event.tickets', 1) }}" type="button"
                        class="text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:ring-teal-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 focus:outline-none dark:focus:ring-teal-800">
                        Beli Sekarang
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
