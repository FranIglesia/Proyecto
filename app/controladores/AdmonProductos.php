<?php
/**
 * Controlador para productos
 */
class AdmonProductos extends Controlador
{
  private $modelo;
  
  function __construct()
  {
   $this->modelo = $this->modelo("AdmonProductosModelo");
  }

  public function caratula(){
    //Creamos sesion
    $sesion = new Sesion();

    if ($sesion->getLogin()) {
      //Leemos los datos de la tabla
      $data = $this->modelo->getProductos();

      //Leemos la llaves de tipoProducto
      $llaves = $this->modelo->getLlaves("tipoProducto");

      //Vista caratula
      $datos = [
        "titulo" => "Administrativo Productos",
        "menu" => false,
        "admon" => true,
        "data" => $data,
        "tipoProducto" => $llaves
      ];
      $this->vista("admonProductosCaratulaVista",$datos);
    } else {
      header("location:".RUTA."admon");
    }
    
  }

  public function alta(){
    //Definir los arreglos
    $data = array();
    $errores = array();

    //Leemos la llaves de tipoProducto
    $llaves = $this->modelo->getLlaves("tipoProducto");

    //Leemos los estatus del producto para indicar si esta o no activo
    $statusProducto = $this->modelo->getLlaves("statusProducto");

    //Vista Alta
    $datos = [
      "titulo" => "Administrativo Productos Alta",
      "menu" => false,
      "admon" => true,
      "errores" => $errores,
      "tipoProducto" => $llaves,
      "statusProducto" => $statusProducto,
      "data" => $data
    ];
    $this->vista("admonProductosAltaVista",$datos);
  }

  public function baja($id=""){
    # code...
  }

  public function cambio($id=""){
    # code...
  }
}

?>