<?php 

function validar_campo($campo)
{
	$campo = trim($campo);
	$campo = stripcslashes($campo);
	$campo = htmlspecialchars($campo);

	return $campo;
}

header('Content-type: application/json');

if( isset($_POST["nombre"]) && !empty($_POST["nombre"]) &&
	isset($_POST["email"]) && !empty($_POST["email"]) &&
	
	isset($_POST["mensaje"]) && !empty($_POST["mensaje"])
	){

	$para = "ayelen005@gmail.com";
	$nombre = validar_campo($_POST["nombre"]);
	$email = validar_campo($_POST["email"]);
	
	if (isset($_POST["telefono"]) ) {
		$telefono = validar_campo($_POST["telefono"]);
	}else{$telefono=""; }

	if (isset($_POST["mensaje"]) ) {
		$mensaje = validar_campo($_POST["mensaje"]);
	}else{ $mensaje ="";}
	
	$contenido  =  "Nombre: " .$nombre ;
	$contenido .= "\n";
	$contenido .= "\n Email: " .$email;
	$contenido .= "\n";
	$contenido .= "\n Telefono: " .$telefono;
	$contenido .= "\n";
	$contenido .= "\n Mensaje: " .$mensaje;

	mail($para, "Mensaje desde la web:". $nombre, $contenido);
	
	return print (json_encode( 'ok' ) );


}

	return print (json_encode( 'error' ) );