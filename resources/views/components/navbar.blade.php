<nav class="fixed top-0 z-20 w-full bg-white h-[80px] px-10 flex justify-between items-center shadow-md">
    <div class="flex gap-5 items-center">
        <a href="/" class="text-2xl poppins-black text-teal-700">S-TIX</a>
        <div class="flex w-[500px]">
            <div class="relative w-full">
                <input type="search" id="search"
                    class="block py-2.5 px-3 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-lg  border border-gray-300 focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-teal-500"
                    placeholder="Cari berdasarkan artis, acara atau nama tempat..." required />
                <button type="submit"
                    class="absolute top-0 end-0 py-2.5 px-3 text-sm font-medium h-full text-white bg-teal-700 rounded-e-lg border border-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800">
                    <i class="fa-regular fa-magnifying-glass"></i>
                </button>
            </div>
        </div>
    </div>
    @auth
        <div class="flex items-center gap-3">
            <a href=""
                class="border border-teal-700 text-teal-700 hover:bg-teal-700 hover:bg-opacity-10 duration-200 focus:ring-4 focus:ring-teal-300 font-medium rounded-xl text-sm px-5 py-2.5 dark:bg-teal-600 dark:hover:bg-teal-700 focus:outline-none dark:focus:ring-teal-800">
                Masuk
            </a>
            <a href=""
                class="text-white bg-teal-700 hover:bg-teal-800 duration-200 focus:ring-4 focus:ring-teal-300 font-medium rounded-xl text-sm px-5 py-2.5 dark:bg-teal-600 dark:hover:bg-teal-700 focus:outline-none dark:focus:ring-teal-800">
                Daftar
            </a>
        </div>
    @else
        <div class="flex items-center gap-3">
            <a href="{{ route('transaction') }}"
                class="border {{ request()->is('transaction') ? 'bg-teal-700 text-white hover:bg-teal-800' : 'border-teal-700 text-teal-700 hover:bg-teal-700 hover:bg-opacity-10' }} duration-200 focus:ring-4 focus:ring-teal-300 font-medium rounded-xl text-sm px-5 py-2.5 dark:bg-teal-600 dark:hover:bg-teal-700 focus:outline-none dark:focus:ring-teal-800 flex items-center gap-2">
                <i class="fa-regular fa-money-from-bracket"></i>
                Transaksi
            </a>
            <a href="{{ route('ticket') }}"
                class="border {{ request()->is('ticket') || request()->is('ticket/*') ? 'bg-teal-700 text-white hover:bg-teal-800' : 'border-teal-700 text-teal-700 hover:bg-teal-700 hover:bg-opacity-10' }} duration-200 focus:ring-4 focus:ring-teal-300 font-medium rounded-xl text-sm px-5 py-2.5 dark:bg-teal-600 dark:hover:bg-teal-700 focus:outline-none dark:focus:ring-teal-800 flex items-center gap-2">
                <i class="fa-regular fa-ticket"></i>
                Tiket
            </a>
            <a href="{{ route('profile') }}"
                class="border {{ request()->is('profile') ? 'bg-teal-700 text-white hover:bg-teal-800' : 'border-teal-700 text-teal-700 hover:bg-teal-700 hover:bg-opacity-10' }} duration-200 focus:ring-4 focus:ring-teal-300 font-medium rounded-xl text-sm px-5 py-2.5 dark:bg-teal-600 dark:hover:bg-teal-700 focus:outline-none dark:focus:ring-teal-800 flex items-center gap-2">
                <i class="fa-regular fa-user"></i>
                Profil
            </a>
        </div>
    @endauth
</nav>
