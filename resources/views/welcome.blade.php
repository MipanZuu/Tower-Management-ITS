@extends('layouts.header')
@section('content')
			<div class=" mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
			  <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">

				<h1 class="sm:text-8xl md:text-7xl text-7xl mb-4 font-bold text-gray-900">Welcome To 
				  <br class="hidden lg:inline-block">Tower ITS
				</h1>
		
				
				<div class="flex justify-center">
				  <button class="inline-flex text-white bg-yellow-500 border-0 py-2 px-6 focus:outline-none hover:bg-yellow-600 rounded text-lg">Reservasi Sekarang >></button>
				  
				</div>
			  </div>
			  <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
				<img class="object-cover object-center rounded" alt="Tower Mockup" src="pictures/mockup-tower.png">
			  </div>
			</div>
	</div>
@endsection