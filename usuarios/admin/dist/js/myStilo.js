$(document).ready(function(){
	cargarNoticias();
});


//------------------------function botonesdel menu------------
$('#noticias').click(function(event){event.preventDefault(); cargarNoticias(); });
$('#usuarios').click(function(event){event.preventDefault(); cargarUsuarios(); });


//------------------------function de cargues de pagina------------

 function cargarNoticias()
 {
 	var url = "pages/noticias.php";
	$.ajax(
		{
	    	type: "POST",
	        url: url,
	          success: function(data)
	        { 
	        	console.log(data);
	        	$('#page-wrapper').html(data);
	  		}
		});
 }


 function cargarUsuarios()
 {
 	var url = "pages/usuarios.php";
	$.ajax(
		{
	    	type: "POST",
	        url: url,
	          success: function(data)
	        { 
	        	$('#page-wrapper').html(data);
	  		}
		});
 }