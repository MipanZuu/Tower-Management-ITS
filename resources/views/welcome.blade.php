@extends('layouts.header')
@section('content')
			<div class=" mx-auto flex px-5 py-24 md:flex-row flex-col items-center h-screen">
			  <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">

				<h1 class="sm:text-8xl md:text-7xl text-7xl mb-4 font-bold text-gray-900">Selamat Datang di
				  <br class="hidden lg:inline-block">Tower ITS
				</h1>
		
				
				<div class="flex justify-center">
					<a class="" href="{{route('reservasi')}}">
				  <button class="inline-flex text-white bg-yellow-500 border-0 py-2 px-6 focus:outline-none hover:bg-yellow-600 rounded text-lg">Reservasi Sekarang >></button>
				</a>
				</div>
			  </div>
			  <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
				<img class="object-cover object-center rounded" alt="Tower Mockup" src="pictures/mockup-tower.png">
			  </div>
			</div>
			<!-- <div class="container bg-blue">
				<h1>haha</h1>
			</div> -->
			</div>
			
	<footer class="bg-blue-900 rounded-lg shadow md:px-6 md:py-8 dark:bg-gray-900">
		<span class="block text-sm text-white sm:text-center dark:text-gray-400">© 2023 Institut Teknologi Sepuluh Nopember
		</span>
	</footer>
@endsection