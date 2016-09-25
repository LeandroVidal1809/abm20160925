$(document).ready(function(){
	
	MostrarGrilla();
	
}); //muestra grilla toto el tiempo



function MostrarGrilla()
{
	var pagina= "./nexo.php";
	$.ajax({
		type:'POST',
		url:pagina,
		data: {queHacer:"mostrarLista"},
		datatype:"html",
		async: true
	})
	.then(
	function(exito){
		$("#GrillaPersonas").html(exito)
	},
	function(error){
		alert("algo pasa");
	});

}


function AgregarPersona()
{ 
	
	var pagina= "./nexo.php";
	var nombre=$("#Nombre").val();
	var apellido=$("#Apellido").val();
	var dni=$("#dni").val();

	var persona={};

	persona.nombre= nombre;
	persona.apellido=apellido;
	persona.dni=dni;


   $.ajax({url:pagina,type:"post",data:{queHacer:"Agregar",persona:persona}})
   .then(function(exito){
   
   //	alert(exito);
   	alert("Ingresado Exitosamente!");
	   	$("#principal").html(exito);
   },function(error){

   });
   

}