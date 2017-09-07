<?php
  session_start();
  include("conexion.inc");
    if(isset($_SESSION['carro'])){
      $carro = $_SESSION['carro'];
    }

    $id = $_POST['id'];
    $cantidad = $_POST['cantidad'];


    $vQuery = "select * from bebidas where id_bebida = '$id'";
    $vResult = mysqli_query($link, $vQuery);
    $row = mysqli_fetch_assoc($vResult);

    $carro[md5($id)]=array('identificador'=>md5($id),'cantidad'=>$cantidad,'producto'=>$row['nombre'],'precio'=>$row['precio'],'id'=>$id);

    $_SESSION['carro'] = $carro;

    header("Location:carrito.php");

 ?>
