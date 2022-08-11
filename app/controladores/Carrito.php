<?php
/**
 * Controlador Carrito
 */
class Carrito extends Controlador{
  private $modelo;

  function __construct()
  {
    $this->modelo = $this->modelo("CarritoModelo");
  }

  function caratula(){
    $sesion = new Sesion();
    if ($sesion->getLogin()) {
      //
      //Leer los productos mas vendidos
      //
      //$data = $this->getMasVendidos();
      //
      //Leer los productos nuevos
      //
      //$nuevos = $this->getNuevos();
      //
      $datos = [
        "titulo" => "Bienvenid@ a nuestra tienda",
        "data" => $data,
        "nuevos" => $nuevos,
        "menu" => true
      ];
      $this->vista("tiendaVista",$datos);
    } else {
      header("location:".RUTA);
    }
  }

  public function agregaProducto($idProducto, $idUsuario)
  {
    $errores = array();
    if ($this->modelo->verificaProducto($idProducto, $idUsuario)==false) {
      //Añadir el registro
      if ($this->modelo->agregaProducto($idProducto, $idUsuario)==false) {
        array_push($errores,"Error al insertar el producto al carrito");
      }
    }
  }
  //Caratula
  //$this->caratula(); 
}
?>