@extends('layouts.user')

@section('content')
    <div class="grid grid-cols-12 gap-7">
        @include('components.carousel')
        <div class="col-span-5 flex flex-col gap-7 h-[500px]">
            @include('components.promotion-image', [
                'image' => 'imgs/gambar-4.jpg',
            ])
            @include('components.promotion-image', [
                'image' => 'imgs/gambar-5.jpg',
            ])
        </div>
    </div>

    <div class="mt-10">
        <h1 class="text-center text-3xl poppins-bold text-teal-700">Event</h1>

        <div class="grid grid-cols-4 gap-8 mt-10">
            <a href="{{ route('event', 1) }}"
                class="border border-teal-700 rounded-xl overflow-hidden shadow-md hover:-translate-y-1 duration-200">
                <img src="{{ asset('imgs/event-1.jpg') }}" class="object-cover w-full h-[220px]" alt="">
                <div class="p-4 flex flex-col gap-1 border-b border-teal-700">
                    <span class="text-xs text-gray-500 poppins-medium">24 September 2024</span>
                    <span class="uppercase poppins-semibold text-[15px] text-teal-700">Smarista Smart Festival x
                        FestaFest</span>
                    <div class="mt-1 flex items-center gap-1.5">
                        <i class="text-xs fa-regular fa-location-dot"></i>
                        <span class="text-xs poppins-medium">
                            {{ Str::limit(
                                'SMA NEGERI 1 TULUNGAGUNG | Jl. Fatahilah, Botoran, Tulungagung Regency, East Java, Indonesia',
                                40,
                                '...',
                            ) }}
                        </span>
                    </div>
                </div>
                <div class="p-3.5 flex items-center justify-between">
                    <span class="text-sm">
                        Mulai Dari
                    </span>
                    <span class="text-sm poppins-semibold text-teal-700">
                        Rp. 75.000
                    </span>
                </div>
            </a>
            <a href="{{ route('event', 1) }}"
                class="border border-teal-700 rounded-xl overflow-hidden shadow-md hover:-translate-y-1 duration-200">
                <img src="{{ asset('imgs/event-2.jpg') }}" class="object-cover w-full h-[220px]" alt="">
                <div class="p-4 flex flex-col gap-1 border-b border-teal-700">
                    <span class="text-xs text-gray-500 poppins-medium">24 September 2024</span>
                    <span class="uppercase poppins-semibold text-[15px] text-teal-700">The 13th Efestaphoria</span>
                    <div class="mt-1 flex items-center gap-1.5">
                        <i class="text-xs fa-regular fa-location-dot"></i>
                        <span class="text-xs poppins-medium">
                            {{ Str::limit('Surabaya, East Java, Indonesia', 40, '...') }}
                        </span>
                    </div>
                </div>
                <div class="p-3.5 flex items-center justify-between">
                    <span class="text-sm">
                        Mulai Dari
                    </span>
                    <span class="text-sm poppins-semibold text-teal-700">
                        Rp. 99.000
                    </span>
                </div>
            </a>
            <a href="{{ route('event', 1) }}"
                class="border border-teal-700 rounded-xl overflow-hidden shadow-md hover:-translate-y-1 duration-200">
                <img src="{{ asset('imgs/event-3.jpg') }}" class="object-cover w-full h-[220px]" alt="">
                <div class="p-4 flex flex-col gap-1 border-b border-teal-700">
                    <span class="text-xs text-gray-500 poppins-medium">24 September 2024</span>
                    <span class="uppercase poppins-semibold text-[15px] text-teal-700">Firehost</span>
                    <div class="mt-1 flex items-center gap-1.5">
                        <i class="text-xs fa-regular fa-location-dot"></i>
                        <span class="text-xs poppins-medium">
                            {{ Str::limit(
                                'Cornerstone Auditorium | Paskal Hyper Square, Jalan Pasir Kaliki, Arjuna, Bandung City, West Java, Indonesia',
                                40,
                                '...',
                            ) }}
                        </span>
                    </div>
                </div>
                <div class="p-3.5 flex items-center justify-between">
                    <span class="text-sm">
                        Mulai Dari
                    </span>
                    <span class="text-sm poppins-semibold text-teal-700">
                        Rp. 1.000.000
                    </span>
                </div>
            </a>
            <a href="{{ route('event', 1) }}"
                class="border border-teal-700 rounded-xl overflow-hidden shadow-md hover:-translate-y-1 duration-200">
                <img src="{{ asset('imgs/event-4.jpg') }}" class="object-cover w-full h-[220px]" alt="">
                <div class="p-4 flex flex-col gap-1 border-b border-teal-700">
                    <span class="text-xs text-gray-500 poppins-medium">24 September 2024</span>
                    <span class="uppercase poppins-semibold text-[15px] text-teal-700">SWASTAMITA 2024</span>
                    <div class="mt-1 flex items-center gap-1.5">
                        <i class="text-xs fa-regular fa-location-dot"></i>
                        <span class="text-xs poppins-medium">
                            {{ Str::limit(
                                'Cornerstone, Kota Bandung | Cornerstone Auditorium, Paskal Hyper Square, Jalan Pasir Kaliki, Kebon Jeruk, Bandung City, West Java, Indonesia',
                                40,
                                '...',
                            ) }}
                        </span>
                    </div>
                </div>
                <div class="p-3.5 flex items-center justify-between">
                    <span class="text-sm">
                        Mulai Dari
                    </span>
                    <span class="text-sm poppins-semibold text-teal-700">
                        Rp. 35.000
                    </span>
                </div>
            </a>
        </div>
    </div>
@endsection
