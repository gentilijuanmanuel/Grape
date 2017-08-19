<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Modificar Producto</title>
  </head>
  <body>
    <?php
      include("conexion.inc");
      $nombre = $_POST['nombre'];
      $precio = $_POST['precio'];
      $descripcion = $_POST['descripcion'];
      $marca = $_POST['marca'];
      $tipo_bebida = $_POST['tipo_bebida'];
      $ID_Bebida = $_POST['id_bebida'];
      $vModificacion = "update bebidas set nombre = '$nombre', precio='$precio', descripcion='$descripcion', marca='$marca', id_tipo_bebida ='$tipo_bebida' where id_bebida = '$ID_Bebida' ";

      $resultado = mysqli_query($link, $vModificacion) or die(mysqli_error($link));
      if($resultado) {
        echo "<p>Producto modificada correctamente.</p>";
      }

      mysqli_close($link);
      ?>
      <a href="listado-productos.php">Volver al listado</a>
  </body>
</html>
