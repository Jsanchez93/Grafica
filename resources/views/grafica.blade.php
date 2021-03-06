@extends('layout.master')

@section("cuerpo")



<div id="vdp" style="height: {{ $size."px" }};"></div>


<div class="right-align">
	<a class="teal darken-3 nueva btn-large" href="{{ url('penetration_rate') }}">
		Nueva grafica <i class="material-icons right">note_add</i>
	</a>
</div>

@endsection

@section("jsExtra")
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>	
@php
	$maxX = 0;
	$maxY = 0;
	$datos = array();
	foreach ($series as $value) {
		$aux = explode("-", $value);
		$aux[0] = str_replace(",", ".", $aux[0]);
		$aux[1] = str_replace(",", ".", $aux[1]);
		array_push($datos, $aux);

		$maxY = ($aux[0]>$maxY)?$aux[0]:$maxY;
		$maxX = ($aux[1]>$maxX)?$aux[1]:$maxX;
	}
	$aux = array(0,0);	
@endphp
<script>
	$(function () {
		Highcharts.chart('vdp', {
			chart: {
	            type: 'line'
	        },
			title: {
				text: '{!! $titulo !!}',
				x: -20 //center
			},
			subtitle: {
				text: 'Profundidad vs Tiempo',
				x: -20
			},
			xAxis: {
				title: {
					text: 'Tiempo (h)'
				},
				min: 0,
				max: {{$maxX+5}},
				opposite: true
			},
			yAxis: {
				title: {
					text: 'Profundidad ({{ $medida }})'
				},
				reversed: true,
				min: 0,
				max: {{$maxY+10}}
			},
			tooltip: {
				valueSuffix: '',
				enabled: true,
				pointFormat: "Value: {point.y:,.1f} mm"
			},
			legend: {
				align: 'center'				
			},
			plotOptions: {
				line: {
					dataLabels: {
						enabled: false
					},
					enableMouseTracking: false
				}
			},
			series: [
				{
					name: '{{ $proyecto }}',						
					data: [{
						y: 0,
						x: 0,
						name: "Inicio"													
					},
					@foreach ($datos as $dato)
						@if (!$loop->last)
							{
								y: {{ $dato[0] }},
								x: {{ $aux[1] }},
								name: "Inicio"													
							},
							@php
								$aux[0] = $dato[0];
							@endphp
							{
								y: {{ $aux[0] }},
								x: {{ $dato[1] }},
								name: "Inicio",
									marker: {
									enabled: true,
									symbol: 'circle',
									radius: 4
								}												
							},
							@php
								$aux[1] = $dato[1];
							@endphp
						@else
							{
								y: {{ $dato[0] }},
								x: {{ $aux[1] }},
								name: "Inicio"													
							},
							@php
								$aux[0] = $dato[0];
							@endphp
							{
								y: {{ $aux[0] }},
								x: {{ $dato[1] }},
								name: "Inicio",
								marker: {
									enabled: true,
									symbol: 'circle',
									radius: 4
								}
							}	
							@php
								$aux[1] = $dato[1];
							@endphp
						@endif					
					@endforeach
					]						
				}
			]
		});
	});
</script>

@endsection