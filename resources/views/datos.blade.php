@extends('layout.master')

@section("cuerpo")
<form id="FormData" class="form-inline" action="{{ secure_url('grafica') }}" method="post" accept-charset="utf-8">
	{{ csrf_field() }}
	<table class="table">
		<tr>
			<td>
				<label for="titulo">Titulo:</label>
				<input required type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo ej. Perforacion en ø14">
			</td>
			<td>
				<label for="size">Tamaño (px):</label>
				<input required type="number" value="650" class="form-control" id="size" name="size" placeholder="ej. 600">
			</td>
		</tr>
	</table>
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
			<td><input required type="text" class="form-control" id="proyecto" name="proyecto" placeholder="ej. Anda"></td>
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
<script src="{{ secure_url('js/datos.js') }}?v=1.1"></script>
@endsection