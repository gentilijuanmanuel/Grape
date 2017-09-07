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

    <title>Grape - El mejor sitio de e-commerce para bebidas</title>

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

    <?php
    include("conexion.inc");
    $vNomCategoria = "Vodka";
    $vQuery = "select * from bebidas where id_tipo_bebida = (select id_tipo_bebida from tipos_bebidas where nombre ='".$vNomCategoria."');";
    $vResult = mysqli_query($link, $vQuery);
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
        <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-glass" aria-hidden="true"></span> Grape</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <?php
          if(isset($_SESSION['nombre_usuario'])) {
              echo '<ul class="nav navbar-nav">';
              echo '<li class="active"><a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> '.$_SESSION['nombre_usuario'].'<span class="sr-only">(current)</span></a></li>';
              echo '</ul>';

              include("conexion.inc");
              $usuario = $_SESSION['nombre_usuario'];
              $consultaTipoUsuario = "select tipo_usuario from usuarios where nombre_usuario = '$usuario'";
              $resultado = mysqli_query($link, $consultaTipoUsuario) or die (mysqli_error($validar));
              $resultado_array = mysqli_fetch_array($resultado);
              if($resultado_array[0] == 0) {
                  echo '<ul class="nav navbar-nav">';
                  echo '<li class="active"><a href="carrito.php"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Ir al carrito<span class="sr-only">(current)</span></a></li>';
                  echo '</ul>';
              }
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
                          <li class="active"><a href="panel-control.php"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Panel de control de administrador<span class="sr-only">(current)</span></a></li>
                      </ul>
                  <?php
              }
          }
      ?>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

          <div class="col-md-3">
              <p class="lead">Grape</p>
              <div class="list-group">
                <form action="filtro-categoria.php" method="post">
                  <a href="categorias-whisky.php" class="list-group-item">Whiskies</a>
                  <a href="categorias-champagne.php" class="list-group-item">Champagnes</a>
                  <a href="categorias-vinos.php" class="list-group-item">Vinos</a>
                  <a href="categorias-vodkas.php" class="list-group-item">Vodkas</a>
                  <a href="categorias-licores.php" class="list-group-item">Licores</a>
                </form>
              </div>
          </div>

            <div class="col-md-9">
                <div class="row">
                 <h1>Vodkas</h1>
                <?php
                if(mysqli_num_rows($vResult) == "0")
                {
                    echo "<div class='alert alert-warning' role='alert'>No hay resultados que mostrar.</div>";
                }
                else {
                  $vCantRows = mysqli_num_rows($vResult);
                  while($vReg = mysqli_fetch_array($vResult))
                  { ?>

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="<?php echo $vReg['url_imagen'] ?>" alt="<?php echo $vReg['descripcion'] ?>">
                            <div class="caption">
                                <h4><p class="pull-right"><?php echo "$".$vReg['precio'] ?></p>
                                  <form action="detalle-producto.php" method="post" name="form<?php echo $vReg['id_bebida']; ?>">
                                    <input type="text" hidden="true" name="ID" title="ID" value="<?php echo $vReg['id_bebida']; ?>">
                                    <a href="javascript:viod(0)" onclick="javascript:document.forms['form<?php echo $vReg['id_bebida']; ?>'].submit();"><?php echo $vReg['nombre'] ?></a>
                                  </form>                                </h4>
                                <p><?php echo $vReg['descripcion'] ?></p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">15 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php  }
                } ?>

    </div>
    <!-- /.container -->

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
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
