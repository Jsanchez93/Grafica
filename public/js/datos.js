$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function() {
	var pass = true;
	$('select').material_select();

	var projects = 1;
	$("#new_project").on('click', function(event) {
		event.preventDefault();			
		$.ajax({
			url: path+'/ajax/projects_tabs',
			type: 'POST',
			dataType: 'html',
			data: {n: projects+1},
		})
		.done(function(data) {			
			var list = $(".tabs-projects ul");
			var n = projects +1;
			list.append('<li> <a href="#" id-tab="'+n+'"> Proyecto '+n+' <i class="delete_tab material-icons small red-text text-darken-2 hide-on-large-only">cancel</i></a> </li>');			
			var resp = data.replace('#TAB#', 'tab'+n);
			$(".tabs-projects").append(resp);
			if( list.hasClass('hide') ){
				list.removeClass('hide');
			}
			projects += 1;
		})
		.fail(function() {
			console.log("error");
		});
				
	});


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

	

	$(".new_field").on('click', function(event) {
		event.preventDefault();
		var cont = $('.cont');		
		var n = cont.find('.serie').length +1;
		var campo = '<div class="col s12 serie"><div class="input-field"><input type="text" id="serie-'+n+'" name="series[]" required><label for="serie-'+n+'">Profundidad-Tiempo</label><i class="material-icons small red-text text-darken-4 eliminar-campo hide-on-large-only">cancel</i></div></div>';
		cont.append(campo);
	});
	
	$("#FormData").on('click', 'i.eliminar-campo', function(event) {
		event.preventDefault();					
		$(this).parent().parent('.serie').remove();					
	});
});

/****old*****





$(".tabs-projects ul").on('click', 'a', function(event) {
	event.preventDefault();
	var a = $(this);
	var id = a.attr('id-tab');
	$(".tabs-projects ul li a").removeClass('active');
	a.addClass('active');
	$(".tabs-projects .tab").addClass('hide');
	$("#tab"+id).removeClass('hide');

});



$(".tabs-projects").on('click', '.delete_tab', function(event) {
	event.preventDefault();
	if(confirm("¿Seguro que desea borrar esta pestaña?")){
		var id = $(this).parent().attr('id-tab');
		var li = $(this).parent().parent('li');			
		$("#tab"+id).remove();
		li.remove();
		$(".default-tab").addClass('active');
		$("#tab1").removeClass('hide');
	}		
});



**************/