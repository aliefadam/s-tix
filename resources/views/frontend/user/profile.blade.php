@extends('layouts.user')

@section('content')
    <div class="flex justify-between">
        @include('components.breadcrumb', [
            'before' => [
                [
                    'url' => route('home'),
                    'name' => 'Beranda',
                ],
            ],
            'active' => 'Profil',
        ])
        <a href="{{ route('logout') }}"
            class="border {{ request()->is('profile') ? 'bg-red-700 text-white hover:bg-red-800' : 'border-red-700 text-red-700 hover:bg-red-700 hover:bg-opacity-10' }} duration-200 focus:ring-4 focus:ring-red-300 font-medium rounded-xl text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800 flex items-center gap-2">
            <i class="fa-regular fa-left-from-bracket"></i>
            Keluar
        </a>
    </div>

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
                    <i class="fa-regular fa-user"></i>
                    Edit Profil
                </button>
            </li>
            <li class="me-2" role="presentation">
                <button
                    class="flex justify-center items-center gap-2 p-4 border-b-2 w-full rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                    id="change-password-styled-tab" data-tabs-target="#styled-change-password" type="button" role="tab"
                    aria-controls="chane-password" aria-selected="false">
                    <i class="fa-regular fa-lock"></i>
                    Ganti Kata Sandi
                </button>
            </li>
        </ul>
    </div>
    <div id="default-styled-tab-content">
        <div class="hidden p-4 rounded-lg" id="styled-profile" role="tabpanel" aria-labelledby="profile-tab">
            <h1 class="text-center text-2xl poppins-semibold text-teal-700">Edit Profil</h1>
            <form action="" class="grid grid-cols-2 gap-5 mt-8">
                <div class="">
                    <div class="mb-5">
                        <label for="nama_lengkap" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Nama Lengkap
                        </label>
                        <input type="text" id="nama_lengkap"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                            required />
                    </div>
                    <div class="mb-5">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Email
                        </label>
                        <input type="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                            required />
                    </div>
                    <div class="mb-5">
                        <label for="tanggal_lahir"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                            Lahir</label>
                        <div class="grid grid-cols-3 gap-5">
                            <select id="countries"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                                <option selected>Tanggal</option>
                                @for ($i = 1; $i <= 31; $i++)
                                    <option>{{ $i }}</option>
                                @endfor
                            </select>
                            <select id="countries"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                                <option selected>Bulan</option>
                                @for ($i = 1; $i <= 12; $i++)
                                    <option>{{ $i }}</option>
                                @endfor
                            </select>
                            <select id="countries"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                                <option selected>Tahun</option>
                                @for ($i = date('Y'); $i >= date('Y') - 100; $i--)
                                    <option>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>

                    <div class="mb-5">
                        <label for="nama_lengkap" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Nomor Whatsapp
                        </label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <span class="text-gray-700 text-sm poppins-medium">+62</span>
                            </div>
                            <input type="number" id="simple-search"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full ps-10 p-2.5 pl-12 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500" />
                        </div>
                    </div>
                    <div class="mb-5">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                            Identitas</label>
                        <div class="flex">
                            <button id="dropdown-button" data-dropdown-toggle="dropdown"
                                class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600"
                                type="button">Pilih Identitas <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg></button>
                            <div id="dropdown"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                                    <li>
                                        <button type="button"
                                            class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">KTP</button>
                                    </li>
                                    <li>
                                        <button type="button"
                                            class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Passport</button>
                                    </li>
                                    <li>
                                        <button type="button"
                                            class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">SIM</button>
                                    </li>
                                </ul>
                            </div>
                            <div class="relative w-full">
                                <input type="search" id="search-dropdown"
                                    class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-teal-500"
                                    required />
                            </div>
                        </div>
                    </div>
                    <div class="mb-5">
                        <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                            Kelamin</label>
                        <div class="grid grid-cols-2 gap-5">
                            <div class="flex items-center ps-4 border border-gray-200 rounded-md dark:border-gray-700">
                                <input id="bordered-radio-1" type="radio" value="" name="bordered-radio"
                                    class="w-4 h-4 text-teal-600 bg-gray-100 border-gray-300 focus:ring-teal-500 dark:focus:ring-teal-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="bordered-radio-1"
                                    class="w-full py-2.5 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    Laki-laki
                                </label>
                            </div>
                            <div class="flex items-center ps-4 border border-gray-200 rounded-md dark:border-gray-700">
                                <input id="bordered-radio-2" type="radio" value="" name="bordered-radio"
                                    class="w-4 h-4 text-teal-600 bg-gray-100 border-gray-300 focus:ring-teal-500 dark:focus:ring-teal-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="bordered-radio-2"
                                    class="w-full py-2.5 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    Perempuan
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="mb-5">
                        <label for="pekerjaan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Pekerjaan
                        </label>
                        <input type="text" id="pekerjaan"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                            required />
                    </div>
                    <div class="mb-5">
                        <label for="tinggi_badan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Tinggi Badan
                        </label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 end-0 flex items-center pe-3 pointer-events-none">
                                <span class="text-gray-700 text-sm poppins-medium">CM</span>
                            </div>
                            <input type="number" id="tinggi_badan" name="tinggi_badan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500" />
                        </div>
                    </div>
                    <div class="mb-5">
                        <label for="berat_badan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Berat Badan
                        </label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 end-0 flex items-center pe-3 pointer-events-none">
                                <span class="text-gray-700 text-sm poppins-medium">KG</span>
                            </div>
                            <input type="number" id="berat_badan" name="berat_badan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500" />
                        </div>
                    </div>
                    <div class="mb-5">
                        <label for="countries"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Agama</label>
                        <select id="countries"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                            <option selected>Pilih Agama</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Budha">Budha</option>
                            <option value="Konghucu">Konghucu</option>
                        </select>
                    </div>
                    <div class="mb-5">
                        <label for="countries"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kebangsaan</label>
                        <select id="countries"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                            <option selected>Pilih Kebangsaan</option>
                            <option value="Indonesia">Indonesia</option>
                            <option value="Malaysia">Malaysia</option>
                            <option value="Singapura">Singapura</option>
                            <option value="Brunei">Brunei</option>
                            <option value="Filipina">Filipina</option>
                        </select>
                    </div>
                    <div class="mb-5">
                        <label for="countries"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Golongan Darah</label>
                        <select id="countries"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                            <option selected>Pilih Golongan Darah</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="AB">AB</option>
                            <option value="O">O</option>
                        </select>
                    </div>
                </div>
                <div class="flex justify-center items-center col-span-2">
                    <button type="submit"
                        class="text-white bg-teal-700 hover:bg-teal-800 focus:outline-none focus:ring-4 focus:ring-teal-300 font-medium rounded-full text-sm w-1/3 px-5 py-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
        <div class="hidden p-4 rounded-lg" id="styled-change-password" role="tabpanel"
            aria-labelledby="change-password-tab">
            <h1 class="text-center text-2xl poppins-semibold text-teal-700">Ganti Kata Sandi</h1>
            <form action="" class="w-1/2 mt-8 ms-auto me-auto">
                <div class="mb-5">
                    <label for="kata_sandi_lama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Kata Sandi Lama
                    </label>
                    <input type="password" id="kata_sandi_lama"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                        required />
                </div>
                <div class="mb-5">
                    <label for="kata_sandi_baru" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Kata Sandi Baru
                    </label>
                    <input type="password" id="kata_sandi_baru"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                        required />
                </div>
                <div class="mb-5">
                    <label for="konfirmasi_kata_sandi_baru"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Konfirmasi Kata Sandi Baru
                    </label>
                    <input type="password" id="konfirmasi_kata_sandi_baru"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                        required />
                </div>
                <div class="flex justify-center items-center mt-8 col-span-2">
                    <button type="submit"
                        class="text-white bg-teal-700 hover:bg-teal-800 focus:outline-none focus:ring-4 focus:ring-teal-300 font-medium rounded-full text-sm w-1/2 px-5 py-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800">
                        Ganti Kata Sandi
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
@endsection
