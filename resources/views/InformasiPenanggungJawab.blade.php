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
                <li class="flex items-center text-blue-600 dark:text-blue-500 space-x-2.5">
                    <span class="flex items-center justify-center w-8 h-8 border border-blue-600 rounded-full shrink-0 dark:border-blue-500">
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
                    <h1 class="font-bold text-3xl mb-4">Informasi Penanggung Jawab</h1>
                    <p class="text-gray-500">Informasi Penanggung Jawab Utama dan Sekunder dibutuhkan untuk disertakan secara otomatis dalam Surat Ijin Peminjaman.</p>
                </div>
                <form action="{{ route('postCreateStepTwo') }}" method="POST">
                    @csrf
                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                            Jabatan Penanggung Jawab Utama
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input class="form-input block w-full focus:bg-white border border-gray-300 px-2 py-1" id="mainpicposition" name="mainpicposition" type="text" value="">
                            <p class="py-2 text-sm text-gray-600">Masukkan jabatan Penanggung Jawab Utama.</p>
                            @if($errors->has('mainpicposition'))
                                <div class="error py-2 text-sm text-red-600">{{ $errors->first('mainpicposition') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                            Nama Penanggung Jawab Utama
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input class="form-input block w-full focus:bg-white border border-gray-300 px-2 py-1" id="mainpicname" name="mainpicname" type="text" value="">
                            <p class="py-2 text-sm text-gray-600">Masukkan nama lengkap Penanggung Jawab Utama.</p>
                            @if($errors->has('mainpicname'))
                                <div class="error py-2 text-sm text-red-600">{{ $errors->first('mainpicname') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                            Jabatan Penanggung Jawab Sekunder
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input class="form-input block w-full focus:bg-white border border-gray-300 px-2 py-1" id="secondpicposition" name="secondpicposition" type="text" value="">
                            <p class="py-2 text-sm text-gray-600">Masukkan jabatan Penanggung Jawab Sekunder.</p>
                            @if($errors->has('secondpicposition'))
                                <div class="error py-2 text-sm text-red-600">{{ $errors->first('secondpicposition') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                            Nama Penanggung Jawab Sekunder
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input class="form-input block w-full focus:bg-white border border-gray-300 px-2 py-1" id="secondpicname" name="secondpicname"  type="text" value="">
                            <p class="py-2 text-sm text-gray-600">Masukkan nama lengkap Penanggung Jawab Sekunder.</p>
                            @if($errors->has('secondpicname'))
                                <div class="error py-2 text-sm text-red-600">{{ $errors->first('secondpicname') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="md:flex md:items-center">
                        <div class="md:w-1/3"></div>
                        <div class="md:w-2/3">
                            <button type="submit" class="shadow bg-blue-900 hover:bg-blue-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" >
                                Selanjutnya
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