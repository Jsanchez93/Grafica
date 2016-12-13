@extends('layout.master')

@section("cuerpo")

	<div class="container error">		
		<blockquote>
			<p>Error al introducir los siguientes datos:</p>
		</blockquote>
		<ol>
			@foreach ($series as $element)
				<li>{{ $element }}</li>
			@endforeach
		</ol>
		<button class="btn btn-danger" onclick="goBack()">Volver</button>
	</div>

@endsection

@section("jsExtra")
<script>
	function goBack() {
	    window.history.back();
	}
</script>
@endsection