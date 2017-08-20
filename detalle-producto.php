<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Detalle producto</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/shop-homepage.css" rel="stylesheet">
  </head>
  <body>
    <?php
    include("conexion.inc");
    $IDSeleccionado = $_POST['ID'];
    $vQuery = "select * from bebidas where id_bebida='$IDSeleccionado'";
    $vResult = mysqli_query($link, $vQuery);
    $vProducto = mysqli_fetch_assoc($vResult);
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

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <p class="lead">Grape</p>
                <div class="list-group">

                  <form action="filtro-categoria.php" method="post">
                    <a href="categorias-whisky.php" class="list-group-item">Whiskies</a>
                    <a href="categorias-champagne.php" class="list-group-item">Shampagnes</a>
                    <a href="categorias-vinos.php" class="list-group-item">Vinos</a>
                    <a href="categorias-vodkas.php" class="list-group-item">Vodkas</a>
                    <a href="categorias-licores.php" class="list-group-item">Licores</a>
                  </form>
                </div>
            </div>
            <div class="col-md-9">
              <div class="row">
                <h1>Detalle del producto:</h1>
              </div>
            </div>
          <div class="col-md-offset-1 col-md-3 thumbnail">
            <img src="<?php echo $vProducto['url_imagen']; ?>" alt="">
          </div>
          <div class="col-md-5">
            <h2><?php echo $vProducto['nombre']; ?></h2>
            <p><?php echo $vProducto['detalle']; ?> </p>
          </div>
        </div>
      </div>
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
