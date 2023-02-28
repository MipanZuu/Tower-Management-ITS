@extends('layouts.admin')
@section('content')

<div class="relative overflow-x-auto h-screen bg-blue-50 shadow-md sm:rounded-lg">
    <nav class="flex items-center justify-center flex-wrap p-5  w-full z-0 top-0 sticky sm:justify-between">
      <div class="flex items-center flex-shrink-0 text-white mr-6">
        <div>
          <span class="text-black font-bold no-underline hover:text-white hover:no-underline text-2xl pl-2"><i class="em em-grinning"></i>Report</span>
        </div>
      </div>
    </nav>

    <div class="flex flex-wrap m-4">
        <div id="chartreservasi">

        </div>
    </div>
</div>

<script>
    Highcharts.chart('chartreservasi', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Laporan Reservasi '
    },
    subtitle: {
        text: 'Bulan {!!json_encode($now)!!}'
    },
    xAxis: {
        categories: {!!json_encode($categories)!!}
        ,
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Reservasi'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.0f\} Reservasi</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Jumlah Reservasi',
        data: {!!json_encode($datas)!!}

    }]
});
    
</script>

@endsection
