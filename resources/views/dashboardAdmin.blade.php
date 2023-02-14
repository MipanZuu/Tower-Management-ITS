@extends('layouts.admin')
@section('content')
<div class="bg-blue-50 h-screen">
    <nav class="flex items-center justify-center flex-wrap p-5 fixed w-full z-0 top-0 sticky sm:justify-between">
		<div class="flex items-center flex-shrink-0 text-white mr-6">
		<div>
			<span class="text-black font-bold no-underline hover:text-white hover:no-underline text-2xl pl-2"><i class="em em-grinning"></i>Overview</span>
		</div>
	</div>
    </nav>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-10 mx-auto">
          <div class="flex flex-wrap -m-4 text-center">
            <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
              <div class="border-2 border-gray-200 px-6 py-12 rounded-lg bg-white">
                <p class="leading-relaxed font-extrabold">Ruangan </p>
                <h2 class="title-font font-medium text-3xl text-gray-900">20</h2>
                
              </div>
            </div>
            <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
              <div class="border-2 border-gray-200 px-6 py-12 rounded-lg bg-white">
                <p class="leading-relaxed font-extrabold">Ruangan Terisi</p>
                <h2 class="title-font font-medium text-3xl text-gray-900">1.3K</h2>
              </div>
            </div>
            <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
              <div class="border-2 border-gray-200 px-6 py-12 rounded-lg bg-white">
                <p class="leading-relaxed font-extrabold">Ruangan Kosong</p>
                <h2 class="title-font font-medium text-3xl text-gray-900">74</h2>
              </div>
            </div>
            <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
              <div class="border-2 border-gray-200 px-6 py-12 rounded-lg bg-white">
                <p class="leading-relaxed font-extrabold">Reservasi</p>
                <h2 class="title-font font-medium text-3xl text-gray-900">46</h2>
              </div>
            </div>
          </div>
        </div>
      </section>
</div>

@endsection('content')