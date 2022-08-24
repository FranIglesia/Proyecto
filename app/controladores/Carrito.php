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
  
  public function borrar($idProducto, $idUsuario)
  {
    $errores = array();
    if (!$this->modelo->borrar($idProducto, $idUsuario)) {
      array_push($errores, "Error al borrar el registro del carrito");
    }
    $this->caratula($errores);
  }

  public function checkout()
  {
    $sesion = new Sesion();
    if ($sesion->getLogin()) {
      //
      $data = $_SESSION["usuario"];
      //
      $datos=[
        "titulo" => "Carrito | Datos de envío",
        "data" => $data,
        "menu" => true
      ];
      $this->vista("datosEnvioVista",$datos);
    } else {
      $datos=[
        "titulo" => "Carrito | Checkout",
        "menu" => true
      ];
      $this->vista("checkoutVista",$datos);
    }
  }

  public function formaPago($value='') 
  {
    $datos=[
        "titulo" => "Carrito | Forma de pago",
        "menu" => true
      ];
      $this->vista("formaPagoVista",$datos);
  }

  public function verificar()
  {
    print "verificar";
    var_dump($_POST);
  }
}
?>