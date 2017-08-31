<?php
    $destino= "ivos19@hotmail.com";
    $asunto= $_POST['asunto'];
    $desde= $_POST['mail'];
    $comentario= $_POST['comentario'];
    mail('$destino', '$asunto', '$comentario', '$desde');
    echo "Su consulta ha sido enviada, en breve recibirá nuestra espuesta.";
?>