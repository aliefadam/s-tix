@extends('layouts.user')

@section('content')
    @include('components.breadcrumb', [
        'before' => [
            [
                'url' => route('home'),
                'name' => 'Beranda',
            ],
        ],
        'active' => $event->name,
    ])

    <div class="mt-8 grid grid-cols-12 gap-8 min-h-[80vh]">
        <div class="col-span-8 h-fit">
            <img src="{{ upload_asset($event->banner) }}" class="w-full h-[500px] object-cover" alt="">
            <div class="mt-5 border-b border-teal-700 pb-5">
                <h1 class="text-2xl poppins-semibold">Deskripsi</h1>
                <div class="ckeditor mt-2">
                    {!! $event->description !!}
                </div>
            </div>

            <div class="mt-5">
                <h1 class="text-2xl poppins-semibold">Lineup</h1>
                <div class="grid grid-cols-4 gap-5 mt-5">
                    @foreach ($event->talent as $talent)
                        <div class="border border-teal-700 rounded-lg shadow-sm overflow-hidden">
                            <img src="{{ upload_asset($talent->image) }}"
                                class="border-b border-teal-700 w-full h-[250px] object-cover" alt="">
                            <div class="p-5">
                                <h1 class="text-center text-teal-700 poppins-semibold">{{ $talent->name }}</h1>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-span-4 h-fit sticky top-[110px] bg-white border border-teal-700 shadow-md rounded-md">
            <h1 class="poppins-semibold text-teal-700 text-xl p-5 pb-0">{{ $event->name }}</h1>
            <div class="flex flex-col gap-4 poppins-medium p-5 pb-2">
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
            <div class="mt-3 flex flex-col gap-4 border-t border-teal-700 p-5">
                <div class="flex flex-col gap-1">
                    <span class="text-[14px] text-gray-700">Dibuat Oleh</span>
                    <span class="uppercase poppins-medium">{{ $event->vendor->user->name }}</span>
                </div>
                <div class="flex flex-col gap-1">
                    <span class="text-[14px] text-gray-700">Mulai Dari</span>
                    <span class="uppercase poppins-medium">{{ money_format($event->ticket()->min('price')) }}</span>
                </div>
                <div class="mt-1 flex justify-center">
                    <a href="{{ route('event.tickets', $event->slug) }}"
                        class="text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:ring-teal-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 focus:outline-none dark:focus:ring-teal-800">
                        Beli Sekarang
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
