<?php
/**
 * Controlador Login
 */
class Tienda extends Controlador{
  private $modelo;

  function __construct()
  {
    $this->modelo = $this->modelo("TiendaModelo");
  }

  function caratula(){
    $datos = [
      "titulo" => "Bienvenid@ a nuestra tienda",
      "menu" => false
    ];
    $this->vista("tiendaVista",$datos);
  }  

}
?>