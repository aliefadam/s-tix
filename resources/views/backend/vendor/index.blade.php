@extends('layouts.admin')

@section('content')
    <div class="flex justify-between mt-3">
        @include('components.breadcrumb', [
            'active' => 'Vendor',
        ])
    </div>

    <div class="mt-5 bg-white shadow-md rounded-md overflow-hidden">
        <div class="relative">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400" id="dataTable">
                <thead class="text-xs text-teal-700 uppercase border-b border-t dark:text-teal-400">
                    <tr>
                        <th scope="col" class="px-6 py-5">
                            No
                        </th>
                        <th scope="col" class="px-6 py-5">
                            Nama Vendor
                        </th>
                        <th scope="col" class="px-6 py-5">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-5">
                            Kategori Service
                        </th>
                        <th scope="col" class="px-6 py-5">
                            Bergabung Pada
                        </th>
                        <th scope="col" class="px-6 py-5">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vendors as $vendor)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-5">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-6 py-5">
                                {{ $vendor->user->name }}
                            </td>
                            <td class="px-6 py-5">
                                {{ $vendor->user->email }}
                            </td>
                            <td class="px-6 py-5">
                                {{ $vendor->category }}
                            </td>
                            <td class="px-6 py-5">
                                {{ $vendor->created_at->translatedFormat('d F Y') }}
                            </td>
                            <td class="px-6 py-5">
                                <button class="w-[30px] py-1" data-dropdown-toggle="dropdown">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button>
                                <div id="dropdown"
                                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-32 dark:bg-gray-700">
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                        aria-labelledby="dropdownDefaultButton">
                                        <li>
                                            <a href="#"
                                                class="block px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                Detail
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.vendor.edit', $vendor->user->id) }}"
                                                class="block px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                Edit
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)" data-id="{{ $vendor->user->id }}"
                                                class="btn-delete block px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                Hapus
                                            </a>
                                            <form class="w-full delete-form-{{ $vendor->user->id }}"
                                                action="{{ route('admin.vendor.delete', $vendor->user->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('script')
    <script type="module">
        $(function() {
            $("<a>", {
                href: "{{ route('admin.vendor.create') }}",
                class: "border border-teal-700 text-teal-700 hover:bg-teal-800 hover:bg-opacity-20 focus:ring-4 focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-teal-600 dark:hover:bg-teal-700 focus:outline-none dark:focus:ring-teal-800 flex items-center duration-200",
                html: `<i class="fa-solid fa-plus mr-1.5"></i> Tambah Vendor`,
            }).appendTo(".dt-layout-row:first-child .dt-layout-cell.dt-layout-start");

            const confirmationDelete = (e) => {
                e.preventDefault();
                const id = e.currentTarget.getAttribute('data-id');

                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: 'Data yang di hapus tidak dapat dikembalikan',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus',
                    cancelButtonText: 'Batal',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(`.delete-form-${id}`).submit();
                    }
                })
            };
            $(".btn-delete").click(confirmationDelete)
        });
    </script>
@endsection
