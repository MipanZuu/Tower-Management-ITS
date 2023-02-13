@extends('layouts.admin')
@section('content')   

<div class="relative overflow-x-auto h-screen bg-blue-50 shadow-md sm:rounded-lg">
    <nav class="flex items-center justify-center flex-wrap p-5 fixed w-full z-10 top-0 sticky sm:justify-between">
		<div class="flex items-center flex-shrink-0 text-white  mr-6">
		<div>
			<span class="text-black font-bold no-underline hover:text-white hover:no-underline text-2xl pl-2"><i class="em em-grinning"></i>List Reservasi</span>
		</div>
	</div>
    </nav>
    <div class="">
    <div class="flex justify-between mx-6 py-2 mt-6">
        <div class="flex justify-between">
        <button class="inline-flex text-white bg-yellow-500 border-0 py-2 px-7 focus:outline-none hover:bg-yellow-600 rounded text-lg">Upload Jadwal ></button>
        <a href="{{route('uploadPetunjuk')}}">
        <button class="inline-flex text-white bg-green-500 border-0 py-2 px-7 ml-2 focus:outline-none hover:bg-green-600 rounded text-lg">Upload petunjuk ></button>
        </a>
        </div>
        <button class="ml-4 inline-flex text-white bg-yellow-500 border-0 py-2 px-6 focus:outline-none hover:bg-yellow-600 rounded text-lg">Button</button>
      </div>
    </div>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Lantai
                </th>
                <th scope="col" class="px-6 py-3">
                    Ruangan
                </th>
                <th scope="col" class="px-6 py-3">
                    Tanggal/Jam Pemesanan
                </th>
                <th scope="col" class="px-6 py-3">
                    Pemesan
                </th>
                <th scope="col" class="px-6 py-3">
                    Approve
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Details</span>
                </th>
            </tr>
        </thead>
        
        <tbody>
            @foreach ($reservasis as $key => $reservasi)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$reservasi->floornum}}
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$reservasi->roomname}}
                </th>
                <td class="px-6 py-4">
                {{$reservasi->reservationdate}}
                </td>
                <td class="px-6 py-4">
                {{$reservasi->fullname}}
                </td>
                <td class="px-6 py-4">
                    @if($reservasi->status == 1)
                    <div class="flex justify-start">
                        <span class="mt-1.5 mr-1 w-3 h-3 bg-yellow-400 rounded-full"></span>
                        <p class="title-font font-medium mt-0.5  text-gray-600">Perlu Ditinjau</p>
                      </div>
                      @elseif($reservasi->status == 2)
                      <div class="flex justify-start">
                      <span class="mt-1.5 mr-1 w-3 h-3 bg-green-500 rounded-full"></span>
                      <p class="title-font mt-0.5 font-medium  text-gray-900">Reservasi Disetujui</p>
                      </div>
                      @elseif($reservasi->status == 3)
                      <div class="flex justify-start">
                      <span class="mt-1.5 mr-1 w-3 h-3 bg-red-500 rounded-full"></span>
                      <p class="title-font mt-0.5 font-medium  text-gray-900">Reservasi Ditolak</p>
                      </div>
                    @endif
                {{-- {{$reservasi->status}} --}}
                </td>
                <td class="px-6 py-4 text-right">
                    <a href="{{route('detail-reservasi', $reservasi->reservationid)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Detail</a>
                </td>
            </tr> 
            @endforeach
        </tbody>
    </table>
</div>

@endsection('content')