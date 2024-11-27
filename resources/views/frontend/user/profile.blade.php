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
            <i class="fa-regular fa-power-off"></i>
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
            <form action="{{ route('profile.update') }}" method="POST" class="grid grid-cols-2 w-[80%] mx-auto gap-5 mt-8">
                @csrf
                @method('PUT')
                <div class="">
                    <div class="mb-5">
                        <label for="nama_lengkap" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Nama Lengkap
                        </label>
                        <input type="text" id="nama_lengkap" name="nama_lengkap" value="{{ $profile->name }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500" />
                    </div>
                    <div class="mb-5">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Email
                        </label>
                        <input type="email" id="email" name="email" value="{{ $profile->email }}" disabled
                            class="cursor-not-allowed bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />
                    </div>
                    <div class="mb-5">
                        <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                            Lahir</label>
                        <div class="grid grid-cols-3 gap-5">
                            <select id="date" name="date"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                                <option>Tanggal</option>
                                @for ($i = 1; $i <= 31; $i++)
                                    <option @selected($i == getDatePart($profile->date_of_birth, 'day')) value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}">
                                        {{ str_pad($i, 2, '0', STR_PAD_LEFT) }}
                                    </option>
                                @endfor
                            </select>
                            <select id="month" name="month"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                                <option>Bulan</option>
                                @for ($i = 1; $i <= 12; $i++)
                                    <option @selected($i == getDatePart($profile->date_of_birth, 'month')) value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}">
                                        {{ str_pad($i, 2, '0', STR_PAD_LEFT) }}
                                    </option>
                                @endfor
                            </select>
                            <select id="year" name="year"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                                <option>Tahun</option>
                                @for ($i = date('Y'); $i >= date('Y') - 100; $i--)
                                    <option @selected($i == getDatePart($profile->date_of_birth, 'year')) value="{{ $i }}">{{ $i }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                    </div>

                    <div class="mb-5">
                        <label for="whatsapp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Nomor Whatsapp
                        </label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <span class="text-gray-700 text-sm poppins-semibold">+62</span>
                            </div>
                            <input type="number" id="whatsapp" name="whatsapp" value="{{ $profile->whatsapp }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full ps-11 p-2.5 pl-12 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500" />
                        </div>
                    </div>
                    <div class="mb-5">
                        <label for="identity_type"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                            Identitas</label>
                        <div class="flex">
                            <select id="identity_type" name="identity_type"
                                class="poppins-medium bg-gray-100 rounded-s-lg border border-gray-300 text-gray-900 text-sm focus:ring-teal-500 focus:border-teal-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                                <option selected>Pilih Identitas</option>
                                <option {{ $profile->identity_type == 'KTP' ? 'selected' : '' }} value="KTP">KTP
                                </option>
                                <option {{ $profile->identity_type == 'SIM' ? 'selected' : '' }} value="SIM">SIM
                                </option>
                                <option {{ $profile->identity_type == 'PASSPORT' ? 'selected' : '' }} value="PASSPORT">
                                    Passport
                                </option>
                            </select>
                            <input type="number" id="identity_number" name="identity_number"
                                value="{{ $profile->identity_number }}"
                                class="bg-gray-50 rounded-e-lg border border-gray-300 text-gray-900 text-sm focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500" />
                        </div>
                    </div>
                    <div class="mb-5">
                        <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                            Kelamin</label>
                        <div class="grid grid-cols-2 gap-5">
                            <div class="flex items-center ps-4 border border-gray-200 rounded-md dark:border-gray-700">
                                <input @checked($profile->gender == 'Laki-laki') id="laki-laki" type="radio" value="Laki-laki"
                                    name="gender"
                                    class="w-4 h-4 text-teal-600 bg-gray-100 border-gray-300 focus:ring-teal-500 dark:focus:ring-teal-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="laki-laki"
                                    class="w-full py-2.5 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    Laki-laki
                                </label>
                            </div>
                            <div class="flex items-center ps-4 border border-gray-200 rounded-md dark:border-gray-700">
                                <input @checked($profile->gender == 'Perempuan') id="perempuan" type="radio" value="Perempuan"
                                    name="gender"
                                    class="w-4 h-4 text-teal-600 bg-gray-100 border-gray-300 focus:ring-teal-500 dark:focus:ring-teal-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="perempuan"
                                    class="w-full py-2.5 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    Perempuan
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="mb-5">
                        <label for="works" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Pekerjaan
                        </label>
                        <input type="text" id="works" name="works" value="{{ $profile->works }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500" />
                    </div>
                    <div class="mb-5">
                        <label for="height" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Tinggi Badan
                        </label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 end-0 flex items-center pe-3 pointer-events-none">
                                <span class="text-gray-700 text-sm poppins-medium">CM</span>
                            </div>
                            <input type="number" id="height" name="height" value="{{ $profile->height }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500" />
                        </div>
                    </div>
                    <div class="mb-5">
                        <label for="weight" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Berat Badan
                        </label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 end-0 flex items-center pe-3 pointer-events-none">
                                <span class="text-gray-700 text-sm poppins-medium">KG</span>
                            </div>
                            <input type="number" id="weight" name="weight" value="{{ $profile->weight }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500" />
                        </div>
                    </div>
                    <div class="mb-5">
                        <label for="religion"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Agama</label>
                        <select id="religion" name="religion"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                            <option>Pilih Agama</option>
                            <option {{ $profile->religion == 'Islam' ? 'selected' : '' }} value="Islam">Islam</option>
                            <option {{ $profile->religion == 'Kristen' ? 'selected' : '' }} value="Kristen">Kristen
                            </option>
                            <option {{ $profile->religion == 'Hindu' ? 'selected' : '' }} value="Hindu">Hindu</option>
                            <option {{ $profile->religion == 'Budha' ? 'selected' : '' }} value="Budha">Budha</option>
                            <option {{ $profile->religion == 'Konghucu' ? 'selected' : '' }} value="Konghucu">Konghucu
                            </option>
                        </select>
                    </div>
                    <div class="mb-5">
                        <label for="region"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kebangsaan</label>
                        <select id="region" name="region"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                            <option selected>Pilih Kebangsaan</option>
                            <option {{ $profile->region == 'Indonesia' ? 'selected' : '' }} value="Indonesia">Indonesia
                            </option>
                            <option {{ $profile->region == 'Malaysia' ? 'selected' : '' }} value="Malaysia">Malaysia
                            </option>
                            <option {{ $profile->region == 'Singapura' ? 'selected' : '' }} value="Singapura">Singapura
                            </option>
                            <option {{ $profile->region == 'Brunei' ? 'selected' : '' }} value="Brunei">Brunei</option>
                            <option {{ $profile->region == 'Filipina' ? 'selected' : '' }} value="Filipina">Filipina
                            </option>
                        </select>
                    </div>
                    <div class="mb-5">
                        <label for="blood_type"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Golongan Darah</label>
                        <select id="blood_type" name="blood_type"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                            <option selected>Pilih Golongan Darah</option>
                            <option {{ $profile->blood_type == 'A' ? 'selected' : '' }} value="A">A</option>
                            <option {{ $profile->blood_type == 'B' ? 'selected' : '' }} value="B">B</option>
                            <option {{ $profile->blood_type == 'AB' ? 'selected' : '' }} value="AB">AB</option>
                            <option {{ $profile->blood_type == 'O' ? 'selected' : '' }} value="O">O</option>
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
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500" />
                </div>
                <div class="mb-5">
                    <label for="kata_sandi_baru" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Kata Sandi Baru
                    </label>
                    <input type="password" id="kata_sandi_baru"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500" />
                </div>
                <div class="mb-5">
                    <label for="konfirmasi_kata_sandi_baru"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Konfirmasi Kata Sandi Baru
                    </label>
                    <input type="password" id="konfirmasi_kata_sandi_baru"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500" />
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
