<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Eliminar Producto</title>
  </head>
  <body>
    <?php
      include("conexion.inc");

      $ID_Bebida = $_POST['id_bebida'];
      $vEliminar = "delete from bebidas where id_bebida = '$ID_Bebida'";

      $resultado = mysqli_query($link, $vEliminar) or die(mysqli_error($link));
      if($resultado) {
        echo "<p>Producto eliminado correctamente.</p>";
      }

      mysqli_close($link);
      ?>
      <a href="listado-productos.php">Volver al listado</a>
  </body>
</html>
