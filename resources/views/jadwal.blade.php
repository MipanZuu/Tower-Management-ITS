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



    <div class="py-5 ml-9">
        <select class="form-control m-input" id="room" name="room">
        <option value="Kelas 1" >Kelas 1</option>
        <option value="Kelas 2">Kelas 2</option><br>
         </select>                  
        <div id="autosave"></div> 
    </div>
    


    <div class=" bg-white px-6 py-5">
        <div id="calendar" class=""></div>
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