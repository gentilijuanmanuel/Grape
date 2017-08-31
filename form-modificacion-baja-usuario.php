<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php if(isset($_POST['Modificar']))
    { echo "Modificar usuario";}
    else
    {echo "Eliminar usuario";}; ?></title>
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
                          <li class="active"><a href="panel-control.php"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Panel de control de administrador<span class="sr-only">(current)</span></a></li>
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
      $vQueryUsuario = "select * from usuarios where id_usuario = "."".$_POST["ID"]."";
      $Usuario_seleccionado = mysqli_query($link, $vQueryUsuario);
      $Usuario = mysqli_fetch_assoc($Usuario_seleccionado);
    ?>
    <?php if(isset($_POST['Modificar'])){ ?>
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <form class="" action="modificar-usuario.php" method="post">
            <div class="form-group">
              <label for="nombre_usuario">Nombre usuario</label>
              <input type="text" title="Sólo letras y/o números" name="nombre_usuario" class="form-control" value="<?php echo $Usuario['nombre_usuario']; ?>" required pattern="[A-Za-z0-9]+">
            </div>
            <div class="form-group">
              <label for="contrasenia">Contraseña</label>
              <input type="text" title="Sólo letras y/o números" name="contrasenia" class="form-control" value="<?php echo $Usuario['contrasenia']; ?>" required pattern="[A-Za-z0-9]+">
            </div>
            <div class="form-group">
              <label for="nombre">Nombre</label>
              <input type="text" title="Sólo letras" name="nombre" class="form-control" value="<?php echo $Usuario['nombre']; ?>" required pattern="[(A-Za-z)| ]+">
            </div>
            <div class="form-group">
              <label for="apellido">Apellido</label>
              <input type="text" title="Sólo letras" name="apellido" class="form-control" value="<?php echo $Usuario['apellido']; ?>" required pattern="[(A-Za-z)| ]+">
            </div>
            <input type="text" hidden="true" title="Modificar usuario" name="id_usuario" value="<?php echo $Usuario['id_usuario']; ?>">
            <div class="form-group">
              <label for="fecha_nac">Fecha de nacimiento</label>
              <input type="date" name="fecha_nac" title="AAAA.MM.DD" class="form-control" value="<?php echo $Usuario['fecha_nac']; ?>" required pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])">
            </div>

            <div class="form-group">
              <label for="tipo_usuario">Tipo de usuario</label>
              <select class="form-control" name="tipo_usuario">
                <?php
                if($Usuario['tipo_usuario'] == 1){
                echo "<option value=\"1\" selected>Administrador</option>";
                echo "<option value=\"0\">Comun</option>";
              }else{
                echo "<option value=\"1\">Administrador</option>";
                echo "<option value=\"0\" selected>Comun</option>";
              }?>
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Modificar Usuario</button>
            | <a href="listado-usuarios.php">Volver<a>
          </form>
        </div>
      </div>
    </div>
    <?php }
    else{ ?>
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-md-offset-4">
            <form class="" action="eliminar-usuario.php" method="post">
              <div class="form-group">
                <label for="nombre_usuario">Nombre usuario</label>
                <input type="text" title="Sólo letras y/o números" name="nombre_usuario" class="form-control" disabled="true" value="<?php echo $Usuario['nombre_usuario']; ?>" required pattern="[A-Za-z0-9]+">
              </div>
              <div class="form-group">
                <label for="contrasenia">Contraseña</label>
                <input type="text" disabled="true" title="Sólo letras y/o números" class="form-control" name="contrasenia" value="<?php echo $Usuario['contrasenia']; ?>" required pattern="[A-Za-z0-9]+">
              </div>
              <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" title="Sólo letras" disabled="true" name="nombre" class="form-control" value="<?php echo $Usuario['nombre']; ?>" required pattern="[(A-Za-z)| ]+">
              </div>

              <div class="form-group">
                <label for="apellido">Apellido</label>
                <input type="text" disabled="true" name="apellido" title="Sólo letras" class="form-control" value="<?php echo $Usuario['apellido']; ?>" required pattern="[(A-Za-z)| ]+">
              </div>
              <input type="text" hidden="true" title="Eliminar usuario" name="id_usuario" value="<?php echo $Usuario['id_usuario']; ?>">
              <div class="form-group">
                <label for="fecha_nac">Fecha de nacimiento</label>
                <input type="date" disabled="true" title="AAAA.MM.DD" name="fecha_nac" class="form-control" value="<?php echo $Usuario['fecha_nac']; ?>" required pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])">
              </div>
              <div class="form-group">
                <label for="detalle">Tipo de usuario</label>
              <?php if($Usuario['tipo_usuario'] == '1'){
                echo"<input type=\"text\" class=\"form-control\" disabled=\"true\" title=\"Eliminar usuario\" name=\"tipo_usuario\" value=\"Administrador\">";
              }
              else{
                echo"<input type=\"text\" class=\"form-control\" disabled=\"true\" title=\"Eliminar usuario\" name=\"tipo_usuario\" value=\"Comun\">";
              }
              ?>
            </div>
              <button type="submit" class="btn btn-danger">Eliminar usuario</button>
              | <a href="listado-usuarios.php">Volver<a>
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
