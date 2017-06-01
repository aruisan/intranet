$(document).ready(function(){
	cargarNoticias();
});


//------------------------function botonesdel menu------------
$('#noticias').click(function(event){event.preventDefault(); cargarNoticias(); });
$('#usuarios').click(function(event){event.preventDefault(); cargarUsuarios(); });


//------------------------function de cargues de pagina------------

 function cargarNoticias()
 {
 	var url = "layouts/noticias/index.php";
	$.post( url, function(data){
	$('#page-wrapper').html(data);
	});
	
 }


 function cargarUsuarios()
 {
 	var url = "layouts/usuarios/index.php";
	$.post( url, function(data){
	 $('#page-wrapper').html(data);
	});
 }