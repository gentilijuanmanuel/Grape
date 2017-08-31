<?php
    session_start();
    if(isset($_SESSION['ultimoAcceso']) && isset($_SESSION['nombre_usuario'])) {
        $fechaGuardada = $_SESSION['ultimoAcceso'];
        $ahora = date("Y-n-j H:i:s");
        $tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada));

        if($tiempo_transcurrido >= 60) {
            session_destroy();
        } else {
            $_SESSION['ultimoAcceso'] = $ahora;
        }
    }
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
                <div class="row carousel-holder">
                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="images/dom-perignon.jpg" alt="Dom perignon">
                                    <div class="carousel-caption">
                                        <h3 style="font-family: 'EB Garamond', serif;">Dom Perignon</h3>
                                        <p style="font-family: 'Dancing Script', cursive;">Energía en su punto álgido</p>
                                    </div>
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="images/wine.jpg" alt="Vino">
                                    <div class="carousel-caption">
                                        <h3 style="color: black; font-family: 'EB Garamond', serif;">Ruttini</h3>
                                        <p style="color: black; font-family: 'Dancing Script', cursive;">Talento y sofisticación</p>
                                    </div>
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="images/trago.jpg" alt="Trago">
                                    <div class="carousel-caption">
                                        <h3 style="color: black; font-family: 'EB Garamond', serif;">Absolut</h3>
                                        <p style="color: black; font-family: 'Dancing Script', cursive;">Descubre las mejores recetas de cocteles y bebidas</p>
                                    </div>
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="panel panel-primary">
                    <div class="panel-heading">Listado de categorías</div>
                    <div class="panel-body">
                        <p>Una lista interminable de las mejores opciones.</p>
                    </div>

                    <div class="list-group">
                        <form action="filtro-categoria.php" method="post">
                            <a style="text-align: center;" href="categorias-whisky.php" class="list-group-item">Whiskies</a>
                            <a style="text-align: center;" href="categorias-champagne.php" class="list-group-item">Champagnes</a>
                            <a style="text-align: center;" href="categorias-vinos.php" class="list-group-item">Vinos</a>
                            <a style="text-align: center;" href="categorias-vodkas.php" class="list-group-item">Vodkas</a>
                            <a style="text-align: center;" href="categorias-licores.php" class="list-group-item">Licores</a>
                        </form>
                    </div>
                </div>
        </div>
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
