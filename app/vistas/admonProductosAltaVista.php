<?php include_once("encabezado.php"); ?>
<script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>
<script src="<?php print RUTA; ?>js/admonProductosAltaVista.js"></script>
<h1 class="text-center">Alta de un producto</h1>
<div class="card p-4 bg-light">
  <form action="<?php print RUTA; ?>admonProductos/alta/" method="POST" enctype="multipart/form-data">
    <div class="form-group text-left">
      <label for="usuario">* Tipo de producto:</label>
      <select class="form-control" name="tipo" id="tipo">
        <option value="void">Selecciona el tipo de producto</option>
        <?php
          for ($i=0; $i < count($datos["tipoProducto"]); $i++) { 
            print "<option value='".$datos["tipoProducto"][$i]["indice"]."'";
            print ">".$datos["tipoProducto"][$i]["cadena"]."</option>";
          } 
        ?>
      </select>
    </div>

    <div class="form-group text-left">
      <label for="nombre">* Nombre del producto:</label>
      <input type="text" name="nombre" class="form-control" required
      placeholder="Escribe el nombre del producto."
      value="<?php 
      print isset($datos['data']['nombre'])?$datos['data']['nombre']:''; 
      ?>"
      >
    </div>
    <div class="form-group text-left">
      <label for="content">* Descripción:</label>
      <textarea name="content" id="editor" rows="10">
      </textarea>
    </div>

    <div id="libro">
      <div class="form-group text-left">
      <label for="autor">* Autor:</label>
      <input type="text" name="autor" class="form-control" required
      placeholder="Escribe el autor del libro"
      value="<?php 
      print isset($datos['data']['autor'])?$datos['data']['autor']:''; 
      ?>"
      >
    </div>

      <div class="form-group text-left">
      <label for="editorial">* Editorial:</label>
      <input type="text" name="editorial" class="form-control" 
      placeholder="Escribe la editorial del libro"
      value="<?php 
      print isset($datos['data']['editorial'])?$datos['data']['editorial']:''; 
      ?>"
      >
    </div>

      <div class="form-group text-left">
      <label for="pag">* Páginas:</label>
      <input type="text" name="pag" class="form-control" 
      placeholder="Escribe el número de páginas del libro"
      value="<?php 
      print isset($datos['data']['pag'])?$datos['data']['pag']:''; 
      ?>"
      >
    </div>

    </div>

    <div id="curso">
    <div class="form-group text-left">
      <label for="publico">* Público objetivo:</label>
      <input type="text" name="publico" class="form-control" 
      placeholder="Escribe el público objetivo del curso"
      value="<?php 
      print isset($datos['data']['publico'])?$datos['data']['publico']:''; 
      ?>"
      >
    </div>

      <div class="form-group text-left">
      <label for="objetivo">* Objetivos:</label>
      <input type="text" name="objetivo" class="form-control" 
      placeholder="Escribe los objetivos del libro"
      value="<?php 
      print isset($datos['data']['objetivo'])?$datos['data']['objetivo']:''; 
      ?>"
      >
    </div>

      <div class="form-group text-left">
      <label for="necesario">* Conocimientos necesarios previos:</label>
      <input type="text" name="necesario" class="form-control" 
      placeholder="Escribe los conocimientos necesarios previos"
      value="<?php 
      print isset($datos['data']['necesario'])?$datos['data']['necesario']:''; 
      ?>"
      >
    </div>
      

    </div>

    <div class="form-group text-left">
      <label for="precio">* Precio del producto:</label>
      <input type="text" name="precio" class="form-control" 
      pattern="^(\d|-)?(\d|,)*\.?\d*$" 
      placeholder="Escribe el precio del producto sin comas ni símbolos." required
      value="<?php 
      print isset($datos['data']['precio'])?$datos['data']['precio']:''; 
      ?>"
      >
    </div>

    <div class="form-group text-left">
      <label for="descuento">Descuento del producto:</label>
      <input type="text" name="descuento" class="form-control" 
      pattern="^(\d|-)?(\d|,)*\.?\d*$" 
      placeholder="Escribe el descuento del producto sin comas ni símbolos." 
      value="<?php 
      print isset($datos['data']['descuento'])?$datos['data']['descuento']:''; 
      ?>"
      >
    </div>

    <div class="form-group text-left">
      <label for="envio">Costo del envío del producto:</label>
      <input type="text" name="envio" class="form-control" 
      pattern="^(\d|-)?(\d|,)*\.?\d*$" 
      placeholder="Escribe el costo del envio del producto sin comas ni símbolos." 
      value="<?php 
      print isset($datos['data']['envio'])?$datos['data']['envio']:''; 
      ?>"
      >
    </div>

    <div class="form-group text-left">
      <label for="imagen">* Imagen del producto:</label>
      <input type="file" name="imagen" class="form-control" 
      accept="image/jpeg"/>
    </div>
