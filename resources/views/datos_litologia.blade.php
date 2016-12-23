@extends('layout.master')

@section("cuerpo")

<div class="container">
	
	<button id="btnSave" class="btn waves">Exportar</button>

	@php
		$values = array(
			array(150,"red"),
			array(200,"blue"),
			array(50,"teal"),
			array(78,"red"),
			array(45,"blue"),
			array(105,"teal")
		);
		$total = 0;
		foreach ($values as $value) {
			$total+=$value[0];
		}
	@endphp
	<div id="lithology_cont" style="height: {{ $total }}px">
		@foreach ($values as $element)
			@if ($loop->first)
				<div class="block {{ $element[1] }}" style="height: {{ ($element[0]/$total*100) }}%;"></div><!--
			@elseif ($loop->last)
				--><div class="block {{ $element[1] }}" style="height: {{ ($element[0]/$total*100) }}%;"></div>
			@else
				--><div class="block {{ $element[1] }}" style="height: {{ ($element[0]/$total*100) }}%;"></div><!--
			@endif			
		@endforeach
	</div>

	<br>

	<div id="img-out"></div>

</div>

@endsection
@section("jsExtra")
<!--<script src="{{ url('js/data_lithology.js') }}?v=1.2">-->
<script src="{{ asset('js/base64.min.js') }}"></script>
<script src="{{ asset('js/canvas2image.js') }}"></script>
<script src="{{ asset('js/html2canvas.js') }}"></script>
<script>
	$(document).ready(function() {


		$("#btnSave").click(function(event) { 
			event.preventDefault();
			html2canvas($("#lithology_cont"), {
				onrendered: function(canvas) {

					/*var url = canvas.toDataURL();
					$("<a>", {
						href: url,
						download: "yolo.png"
					})
					.on("click", function() {$(this).remove()})
					.appendTo("body")[0].click();*/

					//theCanvas = canvas;
					//document.body.appendChild(canvas);

					// Convert and download as image 
					Canvas2Image.saveAsPNG(canvas); 
					//$("#img-out").append(canvas);
					// Clean up 
					//document.body.removeChild(canvas);
				}
			});
		});

	});
</script>
@endsection
