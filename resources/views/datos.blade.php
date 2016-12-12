@extends('layout.master')

@section("cuerpo")
<form id="FormData" class="form-inline" action="{{ url('grafica') }}" method="post" accept-charset="utf-8">
	{{ csrf_field() }}
	<div class="form-group">
		<label for="titulo">Titulo:</label>		
		<input type="text" class="form-control" id="titulo" name="titulo" placeholder="ej. 600">
	</div>
	<div class="form-group">
		<label for="size">Tamaño (px):</label>		
		<input type="number" value="650" class="form-control" id="size" name="size" placeholder="Titulo ej. Perforacion en ø14">
	</div>
	<table>
		<tr>
			<td><label for="medida">Medida profundidad:</label>		</td>
			<td>
				<select class="form-control" name="medida">
					<option value="ft">Pies</option>
					<option value="m">Metros</option>
				</select>
			</td>
		</tr>
		<tr>
			<td><label for="proyecto">Proyecto: </label></td>
			<td><input type="text" class="form-control" id="proyecto" name="proyecto" placeholder="ej. Anda"></td>
		</tr>
	</table>
	<div class="cont">
		<span class="line"></span>
		<div class="serie">
			<input type="text" name="series[]" required class="form-control" placeholder="Profundidad-Tiempo">
			<span class="eliminar-campo glyphicon glyphicon-remove" aria-hidden="true"></span>
		</div>
		<span id="line" class="line"></span>
	</div>
	<a id="new_field" href="#" class="btn btn-default">Agregar campo</a>
	<a id="delete_field" href="#" class="hidden btn btn-default">Eliminar campo</a>
	<button id="enviar" type="submit" class="btn btn-primary">Graficar</button>
	<p class="msj bg-danger hidden">
		Click en la X al lado del campo que desea borrar.
	</p>
</form>
@endsection
@section("jsExtra")
<script>
	$(document).ready(function() {		
		$("#new_field").on('click', function(event) {
			event.preventDefault();
			var campo = '<div class="serie"><input type="text" name="series[]" required class="form-control" placeholder="Profundidad-Tiempo"> <span class="eliminar-campo glyphicon glyphicon-remove" aria-hidden="true"></span></div>';
			$("#line").before(campo);
			$("#delete_field").removeClass('hidden');
		});

		$("#delete_field").on('click', function(event) {
			event.preventDefault();		
			$(this).toggleClass('btn-danger');			
			$(".msj").toggleClass('hidden');
			$("#FormData").toggleClass('eliminando');

			if( $(this).hasClass('btn-danger') )
				$(this).text('Eliminando...');
			else
				$(this).text('Eliminar campo');

		});

		$("#FormData").on('click', 'span.eliminar-campo', function(event) {
			event.preventDefault();	
			$(this).parent('.serie').remove();			
			if( $("#FormData .serie").length <= 1 ){
				var boton = $("#delete_field");
				boton.text('Eliminar campo');
				boton.removeClass('btn-danger');
				$("#FormData").removeClass('eliminando');
				$(".msj").addClass('hidden');
			}
		});
	});


</script>
@endsection