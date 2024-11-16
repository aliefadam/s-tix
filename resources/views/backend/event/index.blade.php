@extends('layouts.admin')

@section('content')
    <div class="flex justify-between mt-3">
        @include('components.breadcrumb', [
            'active' => 'Event',
        ])
        <a href="{{ route('admin.event.create') }}"
            class="text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-teal-600 dark:hover:bg-teal-700 focus:outline-none dark:focus:ring-blue-800">
            <i class="fa-solid fa-plus mr-1.5"></i> Tambah Event
        </a>
    </div>

    <div class="mt-5">
        <div class="grid grid-cols-3 gap-5">
            @foreach ($events as $event)
                <div class="border border-teal-700 rounded-xl overflow-hidden shadow-md">
                    <img src="{{ upload_asset($event->banner) }}" class="object-cover w-full h-[220px]" alt="">
                    <div class="p-4 flex flex-col gap-1 border-b border-teal-700 bg-white">
                        <span class="text-xs text-gray-500 poppins-medium">{{ $event->start_date->format('d F Y') }}</span>
                        <span class="uppercase poppins-semibold text-[15px] text-teal-700">{{ $event->name }}</span>
                        <div class="mt-1 flex items-center gap-1.5">
                            <i class="text-xs fa-regular fa-location-dot"></i>
                            <span class="text-xs poppins-medium">
                                {{ Str::limit($event->building_name . ' | ' . $event->address, 40, '...') }}
                            </span>
                        </div>
                    </div>
                    <div class="p-3.5 grid grid-cols-3 gap-3 items-center bg-white">
                        <a href="{{ route('admin.event.show', $event->id) }}"
                            class="flex justify-center items-center gap-1 text-yellow-600 hover:text-yellow-700 duration-200">
                            <i class="fa-regular fa-pen-to-square"></i>
                            <span class="text-xs poppins-medium">Edit</span>
                        </a>
                        <a href="{{ route('admin.event.detail', $event->id) }}"
                            class="flex justify-center items-center gap-1 text-blue-600 hover:text-blue-700 duration-200">
                            <i class="fa-regular fa-circle-info"></i>
                            <span class="text-xs poppins-medium">Detail</span>
                        </a>
                        <a href=""
                            class="flex justify-center items-center gap-1 text-red-600 hover:text-red-700 duration-200">
                            <i class="fa-regular fa-trash"></i>
                            <span class="text-xs poppins-medium">Hapus</span>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
