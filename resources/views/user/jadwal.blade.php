@extends('layouts.header')
@section('content')
<style>
    .fc-event {
        width: auto;
        height: auto;
        display: flex;
        flex-wrap: wrap;
        align-content: center;
    }

</style>


<div class="container bg-white mx-auto py-2 my-4 rounded-lg shadow-xl">
    <div class="mx-4 pl-2">
    <h1 class="text-black font-bold no-underline hover:no-underline text-2xl pt-2">Jadwal</h1> 
    <label for="kelas" class="block mt-4 mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih kelas</label>
        <select id="kelas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-100 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option selected value="Kelas 1">Kelas 1</option>
        <option value="Kelas 2">Kelas 2</option>
        </select>
    </div>


    <div class=" bg-white px-6 py-5 rounded-md z-0">
        <div id="calendar" class=""></div>
    </div>
</div>

   
<script>

$(document).ready(function () {

    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });
    var schedule = @json($event);
    var calendar = $('#calendar').fullCalendar({
       defaultView:'agendaWeek',
        editable:false,
        header:{
            left:'agendaWeek,agendaDay',
            center:'title',
            right:'prev,next today'
        },
        events:schedule,
        eventRender: function(event, element) { 
            element.find('.fc-title').after("-<span class=\"myClass\">" + event.ruangan + "</span>"); 
        } ,
       
        
    });
    $('.fc').css('background-color', 'white');
});
</script>
@endsection('content')