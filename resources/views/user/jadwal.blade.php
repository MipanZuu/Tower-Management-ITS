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
    <h1 class="font-bold text-3xl my-8 mx-4">Jadwal</h1> 
    <div class="py-3 ml-4">
        <select class="form-control m-input" id="room" name="room">
        <option value="Kelas 1" >Kelas 1</option>
        <option value="Kelas 2">Kelas 2</option><br>
         </select>                  
        <div id="autosave"></div> 
    </div>
    


    <div class=" bg-white px-6 py-5 rounded-md">
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
       
        editable:false,
        header:{
            left:'',
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