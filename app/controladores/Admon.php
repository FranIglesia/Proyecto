<?php
/**
 * Controlador  usuario administrativo
 */
class Admon extends Controlador{
  private $modelo;

  function __construct(){
    $this->modelo = $this->modelo("AdmonModelo");
  }

  public function caratula()
  {
    $datos = [
      "titulo" => "Administrativo",
      "menu" => false,
      "data" => []
    ];
    $this->vista("admonVista",$datos);
  }

  public function verifica()
  {
    $datos = [
      "titulo" => "Administrativo Inicio",
      "menu" => false,
      "admon" => true,
      "data" => []
    ];
    $this->vista("admonInicioVista",$datos);
  }
}

?>