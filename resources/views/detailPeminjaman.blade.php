@extends('layouts.header')
@section('content')
<style>
        .max-h-64 {
            max-height: 16rem;
        }
        /*Quick overrides of the form input as using the CDN version*/
        .form-input,
        .form-textarea,
        .form-select,
        .form-multiselect {
            background-color: #edf2f7;
        }
    </style>

 <!-- <h1>Reservasi Ruangan</h1> -->
  <div class="container w-full flex flex-wrap mx-auto px-2 pt-8 lg:pt-4 mt-8 pb-10">
        <!--Section container-->
        <section class="w-full">
            <!--Card-->
            <div id='section' class="p-8 mt-6 lg:mt-0 rounded shadow-lg bg-white">
            <div class="mt-6 pb-10">
            <ol class="items-cente justify-center w-full space-y-4 sm:flex sm:space-x-8 sm:space-y-0">
            <li class="flex items-center text-gray-500 dark:text-gray-400 space-x-2.5">
                    <span class="flex items-center justify-center w-8 h-8 border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
                        1
                    </span>
                    <span>
                        <h3 class="font-medium leading-tight">Informasi Peminjaman</h3>
                        <p class="text-sm">Step details here<p>
                    </span>
                </li>
                <li class="flex items-center text-gray-500 dark:text-gray-400 space-x-2.5">
                    <span class="flex items-center justify-center w-8 h-8 border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
                        2
                    </span>
                    <span>
                        <h3 class="font-medium leading-tight">Informasi Penanggung Jawab</h3>
                        <p class="text-sm">Step details here<p>
                    </span>
                </li>
                <li class="flex items-center text-blue-600 dark:text-blue-500 space-x-2.5">
                    <span class="flex items-center justify-center w-8 h-8 border border-blue-600 rounded-full shrink-0 dark:border-blue-500">
                        3
                    </span>
                    <span>
                        <h3 class="font-medium leading-tight">Detail Peminjaman</h3>
                        <p class="text-sm">Step details here<p>
                    </span>
                </li>
                <li class="flex items-center text-gray-500 dark:text-gray-400 space-x-2.5">
                    <span class="flex items-center justify-center w-8 h-8 border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
                        4
                    </span>
                    <span>
                        <h3 class="font-medium leading-tight">Detail Kegiatan</h3>
                        <p class="text-sm">Step details here<p>
                    </span>
                </li>
            </ol>
            </div>
                <div class="pb-10">
                <h1 class="font-bold text-2xl">Detail Peminjaman</h1>
                <p class="text-gray-500">Ruangan yang akan dipinjam memiliki kapasitas dan fasilitas yang berbeda-beda. Teknisi yang bertanggung jawab terhadap ruangan dapat dilihat di halaman staff. Untuk melihat ketersediaan ruangan dapat dilihat di halaman ruangan</p>
                </div>
                <form>
                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                            Ruangan
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <select name="" class="form-input block w-full focus:bg-white border border-gray-300" id="my-select">
                                <option value="Default">Default</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                            </select>

                            <p class="py-2 text-sm text-gray-600">Pilih Ruangan yang akan Anda gunakan.</p>
                        </div>
                    </div>

                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                            Tanggal Peminjaman
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input class="form-input block w-full focus:bg-white border border-gray-300" id="my-textfield" type="date" value="">
                            <p class="py-2 text-sm text-gray-600">Pilih tanggal acara Anda (Format: MM-DD-YYYY).</p>
                        </div>
                    </div>

                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                            Waktu Mulai Peminjaman
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input class="form-input block w-full focus:bg-white border border-gray-300" id="my-textfield" type="text" value="">
                            <p class="py-2 text-sm text-gray-600">Masukkan waktu mulai peminjaman.</p>
                        </div>
                    </div>

                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                            Waktu Selesai Peminjaman
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input class="form-input block w-full focus:bg-white border border-gray-300" id="my-textfield" type="text" value="">
                            <p class="py-2 text-sm text-gray-600">Masukkan waktu selesai peminjaman.</p>
                        </div>
                    </div>

                    <div class="md:flex md:items-center">
                        <div class="md:w-1/3"></div>
                        <div class="md:w-2/3">
                            <a class="shadow bg-blue-900 hover:bg-blue-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" href="{{route('detailKegiatan')}}">
                                Selanjutnya
                            </a>
                        </div>
                    </div>
                </form>

            </div>
            <!--/Card-->

        </section>

      </div>
      <!--/container-->
@endsection