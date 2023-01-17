<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/0.0.0-insiders.4a070ac/tailwind.min.css" integrity="sha512-vJu7D5BpjnNXVpLBrl9LKLvmXBNjiLwge8EOZ/YS9XwiChpfKLAlydwIZvoJaDE3LI/kr3goH0MzDzNbBgyoOQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="{{ mix('css/app.css') }}"> -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
        @vite('resources/css/app.css')
</head>
<body class="bg-white-800 font-sans leading-normal tracking-normal">

	<nav class="flex items-center justify-between flex-wrap bg-blue-900 p-6 fixed w-full z-10 top-0 sticky">
		<div class="flex items-center flex-shrink-0 text-white mr-6">
		<div>
			<img class="h-20 w-20" src="pictures/itslogo.png" alt="Logo ITS">
		</div>
		<div>
			<a class="text-white no-underline hover:text-white hover:no-underline" href="#">
				<span class="text-2xl pl-2"><i class="em em-grinning"></i> RESERVASI TOWER ITS</span>
			</a>
		</div>
	</div>

		<div class="block lg:hidden">
			<button id="nav-toggle" class="flex items-center px-3 py-2 border rounded text-gray-500 border-gray-600 hover:text-white hover:border-white">
				<svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
			</button>
		</div>

		<div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block pt-6 lg:pt-0" id="nav-content">
			<ul class="list-reset lg:flex justify-end flex-1 items-center">
				<li class="mr-3">
					<a class="inline-block py-2 px-4 text-yellow-300 no-underline" href="#">Home</a>
				</li>
				<li class="mr-3">
					<a class="inline-block text-white no-underline hover:text-gray-200 hover:text-underline py-2 px-4" href="#">Jadwal</a>
				</li>
				<li class="mr-3">
					<a class="inline-block text-white no-underline hover:text-gray-200 hover:text-underline py-2 px-4" href="#">Panduan</a>
				</li>
				<li class="mr-3">
					<a class="inline-block text-white no-underline hover:text-gray-200 hover:text-underline py-2 px-4" href="#">Staff</a>
				</li>
			</ul>
		</div>
	</nav>

	<!--Container-->
	<div class="container  mx-auto bg-white  md:mt-18">
		
			<div class=" mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
			  <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">

				<h1 class="sm:text-4xl text-8xl mb-4 font-bold text-gray-900">Welcome To 
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

	<script>
		//Javascript to toggle the menu
		document.getElementById('nav-toggle').onclick = function(){
			document.getElementById("nav-content").classList.toggle("hidden");
		}
	</script>

</body>
</html>