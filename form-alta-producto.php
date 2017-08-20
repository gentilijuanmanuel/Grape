<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Alta de bebida</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link href="css/style.css" media="screen" rel="StyleSheet" type="text/css">
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
        <a class="navbar-brand" href="index.php">Grape</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <?php
          if(isset($_SESSION['nombre_usuario'])) {
              echo '<ul class="nav navbar-nav">';
              echo '<li class="active"><a href="#">'.$_SESSION['nombre_usuario'].'<span class="sr-only">(current)</span></a></li>';
              echo '</ul>';
          }
          else {
              echo '<ul class="nav navbar-nav">';
              echo '<li class="active"><a href="log-in.php">Entrar <span class="sr-only">(current)</span></a></li>';
              echo '</ul>';
              echo '<ul class="nav navbar-nav">';
              echo '<li class="active"><a href="registrarse.php">Registrarse <span class="sr-only">(current)</span></a></li>';
              echo '</ul>';
          }
      ?>
        <form class="navbar-form navbar-right" action="resultado-busqueda.php" method="post">
          <div class="form-group">
            <input type="text" class="form-control" title="Buscar" name="busqueda" placeholder="Buscar whiskies, vinos...">
          </div>
          <button type="submit" class="btn btn-default">Buscar</button>
        </form>

        <?php
            if(isset($_SESSION['nombre_usuario'])) {
                ?>
                    <form action="cerrar-sesion.php" class="navbar-form navbar-right" method="post">
                        <button type="submit" class="btn btn-danger">Cerrar sesión</button>
                    </form>
                <?php
            }
        ?>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>


  <?php
    if(isset($_SESSION['tipo_usuario'])) {
      $tipo_usuario = $_SESSION['tipo_usuario'];
      if($tipo_usuario == 1) {
  ?>
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <h1>Crear un nuevo producto</h1>
          <form class="" action="alta-producto.php" method="post" name="submit" >
            <div class="form-group">
              <label for="nombre">Nombre bebida</label>
              <input type="text" name="nombre" title="Crear" class="form-control">
            </div>
            <div class="form-group">
              <label for="tipo_bebida">Tipo de bebida</label>
              <select class="form-control" title="Crear" name="tipo_bebida">
                <?php
                while($row = mysqli_fetch_assoc($sql_tipos_bebida)){
                  echo $row['nombre'];
                  echo"<option value=\"".$row['id_tipo_bebida']."\">".$row['nombre']."</option>";
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="precio">Precio</label>
              <input type="text" title="Crear" name="precio" class="form-control">
            </div>

            <div class="form-group">
              <label for="descripcion">Descripcion</label>
              <input type="text" title="Crear" name="descripcion" class="form-control">
            </div>

            <div class="form-group">
              <label for="marca">Marca</label>
              <input type="text" title="Crear" name="marca" class="form-control">
            </div>
            <div class="form-group">
              <label for="detalle">Detalle</label>
              <textarea type="text" name="detalle" title="Modificar producto" class="form-control" value=""></textarea>
            </div>
            <a href="#" onClick="window.open('Cargar-imagen.html', 'ImaGen', 'resizable, height=300, width=500'); return false;">Cargar Imagen</a>
            <br><br>
            <button type="submit" class="btn btn-primary">Crear</button>
            | <a href="listado-productos.php">Volver</a>

          </form>
        </div>
      </div>
    </div>
    <?php
        } else {
          ?>
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <h1 style="color: red;"><span class="glyphicon glyphicon-remove"></span>  Error</h1>
                  <h2 style="color: red">No estás autorizado para ingresar a esta página.</h2>
                  <a href="index.php">Volver a la página principal</a>
                </div>
              </div>
            </div>

          <?php
      }
    } else {
      ?>
      <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 style="color: red;"><span class="glyphicon glyphicon-remove"></span>  Error</h1>
          <h2 style="color: red">No estás autorizado para ingresar a esta página.</h2>
          <a href="index.php">Volver a la página principal</a>
        </div>
      </div>
      </div>
    <?php
    }
    ?>
    <div class="container">
        <hr>
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; The Grape Company 2017</p>
                </div>
            </div>
        </footer>
    </div>
  </body>
</html>
