<nav
    class="fixed top-0 left-[250px] z-20 w-[calc(100%-250px)] bg-white h-[80px] px-5 flex justify-between items-center shadow-md">
    <div class="flex items-center gap-4 text-teal-700">
        <button
            class="border border-teal-700 px-3 py-1.5 rounded-md hover:bg-teal-700 hover:bg-opacity-20 duration-200 focus:ring-4 focus:ring-teal-300">
            <i class="fa-solid fa-bars text-xl"></i>
        </button>
        <h1 class="poppins-medium" id="live-clock">{{ today()->translatedFormat('l, d F Y') }} - {{ date('H:i:s') }}
        </h1>
    </div>
    <div class="">
        <button id="dropdownAvatarNameButton" data-dropdown-toggle="dropdownAvatarName"
            class="flex items-center text-sm pe-1 font-medium text-gray-900 rounded-full hover:text-gray-900 dark:hover:text-gray-900 md:me-0 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-white"
            type="button">
            <img class="w-8 h-8 me-2 rounded-full" src="{{ asset('imgs/av-2.svg') }}" alt="user photo">
            {{ auth()->user()->name }}
            <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 4 4 4-4" />
            </svg>
        </button>

        <div id="dropdownAvatarName"
            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
            <div class="px-4 py-3 text-sm flex flex-col gap-2 text-gray-900 dark:text-white">
                <div class="font-medium ">{{ auth()->user()->name }}</div>
                <div class="truncate">{{ auth()->user()->email }}</div>
            </div>
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                aria-labelledby="dropdownInformdropdownAvatarNameButtonationButton">
                <li>
                    <a href="#"
                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                </li>
                <li>
                    <a href="#"
                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Ganti
                        Password</a>
                </li>
            </ul>
            <div class="py-2">
                <a href="{{ route('logout') }}"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                    Keluar
                </a>
            </div>
        </div>
    </div>
</nav>
