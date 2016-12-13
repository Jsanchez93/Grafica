$(document).ready(function() {	

	$("#FormData").on('submit', function(event) {
		var i,str,text_actual,len,guion,cont;
		var cont = 0;
		var patt = new RegExp(/\d[-]{1}\d/i);
		$.each($(".serie"), function(index, val) {			
			text_actual = $(this).find("input");
			guion = 0;
			str = $.trim(text_actual.val());
			len = str.length;
			for (i = 0; i < len; i++) {
				if (str[i] == null)
					break;
				switch (str[i]){
					case "1":
					case "2":
					case "3": 
					case "4": 
					case "5": 
					case "6": 
					case "7": 
					case "8": 
					case "9": 
					case "0": 
					case ".": 
					case ",": 
						break;
					case "-":
						guion++;							
						break;
					default: 
						str = str.slice(0, i) + str.slice(i+1);
						i--;
						break;
				}
			}
			text_actual.val(str);
			if(!patt.test(str) || guion>1){
				text_actual.addClass('borde')
			}
			else{
				text_actual.removeClass('borde');
				cont++;
			}
		});		
		if( cont != $(".serie").length ){
			return false;			
		}
	});

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
		if( $("#FormData .serie").length > 1 ){				
			$(this).parent('.serie').remove();	
		}
		if( $("#FormData .serie").length <= 1 ){				
			restriccion();
		}
	});
});


function restriccion(){
	var boton = $("#delete_field");
	boton.text('Eliminar campo');
	boton.removeClass('btn-danger');
	boton.addClass('hidden');
	$("#FormData").removeClass('eliminando');
	$(".msj").addClass('hidden');
}