<?php
/**
 * Controlador tienda
 */
class Tienda extends Controlador{
  private $modelo;

  function __construct()
  {
    $this->modelo = $this->modelo("TiendaModelo");
  }

  function caratula(){
    $sesion = new Sesion();
    if ($sesion->getLogin()) {
      //
      //Leer los productos mas vendidos de la tienda
      //
      $data = $this->getMasVendidos();
      //
      $datos = [
        "titulo" => "Bienvenid@ a nuestra tienda",
        "data" => $data,
        "menu" => true
      ];
      $this->vista("tiendaVista",$datos);
    } else {
      header("location:".RUTA);
    }
  }

  function logout(){
    session_start();
    if (isset($_SESSION["usuario"])) {
      $sesion = new Sesion();
      $sesion->finalizarLogin();
    }
    header("location:".RUTA);
  }

  public function getMasVendidos()
  {
    $data = array();
    require_once "AdmonProductos.php";
    $productos = new AdmonProductos();
    $data = $productos->getMasVendidos();
    unset($productos);
    return $data;
  }
}
?>