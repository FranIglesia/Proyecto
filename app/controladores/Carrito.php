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

  function caratula($errores=[]){
    $sesion = new Sesion();
    if ($sesion->getLogin()) {
      //
      //Recuperamos el id del usuario
      //
      $idUsuario = $_SESSION["usuario"]["id"];
      //
      //Leer los productos del carrito
      //
      $data = $this->modelo->getCarrito($idUsuario);
      //
      $datos = [
        "titulo" => "Bienvenid@ a nuestra tienda",
        "data" => $data,
        "idUsuario" => $idUsuario,
        "errores" => $errores,
        "menu" => true
      ];
      $this->vista("carritoVista",$datos);
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
    //Caratula
    $this->caratula($errores);
  }

  public function actualiza()
  {
    if (isset($_POST["num"]) && isset($_POST["idUsuario"])) {
      $errores = array();
      $num = $_POST["num"];
      $idUsuario = $_POST["idUsuario"];
      for ($i=0; $i < $num ; $i++) { 
        $idProducto = $_POST["i".$i];
        $cantidad = $_POST["c".$i];
        if (!$this->modelo->actualiza($idUsuario, $idProducto, $cantidad)) {
          array_push($errores, "Error al actualizar el producto ".$idProducto);
        }
      }
      $this->caratula($errores);
    }
  }
  
}
?>