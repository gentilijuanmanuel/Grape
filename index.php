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
                            <li class="active"><a href="listado-productos.php"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Panel de control de administrador<span class="sr-only">(current)</span></a></li>
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

                    <hr>
                    <h3 style="font-family: 'EB Garamond', serif; text-align: center;">Grape es un sitio web de venta de bebidas alcohólicas. Podrás acceder a todo el listado de productos que poseemos, discriminando por categorías o por título. Además, si te registras, podrás añadir a un carrito las bebidas que desees comprar.</h3>
                    <hr>
                    <br>
                    <h1 style="text-align: center;">Productos destacados</h1>
                    <br>
                    <div class="col-sm-4 col-lg-4 col-md-9">
                            <div class="thumbnail">
                                <img src="images/blue-label.jpg" alt="Jhonnie Walker Blue Label">
                                <div class="caption">
                                    <h4><p title="Precio" class="pull-right">$999.90</p>
                                    <form action="detalle-producto.php" method="post" name="form<?php echo 1; ?>">
                                        <input type="text" hidden="true" name="ID" title="ID" value="<?php echo 1; ?>">
                                        <a href="javascript:viod(0)" onclick="javascript:document.forms['form<?php echo 1; ?>'].submit();"><?php echo 'JW Blue Label' ?></a>
                                    </form> 
                                    </h4>
                                    <p>Whisky Johnnie Walker Blue Label. 15 años de añejamiento.</p>
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

                        <div class="col-sm-4 col-lg-4 col-md-4">
                            <div class="thumbnail">
                                <img src="images/ruttini.jpg" alt="Vino Ruttini">
                                <div class="caption">
                                    <h4><p title="Precio" class="pull-right">$499.99</p>
                                    <form action="detalle-producto.php" method="post" name="form<?php echo 3; ?>">
                                        <input type="text" hidden="true" name="ID" title="ID" value="<?php echo 3; ?>">
                                        <a href="javascript:viod(0)" onclick="javascript:document.forms['form<?php echo 3; ?>'].submit();"><?php echo 'Ruttini Cavernet' ?></a>
                                    </form> 
                                    </h4>
                                    <p>Ruttini Cavernet Sauvignon Cosecha 2012.</p>
                                </div>
                                <div class="ratings">
                                    <p class="pull-right">12 reviews</p>
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

                        <div class="col-sm-4 col-lg-4 col-md-4">
                            <div class="thumbnail">
                                <img src="images/dom-perignon-rose.jpg" alt="Dom perignon rose">
                                <div class="caption">
                                    <h4><p title="Precio" class="pull-right">$4999,90</p>
                                    <form action="detalle-producto.php" method="post" name="form<?php echo 4; ?>">
                                        <input type="text" hidden="true" name="ID" title="ID" value="<?php echo 4; ?>">
                                        <a href="javascript:viod(0)" onclick="javascript:document.forms['form<?php echo 4; ?>'].submit();"><?php echo 'Dom Perignon Rosé' ?></a>
                                    </form> 
                                    </h4>
                                    <p> Shampagne Dom Perignon Rosé</p>
                                </div>
                                <div class="ratings">
                                    <p class="pull-right">31 reviews</p>
                                    <p>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4 col-lg-4 col-md-4">
                            <div class="thumbnail">
                                <img src="images/baron-b.jpg" alt="Champagne Baron B">
                                <div class="caption">
                                    <h4><p title="Precio" class="pull-right">$699,90</p>
                                    <form action="detalle-producto.php" method="post" name="form<?php echo 5; ?>">
                                        <input type="text" hidden="true" name="ID" title="ID" value="<?php echo 5; ?>">
                                        <a href="javascript:viod(0)" onclick="javascript:document.forms['form<?php echo 5; ?>'].submit();"><?php echo 'Baron B' ?></a>
                                    </form> 
                                    </h4>
                                    <p>Shampagne Baron B Extra Brut.</p>
                                </div>
                                <div class="ratings">
                                    <p class="pull-right">6 reviews</p>
                                    <p>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star-empty"></span>
                                        <span class="glyphicon glyphicon-star-empty"></span>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4 col-lg-4 col-md-4">
                            <div class="thumbnail">
                                <img src="images/absolut-pear.jpg" alt="Vodka Absolut pera">
                                <div class="caption">
                                    <h4><p title="Precio" class="pull-right">$459.99</p>
                                    <form action="detalle-producto.php" method="post" name="form<?php echo 6; ?>">
                                        <input type="text" hidden="true" name="ID" title="ID" value="<?php echo 6; ?>">
                                        <a href="javascript:viod(0)" onclick="javascript:document.forms['form<?php echo 6; ?>'].submit();"><?php echo 'Absolut Pear' ?></a>
                                    </form> 
                                    </h4>
                                    <p>Vodka Absolut sabor pera.</p>
                                </div>
                                <div class="ratings">
                                    <p class="pull-right">18 reviews</p>
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

                        <div class="col-sm-4 col-lg-4 col-md-4">
                            <div class="thumbnail">
                                <img src="images/gold-label.jpg" alt="Jhonnie Walker Gold Label">
                                <div class="caption">
                                    <h4><p title="Precio" class="pull-right">$1499.99</p>
                                    <form action="detalle-producto.php" method="post" name="form<?php echo 2; ?>">
                                        <input type="text" hidden="true" name="ID" title="ID" value="<?php echo 2; ?>">
                                        <a href="javascript:viod(0)" onclick="javascript:document.forms['form<?php echo 2; ?>'].submit();"><?php echo 'JW Gold Label' ?></a>
                                    </form> 
                                    </h4>
                                    <p>Whisky Johnnie Walker Gold Label. 20 años de añejamiento.</p>
                                </div>
                                <div class="ratings">
                                    <p class="pull-right">18 reviews</p>
                                    <p>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
    <!-- /.container -->

    <!-- Nuestros clientes -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <hr>
                <h1 style="text-align: center;">Nuestros clientes</h1>
                <div class="col-md-8 col-md-offset-2">
                    <blockquote>
                        <p><em>"Grape es la mejor tienda online de bebidas que he utilizado en mi vida".</em></p>
                        <footer>Mark Thompson, presidente de <cite title="Source Title">The New York Times</cite></footer>
                    </blockquote>
                </div>
            </div>
        </div>  
    </div>

    <!-- Footer -->
    <div class="container">
        <hr>
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