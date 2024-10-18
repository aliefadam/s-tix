@extends('layouts.user')

@section('content')
    @include('components.breadcrumb', [
        'before' => [
            [
                'url' => route('home'),
                'name' => 'Beranda',
            ],
        ],
        'active' => 'Tiket',
    ])

    <div class="mt-10 min-h-[50vh]">
        <h1 class="text-center text-3xl poppins-bold text-teal-700">Tiket</h1>

        <div class="mb-4 mt-5 border-b border-gray-200 dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-styled-tab"
                data-tabs-toggle="#default-styled-tab-content"
                data-tabs-active-classes="text-teal-600 hover:text-teal-600 dark:text-teal-500 dark:hover:text-teal-500 border-teal-600 dark:border-teal-500"
                data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300"
                role="tablist">
                <li class="me-2" role="presentation">
                    <button class="flex justify-center items-center gap-2 p-4 border-b-2 w-full rounded-t-lg"
                        id="profile-styled-tab" data-tabs-target="#styled-profile" type="button" role="tab"
                        aria-controls="profile" aria-selected="false">
                        Event Mendatang
                    </button>
                </li>
                <li class="me-2" role="presentation">
                    <button
                        class="flex justify-center items-center gap-2 p-4 border-b-2 w-full rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                        id="change-password-styled-tab" data-tabs-target="#styled-change-password" type="button"
                        role="tab" aria-controls="chane-password" aria-selected="false">
                        Event Berlalu
                    </button>
                </li>
            </ul>
        </div>

        <div id="default-styled-tab-content">
            <div class="hidden py-4 rounded-lg" id="styled-profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="grid grid-cols-4 gap-5">
                    <div class="border border-teal-700 shadow-md rounded-md">
                        <div class="p-4 flex gap-4 border-b border-teal-700">
                            <div class="flex-[1]">
                                <img src="{{ asset('imgs/event-1.jpg') }}" class="rounded-md" alt="">
                            </div>
                            <div class="flex-[1]">
                                <h1 class="poppins-medium leading-[20px]">Smarista Smart Festival x FestaFest
                                </h1>
                                <p class="text-xs mt-1">20 September 2024</p>
                            </div>
                        </div>
                        <div class="p-4 flex items-center justify-between">
                            <div class="flex flex-col">
                                <span class="text-xs poppins-medium text-gray-600">Jumlah</span>
                                <span class="text-sm poppins-medium">1 Tiket</span>
                            </div>
                            <a href="{{ route('ticket.detail', 1) }}"
                                class="border poppins-medium border-teal-700 text-teal-700 bg-teal-700 bg-opacity-20 hover:bg-teal-700 hover:bg-opacity-30 focus:ring-4 focus:ring-teal-300 font-medium rounded-lg text-xs px-5 py-2.5 dark:bg-teal-600 dark:hover:bg-teal-700 focus:outline-none dark:focus:ring-teal-800 duration-200 text-center">
                                Lihat E-Tiket
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hidden py-4 rounded-lg" id="styled-change-password" role="tabpanel"
                aria-labelledby="change-password-tab">

            </div>
        </div>
    </div>
@endsection
