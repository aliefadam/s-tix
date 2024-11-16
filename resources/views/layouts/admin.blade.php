<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Platform Tiket Online">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>S-TIX Admin - {{ $title }}</title>

    {{-- Common CSS --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    {{-- Poppins --}}
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.6.0/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.6.0/css/sharp-duotone-solid.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.6.0/css/sharp-thin.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.6.0/css/sharp-solid.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.6.0/css/sharp-regular.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.6.0/css/sharp-light.css">

    {{-- CKEDITOR --}}
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/42.0.1/ckeditor5.css" />
    <script type="importmap">
        {
            "imports": {
                "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/42.0.1/ckeditor5.js",
                "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/42.0.1/"
            }
        }
    </script>
    @yield('rich-editor')

    {{-- Maps --}}
    <script async src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places">
    </script>

    {{-- Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#475569] bg-opacity-10">
    @include('components.sidebar-admin')
    @include('components.topbar-admin')
    <main class="ml-[250px] mt-[80px] w-[calc(100%-250px)] p-5 pb-24">
        @yield('content')
    </main>
    @include('components.footer-admin')

    @if ($errors->any())
        @include('components.notification.toast', [
            'type' => 'error',
            'message' => $errors->all(),
        ])
    @endif

    @if (session('notification'))
        @include('components.notification.sweetalert', [
            'notification' => session('notification'),
        ])
    @endif

    <script type="module" src="{{ asset('js/index.js') }}"></script>
    @yield('script')
</body>

</html>
