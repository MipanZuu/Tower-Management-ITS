@extends('layouts.header')
@section('content')
<div class="bg-white my-10 rounded-xl flex flex-col font-sans p-10 h-full">
    <h2 class="text-2xl pb-10 font-semibold text-black">Petunjuk Umum</h2>
    <embed class="" height="700" src="{{ asset('storage/petunjuk/'.$petunjuk->file_path) }}"  alt="pdf" />
</div>

@endsection