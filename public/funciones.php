<?php

//Funcion que dependiendo del rol que tiene un usuario, su color es distinto
function rol ($id){
	if($id == "1"){
		return "admin";
	}else if($id == "2"){
		return "usuario";
	}else if($id == "3"){
		return "treatment";
	}else if($id == "4"){
		return "profesional";
	}else{
		return "";
	}
}
//Funcion que dependiendo del rol que tiene un usuario, el color del borde de su publicacion cambia
function rolBorder ($id){
	if($id == "1"){
		return "adminBorder";
	}else if($id == "2"){
		return "usuarioBorder";
	}else if($id == "3"){
		return "treatmentBorder";
	}else if($id == "4"){
		return "profesionalBorder";
	}else{
		return "";
	}
}

/*

//Funcion en el slider de la galeria
function imagen($nombre){
if($nombre == "hl2"){
    return('img/hl2carousel.jpg');
}else if($nombre == "tf2"){
    return('img/tf2carousel.jpg');
}else{
    return('img/portalcarousel.png');
}
}

*/

?>


