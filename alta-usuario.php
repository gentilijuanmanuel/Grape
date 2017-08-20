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

    <title>Registrarse - Grape</title>

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

        <div class="container">
            <div class="row">
                <div class="col col-md-6">
                    <h1>Registro en Grape</h1>
                    <?php
                        include("conexion.inc");
                        $nombre = $_POST['nombre'];
                        $apellido = $_POST['apellido'];
                        $mail = $_POST['mail'];
                        $usuario = $_POST['nombre-usuario'];
                        $password = $_POST['password'];

                        $validar = "select count(id_usuario) from usuarios where nombre_usuario = '$usuario'";
                        $resultado = mysqli_query($link, $validar) or die (mysqli_error($validar));
                        $resultado_array = mysqli_fetch_array($resultado);
                        if($resultado_array[0] != 0)
                        {
                            echo "<p>El nombre de usuario ya existe. Intente insertando otros datos.</p>";
                        }
                        else {
                            $alta = "insert into usuarios(nombre, apellido, mail, nombre_usuario, contrasenia, tipo_usuario) values ('$nombre', '$apellido','$mail','$usuario','$password', 0)";
                            $resultado = mysqli_query($link, $alta) or die (mysqli_error($link));
                            if($resultado) {
                                echo "<p>El usuario ha sido agregado correctamente.</p>";
                                $_SESSION['nombre_usuario'] = $usuario;
                                $_SESSION['ultimoAcceso'] = date("Y-n-j H:i:s");
                                $_SESSION['tipo_usuario'] = 0;
                            }
                        }
                        mysqli_close($link);
                    ?>
                    <a href="registrarse.php">Volver al formulario de registro</a>
                    <br>
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
  </body>
</html>