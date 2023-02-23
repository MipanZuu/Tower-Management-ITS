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
 <div class="container w-full flex flex-wrap mx-auto lg:pt-4 pb-10">
        <!--Section container-->
        <section class="w-full">
            <!--Card-->
            <div id='section' class="p-8 mt-6 lg:mt-0 rounded-lg shadow-lg bg-white">
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
                <li class="flex items-center text-gray-500 dark:text-gray-400 space-x-2.5">
                    <span class="flex items-center justify-center w-8 h-8 border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
                        3
                    </span>
                    <span>
                        <h3 class="font-medium leading-tight">Detail Peminjaman</h3>
                        <p class="text-sm">Step details here<p>
                    </span>
                </li>
                <li class="flex items-center text-blue-600 dark:text-blue-500 space-x-2.5">
                    <span class="flex items-center justify-center w-8 h-8 border border-blue-600 rounded-full shrink-0 dark:border-blue-500">
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
                    <h1 class="font-bold text-3xl mb-4">Detail Kegiatan</h1>
                    <p class="text-gray-500">Keterangan kegiatan diperlukan untuk memastikan keaslian peminjaman. Nama Acara beserta waktu peminjaman akan ditampilkan di ruangan yang dipinjam, apabila peminjaman disetujui.</p>
                </div>
                <form action="{{route('postCreateStepFour')}}" method="POST">
                    @csrf
                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                            Organisasi yang Diwakilkan
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <select class="form-input block w-full focus:bg-white border border-gray-300 px-2 py-1" id="organization" name="organization">
                                <option value="">Default</option>
                                <option value="BEM">BEM</option>
                                <option value="Himpunan">Himpunan</option>
                                <option value="Pribadi">Pribadi</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                            @if($errors->has('organization'))
                                <div class="error py-2 text-sm text-red-600">{{ $errors->first('organization') }}</div>
                            @endif
                            <p class="py-2 text-sm text-gray-600">Pilih Organisasi yang Anda wakilkan.</p>
                        </div>
                    </div>

                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                            Nama Kegiatan
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input class="form-input block w-full focus:bg-white border border-gray-300 px-2 py-1" id="eventname" name="eventname" type="text" >
                            @if($errors->has('eventname'))
                                <div class="error py-2 text-sm text-red-600">{{ $errors->first('eventname') }}</div>
                            @endif
                            <p class="py-2 text-sm text-gray-600">Masukkan nama kegiatan Anda.</p>
                        </div>
                    </div>

                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                            Kategori Acara
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <select class="form-input block w-full focus:bg-white border border-gray-300 px-2 py-1" id="eventcategory" name="eventcategory">
                                <option value="">Default</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                            </select>
                            @if($errors->has('eventcategory'))
                                <div class="error py-2 text-sm text-red-600">{{ $errors->first('eventcategory') }}</div>
                            @endif
                            <p class="py-2 text-sm text-gray-600">Pilih kategori kegiatan Anda.</p>
                        </div>
                    </div>

                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                            Deskripsi Kegiatan
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input class="form-input block w-full focus:bg-white border border-gray-300 px-2 py-1" id="eventdescription" name="eventdescription" type="text">
                            @if($errors->has('eventdescription'))
                                <div class="error py-2 text-sm text-red-600">{{ $errors->first('eventdescription') }}</div>
                            @endif
                            <p class="py-2 text-sm text-gray-600">Deskripsikan kegiatan Anda.</p>
                        </div>
                    </div>

                    <div class="md:flex md:items-center">
                        <div class="md:w-1/3"></div>
                        <div class="md:w-2/3">
                            <button type="submit" class="shadow bg-green-700 hover:bg-green-900 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
                                Kirim
                            </button>
                        </div>
                    </div>
                </form>

            </div>
            <!--/Card-->

        </section>

      </div>
      <!--/container-->
@endsection