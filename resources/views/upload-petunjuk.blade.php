@extends('layouts.admin')
@section('content')
<div class="relative overflow-x-auto h-screen bg-blue-50 shadow-md sm:rounded-lg">
<nav class="flex items-center justify-center flex-wrap p-5 fixed w-full z-10 top-0 sticky sm:justify-between">
    <div class="flex items-center flex-shrink-0 text-white  mr-6">
    <div>
        <span class="text-black font-bold no-underline hover:text-white hover:no-underline text-2xl pl-2"><i class="em em-grinning"></i>Import Petunjuk</span>
    </div>
</div>
</nav>   
    <div class="p-5">
    <div class="bg-white rounded-xl p-10 relative">
    
        <div class="bg-white border-2 border-black rounded-2xl py-10 flex flex-col">
            <div class="flex justify-end pr-10">
            </div>
            <h2 class="mb-6 text-4xl  flex justify-start pl-16">
                Upload File
            </h2>
            @if($errors->any())
            <h4>Error</h4>
            @endif
            <div class="flex justify-start pl-16 items-center pb-10">
                <form class="w-2/5" action="{{ route('uploadPDF') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="w-96 h-8.5 h-8.5 border-2">
                        <input placeholder="Upload File" class="bg-white text-base" type="file" name="file"
                            id="customFile">
                    </div>
                    <div class="flex flex-row pt-10">
                        <div class="w-32 h-10 bg-blue-400 hover:bg-blue-200 rounded-lg flex justify-center items-center">
                            <button class="btn btn-primary text-sm ">Import Petunjuk</button>
                        </div>
                    </div>
                </form>
            </div>

    </div>
</div>
    </div>
        @endsection('content')