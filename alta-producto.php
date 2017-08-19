<?php session_start();  ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Alta Producto</title>
  </head>
  <body>
    <?php
      include("conexion.inc");
      $nombre = $_POST['nombre'];
      $precio = $_POST['precio'];
      $descripcion = $_POST['descripcion'];
      $marca = $_POST['marca'];
      $tipo_bebida = $_POST['tipo_bebida'];
/////////////////////////


/////////////////////////
      $ubicacion_imagen=$_SESSION['ubicacion-imagen'];
      $vAlta = "insert into bebidas(nombre, precio, descripcion, id_tipo_bebida, marca, url_imagen) values ('$nombre', '$precio','$descripcion','$tipo_bebida','$marca', '$ubicacion_imagen')";
      $resultado = mysqli_query($link, $vAlta) or die (mysqli_error($link));
      if($resultado) {
        echo "<p>La ciudad ha sido agregada correctamente.</p>";
      }
      mysqli_close($link);
    ?>
    <a href="form-alta-producto.php">Volver</a>
  </body>
</html>