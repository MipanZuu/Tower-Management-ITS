@extends('layouts.admin')
@section('content')
<div class="relative overflow-x-auto h-screen bg-blue-50 shadow-md sm:rounded-lg">
  <nav class="flex items-center justify-center flex-wrap p-5  w-full z-0 top-0 sticky sm:justify-between">
    <div class="flex items-center flex-shrink-0 text-white mr-6">
      <div>
        <span class="text-black font-bold no-underline hover:text-white hover:no-underline text-2xl pl-2"><i class="em em-grinning"></i>Kontrol Ruangan</span>
      </div>
    </div>
  </nav>
  <section class="text-gray-600 body-font">
  <div class="py-7 mt-1 ml-9">
    <div class="inline-flex rounded-md shadow-sm">
      <a href="{{route('viewClass')}}" aria-current="page" class="px-4 py-2 text-sm font-medium text-blue-700 bg-white border border-gray-200 rounded-l-lg hover:bg-gray-100 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
        Semua
      </a>
      <a href="{{route('lantai4View')}}" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
        Lantai 4
      </a>
      <a href="{{route('lantai5View')}}" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
        Lantai 5
      </a>
      <a href="{{route('lantai6View')}}" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
        Lantai 6
      </a>
      <a href="{{route('lantai7View')}}" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
        Lantai 7
      </a>
      <a href="{{route('lantai8View')}}" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
        Lantai 8
      </a>
    </div>

    <div class="flex flex-wrap m-4">
      @foreach($ruangans as $key => $ruangan)
        <div class="xl:w-1/3 md:w-1/2 p-4">
          <div class="border-2 border-gray-200 px-6 py-12  rounded-lg bg-white">
                <div class="flex justify-center mb-1">
                  <p class="leading-relaxed font-extrabold">{{$ruangan->roomname}}</p>
                </div>
            <img class="h-40 rounded w-full object-cover object-center mb-2" src="{{$ruangan->picture}}" alt="content">
            <div class="flex justify-center">
              @php($isEmpty = 1)
              @foreach($events as $event)
                @if($event->ruangan == $ruangan->roomname && $event->lantai == $ruangan->floornum)
                  <span class="mt-1.5 mr-1 w-3 h-3 bg-red-500 rounded-full"></span>
                  <p class="title-font font-medium text-gray-900">Sedang Dipakai</p>
                  @php ($isEmpty = 0)
                  @break
                @endif
              @endforeach
              @if ($isEmpty)
                <span class="mt-1.5 mr-1 w-3 h-3 bg-green-500 rounded-full"></span>
                <p class="title-font font-medium text-gray-900">Kosong</p>
              @endif
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </section>
</div>
@endsection