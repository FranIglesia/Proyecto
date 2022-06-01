<?php include_once("encabezado.php"); ?>
        <h1 class="text-center"><?php print $datos["subtitulo"]; ?></h1>
  <div class="card p-4 bg-light">
  <form action="<?php print RUTA; ?>login/olvido/" method="POST">
    <div class="form-group text-left">
      <label for="email">Correo electrónico:</label>
      <input type="email" name="email" class="form-control">
    </div>
    <div class="form-group text-left">
      <input type="submit" value="Enviar" class="btn btn-success">
    </div>
  </form>
  <p>Se te enviará un correo, favor de verificar tu bandeja de spam.</p>
</div><!--card-->
<?php include_once("piepagina.php"); ?>