<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Platform Tiket Online">
    <title>S-TIX - {{ $title }}</title>

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
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="">
    <div class="bg-[#475569] bg-opacity-10 w-full h-screen flex justify-center items-center">
        <main class="shadow-md w-[70%] grid grid-cols-2 rounded-md overflow-hidden">
            @yield('content')
        </main>
    </div>

    @if (session('notification'))
        @include('components.notification.sweetalert', [
            'notification' => session('notification'),
        ])
    @endif

    @if ($errors->any())
        @include('components.notification.toast', [
            'type' => 'error',
            'message' => $errors->all(),
        ])
    @endif

    @yield('script')
</body>

</html>
