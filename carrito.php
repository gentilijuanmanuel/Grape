<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Mi carrito</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
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
          <a class="navbar-brand" href="index.html">Grape</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Sobre nosotros <span class="sr-only">(current)</span></a></li>

          </ul>
          <form class="navbar-form navbar-right"  action="resultado-busqueda.php" method="post">
            <div class="form-group">
              <input type="text" class="form-control" name="busqueda" placeholder="Buscar whiskies, vinos...">
            </div>
            <button type="submit" class="btn btn-default">Buscar</button>
          </form>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    <br>
    <br>
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <h1>Mi Carrito</h1>
          
        </div>
      </div>
    </div>

  </body>
</html>
