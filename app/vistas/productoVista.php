<?php include_once("encabezado.php"); 
print "<h2 class='text-center'>".$datos["subtitulo"]."</h2>";
//Curso en línea o llibro
if($datos["data"]["tipo"]==1){
  print "Descripción: ".$datos["data"]["descripcion"];
} else if($datos["data"]["tipo"]==2){
  print "Autor: ".$datos["data"]["autor"];
}

print "<a href='".RUTA."tienda' class='btn btn-success'/>Regresa</a>";
include_once("piepagina.php"); ?>