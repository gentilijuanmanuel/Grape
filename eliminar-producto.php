<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Eliminar Producto</title>
  </head>
  <body>
    <h1>Baja de producto</h1>
    <?php
      include("conexion.inc");

      $ID_Bebida = $_POST['id_bebida'];
      $vEliminar = "delete from bebidas where id_bebida = '$ID_Bebida'";

      $resultado = mysqli_query($link, $vEliminar) or die(mysqli_error($link));
      if($resultado) {
        echo "<h4>Producto eliminado correctamente.</h4>";
      }

      mysqli_close($link);
      ?>
      <a href="listado-productos.php">Volver al listado</a>
  </body>
</html>