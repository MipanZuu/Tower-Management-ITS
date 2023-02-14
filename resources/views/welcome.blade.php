@extends('layouts.header')
@section('content')
			<div class=" mx-auto flex px-5 py-24 md:flex-row flex-col items-center h-screen">
			  <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">

				<h1 class="sm:text-8xl md:text-7xl text-7xl mb-4 font-bold text-gray-900">Selamat Datang di
				  <br class="hidden lg:inline-block">Tower ITS
				</h1>
		
				
				<div class="flex justify-center">
					<a class="" href="{{route('reservasi')}}">
				  <button class="inline-flex text-white bg-yellow-400 border-0 py-4 px-6 mx-4 my-4 focus:outline-none hover:bg-yellow-500 rounded text-lg">Reservasi Sekarang >></button>
				</a>
				</div>
			  </div>
			  <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
				<img class="object-cover object-center rounded" alt="Tower Mockup" src="pictures/mockup-tower.png">
			  </div>
			</div>
			</div>
			<div class="container-fluid bg-blue-900 p-10 text-center text-white">
				<h1 class="text-3xl p-3">Panduan Reservasi Ruangan Tower ITS</h1>
				<p class="text-lg p-5">Untuk mendapatkan panduan mengenai tata cara reservasi ruangan pada Tower ITS, <br> silahkan klik tombol di bawah.</p>
				<a href="{{route('panduanReservasi')}}" type="button" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-3 mr-2 mb-2 dark:focus:ring-yellow-900">Panduan Reservasi</a>
			</div>
			<div class="container-fluid bg-white-900 p-10 text-center my-6">
				<h1 class="text-4xl font-bold pb-5">Tata Tertib Reservasi</h1>
				<div class="text-left px-16">
				<ol type="1" class="list-decimal">
					<li>Penggunaan ruangan harus mendapat persetujuan dari Rektor ITS.</li>
					<li>Pengajuan peminjaman maksimal 2 minggu sebelum pelaksanaan kegiatan.</li>
					<li>Penggunaan ruang hanya diperbolehkan pada rentang waktu jam kerja (08:00 -18:00) di hari kerja, dan maksimal pukul 16:00 untuk hari Sabtu dan Minggu.</li>
					<li>Pengguna atau Peminjam hanya dikhususkan untuk civitas akademika ITS.</li>
					<li>Pengguna ruang wajib melakukan pemeriksaan kondisi barang yang akan digunakan sebelum maupun sesudah digunakan untuk memastikan keadaan kondisi barang dalam keadaan baik.</li>
					<li>Tidak dibenarkan meninggalkan ruang dalam keadaan kosong dan tidak terkunci.</li>
					<li>Jika terjadi kerusakan inventaris ruang karena kelalaian/kecerobohan pemakaian maka yang bersangkutan diberi sanksi untuk:</li>
					<ol class="list-disc pl-5">
						<li>Memperbaiki alat tersebut apabila kerusakan tersebut dapat diperbaiki.</li>
						<li>Mengganti dengan alat yang baru apabila kerusakan tersebut tidak bisa diperbaiki.</li>
					</ol>
				</ol> 
				</div>
			</div>
@endsection