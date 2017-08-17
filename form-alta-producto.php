<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    <link href="css/style.css" media="screen" rel="StyleSheet" type="text/css">

    <meta charset="utf-8">
    <title>Alta Producto</title>
  </head>
  <body>
    <?php
    include("conexion.inc");
    $vQuery = "select * from tipos_bebidas";
    $sql_tipos_bebida = mysqli_query($link, $vQuery);
    ?>
    <!-- Navigation -->
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

    <div class="container">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <form class="" action="alta-producto.php" method="post">
            <div class="form-group">
              <label>Nombre bebida</label>
              <input type="text" name="nombre" class="form-control">
            </div>
            <div class="form-group">
              <label>Tipo de bebida</label>
              <select class="form-control" name="tipo_bebida">
                <?php
                while($row = mysqli_fetch_assoc($sql_tipos_bebida)){
                  echo $row['nombre'];
                  echo"<option value=\"".$row['id_tipo_bebida']."\">".$row['nombre']."</option>";
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label>Precio</label>
              <input type="text" name="precio" class="form-control">
            </div>

            <div class="form-group">
              <label>Descripcion</label>
              <input type="text" name="descripcion" class="form-control">
            </div>

            <div class="form-group">
              <label>Marca</label>
              <input type="text" name="marca" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Crear</button>
          </form>
        </div>
      </div>
    </div>


  </body>
</html>
