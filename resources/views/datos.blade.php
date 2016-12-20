@extends('layout.master')

@section("cuerpo")

<div class="container">

<div class="row">
	<form id="FormData" class="col s12 teal-text text-lighten-1" action="{{ url('grafica') }}" method="post" accept-charset="utf-8">
		{{ csrf_field() }}
		<div class="row">
			<div class="input-field col l6 m6 s12">
				<label for="titulo">Titulo</label>
				<input required type="text" class="validate" id="titulo" name="titulo">
			</div>
			<div class="input-field col l6 m6 s12">
				<input required type="number" value="650" class="validate" id="size" name="size" placeholder="ej. 600">
				<label for="size">Tamaño (px)</label>
			</div>		
			<div class="input-field col l6 m6 s12">
				<select>					
					<option value="ft" selected>Pies</option>
					<option value="m">Metros</option>
				</select>
				<label>Medida profundidad</label>
			</div>			
		</div>
		
		<div class="row">
			<div class="col s12">
				<button id="new_project" class="btn-large waves-effect waves-light" type="submit" name="new_project">Nuevo proyecto
					<i class="material-icons right">create_new_folder</i>
				</button>			
				<button id="enviar" class="btn-large waves-effect waves-light" type="submit" name="enviar">Graficar
					<i class="material-icons right">send</i>
				</button>
			</div>
		</div>
		
		

		<div class="row new_projects">
			<div class="list col s12 hide">
				<ul class="tabs tabs-fixed-width">
					<li class="tab"><a href="#tab1">Test 1</a></li>
				</ul>
			</div>
			<div id="tab1" class="tabs-projects col s12">
				<div class="row cont">
					<div class="input-field col l8 m6 s12">
						<input required type="text" class="validate" id="proyecto" name="proyecto">
						<label for="proyecto">Proyecto </label>
					</div>
					<div class="col l4 m6 s12">
						<button id="new_field" class="btn-large waves-effect waves-light" type="submit" name="new_field">Agregar campo
							<i class="material-icons right">add</i>
						</button>		
					</div>
					<div class="col s12 serie">				
						<div class="input-field">
							<input type="text" id="serie-1" name="series[]" required>
							<label for="serie-1">Profundidad-Tiempo</label>					
						</div>				
					</div>
				</div>			
			</div>			
		</div>
		
		
		
	</form>
</div>

</div>

@endsection
@section("jsExtra")
<script src="{{ url('js/datos.js') }}?v=1.1"></script>
@endsection
