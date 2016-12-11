@extends('layout.master')

@section("cssExtra")
@endsection

@section("cuerpo")


<div id="container" style="min-width: 310px; display: block; height: 600px; margin: 0 auto; width: 90%"></div>


@endsection

@section("jsExtra")
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>

	<script>
		$(function () {
			Highcharts.chart('container', {
				chart: {
		            type: 'line'
		        },
				title: {
					text: 'Perforación en ø14',
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
					max: 20,
					opposite: true
				},
				yAxis: {
					title: {
						text: 'Profundidad (m)'
					},
					reversed: true,
					min: 0,
					max: 230
				},
				tooltip: {
					valueSuffix: '',
					enabled: true,
					pointFormat: "Value: {point.y:,.1f} mm"
				},
				legend: {
					layout: 'vertical',
					align: 'right',
					verticalAlign: 'middle',
					borderWidth: 0
				},
				plotOptions: {
					line: {
						dataLabels: {
							enabled: true
						},
						enableMouseTracking: false
					}
				},
				series: [
					{
						name: 'Tokyo',						
						data: [{
							y: 0,
							x: 0,
							name: "Inicio"													
						},{
							y: 20,
							x: 10,
							name: "optional",
							marker: {
								enabled: true,
								symbol: 'circle',
								radius: 4
							}
						},{
							y: 40,
							x: 16,
							name: "optional",
							marker: {
								enabled: true,
								symbol: 'circle',
								radius: 4
							}
						},{
							y: 60,
							x: 16,
							name: "optional",
							marker: {
								enabled: true,
								symbol: 'circle',
								radius: 4
							}
						},{
							y: 80,
							x: 16,
							name: "optional",
							marker: {
								enabled: true,
								symbol: 'circle',
								radius: 4
							}
						},{
							y: 93,
							x: 16,
							name: "optional",
							marker: {
								enabled: true,
								symbol: 'circle',
								radius: 4
							}
						},{
							y: 109,
							x: 16,
							name: "optional",
							marker: {
								enabled: true,
								symbol: 'circle',
								radius: 4
							}
						},{
							y: 143,
							x: 16,
							name: "optional",
							marker: {
								enabled: true,
								symbol: 'circle',
								radius: 4
							}
						},{
							y: 156,
							x: 12,
							name: "optional",
							marker: {
								enabled: true,
								symbol: 'circle',
								radius: 4
							}
						},{
							y: 160,
							x: 15,
							name: "optional",
							marker: {
								enabled: true,
								symbol: 'circle',
								radius: 4
							}
						},{
							y: 165,
							x: 16,
							name: "optional",
							marker: {
								enabled: true,
								symbol: 'circle',
								radius: 4
							}
						},{
							y: 167,
							x: 12,
							name: "optional",
							marker: {
								enabled: true,
								symbol: 'circle',
								radius: 4
							}
						},{
							y: 174,
							x: 12,
							name: "optional",
							marker: {
								enabled: true,
								symbol: 'circle',
								radius: 4
							}
						},{
							y: 181,
							x: 12,
							name: "optional",
							marker: {
								enabled: true,
								symbol: 'circle',
								radius: 4
							}
						},{
							y: 188,
							x: 16,
							name: "optional",
							marker: {
								enabled: true,
								symbol: 'circle',
								radius: 4
							}
						},{
							y: 193,
							x: 16,
							name: "optional",
							marker: {
								enabled: true,
								symbol: 'circle',
								radius: 4
							}
						},{
							y: 196,
							x: 7,
							name: "optional",
							marker: {
								enabled: true,
								symbol: 'circle',
								radius: 4
							}
						},{
							y: 215,
							x: 16,
							name: "optional",
							marker: {
								enabled: true,
								symbol: 'circle',
								radius: 4
							}
						}]						
					}
				]
			});
		});
	</script>

@endsection