

$(document).ready(function() {
	
	$('select').material_select();

	var global_n = 1;
	$(".new_field").on('click', function(event) {
		event.preventDefault();
		global_n += 1;
		var field = '<div class="serie input-field col s6">'+
						'<input type="text" id="serie-'+global_n+'" name="series[]" required>'+
						'<label for="serie-'+global_n+'">Profundidad</label>'+
						'<i class="material-icons small red-text text-darken-4 delete-field hide-on-large-only">cancel</i>'+
					'</div>'+
					'<div class="type-serie-'+global_n+' input-field col s6">'+
						'<select name="type[]">'+
							'<option value="ar" selected>Arcilla</option>'+
							'<option value="lb" >Lava Basaltica</option>'+
							'<option value="laa">Lava Basaltica con contenido de arcilla</option>'+
							'<option value="la" >Lava Andesitica</option>'+
							'<option value="laf">Lava Andesitica sin fractura</option>'+
							'<option value="hc" >Horizonte de contacto (lavas)</option>'+
							'<option value="pr" >Piroclastos retrabajados</option>'+
							'<option value="sa" >Sedimento aluvial</option>'+
							'<option value="sf" >Sedimento fluvial</option>'+
						'</select>'+
						'<label>Tipo de suelo</label>'+
					'</div>';

		$(".cont").append(field);
		$('select').material_select();
	});	


	$(".cont").on('click', '.delete-field', function(event) {
		event.preventDefault();
		var serie = $(this).parent();
		var delete_field = serie.find('input').attr('id');

		serie.remove();
		$(".type-"+delete_field).remove();

	});

});
