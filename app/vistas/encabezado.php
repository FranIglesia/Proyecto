<!DOCTYPE html>
<html>
<head>
  <title><?php print $datos["titulo"]; ?></title>
  <meta charset="utf-8">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>
<body>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <a href="<?php print RUTA; ?>" class="navbar-brand">Tienda</a>
    <?php if ($datos["menu"]) {
      # menu
    }
    ?>
  </nav>
  <div class="container-fluid">
    <div class="row content">
      <div class="col-sm-2"></div>
      <div class="col-sm-8">
      <?php
        if (isset($datos["errores"])) {
          if (count($datos["errores"])>0) {
            print "<div class='alert alert-danger mt-3'>";
            foreach ($datos["errores"] as $key => $valor) {
              print "<strong>* ".$valor."</strong><br>";
            }
            print "</div>";
          }
        }
      ?>