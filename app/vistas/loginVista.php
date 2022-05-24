<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
</head>
<body>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark"> 
    <a href="index.php" class="navbar-brand">Tienda</a>
  </nav>
  <div class="container-fluid">
    <div class="row content">
      <div class="col-sm-2"></div>
      <div class="col-sm-8">
        <h1 class="text-center">Login</h1>
        <div class="card p-4 bg-light">
  <form action="login/verifica/" method="POST">
    <div class="form-group text-left">
      <label for="usuario">Usuario:</label>
      <input type="text" name="usuario" class="form-control">
    </div>
    <div class="form-group text-left">
      <label for="clave">Clave acceso:</label>
      <input type="password" name="clave" class="form-control">
    </div>
    <div class="form-group text-left">
      <input type="submit" value="Enviar" class="btn btn-success">
    </div>
    <input type="checkbox" name="recordar" >
      <label for="recordar">Recordar</label>
  </form>
</div><!--card-->
  <a href="login/alta/" >Darse de alta en el sistema</a><br>
  <a href="login/olvido/">¿Olvidaste tu clave de acceso?</a>
</div> <!--8col -->
<div class="col-sm-2"></div>
</div> <!--row -->
</div> <!--container-->
</body>
</html>