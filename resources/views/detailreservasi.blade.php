@extends('layouts.admin')
@section('content')
<div class="relative overflow-x-auto h-screen bg-blue-50 shadow-md sm:rounded-lg">
    <nav class="flex items-center justify-center flex-wrap p-5  w-full z-0 top-0  sm:justify-between">
		<div class="flex items-center flex-shrink-0 text-white mr-6">
		<div>
			<span class="text-black font-bold no-underline hover:text-white hover:no-underline text-2xl pl-2"><i class="em em-grinning"></i>Detail Reservasi</span>
		</div>
	</div>
    </nav>
    <div class="container w-full flex flex-wrap mx-auto px-2 pt-8 lg:pt-4 mt-8 pb-10">
        <!--Section container-->
        <section class="w-full">
        <form method="post" action="{{  route('terimaReservasi')  }}">
        @csrf
            <!--Card-->
            <div id='section' class="p-8 mt-6 lg:mt-0 rounded shadow-lg bg-white">    
                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                                Nama Lengkap Peminjam
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <p class="py-2 text-sm text-gray-600">{{ $reservasis->fullname }}</p>
                        </div>
                    </div>

                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                                NRP / NIP
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <p class="py-2 text-sm text-gray-600">{{ $reservasis->reserverid }}</p>
                        </div>
                    </div>

                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                                Nomor Telepon
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <p class="py-2 text-sm text-gray-600">+62{{ $reservasis->contactnumber }}</p>
                        </div>
                    </div>

                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                                Email
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <p class="py-2 text-sm text-gray-600">{{ $reservasis->email }}</p>
                        </div>
                    </div>

                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                                Nama Penanggungjawab 1  :
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <p class="py-2 text-sm text-gray-600">{{ $reservasis->mainpicname }}</p>
                        </div>
                    </div>

                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                                Jabatan Penanggungjawab 1   :
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <p class="py-2 text-sm text-gray-600">{{ $reservasis->mainpicposition }}</p>
                        </div>
                    </div>

                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                                Nama Penanggungjawab 2  :
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <p class="py-2 text-sm text-gray-600">{{ $reservasis->secondpicname }}</p>
                        </div>
                    </div>

                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                                Jabatan Penanggungjawab 2   :
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <p class="py-2 text-sm text-gray-600">{{ $reservasis->secondpicposition }}</p>
                        </div>
                    </div>

                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                                Lantai Ruangan yang dipinjam  :
                            </label>
                        </div>
                        <input type="hidden" id="floornum" name="floornum" value="{{$reservasis->floornum}}">
                        <div class="md:w-2/3">
                            <p class="py-2 text-sm text-gray-600">{{ $reservasis->floornum }}</p>
                        </div>
                    </div>

                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                                Nama Ruangan yang dipinjam  :
                            </label>
                        </div>
                        <input type="hidden" id="roomname" name="roomname" value="{{$reservasis->roomname}}">
                        <div class="md:w-2/3">
                            <p class="py-2 text-sm text-gray-600">{{ $reservasis->roomname }}</p>
                        </div>
                    </div>

                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                               Tanggal Reservasi:
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <p class="py-2 text-sm text-gray-600">{{ $reservasis->created_at }}</p>
                        </div>
                    </div>
                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                               Tanggal dan Jam Penggunaan:
                            </label>
                        </div>
                        <input type="hidden" id="reservationstart" name="reservationstart" value="{{$reservasis->reservationstart}}">
                        <input type="hidden" id="reservationend" name="reservationend" value="{{$reservasis->reservationend}}">
                        <div class="md:w-2/3">
                            <p class="py-2 text-sm text-gray-600">{{ $date }} {{ $timestart }} - {{ $timeend }}</p>
                        </div>
                    </div>

                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                               Organisasi Yang Diwakilkan :
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <p class="py-2 text-sm text-gray-600">{{ $reservasis->organization }} </p>
                        </div>
                    </div>

                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                               Nama Kegiatan :
                            </label>
                        </div>
                        <input type="hidden" id="eventname" name="eventname" value="{{$reservasis->eventname}}">
                        <div class="md:w-2/3">
                            <p class="py-2 text-sm text-gray-600">{{ $reservasis->eventname }} </p>
                        </div>
                    </div>

                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                               Kategori Kegiatan :
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <p class="py-2 text-sm text-gray-600">{{ $reservasis->eventcategory}} </p>
                        </div>
                    </div>

                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                               Deskripsi Kegiatan :
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <p class="py-2 text-sm text-gray-600">{{ $reservasis->eventdescription}} </p>
                        </div>
                    </div>
                    @if($reservasis->status == '1')
                        <input type="hidden" id="reservationid" name="reservationid" value="{{$reservasis->reservationid}}">
                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                               Deskripsi Kegiatan :
                            </label>
                        </div>
                        <div class="md:w-2/3">
                        <select class="form-input block w-full focus:bg-white border border-gray-300" id="status" name="status">
                                <option value="1">Pending</option>
                                <option value="2">Diterima</option>
                                <option value="3">Ditolak</option>
                            </select>
                            <button type="submit" class="shadow bg-green-900 hover:bg-green-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" >
                                Simpan
                            </button>
                        </div>
                    </div>
                </form>
                @endif
            </div>
</div>

@endsection('content')