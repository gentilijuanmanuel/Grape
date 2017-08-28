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
    <title><?php if(isset($_POST['Modificar']))
    { echo "Modificar producto";}
    else
    {echo "Eliminar producto";}; ?></title>
    <link href="css/bootstrap.min.css" rel="stylesheet">

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
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script|EB+Garamond" rel="stylesheet">
  </head>
  <body>
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
        <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-glass" aria-hidden="true"></span> Grape</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <?php
          if(isset($_SESSION['nombre_usuario'])) {
              echo '<ul class="nav navbar-nav">';
              echo '<li class="active"><a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> '.$_SESSION['nombre_usuario'].'<span class="sr-only">(current)</span></a></li>';
              echo '</ul>';
          }
          else {
              echo '<ul class="nav navbar-nav">';
              echo '<li class="active"><a href="log-in.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Entrar<span class="sr-only">(current)</span></a></li>';
              echo '</ul>';
              echo '<ul class="nav navbar-nav">';
              echo '<li class="active"><a href="registrarse.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Registrarse<span class="sr-only">(current)</span></a></li>';
              echo '</ul>';
          }
      ?>
        <ul class="nav navbar-nav">
          <li class="active"><a href="#" onClick="window.open('formulario.html', 'Contacto', 'resizable, height=500, width=500'); return false;"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> Contáctenos</a></li>
        </ul>
        <ul class="nav navbar-nav">
          <li class="active"><a href="categorias.php"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Categorías</a></li>
        </ul>

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
                      <button type="submit" class="btn btn-default">Cerrar sesión</button>
                  </form>
              <?php
              if($_SESSION['tipo_usuario'] == 1) {
                  ?>
                      <ul class="nav navbar-nav">
                          <li class="active"><a href="listado-productos.php"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Panel de control de administrador<span class="sr-only">(current)</span></a></li>
                      </ul>
                  <?php
              }
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
  <?php
    include("conexion.inc");
    $vQuery = "select * from tipos_bebidas";
    $sql_tipos_bebida = mysqli_query($link, $vQuery);

    $vQueryProducto = "select * from bebidas where id_bebida = "."'".$_POST["ID"]."'";
    $Producto_seleccionado = mysqli_query($link, $vQueryProducto);
    $Producto = mysqli_fetch_assoc($Producto_seleccionado);
    ?>
    <?php if(isset($_POST['Modificar'])){ ?>
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <form class="" action="modificar-producto.php" method="post">
            <div class="form-group">
              <label for="nombre">Nombre bebida</label>
              <input type="text" title="Modificar producto" name="nombre" class="form-control" value="<?php echo $Producto['nombre']; ?>">
            </div>
            <div class="form-group">
              <label for="tipo_bebida">Tipo de bebida</label>
              <select class="form-control" title="Modificar producto" name="tipo_bebida">
                <?php
                while($row = mysqli_fetch_assoc($sql_tipos_bebida)){
                  if($Producto['id_tipo_bebida'] == $row['id_tipo_bebida'])
                  {
                    echo $row['nombre'];
                    echo"<option value=\"".$row['id_tipo_bebida']."\" selected>".$row['nombre']."</option>";
                  }
                  else{
                    echo $row['nombre'];
                    echo"<option value=\"".$row['id_tipo_bebida']."\">".$row['nombre']."</option>";
                  }
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="precio">Precio</label>
              <input type="text" title="Modificar producto" name="precio" class="form-control" value="<?php echo $Producto['precio']; ?>">
            </div>
            <input type="text" hidden="true" title="Modificar producto" name="id_bebida" value="<?php echo $Producto['id_bebida']; ?>">
            <div class="form-group">
              <label for="descripcion">Descripcion</label>
              <input type="text" name="descripcion" title="Modificar producto" class="form-control" value="<?php echo $Producto['descripcion']; ?>">
            </div>

            <div class="form-group">
              <label for="marca">Marca</label>
              <input type="text" name="marca" title="Modificar producto" class="form-control" value="<?php echo $Producto['marca']; ?>">
            </div>
            <div class="form-group">
              <label for="detalle">Detalle</label>
              <textarea type="text" name="detalle" title="Modificar producto" class="form-control" value="<?php echo $Producto['detalle']; ?>"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Modificar producto</button>
            | <a href="listado-productos.php">Volver<a>
          </form>
        </div>
      </div>
    </div>
    <?php }
    else{ ?>
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-md-offset-4">
            <form class="" action="eliminar-producto.php" method="post">
              <div class="form-group">
                <label for="nombre">Nombre bebida</label>
                <input type="text" title="Eliminar producto" name="nombre" class="form-control" disabled="true" value="<?php echo $Producto['nombre']; ?>">
              </div>
              <div class="form-group">
                <label for="tipo_bebida">Tipo de bebida</label>
                <select class="form-control" title="Eliminar producto" disabled="true" name="tipo_bebida">
                  <?php
                  while($row = mysqli_fetch_assoc($sql_tipos_bebida)){
                    if($Producto['id_tipo_bebida'] == $row['id_tipo_bebida'])
                    {
                      echo $row['nombre'];
                      echo"<option value=\"".$row['id_tipo_bebida']."\" selected>".$row['nombre']."</option>";
                    }
                    else{
                      echo $row['nombre'];
                      echo"<option value=\"".$row['id_tipo_bebida']."\">".$row['nombre']."</option>";
                    }
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="precio">Precio</label>
                <input type="text" title="Eliminar producto" disabled="true" name="precio" class="form-control" value="<?php echo $Producto['precio']; ?>">
              </div>

              <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <input type="text" disabled="true" name="descripcion" title="Eliminar producto" class="form-control" value="<?php echo $Producto['descripcion']; ?>">
              </div>

              <div class="form-group">
                <label for="marca">Marca</label>
                <input type="text" disabled="true" title="Eliminar producto" name="marca" class="form-control" value="<?php echo $Producto['marca']; ?>">
              </div>
              <div class="form-group">
                <label for="detalle">Detalle</label>
                <textarea type="text" name="detalle" disabled="true" title="Modificar producto" class="form-control" value="<?php echo $Producto['detalle']; ?>"></textarea>
              </div>
              <input type="text" hidden="true" title="Eliminar producto" name="id_bebida" value="<?php echo $Producto['id_bebida']; ?>">

              <button type="submit" class="btn btn-danger">Eliminar producto</button>
              | <a href="listado-productos.php">Volver<a>
            </form>
          </div>
        </div>
      </div>

    <?php
      }
    ?>
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
