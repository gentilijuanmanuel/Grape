<?php
  session_start();

  $id =$_POST['id'];
  $carro = $_SESSION['carro'];

  unset($carro[md5($id)]);

  $_SESSION['carro']=$carro;

  header("Location:carrito.php");

?>
