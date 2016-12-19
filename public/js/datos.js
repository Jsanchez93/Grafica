$(document).ready(function() {	

	$('select').material_select();

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
				text_actual.addClass('invalid');
			}
			else{
				text_actual.removeClass('invalid');
				cont++;
			}
		});		
		if( cont != $(".serie").length ){
			return false;			
		}
	});

	$("#new_field").on('click', function(event) {
		event.preventDefault();
		var n = $("#FormData .cont .serie").length +1;
		var campo = '<div class="col s12 serie"><div class="input-field"><input type="text" id="serie-'+n+'" name="series[]" required><label for="serie-'+n+'">Profundidad-Tiempo</label><i class="material-icons small red-text text-darken-4 eliminar-campo hide-on-large-only">cancel</i></div></div>';
		$(".cont").append(campo);		
	});
	
	$("#FormData").on('click', 'i.eliminar-campo', function(event) {
		event.preventDefault();					
		$(this).parent().parent('.serie').remove();					
	});
});

