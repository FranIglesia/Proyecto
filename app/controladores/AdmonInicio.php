<?php
/**
 * Controlador admonInicio
 */
class AdmonInicio extends Controlador{
  private $modelo;

  function __construct()
  {
    $this->modelo = $this->modelo("AdmonInicioModelo");
  }

  function caratula(){
      $datos = [
        "titulo" => "Administrativo | inicio",
        "menu" => false,
        "admon" => true,
        "data" => []
      ];
      $this->vista("AdmonInicioVista",$datos);
  }

}
?>