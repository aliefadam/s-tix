@extends('layouts.admin')

@section('content')
    <div class="flex justify-between mt-3">
        @include('components.breadcrumb', [
            'active' => $event->name,
            'before' => [
                [
                    'url' => route('admin.event.index'),
                    'name' => 'Event',
                ],
            ],
        ])
    </div>

    <form action="{{ route('admin.event.update', $event->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mt-5 grid grid-cols-12 gap-5">
            <div class="bg-white shadow-md rounded-md p-5 h-fit col-span-7">
                <h1 class="poppins-semibold text-lg">Informasi Umum</h1>
                <div class="mb-5 mt-5">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Nama Event
                    </label>
                    <input type="text" id="name" name="name" value="{{ $event->name }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500" />
                </div>
                <div class="mb-5">
                    <label for="tax" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Pajak (%)
                    </label>
                    <input type="number" id="tax" name="tax" value="{{ $event->tax }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500" />
                </div>
                <div class="mb-5">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Deskripsi
                    </label>
                    <textarea name="description" id="description">{!! $event->description !!}</textarea>
                </div>
                <div class="mb-5 flex gap-5">
                    <div class="flex-[1]">
                        <label for="start_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Waktu Mulai
                        </label>
                        <div class="flex items-center gap-3">
                            <input type="date" id="start_date" name="start_date"
                                value="{{ $event->start_date->format('Y-m-d') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500" />
                            <div class="relative">
                                <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                                    <i class="w-4 h-4 fa-solid fa-clock"></i>
                                </div>
                                <input type="time" id="start_time" name="start_time"
                                    value="{{ $event->start_time->format('H:i') }}"
                                    class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-bltealue-500 dark:focus:border-teal-500"
                                    value="00:00" required />
                            </div>
                        </div>
                    </div>
                    <div class="flex-[1]">
                        <label for="end_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Waktu Akhir
                        </label>
                        <div class="flex items-center gap-3">
                            <input type="date" id="end_date" name="end_date"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                                value="{{ $event->end_date->format('Y-m-d') }}" />
                            <div class="relative">
                                <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                                    <i class="w-4 h-4 fa-solid fa-clock"></i>
                                </div>
                                <input type="time" id="end_time" name="end_time"
                                    class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-bltealue-500 dark:focus:border-teal-500"
                                    value="{{ $event->end_time->format('H:i') }}" required />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-5">
                    <label for="tax" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Lokasi Event
                    </label>
                    <div class="flex flex-col gap-2">
                        <input type="text" id="building_name" name="building_name" value="{{ $event->building_name }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                            placeholder="Nama Tempat" />
                        <input type="text" id="address" name="address" value="{{ $event->address }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                            placeholder="Alamat" />
                    </div>
                    <div class="mt-3 mb-5 hidden" id="google-map">
                        <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Berikan titik pada peta
                        </label>
                        <input id="pac-input"
                            class="controls bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md shadow-md focus:ring-blue-500 focus:border-blue-500 block p-2.5 ml-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mt-2.5"
                            type="text" placeholder="Cari Lokasi" />
                        <input type="hidden" name="maps_link" id="maps-link" value="{{ $event->maps_link }}">
                        <div id="map" style="height: 300px;"></div>
                    </div>
                </div>
                <div class="flex justify-end">
                    <button type="submit"
                        class="text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-teal-600 dark:hover:bg-teal-700 focus:outline-none dark:focus:ring-teal-800">
                        Simpan
                    </button>
                </div>
            </div>
            <div class="bg-white shadow-md rounded-md p-5 h-fit col-span-5">
                <h1 class="poppins-semibold text-lg">Banner Event</h1>
                <div class="mb-5 mt-5">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Pilih Gambar | Gunakan Ratio 16:9
                    </label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        id="banner" name="banner" type="file">
                </div>
                <div class="flex flex-col gap-2">
                    <span class="text-sm poppins-medium">Preview Image</span>
                    <img src="{{ upload_asset($event->banner) }}" alt="Placeholder Image"
                        class="rounded-lg shadow-md w-full h-[259px] object-cover" id="banner-preview" />
                </div>
            </div>
        </div>
    </form>
@endsection

