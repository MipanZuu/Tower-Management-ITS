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
                    <h1 class="font-bold text-3xl mb-4">Detail Peminjaman</h1>
                    <p class="text-gray-500">Ruangan yang akan dipinjam memiliki kapasitas dan fasilitas yang berbeda-beda. Teknisi yang bertanggung jawab terhadap ruangan dapat dilihat di halaman staff. Untuk melihat ketersediaan ruangan dapat dilihat di halaman ruangan</p>
                    @if ($errors->has('msg'))
                    <div class="error py-4 text-md text-bold text-red-600">{{$errors->first('msg')}}</div>
                    @endif
                </div>
                <form action="{{route('postCreateStepThree')}}" method="POST">
                    @csrf
                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                            Lantai
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <select  class="form-input block w-full focus:bg-white border border-gray-300 px-2 py-1" id="floornum" name="floornum">
                                <option value="">Default</option>
                                @foreach ($lantais as $lantai)
                                <option value="{{ $lantai->floornum }}">Lantai {{ $lantai->floornum}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('floornum'))
                                <div class="error py-2 text-sm text-red-600">{{ $errors->first('floornum') }}</div>
                            @endif
                            <p class="py-2 text-sm text-gray-600">Pilih Lantai dari ruangan yang akan Anda gunakan.</p>
                        </div>
                    </div>

                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                            Tanggal dan Waktu Mulai Peminjaman
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input class="form-input block w-full focus:bg-white border border-gray-300 px-2 py-1" id="reservationstart" name="reservationstart" type="datetime-local" >
                            @if($errors->has('reservationstart'))
                                <div class="error py-2 text-sm text-red-600">{{ $errors->first('reservationstart') }}</div>
                            @endif
                            <p class="py-2 text-sm text-gray-600">Pilih tanggal acara Anda (Format: DD-MM-YYYY).</p>
                        </div>
                    </div>

                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                            Tanggal dan Waktu Selesai Peminjaman
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input class="form-input block w-full focus:bg-white border border-gray-300 px-2 py-1" id="reservationend" name="reservationend" type="datetime-local">
                            @if($errors->has('reservationend'))
                                <div class="error py-2 text-sm text-red-600">{{ $errors->first('reservationend') }}</div>
                            @endif
                            <p class="py-2 text-sm text-gray-600">Masukkan tanggal dan waktu selesai peminjaman.</p>
                        </div>
                    </div>

                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                            Ruangan
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <section id="map">
                                <div class="container m-auto">
                                    <div class="flex justify-center mb-4 bg-gray-300" style="overflow: hidden; user-select: none; touch-action: none;">
                                        <div class="relative h-64 md:h-auto" style="cursor: move; user-select: none; touch-action: none;">
                                            <div class="absolute top-0 w-full h-full z-10">
                                            <svg class="scale-10 md:scale-10" viewBox="0 0 1920 1100" preserveAspectRatio="none">
                                                <polygon id="test" class="polygon roomAvailable" points="537.4213562373095,559.4213562373095 254.57864376269052,559.4213562373095 254.57864376269046,276.5786437626905 537.4213562373095,276.5786437626905" stroke="#000" stroke-width="1"/>
                                                <polygon id="test1" class="polygon roomAvailable" points="841.4213562373095,559.4213562373095 558.5786437626905,559.4213562373095 558.5786437626905,276.5786437626905 841.4213562373095,276.5786437626905" stroke="#000" stroke-width="1"/>
                                                
                                            </svg> 
                                            </div>
                                            <img src="/pictures/aaaa-page-003.jpg" alt="">
                                        </div>
                                    </div>
                                    @extends('modal.ruangan1')
                                    @extends('modal.ruangan2')
                                </div>
                            </section>
                            @if($errors->has('roomname'))
                                <div class="error py-2 text-sm text-red-600">{{ $errors->first('roomname') }}</div>
                            @endif
                            <p class="py-2 text-sm text-gray-600">Pilih Ruangan yang akan Anda gunakan.</p>
                        </div>
                    </div>

                    <div class="md:flex md:items-center">
                        <div class="md:w-1/3"></div>
                        <div class="md:w-2/3">
                            <button type="submit" class="shadow bg-blue-900 hover:bg-blue-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
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

      <script type="text/javascript">
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $(document).ready(function () {
            $('#floornum').on('change',function(e) {
                var floorID = e.target.value;
        $.ajax({
            url:"{{ route('detailPeminjamanAjax') }}",
            type:"POST",
            data: {
            floornum: floorID
        },
        dataType: 'json',
        success:function (result) {
            $('#roomname').empty();
            $('#roomname').append('   <option>Default</option>'); 
            $.each(result.ruangans, function(key,value){
            $('#roomname').append('<option value="'+value.roomname+'">'+value.roomname+'</option>');
            })
        }
            })
            });
            });
        </script>

      {{-- <script>
        $(document).ready(function() {
        $('#floornum').on('change', function() {
           var lantaiPos = $(this).val();
           if(lantaiPos) {
               $.ajax({
                   url: '/reservasi/detailPeminjaman/'+lantaiPos,
                   type: "GET",
                   data : {"_token":"{{ csrf_token() }}"},
                   dataType: "json",
                   success:function(data)
                   {
                     if(data){
                        $('#roomname').empty();
                        $('#roomname').append('   <option>Default</option>'); 
                        $.each(data, function(key,ruangans){
                            $('select[name="ruangans"]').append('<option value="'+ ruangans.roomname +'">' + ruangans.roomname+ '</option>');
                        });
                    }else{
                        $('#course').empty();
                    }
                 }
               });
           }else{
             $('#roomname').empty();
           }
        });
        });
    </script> --}}
    <script>
    document.getElementById('test').onclick = function(){
        document.getElementById("kelas1").classList.toggle("hidden");
    }
    document.getElementById('test1').onclick = function(){
        document.getElementById("kelas2").classList.toggle("hidden");
    }

    document.getElementById('buttonClose1').onclick = function(){
        document.getElementById("kelas1").classList.toggle("hidden");
    }

    document.getElementById('buttonClose2').onclick = function(){
        document.getElementById("kelas2").classList.toggle("hidden");
    }
</script>
@endsection