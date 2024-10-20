<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Platform Tiket Online">
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

    {{-- Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
</head>

<body class="bg-[#475569] bg-opacity-10">
    @include('components.sidebar-admin')
    @include('components.topbar-admin')
    <main class="ml-[250px] mt-[80px] w-[calc(100%-250px)] p-5">
        @yield('content')
    </main>
    @include('components.footer-admin')

    <script type="module" src="{{ asset('js/index.js') }}"></script>
    @yield('script')
</body>

</html>
