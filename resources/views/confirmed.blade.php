@extends('layouts.header')
@section('content')
<div class="flex flex-col justify-center items-center h-screen">
    <h1 class="fa fa-check-circle" style="font-size: 15rem;"></h1>
    <h1 class="font-bold text-4xl my-8">Sukses Reservasi!</h1>
    <div class="flex flex-row items-center justify-center">
        <a href="reservasi" type="button" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-lg px-5 py-3 mr-2 mb-2 dark:focus:ring-yellow-900">Reservasi lagi</a>
        <a href="status"type="button" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-lg px-5 py-3 mr-2 mb-2 dark:focus:ring-yellow-900">Lihat Status</a>
    </div>
</div>
@endsection