<!-- //validar fecha -->
    <div class="form-group text-left">
      <label for="fecha">* Fecha del producto:</label>
      <input type="date" name="fecha" class="form-control"
      placeholder="Fecha de creación o control del producto (DD/MM/AAAA)." 
      value="<?php 
      print isset($datos['data']['fecha'])?$datos['data']['fecha']:''; 
      ?>"
      >
    </div>

    <div class="form-group text-left">
      <label for="relacion1">Producto relacionado:</label>
      <select class="form-control" name="relacion1" id="relacion1">
        <option value="void">Selecciona el producto relacionado</option>
        <?php
        for ($i=0; $i < count($datos["catalogo"]); $i++) { 
            print "<option value='".$datos["catalogo"][$i]["id"]."'";
            print ">".$datos["catalogo"][$i]["nombre"]."</option>";
        }
        ?>
      </select>
    </div>

    <div class="form-group text-left">
      <label for="relacion2">Producto relacionado:</label>
      <select class="form-control" name="relacion2" id="relacion2">
        <option value="void">Selecciona el producto relacionado</option>
        <?php
        for ($i=0; $i < count($datos["catalogo"]); $i++) { 
            print "<option value='".$datos["catalogo"][$i]["id"]."'";
            print ">".$datos["catalogo"][$i]["nombre"]."</option>";
        }
        ?>
      </select>
    </div>

    <div class="form-group text-left">
      <label for="relacion3">Producto relacionado:</label>
      <select class="form-control" name="relacion3" id="relacion3">
        <option value="void">Selecciona el producto relacionado</option>
        <?php
        for ($i=0; $i < count($datos["catalogo"]); $i++) { 
            print "<option value='".$datos["catalogo"][$i]["id"]."'";
            print ">".$datos["catalogo"][$i]["nombre"]."</option>";
        }
        ?>
      </select>
    </div>

    <div class="form-group text-left">
      <label for="status">Estatus del producto:</label>
      <select class="form-control" name="status" id="status">
        <option value="void">Selecciona el status del producto</option>
        <?php
          for ($i=0; $i < count($datos["statusProducto"]); $i++) { 
            print "<option value='".$datos["statusProducto"][$i]["indice"]."'";
            print ">".$datos["statusProducto"][$i]["cadena"]."</option>";
          } 
        ?>
      </select>
    </div>

    <div class="form-check text-left">
      <input type="checkbox" name="masvendido" id="masvendido" class="form-check-input">
      <label for="masvendido" class="form-check-label">Producto más vendido</label>
    </div>

    <div class="form-check text-left">
      <input type="checkbox" name="nuevos" id="nuevos" class="form-check-input"><label for="nuevos" class="form-check-label">Producto nuevo</label>
    </div>

    <div class="form-group text-left">
      <input type="submit" value="Enviar" class="btn btn-success">
      <a href="<?php print RUTA; ?>admonProductos" class="btn btn-info">Regresar</a>
    </div>
  </form>
</div><!--card-->
<?php include_once("piepagina.php"); ?>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>