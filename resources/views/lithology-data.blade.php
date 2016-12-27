@extends('layout.master')

@section("cuerpo")

<div class="container">
	<div class="row">
		<form id="FormData" class="col s12 grey-text text-darken-4" action="{{ url('lithology-graph') }}" method="post" accept-charset="utf-8">
			{{ csrf_field() }}
			<div class="row">
				<div class="input-field col l6 m6 s12">
					<label for="titulo">Titulo</label>
					<input required type="text" class="validate" id="titulo" name="titulo">
				</div>			
				<div class="input-field col l6 m6 s12">
					<select name="medida">					
						<option value="ft" selected>Pies</option>
						<option value="m">Metros</option>
					</select>
					<label>Medida profundidad</label>
				</div>			
				<div class="input-field col l6 m6 s12">
					<input required type="text" class="validate" id="proyecto" name="proyecto">
					<label for="proyecto">Proyecto</label>
				</div>
			</div>
			 
			<div class="row">
				<div class="col s12 right-align">
					<button id="" class="new_field teal darken-3 btn-large waves-effect waves-light" type="submit" name="new_field">Agregar campo
						<i class="material-icons right">add</i>
					</button>				
					<button id="enviar" class="teal darken-3 btn-large waves-effect waves-light" type="submit" name="enviar">Graficar
						<i class="material-icons right">send</i>
					</button>
				</div>
			</div>
			
			
			<div class="row cont">				
				
					<div class="serie input-field col s12 m6 l6">									
						<input type="text" id="serie-1" name="series[]" required>
						<label for="serie-1">Profundidad</label>	
					</div>
					<div class="type-serie-1 input-field col s12 m6 l6">
						<select name="type[]">				
							<option value="ar" selected>Arcilla</option>	
							<option value="lb" >Lava Basaltica</option>
							<option value="laa">Lava Basaltica con contenido de arcilla</option>
							<option value="la" >Lava Andesitica</option>
							<option value="laf">Lava Andesitica sin fractura</option>
							<option value="hc" >Horizonte de contacto (lavas)</option>
							<option value="pr" >Piroclastos retrabajados</option>
							<option value="sa" >Sedimento aluvial</option>
							<option value="sf" >Sedimento fluvial</option>
						</select>
						<label>Tipo de suelo</label>
					</div>				
				
				
			</div>			
				

		</form>
	</div>
</div>

@endsection
@section("jsExtra")
<script src="{{ url('js/lithology-data.js') }}?v=1.2"></script>
@endsection
