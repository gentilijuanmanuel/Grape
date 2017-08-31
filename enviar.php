<?php
	$fecha=date("d-m-Y");
	$hora= date("H :i:s");
	$destino='ivos19@hotmail.com'; /*"micorreo@dominio.com";*/
	$asunto='Comentario';
	$desde='From:' . $_POST['email'];

	$mailComprobacion= $_POST['email'];

	$comentario=

		'Nombre: '.$_POST['nombre']. "\r\n".
		'Email: '.$_POST['email']. "\r\n".
		'Consulta: '.$_POST['texto']. "\r\n".
		'Enviado: '.$fecha .'a las'. $hora;

	mail( $destino , $asunto, $comentario, $desde);
	mail( $mailComprobacion , 'Confirmacion envio', 'El mail ha sido enviado satifactoriamente');

	echo "<h3>Su consulta ha sido enviada, en breve recibira nuestra
	respuesta.</h3>";
?>
