@extends('layouts.admin')

@section('content')
    <div class="flex justify-between mt-3">
        @include('components.breadcrumb', [
            'active' => 'Detail Event: ' . $event->name,
            'before' => [
                [
                    'url' => route('admin.event.index'),
                    'name' => 'Event',
                ],
            ],
        ])
    </div>

    <div class="mt-5 grid grid-cols-12 gap-5">
        <div class="h-fit col-span-7 flex flex-col gap-5">
            <div class="bg-white shadow-md rounded-md">
                <div class="flex flex-col p-5 border-b">
                    <h1 class="text-xl poppins-semibold">{{ $event->name }}</h1>
                    <span class="text-sm">by {{ auth()->user()->name }}</span>
                </div>
                <div class="p-5">
                    <div class="">
                        <img class="rounded-md" src="{{ upload_asset($event->banner) }}">
                    </div>
                    <div class="mt-3 ckeditor">
                        {!! $event->description !!}
                    </div>
                </div>
            </div>
            <div class="bg-white shadow-md rounded-md">
                <div class="grid grid-cols-2 gap-5 p-5 border-b">
                    <div class="flex flex-col gap-1.5">
                        <h1 class="flex items-center"><i class="fa-solid fa-circle mr-1.5 text-xs text-green-700"></i> Mulai
                        </h1>
                        <span class="text-sm">
                            {{ $event->start_date->translatedFormat('l, d F Y') }}
                            |
                            {{ $event->start_time->format('h:i') }}
                        </span>
                    </div>
                    <div class="flex flex-col gap-1.5">
                        <h1 class="flex items-center"><i class="fa-solid fa-circle mr-1.5 text-xs text-red-700"></i>
                            Selesai
                        </h1>
                        <span class="text-sm">
                            {{ $event->end_date->translatedFormat('l, d F Y') }}
                            |
                            {{ $event->end_time->format('h:i') }}
                        </span>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-5 p-5 border-b">
                    <div class="">
                        <h1 class="poppins-medium text-lg">Lokasi</h1>
                        <div class="mt-5 flex gap-1 items-center">
                            <p>{{ $event->building_name }}</p>
                            |
                            <p>{{ $event->address }}</p>
                        </div>
                        <a target="_blank" href="{{ $event->maps_link }}"
                            class="mt-2 block text-sm text-blue-500 hover:text-blue-600">
                            Buka di Google Maps
                        </a>
                    </div>
                    <div class="">
                        <div id="map" class="border h-[250px]"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="h-fit col-span-5 flex flex-col gap-5">
            <div class="p-5 bg-white shadow-md rounded-md">
                <div class="flex justify-between items-center">
                    <h1 class="text-lg poppins-semibold">Kategori Tiket</h1>
                    <button data-modal-target="add-ticket-modal" data-modal-toggle="add-ticket-modal"
                        class="bg-teal-700 shadow-sm text-white size-10 rounded-full focus:ring-4 focus:ring-teal-300 hover:bg-teal-800 duration-200">
                        <i class="fa-solid fa-plus"></i>
                    </button>
                </div>
                <div class="mt-5 flex flex-col gap-6">
                    @foreach ($tickets as $ticket)
                        <div class="border rounded-md px-5 py-3 relative overflow-hiddens">
                            <div class="absolute rounded-s-md top-0 left-0 bottom-0 w-[5px] bg-red-700"></div>
                            <div class="absolute -top-[15px] left-0 flex justify-center w-full gap-2">
                                <button data-ticket-id="{{ $ticket->id }}" data-modal-target="edit-ticket-modal"
                                    data-modal-toggle="edit-ticket-modal"
                                    class="btn-edit-ticket border border-yellow-600 text-yellow-600 hover:bg-yellow-600 hover:text-white duration-200 bg-white rounded-md p-2">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </button>
                                <button data-ticket-id="{{ $ticket->id }}"
                                    class="btn-delete-ticket border border-red-600 text-red-600 hover:bg-red-600 hover:text-white duration-200 bg-white rounded-md p-2">
                                    <i class="fa-regular fa-trash"></i>
                                </button>
                            </div>
                            <div class="flex justify-between items-center">
                                <div class="flex flex-col">
                                    <h1 class="text-sm text-gray-600">{{ $ticket->name }}</h1>
                                    <span class="text-sm poppins-medium">{{ money_format($ticket->price) }}</span>
                                </div>
                                <div class="flex flex-col">
                                    <h1 class="text-sm text-right text-gray-600">Target</h1>
                                    <span class="text-sm text-right poppins-medium">
                                        <span class="text-gray-600">{{ $ticket->sold }}</span>
                                        /
                                        <span>{{ $ticket->target }}</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="p-5 bg-white shadow-md rounded-md">
                <div class="flex justify-between items-center">
                    <h1 class="text-lg poppins-semibold">Talents</h1>
                    <button data-modal-target="add-talent-modal" data-modal-toggle="add-talent-modal"
                        class="bg-teal-700 shadow-sm text-white size-10 rounded-full focus:ring-4 focus:ring-teal-300 hover:bg-teal-800 duration-200">
                        <i class="fa-solid fa-plus"></i>
                    </button>
                </div>
                <div class="mt-5 flex flex-col gap-6">
                    <div class="border rounded-md px-5 py-3 relative overflow-hiddens">
                        <div class="flex justify-between items-center">
                            <div class="flex items-center gap-3">
                                <img class="w-[50px] h-[50px] rounded-full object-cover"
                                    src="{{ static_asset('lineup-1.jpg') }}" alt="">
                                <span class="text-sm poppins-medium">Meiska</span>
                            </div>
                            <div class="flex justify-center gap-2">
                                <button
                                    class="border border-yellow-600 text-yellow-600 hover:bg-yellow-600 hover:text-white duration-200 bg-white rounded-md p-2">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </button>
                                <button
                                    class="border border-red-600 text-red-600 hover:bg-red-600 hover:text-white duration-200 bg-white rounded-md p-2">
                                    <i class="fa-regular fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Add Ticket Modal --}}
    <div id="add-ticket-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Tambah Kategori Tiket
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="add-ticket-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <form action="{{ route('admin.ticket.store', $event->id) }}" method="POST">
                    @csrf
                    <!-- Modal body -->
                    <div class="p-4 md:p-5">
                        <div class="mb-5">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Nama Kategori
                            </label>
                            <input type="text" id="name" name="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        </div>
                        <div class="mb-5">
                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Harga
                            </label>
                            <input type="number" id="price" name="price"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        </div>
                        <div class="">
                            <label for="target" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Target Penjualan
                            </label>
                            <input type="number" id="target" name="target"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button type="submit"
                            class="text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800">
                            Tambah
                        </button>
                        <button data-modal-hide="add-ticket-modal" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-red-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                            Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Edit Ticket Modal --}}
    <div id="edit-ticket-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Edit Kategori Tiket
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="edit-ticket-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <form action="" id="form-edit-ticket" method="POST">
                    @csrf
                    @method('PUT')
                    <!-- Modal body -->
                    <div id="loading-indicator-edit" class="flex justify-center items-center h-[200px]">
                        @include('components.loading-indicator')
                    </div>
                    <div id="show-after-loading-indicator-edit" class="hidden">
                        <div class="p-4 md:p-5">
                            <div class="mb-5">
                                <label for="name-edit-ticket"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Nama Kategori
                                </label>
                                <input type="text" id="name-edit-ticket" name="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                            </div>
                            <div class="mb-5">
                                <label for="price-edit-ticket"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Harga
                                </label>
                                <input type="number" id="price-edit-ticket" name="price"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                            </div>
                            <div class="">
                                <label for="target-edit-ticket"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Target Penjualan
                                </label>
                                <input type="number" id="target-edit-ticket" name="target"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                            </div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button type="submit"
                            class="text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800">
                            Simpan
                        </button>
                        <button data-modal-hide="edit-ticket-modal" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-red-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                            Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Add Talent Modal --}}
    <div id="add-talent-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Tambah Talent
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="add-talent-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <form action="" method="POST">
                    @csrf
                    <!-- Modal body -->
                    <div class="p-4 md:p-5">
                        <div class="mb-5">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Nama Talent
                            </label>
                            <input type="text" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                        </div>
                        <div class="">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="image">Foto Talent | Gunakan Ukuran 1:1</label>
                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                id="image" type="file">
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button type="submit"
                            class="text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800">
                            Tambah
                        </button>
                        <button data-modal-hide="add-talent-modal" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-red-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                            Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="module">
        let map;
        let markers = [];
        let searchBox;
        const urlMapFromDatabase = "{{ $event->maps_link }}";

        async function initMap() {
            const defaultLocation = {
                lat: -6.200000,
                lng: 106.816666
            }; // Lokasi default: Jakarta, Indonesia

            const center = await getCoordinatesFromUrl(urlMapFromDatabase) || defaultLocation;

            const {
                Map
            } = await google.maps.importLibrary("maps");
            map = new Map(document.getElementById("map"), {
                center: center,
                zoom: 12,
            });

            const input = document.getElementById("pac-input");
            const {
                SearchBox
            } = await google.maps.importLibrary("places");
            searchBox = new SearchBox(input);

            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
            $("#google-map").removeClass("hidden");

            map.addListener('bounds_changed', () => {
                searchBox.setBounds(map.getBounds());
            });

            if (center !== defaultLocation) {
                placeMarker(center);
            }
        }

        async function getCoordinatesFromUrl(url) {
            if (!url) return null;

            const placeIdMatch = url.match(/place_id:([^&]+)/);
            if (placeIdMatch) {
                const placeId = placeIdMatch[1];
                return getCoordinatesFromPlaceId(placeId);
            }

            const latLngMatch = url.match(/query=(-?\d+\.\d+),(-?\d+\.\d+)/);
            if (latLngMatch) {
                return {
                    lat: parseFloat(latLngMatch[1]),
                    lng: parseFloat(latLngMatch[2])
                };
            }

            return null;
        }

        async function getCoordinatesFromPlaceId(placeId) {
            const geocoder = new google.maps.Geocoder();
            return new Promise((resolve) => {
                geocoder.geocode({
                    placeId: placeId
                }, function(results, status) {
                    if (status === 'OK' && results[0].geometry.location) {
                        resolve({
                            lat: results[0].geometry.location.lat(),
                            lng: results[0].geometry.location.lng()
                        });
                    } else {
                        resolve(null);
                    }
                });
            });
        }

        function placeMarker(location) {
            clearMarkers();

            const marker = new google.maps.Marker({
                position: location,
                map: map
            });
            markers.push(marker);
        }

        function clearMarkers() {
            for (let i = 0; i < markers.length; i++) {
                markers[i].setMap(null);
            }
            markers = [];
        }

        initMap();
    </script>

    <script type="module">
        $(".btn-edit-ticket").click(showEditTicketModal);
        $(".btn-delete-ticket").click(deleteTicket);

        function showEditTicketModal() {
            const ticketID = $(this).data("ticket-id");
            $.ajax({
                type: "GET",
                url: `/admin/ticket/${ticketID}`,
                beforeSend: function() {
                    $("#loading-indicator-edit").removeClass("hidden");
                    $("#show-after-loading-indicator-edit").addClass("hidden");
                },
                success: function(response) {
                    $("#loading-indicator-edit").addClass("hidden");
                    $("#show-after-loading-indicator-edit").removeClass("hidden");
                    const {
                        id,
                        name,
                        price,
                        sold,
                        target
                    } = response.ticket;
                    $("#name-edit-ticket").val(name);
                    $("#price-edit-ticket").val(price);
                    $("#target-edit-ticket").val(target);
                    $("#form-edit-ticket").attr("action", `/admin/ticket/${id}`);
                }
            });
        }

        function deleteTicket() {
            const ticketID = $(this).data("ticket-id");
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Anda tidak bisa mengembalikan tiket ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus tiket ini!',
                cancelButtonText: 'Batal',
                showLoaderOnConfirm: true,
                preConfirm: () => {
                    return $.ajax({
                        url: `/admin/ticket/${ticketID}`,
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    })
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.reload();
                }
            });
        }
    </script>
@endsection
