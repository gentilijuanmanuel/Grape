<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title><?php if(isset($_POST['Modificar']))
    { echo "Modificar producto";}
    else
    {echo "Eliminar producto";}; ?></title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <?php
    include("conexion.inc");
    $vQuery = "select * from tipos_bebidas";
    $sql_tipos_bebida = mysqli_query($link, $vQuery);

    $vQueryProducto = "select * from bebidas where id_bebida = "."'".$_POST["ID"]."'";
    $Producto_seleccionado = mysqli_query($link, $vQueryProducto);
    $Producto = mysqli_fetch_assoc($Producto_seleccionado);
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
              echo '<li class="active"><a href="registrarse.html">Registrarse <span class="sr-only">(current)</span></a></li>';
              echo '</ul>';
          }
      ?>
        <form class="navbar-form navbar-right" action="resultado-busqueda.php" method="post">
          <div class="form-group">
            <input type="text" class="form-control" title="Buscar" name="busqueda" placeholder="Buscar whiskies, vinos...">
          </div>
          <button type="submit" class="btn btn-default">Buscar</button>
        </form>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
    <br>
    <br>
    <br>
    <br>
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
              <input type="text" hidden="true" title="Eliminar producto" name="id_bebida" value="<?php echo $Producto['id_bebida']; ?>">

              <button type="submit" class="btn btn-danger">Eliminar producto</button>
              | <a href="listado-productos.php">Volver<a>
            </form>
          </div>
        </div>
      </div>

    <?php } ?>
  </body>
</html>