@section('rich-editor')
    <script type="module">
        import {
            ClassicEditor,
            Font,
            FontSize,
            Autoformat,
            Bold,
            Italic,
            Underline,
            BlockQuote,
            Base64UploadAdapter,
            CKFinder,
            CKFinderUploadAdapter,
            CloudServices,
            CKBox,
            Essentials,
            Heading,
            Image,
            ImageCaption,
            ImageResize,
            ImageStyle,
            ImageToolbar,
            ImageUpload,
            PictureEditing,
            Indent,
            IndentBlock,
            Link,
            List,
            MediaEmbed,
            Mention,
            Paragraph,
            PasteFromOffice,
            Table,
            TableColumnResize,
            TableToolbar,
            TextTransformation,
            Alignment,
            TableProperties,
            TableCellProperties
        } from 'ckeditor5';

        ClassicEditor
            .create(document.querySelector('#description'), {
                plugins: [
                    Essentials,
                    Bold,
                    Italic,
                    Font,
                    FontSize,
                    Paragraph,
                    List,
                    BlockQuote,
                    Bold,
                    CKFinder,
                    CKFinderUploadAdapter,
                    CloudServices,
                    Essentials,
                    Heading,
                    Image,
                    ImageCaption,
                    ImageResize,
                    ImageStyle,
                    ImageToolbar,
                    ImageUpload,
                    Base64UploadAdapter,
                    Indent,
                    IndentBlock,
                    Italic,
                    Link,
                    List,
                    Mention,
                    Paragraph,
                    PasteFromOffice,
                    PictureEditing,
                    Table,
                    TableColumnResize,
                    TableToolbar,
                    TextTransformation,
                    Underline,
                    Alignment,
                    TableProperties,
                    TableCellProperties
                ],
                toolbar: [
                    'undo',
                    'redo',
                    '|',
                    'heading',
                    '|',
                    'bold',
                    'italic',
                    'underline',
                    '|',
                    'link',
                    'bulletedList',
                    'numberedList',
                    '|',
                    'alignment:left',
                    'alignment:center',
                    'alignment:right',
                    'alignment:justify'

                ],
                heading: {
                    options: [{
                            model: 'paragraph',
                            title: 'Paragraph',
                            class: 'ck-heading_paragraph',
                        },
                        {
                            model: 'heading1',
                            view: 'h1',
                            title: 'Heading 1',
                            class: 'ck-heading_heading1',
                        },
                        {
                            model: 'heading2',
                            view: 'h2',
                            title: 'Heading 2',
                            class: 'ck-heading_heading2',
                        },
                        {
                            model: 'heading3',
                            view: 'h3',
                            title: 'Heading 3',
                            class: 'ck-heading_heading3',
                        },
                        {
                            model: 'heading4',
                            view: 'h4',
                            title: 'Heading 4',
                            class: 'ck-heading_heading4',
                        },
                    ],
                },
                image: {
                    resizeOptions: [{
                            name: 'resizeImage:original',
                            label: 'Default image width',
                            value: null,
                        },
                        {
                            name: 'resizeImage:50',
                            label: '50% page width',
                            value: '50',
                        },
                        {
                            name: 'resizeImage:75',
                            label: '75% page width',
                            value: '75',
                        },
                    ],
                    toolbar: [
                        'imageTextAlternative',
                        'toggleImageCaption',
                        '|',
                        'imageStyle:inline',
                        'imageStyle:wrapText',
                        'imageStyle:breakText',
                        '|',
                        'resizeImage',
                    ],
                },
                link: {
                    addTargetToExternalLinks: true,
                    defaultProtocol: 'https://',
                },
                table: {
                    contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells'],
                },
                alignment: {
                    options: ['left', 'center', 'right', 'justify']
                },
            })
            .then((editor) => {
                window.editor = editor;
            })
            .catch( /* ... */ );
    </script>
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
                mapTypeControl: false
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

            searchBox.addListener('places_changed', () => {
                const places = searchBox.getPlaces();
                if (places.length === 0) return;

                clearMarkers();

                const bounds = new google.maps.LatLngBounds();
                places.forEach((place) => {
                    if (!place.geometry || !place.geometry.location) {
                        console.log("Returned place contains no geometry");
                        return;
                    }

                    const marker = new google.maps.Marker({
                        map: map,
                        title: place.name,
                        position: place.geometry.location,
                    });

                    markers.push(marker);

                    if (place.geometry.viewport) {
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }

                    const placeId = places[0]?.place_id;
                    if (placeId) {
                        const mapsLink = `https://www.google.com/maps/place/?q=place_id:${placeId}`;
                        $("#maps-link").val(mapsLink);
                    }
                });
                map.fitBounds(bounds);
            });

            map.addListener('click', function(event) {
                const clickedLocation = event.latLng;
                const lat = clickedLocation.lat();
                const lng = clickedLocation.lng();

                const geocoder = new google.maps.Geocoder();
                geocoder.geocode({
                    location: {
                        lat,
                        lng
                    }
                }, function(results, status) {
                    if (status === 'OK' && results[0]) {
                        const mapsLink =
                            `https://www.google.com/maps/search/?api=1&query=${lat},${lng}`;
                        $("#maps-link").val(mapsLink);
                    }
                });

                placeMarker(clickedLocation);
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
        $("#banner").on("change", function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    const previewImage = $("#banner-preview");
                    previewImage.attr("src", event.target.result);
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
