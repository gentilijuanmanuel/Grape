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

        <div class="container">
            <div class="row">
                <div class="col col-md-4 col-md-offset-4">
                <h1>Ingreso a Grape</h1>
                <?php
                    include("conexion.inc");
                    $nombreUsuario = $_POST['nombre-usuario'];
                    $password = $_POST['password'];

                    $consulta = "select count(id_usuario) from usuarios where nombre_usuario ='$nombreUsuario' and contrasenia = '$password'";
                    $resultado = mysqli_query($link, $consulta) or die (mysqli_error($link));
                    $resultado_array = mysqli_fetch_array($resultado);
                    if($resultado_array[0] != 0)
                    {
                        echo "<div class='alert alert-success' role='alert'>Has sido logueado correctamente, $nombreUsuario.</div>";
                        $consultaTipoUsuario = "select tipo_usuario from usuarios where nombre_usuario = '$nombreUsuario'";
                        $resultadoConsultaTipoUsuario = mysqli_query($link, $consultaTipoUsuario) or die (mysqli_error($link));
                        $resultadoConsultaTipoUsuario_array = mysqli_fetch_array($resultadoConsultaTipoUsuario);
                        $fecha = date("Y-n-j H:i:s");
                        $_SESSION['ultimoAcceso'] = $fecha;
                        $_SESSION['nombre_usuario'] = $nombreUsuario;
                        $_SESSION['tipo_usuario'] = $resultadoConsultaTipoUsuario_array[0];
                    }
                    else {
                        echo "<div class='alert alert-danger' role='alert'>El usuario y/o la contraseña no es correcto.</div>";
                        echo "<a href='log-in.php'>Volver a ingresar datos</a>";
                        echo "<br>";
                    }
                    mysqli_close($link);
                ?>
                <a href="index.php">Volver a la página principal</a>
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

        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>
