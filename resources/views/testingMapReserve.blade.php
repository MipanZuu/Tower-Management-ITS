@extends('layouts.header')
@section('content')
<section id="map">
    <div class="container mb-3">
        <div class="mb-10 md:mb-16 pt-12">
            <div class="text-center">
                <h1>Pilih Kelas</h1>
                <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque necessitatibus in est saepe quasi. Architecto repudiandae <br> temporibus doloribus quibusdam possimus saepe optio nihil vel. Error, excepturi facilis? Minima, quo qui!
                </p>
            </div>
        </div>
        
        <div class="flex justify-center md:gap-8 gap-4">
            <div class="text-sm md:text-base font-jost-r">
                <div class="text-bold">o</div>
                <div class="inline-block align-middle md:text-base text-sm">
                    Ruangan Tersedia:
                    <strong>9999</strong>
                </div>
            </div>
            <div class="text-sm md:text-base font-jost-r">
                <div class="text-bold">o</div>
                <div class="inline-block align-middle md:text-base text-sm">
                    Ruangan Tersedia:
                    <strong>9999</strong>
                </div>
            </div>
        </div>
        
        <div class="flex justify-center md:gap-8 gap-4 mt-3">
            <div class="text-sm md:textbase">
                <div class="text-bold">o</div>
                <div class="text-bold">o</div>
            </div>
            <div class="text-sm md:textbase">
                <div class="text-bold">o</div>
                <div class="text-bold">o</div>
            </div>
            <div class="text-sm md:textbase">
                <div class="text-bold">o</div>
                <div class="text-bold">o</div>
            </div>
        </div>

        <div class="flex justify-center mb-4 bg-gray-300" style="overflow: hidden; user-select: none; touch-action: none;">
            <div class="relative h-64 md:h-auto" style="cursor: move; user-select: none; touch-action: none;">
                <img src="pictures/aaaa-page-003.jpg" alt="">
                <div class="absolute top-0 w-full h-full z-10">
                <svg class="scale-150 md:scale-100" viewBox="0 0 1920 1100" preserveAspectRatio="none">
                    <polygon points="200,10 250,190 150,190" style="fill:lime;stroke:purple;stroke-width:1" />
                </svg> 
                </div>
            </div>
        </div>
    </div>

</section>
@endsection