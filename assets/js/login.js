$(document).ready(function() {
	
});
$("#form_registro").submit( function(event){
	  baseurl= $('#baseurl').val();
		event.preventDefault();
		data = $(this).serializeArray();
		$.ajax({
			url :   baseurl+'/login/save_registro',
			type: "POST",
			data: data,
			async:true,
			dataType: "JSON",	
			success: function(data)
			{
				if(data.status){
					alert("Usuario Creado Exitosamente!");
					 $('#form_registro')[0].reset();
					 setTimeout(function(){ 
						 window.location.href = baseurl; 
						 }, 1500);
					
				}else{
					alert("Usuario existente");
				}
			}
		});
	});
$("#form_login").submit( function(event){
	  baseurl= $('#baseurl').val();
		event.preventDefault();
		data = $(this).serializeArray();
		$.ajax({
			url :   baseurl+'/login/login',
			type: "POST",
			data: data,
			async:true,
			dataType: "JSON",	
			success: function(data)
			{
				if(data.status){
					
					alert('Ingresando');
					 $('#form_login')[0].reset();
				
						 window.location.href = baseurl+'home'; 
						 
					 
						 
					
				}else{
					alert("Usuario o contraseña incorrecto");
				}
			}
		});
	});
