@extends('layouts.user')

@section('content')
    @include('components.breadcrumb', [
        'before' => [
            [
                'url' => route('home'),
                'name' => 'Beranda',
            ],
            [
                'url' => route('event', $event->slug),
                'name' => $event->name,
            ],
            [
                'url' => route('event.tickets', $event->slug),
                'name' => 'Pilih Tiket',
            ],
        ],
        'active' => 'Data Diri',
    ])

    <form action="{{ route('event.pembayaran', $event->slug) }}" method="POST">
        @csrf
        <input type="hidden" name="jumlah_pembeli_ticket" value="{{ sizeof($data_ticket['tickets']) }}">
        <input type="hidden" name="sub_total" value="{{ $data_ticket['sub_total'] }}">
        <input type="hidden" name="tax" value="{{ $data_ticket['tax'] }}">
        <input type="hidden" name="tax_amount" value="{{ $data_ticket['tax_amount'] }}">
        <input type="hidden" name="total" value="{{ $data_ticket['total'] }}">

        <div class="mt-8 grid grid-cols-12 gap-8 min-h-[80vh]">
            <div class="col-span-8 h-fit flex flex-col gap-5">
                <div class="border border-teal-700 text-white rounded-md shadow-md overflow-hidden">
                    <div class="p-5 bg-gradient-to-r from-teal-400 to-teal-500">
                        <span class="text-center block">Detail Pembeli</span>
                    </div>
                    <div class="p-5 flex flex-col gap-4">
                        <div class="">
                            <label for="email-pembeli"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email" id="email-pembeli" name="email-pembeli"
                                value="{{ auth()->user()->email }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500" />
                            <span class="text-xs poppins-medium text-teal-700 mt-2 block">Email ini digunakan untuk mengirim
                                E-Ticket</span>
                        </div>
                        <div class="">
                            <label for="name-pembeli"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                            <input type="text" id="name-pembeli" name="name-pembeli" value="{{ auth()->user()->name }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500" />
                        </div>
                        <div class="">
                            <label for="date"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                Lahir</label>
                            <div class="grid grid-cols-3 gap-5">
                                <select id="date-pembeli" name="date-pembeli"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                                    <option selected>Tanggal</option>
                                    @for ($i = 1; $i <= 31; $i++)
                                        <option @selected($i == getDatePart($profile->date_of_birth, 'day'))
                                            value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}">
                                            {{ str_pad($i, 2, '0', STR_PAD_LEFT) }}
                                        </option>
                                    @endfor
                                </select>
                                <select id="month-pembeli" name="month-pembeli"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                                    <option selected>Bulan</option>
                                    @for ($i = 1; $i <= 12; $i++)
                                        <option @selected($i == getDatePart($profile->date_of_birth, 'month'))
                                            value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}">
                                            {{ str_pad($i, 2, '0', STR_PAD_LEFT) }}
                                        </option>
                                    @endfor
                                </select>
                                <select id="year-pembeli" name="year-pembeli"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                                    <option selected>Tahun</option>
                                    @for ($i = date('Y'); $i >= date('Y') - 100; $i--)
                                        <option @selected($i == getDatePart($profile->date_of_birth, 'year')) value="{{ $i }}">
                                            {{ $i }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="">
                            <label for="gender-pembeli"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                Kelamin</label>
                            <div class="grid grid-cols-2 gap-5">
                                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                    <input @checked($profile->gender == 'Laki-laki') id="gender-pembeli" type="radio" value="Laki-laki"
                                        name="gender-pembeli"
                                        class="w-4 h-4 text-teal-600 bg-gray-100 border-gray-300 focus:ring-teal-500 dark:focus:ring-teal-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="gender-pembeli"
                                        class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Laki-laki</label>
                                </div>
                                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                    <input @checked($profile->gender == 'Perempuan') id="gender-pembeli-2" type="radio"
                                        value="Perempuan" name="gender-pembeli"
                                        class="w-4 h-4 text-teal-600 bg-gray-100 border-gray-300 focus:ring-teal-500 dark:focus:ring-teal-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="gender-pembeli-2"
                                        class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Perempuan</label>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <label for="tipe_identitas-pembeli"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                                Identitas</label>
                            <div class="flex">
                                <select id="tipe-identitas-pembeli" name="tipe-identitas-pembeli"
                                    class="poppins-medium bg-gray-100 rounded-s-lg border border-gray-300 text-gray-900 text-sm focus:ring-teal-500 focus:border-teal-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                                    <option selected>Pilih Identitas</option>
                                    <option @selected($profile->identity_type == 'KTP') value="KTP">KTP</option>
                                    <option @selected($profile->identity_type == 'SIM') value="SIM">SIM</option>
                                    <option @selected($profile->identity_type == 'PASSPORT') value="PASSPORT">Passport</option>
                                </select>
                                <input type="number" id="nomor-identitas-pembeli" name="nomor-identitas-pembeli"
                                    value="{{ $profile->identity_number }}"
                                    class="bg-gray-50 rounded-e-lg border border-gray-300 text-gray-900 text-sm focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500" />
                            </div>
                        </div>
                    </div>
                </div>

                @foreach ($data_ticket['tickets'] as $ticket)
                    <div class="border border-teal-700 text-white rounded-md shadow-md overflow-hidden pengunjung">
                        <div class="p-5 flex justify-between items-center bg-gradient-to-r from-teal-400 to-teal-500">
                            <span class="text-center block">Detail Pengunjung {{ $loop->iteration }}</span>
                            <span class="text-center block">
                                <label class="inline-flex items-center cursor-pointer">
                                    <input type="checkbox" value="" class="sr-only peer samakan-data-pembeli">
                                    <div
                                        class="shadow-md relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-teal-300 dark:peer-focus:ring-teal-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:w-5 after:h-5 after:transition-all dark:border-gray-600 peer-checked:bg-teal-600">
                                    </div>
                                    <span class="ms-3 text-sm font-medium text-white dark:text-gray-300">Samakan dengan
                                        data
                                        pembeli</span>
                                </label>
                            </span>
                        </div>
                        <div class="p-5 flex flex-col gap-4">
                            <div
                                class="bg-gray-50 p-4 border border-teal-700 flex justify-between items-center rounded-md shadow-md">
                                <div class="flex flex-col">
                                    <h1 class="text-gray-500 text-sm poppins-medium">Kategori Tiket</h1>
                                    <span class="text-black poppins-medium mt-[3px]">{{ $ticket['name'] }}</span>
                                </div>
                                <div class="flex flex-col">
                                    <h1 class="text-gray-500 text-sm poppins-medium text-right">Harga</h1>
                                    <span
                                        class="text-black poppins-medium mt-[3px]">{{ money_format($ticket['price']) }}</span>
                                </div>
                                <input type="hidden" name="ticket_id[{{ $loop->iteration }}]"
                                    value="{{ $ticket['id'] }}">
                            </div>
                            <div class="">
                                <label for="email-pengunjung-{{ $loop->iteration }}"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                <input type="email" id="email-pengunjung-{{ $loop->iteration }}"
                                    name="email-pengunjung[{{ $loop->iteration }}]"
                                    class="email-pengunjung bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500" />
                            </div>
                            <div class="">
                                <label for="name-pengunjung-{{ $loop->iteration }}"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                <input type="text" id="name-pengunjung-{{ $loop->iteration }}"
                                    name="name-pengunjung[{{ $loop->iteration }}]"
                                    class="name-pengunjung bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500" />
                            </div>
                            <div class="">
                                <label for="date-pengunjung-{{ $loop->iteration }}"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                    Lahir</label>
                                <div class="grid grid-cols-3 gap-5">
                                    <select id="date-pengunjung-{{ $loop->iteration }}"
                                        name="date-pengunjung[{{ $loop->iteration }}]"
                                        class="date-pengunjung bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                                        <option selected>Tanggal</option>
                                        @for ($i = 1; $i <= 31; $i++)
                                            <option>{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
                                        @endfor
                                    </select>
                                    <select id="month-pengunjung-{{ $loop->iteration }}"
                                        name="month-pengunjung[{{ $loop->iteration }}]"
                                        class="month-pengunjung bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                                        <option selected>Bulan</option>
                                        @for ($i = 1; $i <= 12; $i++)
                                            <option>{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
                                        @endfor
                                    </select>
                                    <select id="year-pengunjung-{{ $loop->iteration }}"
                                        name="year-pengunjung[{{ $loop->iteration }}]"
                                        class="year-pengunjung bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                                        <option selected>Tahun</option>
                                        @for ($i = date('Y'); $i >= date('Y') - 100; $i--)
                                            <option>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="">
                                <label for="email"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                    Kelamin</label>
                                <div class="grid grid-cols-2 gap-5">
                                    <div
                                        class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                        <input id="jenis-kelamin-pengunjung-{{ $loop->iteration }}-1" type="radio"
                                            value="Laki-laki" name="jenis-kelamin-pengunjung[{{ $loop->iteration }}]"
                                            class="jenis-kelamin-pengunjung w-4 h-4 text-teal-600 bg-gray-100 border-gray-300 focus:ring-teal-500 dark:focus:ring-teal-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="jenis-kelamin-pengunjung-{{ $loop->iteration }}-1"
                                            class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Laki-laki</label>
                                    </div>
                                    <div
                                        class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                        <input id="jenis-kelamin-pengunjung-{{ $loop->iteration }}-2" type="radio"
                                            value="Perempuan" name="jenis-kelamin-pengunjung[{{ $loop->iteration }}]"
                                            class="jenis-kelamin-pengunjung w-4 h-4 text-teal-600 bg-gray-100 border-gray-300 focus:ring-teal-500 dark:focus:ring-teal-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="jenis-kelamin-pengunjung-{{ $loop->iteration }}-2"
                                            class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Perempuan</label>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <label for="tipe-identitas-pengunjung-{{ $loop->iteration }}"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                                    Identitas</label>
                                <div class="flex">
                                    <select id="tipe-identitas-pengunjung-{{ $loop->iteration }}"
                                        name="tipe-identitas-pengunjung[{{ $loop->iteration }}]"
                                        class="tipe-identitas-pengunjung poppins-medium bg-gray-100 rounded-s-lg border border-gray-300 text-gray-900 text-sm focus:ring-teal-500 focus:border-teal-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                                        <option selected>Pilih Identitas</option>
                                        <option value="KTP">KTP</option>
                                        <option value="SIM">SIM</option>
                                        <option value="PASSPORT">PASSPORT</option>
                                    </select>
                                    <input type="text" id="nomor-identitas-pengunjung-{{ $loop->iteration }}"
                                        name="nomor-identitas-pengunjung[{{ $loop->iteration }}]"
                                        class="nomor-identitas-pengunjung bg-gray-50 rounded-e-lg border border-gray-300 text-gray-900 text-sm focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500" />
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-span-4 h-fit sticky top-[110px] bg-white border border-teal-700 shadow-md rounded-md">
                <h1 class="poppins-semibold text-teal-700 text-xl p-5 pb-0">Detail Pesanan</h1>
                <div class="p-5 pb-0">
                    <img src="{{ asset('imgs/event-1.jpg') }}" class="rounded-md" alt="">
                    <div class="mt-3">
                        <span class="text-lg poppins-medium">{{ $event->name }}</span>
                    </div>
                </div>
                <div class="flex flex-col gap-4 poppins-medium p-5 border-b border-teal-700">
                    <div class="flex items-center gap-2">
                        <i class="fa-regular fa-calendar flex justify-center w-[30px]"></i>
                        <span class="text-[14px]">{{ $event->start_date->translatedFormat('l, d F Y') }}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fa-regular fa-clock flex justify-center w-[30px]"></i>
                        <span class="text-[14px]">{{ $event->start_time->format('H:i') }} WIB</span>
                    </div>
                    <div class="flex gap-2">
                        <i class="fa-regular fa-location-dot flex justify-center w-[50px]"></i>
                        <div class="flex flex-col gap-1">
                            <span class="text-[14px] leading-[17px]">
                                {{ $event->building_name }} | {{ $event->address }}
                            </span>
                            <a target="_blank" href="{{ $event->maps_link }}" class="text-sm text-teal-700">Buka di
                                Google
                                Maps</a>
                        </div>
                    </div>
                </div>
                <div class="p-4 flex justify-between border-b border-teal-700">
                    <span class="text-sm">{{ sizeof($data_ticket['tickets']) }} Tiket Dipesan</span>
                    <span class="text-sm poppins-semibold">{{ money_format($data_ticket['sub_total']) }}</span>
                </div>
                <div class="p-4 flex justify-between border-b border-teal-700">
                    <span class="text-sm">Subtotal</span>
                    <span class="text-sm poppins-semibold">{{ money_format($data_ticket['sub_total']) }}</span>
                </div>
                <div class="p-4 flex justify-between border-b border-teal-700">
                    <span class="text-sm">Pajak</span>
                    <span class="text-sm poppins-semibold">{{ $data_ticket['tax'] }}%
                        ({{ money_format($data_ticket['tax_amount']) }})</span>
                </div>
                <div class="p-4 flex justify-between border-b border-teal-700">
                    <span class="text-base">Total</span>
                    <span class="text-sm poppins-semibold">{{ money_format($data_ticket['total']) }}</span>
                </div>
                <div class="p-4 flex flex-col gap-5">
                    <div class="flex items-center rounded-md justify-between text-teal-700 bg-opacity-80 text-sm">
                        <span>Punya Kode Promo?</span>
                        <button>Tambahkan</button>
                    </div>
                    <button type="submit"
                        class="text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 w-full text-center dark:bg-teal-600 dark:hover:bg-teal-700 focus:outline-none dark:focus:ring-teal-800">
                        Pilih Metode Pembayaran
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('script')
    <script type="module">
        $(".samakan-data-pembeli").change(function() {
            samakanDataPembeli($(this));
        });

        function samakanDataPembeli(self) {
            const emailPembeli = $("#email-pembeli").val();
            const namaPembeli = $("#name-pembeli").val();
            const tanggalLahirPembeli = {
                date: $("#date-pembeli").val(),
                month: $("#month-pembeli").val(),
                year: $("#year-pembeli").val()
            };
            const jenisKelaminPembeli = $("input[name='gender-pembeli']:checked").val();
            const nomorIdentitas = {
                type: $("#tipe-identitas-pembeli").val(),
                value: $("#nomor-identitas-pembeli").val()
            }

            if (self.is(":checked")) {
                self.closest(".pengunjung").find(".email-pengunjung").val(emailPembeli);
                self.closest(".pengunjung").find(".name-pengunjung").val(namaPembeli);
                self.closest(".pengunjung").find(".date-pengunjung").val(tanggalLahirPembeli.date);
                self.closest(".pengunjung").find(".month-pengunjung").val(tanggalLahirPembeli.month);
                self.closest(".pengunjung").find(".year-pengunjung").val(tanggalLahirPembeli.year);
                if (jenisKelaminPembeli != undefined) {
                    self.closest(".pengunjung")
                        .find(
                            `.jenis-kelamin-pengunjung[value='${jenisKelaminPembeli === "Laki-laki" ? "Laki-laki" : "Perempuan"}']`
                        )
                        .prop("checked", true);
                }
                self.closest(".pengunjung").find(".tipe-identitas-pengunjung").val(nomorIdentitas.type);
                self.closest(".pengunjung").find(".nomor-identitas-pengunjung").val(nomorIdentitas.value);
            } else {
                self.closest(".pengunjung").find(".email-pengunjung").val("");
                self.closest(".pengunjung").find(".name-pengunjung").val("");
                self.closest(".pengunjung").find(".date-pengunjung").val("Tanggal");
                self.closest(".pengunjung").find(".month-pengunjung").val("Bulan");
                self.closest(".pengunjung").find(".year-pengunjung").val("Tahun");
                self.closest(".pengunjung")
                    .find(
                        `.jenis-kelamin-pengunjung[value='${jenisKelaminPembeli === "Laki-laki" ? "Laki-laki" : "Perempuan"}']`
                    )
                    .prop("checked", false);
                self.closest(".pengunjung").find(".tipe-identitas-pengunjung").val("Pilih Identitas");
                self.closest(".pengunjung").find(".nomor-identitas-pengunjung").val("");
            }
        }
    </script>
@endsection
