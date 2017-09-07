<?php
/*$link = mysqli_connect("localhost","id2616608_localhost","ewhapgto1") or die ("Problemas de conexión a la base de datos");
mysqli_select_db($link, "id2616608_grape");*/

    $hostname = "localhost";
    $username = "root";
    $nameBD = "grape";
    $link = mysqli_connect("localhost", "root", "root") or die("Problemas con la conexion a la base de datos.");
    $boolean = mysqli_select_db($link, $nameBD);
?>
