<!-- Main modal -->
<div id="default-modal" tabindex="-1" aria-hidden="true"
    class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-screen max-h-full flex bg-black bg-opacity-50">
    <div class="animate__animated animate__pulse relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Pendaftaran Berhasil
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="default-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <p class="text-sm leading-relaxed text-gray-500 dark:text-gray-400">
                    Vendor Berhasil Didaftarkan, silahkan berikan kredensial berikut kepada vendor :
                </p>
                <div class="flex flex-col gap-2 shadow-md rounded-md p-3">
                    <div class="flex items-center gap-2">
                        <span class="w-[80px]">Email</span>
                        <span>:</span>
                        <span>{{ $email }}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="w-[80px]">Password</span>
                        <span>:</span>
                        <span>{{ $password }}</span>
                    </div>
                </div>
                <p class="text-sm leading-relaxed text-gray-500 dark:text-gray-400">
                    Anda juga dapat menginformasikan kepada vendor untuk memeriksa kredensial yang telah dikirimkan ke
                    email mereka. <span class="text-red-500 poppins-medium">Segera sarankan agar vendor mengganti kata
                        sandi demi keamanan</span>.
                </p>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="default-modal" type="button"
                    class="text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800">
                    Ok, Mengerti
                </button>
            </div>
        </div>
    </div>
</div>
