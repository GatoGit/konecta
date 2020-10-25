$(document).ready(function() {
	counter();
	get_productos();
	
});
$("#form_producto").submit( function(event){
	  baseurl= $('#baseurl').val();
		event.preventDefault();
		data = $(this).serializeArray();
		$.ajax({
			url :   baseurl+'/home/save_producto',
			type: "POST",
			data: data,
			async:true,
			dataType: "JSON",	
			success: function(data)
			{
				if(data.status){
					counter();
					get_productos();
					$('#modal_productos').modal('hide');
					alert("Producto Creado Exitosamente!");
					 $('#form_producto')[0].reset();
					 
					
				}else{
					alert("error al crear");
				}
			}
		});
	});
$("#form_tiempo").submit( function(event){
	  baseurl= $('#baseurl').val();
		event.preventDefault();
		data = $(this).serializeArray();
		$.ajax({
			url :   baseurl+'/home/save_tiempo',
			type: "POST",
			data: data,
			async:true,
			dataType: "JSON",	
			success: function(data)
			{
				if(data.status){
					counter();
					get_actividades();
					$('#modal_tiempo').modal('hide');
					 $('#form_tiempo')[0].reset();
					alert('Horas Registradas correctamente');
					
				
						 
						 
					 
						 
					
				}else{
					alert("Error susperas la cantidad de horas que son maximo 8.");
				}
			}
		});
	});
function get_productos(){
	baseurl= $('#baseurl').val();
	$.ajax({
		url :   baseurl+'/home/get_productos',
		type: "POST",
		success: function(data)
		{
			$('#contenido_producto').html(data);
		}
	});
}


function venta(id){
	baseurl= $('#baseurl').val();
	$.ajax({
		url :   baseurl+'/home/ventas',
		type: "POST",
		data: {"productoid": id},
		dataType: "JSON",
		success: function(data)
		{
			if(data.stock != false){
				if(data.status){
					counter();
					get_productos();
					
					alert("Venta Exitosamente!");
									 			
				}else{
					alert("error al crear");
				}
			}else{
				alert("No es posible la venta, no hay stock.");
			}
			
			
		}
	});
	
}
function get_producto_update(id){
	
	
	baseurl= $('#baseurl').val();		
	$.ajax({
		url :   baseurl+'/home/get_producto_id',
		type: "POST",
		data: {"productoid": id},
		async:true,
		dataType: "JSON",	
		success: function(data)
		{

			$('#productoid').val(data.productoid);
			$('#nom_producto').val(data.nom_producto);
			$('#referencia').val(data.referencia);
			$('#precio').val(data.precio);
			$('#peso').val(data.peso);
			$('#categoria').val(data.categoria);
			$('#stock').val(data.stock);
			$('#modal_update_productos').modal('show');
		}
	});
}

$("#form_update_producto").submit( function(event){
	  baseurl= $('#baseurl').val();
		event.preventDefault();
		data = $(this).serializeArray();
		$.ajax({
			url :   baseurl+'/home/update_producto',
			type: "POST",
			data: data,
			async:true,
			dataType: "JSON",	
			success: function(data)
			{
				if(data.status){
					counter();
					get_productos();
					$('#form_update_producto').modal('hide');
					alert("Producto Actualizado Exitosamente!");
					 $('#form_update_producto')[0].reset();
					 $('#modal_update_productos').modal('hide');
					 
					
				}else{
					alert("error al actulizar");
				}
			}
		});
	});

function delete_producto(id){
	
	
	baseurl= $('#baseurl').val();		
	$.ajax({
		url :   baseurl+'/home/delete_producto',
		type: "POST",
		data: {"productoid": id},
		async:true,
		dataType: "JSON",	
		success: function(data)
		{
			
				counter();
				get_productos();
			alert("Producto Eliminado correctamente");
			
			
		}
	});
}
function counter(){
	baseurl= $('#baseurl').val();
	$.ajax({
		url :   baseurl+'/home/count',
		type: "POST",
		dataType: "JSON",
		success: function(data)
		{
			$('#count_v').html(data.count_ventas);
			$('#count_p').html(data.count_productos);
			$('#count_f').html(data.count_facturado);
		}
	});
}
