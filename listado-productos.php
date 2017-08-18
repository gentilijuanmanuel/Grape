<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Listado de productos</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">

  </head>
  <body>
    <?php
    include("conexion.inc");
    $vQuery = "select * from bebidas";
    $vResult = mysqli_query($link, $vQuery);
    ?>
    <nav class="navbar navbar-fixed-top navbar-inverse">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html">Grape</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="active"><a href="log-in.html">Entrar <span class="sr-only">(current)</span></a></li>
          </ul>
          <ul class="nav navbar-nav">
            <li class="active"><a href="registrarse.html">Registrarse <span class="sr-only">(current)</span></a></li>
          </ul>
          <form class="navbar-form navbar-right" action="resultado-busqueda.php" method="post">
            <div class="form-group">
              <input type="text" class="form-control" name="busqueda" placeholder="Buscar whiskies, vinos...">
            </div>
            <button type="submit" class="btn btn-default">Buscar</button>
          </form>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    <br>
    <br>
    <div class="container">
      <h1>Tabla de bebidas</h1>
      <table class="table table-hover table-striped">
        <tr>
          <th>ID bebida</th>
          <th>Nombre</th>
          <th>Descripcion</th>
          <th>Precio</th>
          <th>Marca</th>
        </tr>
        <?php
        while($fila = mysqli_fetch_array($vResult))
        {
          echo "<tr>";
            echo "<td>".$fila['id_bebida']."</td>";
            echo "<td>".$fila['nombre']."</td>";
            echo "<td>".$fila['descripcion']."</td>";
            echo "<td>".$fila['precio']."</td>";
            echo "<td>".$fila['marca']."</td>";
            echo "</tr>";
        }

        mysqli_close($link);
         ?>

      </table>
      <br>
      <br>
      <div class="form-inline">

      <form class="form-group" action="form-alta-producto.php" method="post">
        <button type="submit" class="btn btn-primary">Nuevo</button>
      </form>
      <form class="form-group" action="form-modificacion-baja-producto.php" method="post">
        <label>ID: </label>
        <input type="number" name="ID">
        <button type="submit" name="Modificar" class="btn btn-success">Modificar</button>
        <button type="submit" name="Elimminar" class="btn btn-danger">Eliminar</button>
      </form>

  </body>
</html>
