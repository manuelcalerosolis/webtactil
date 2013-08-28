<!DOCTYPE html>
<html lang="es">
  <head>
   	<meta charset="utf-8">
   	<title>Formulario de acceso </title>
   	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/bootstrap-responsive.css" rel="stylesheet">
	</head>
	<body>
	<?php	
		$usuario		=	$_POST['usuario'] ;
		$contrasena =	$_POST['contrasena'] ;
		echo 	" <h1>Buenos dias $usuario. </h1> " ;	
		echo 	" <p> Tu contrase&ntilde;a es: $contrasena </p> " ;
	?>
	</body>
</html >
