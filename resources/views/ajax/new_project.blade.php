<div id="tab{{$n}}" class="tab col s12 hide">
	<div class="row cont">
		<div class="input-field col l8 m6 s12">
			<input required type="text" class="validate" id="proyecto-tab{{$n}}" name="proyecto_tab{{$n}}">
			<label for="proyecto-tab{{$n}}">Proyecto </label>
		</div>
		<div class="col l4 m6 s12">
			<button id="" class="new_field teal darken-3 btn-large waves-effect waves-light" type="submit" name="new_field">Agregar campo
				<i class="material-icons right">add</i>
			</button>		
		</div>
		<div class="col s12 serie">				
			<div class="input-field">
				<input type="text" id="serie-1-tab{{$n}}" name="series_tab{{$n}}[]" required>
				<label for="serie-1-tab{{$n}}">Profundidad-Tiempo</label>					
			</div>				
		</div>
	</div>			
</div>			