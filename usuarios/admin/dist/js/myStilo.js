$(document).ready(function(){
	cargarNoticias();
});


//------------------------function botonesdel menu------------
$('.noticias').click(function(event){event.preventDefault(); cargarNoticias(); });
$('.usuarios').click(function(event){event.preventDefault(); cargarUsuarios(); });
$('.archivos').click(function(event){event.preventDefault(); cargarArchivos(); });


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


 function cargarArchivos()
 {
 	var url = "layouts/proyectos/index.php";
	$.post( url, function(data){
	 $('#page-wrapper').html(data);
	});
 }