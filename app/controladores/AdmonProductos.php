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

    //Leemos los estatus del producto
    $statusProducto = $this->modelo->getLlaves("statusProducto");

    //Leemos los estatus del producto
    $catalogo = $this->modelo->getCatalogo();

    //Recibimos la información de la vista
    if ($_SERVER['REQUEST_METHOD']=="POST") {
      //Recibimos la información PHP isset()?valor1:valor2 => valor1 ?? valor2
      $tipo = $_POST['tipo'] ?? "";
      $nombre = $_POST['nombre'] ?? "";
      $descripcion = $_POST['descripcion'] ?? "";
      $precio = $_POST['precio'] ?? "";
      $descuento = $_POST['descuento'] ?? "0";
      $envio = $_POST['envio'] ?? "0";
      $imagen = $_POST['imagen'] ?? "";
      $fecha = $_POST['fecha'] ?? "";
      $relacion1 = $_POST['relacion1'] ?? "";
      $relacion2 = $_POST['relacion2'] ?? "";
      $relacion3 = $_POST['relacion3'] ?? "";
      $masvendido = $_POST['masvendido'] ?? "";
      $nuevos = $_POST['nuevos'] ?? "";
      $status = $_POST['status'] ?? "";
      //Libros
      $autor = $_POST['autor'] ?? "";
      $editorial = $_POST['editorial'] ?? "";
      $pag = $_POST['pag'] ?? "";
      //Cursos
      $publico = $_POST['publico'] ?? "";
      $objetivo = $_POST['objetivos'] ?? "";
      $necesario = $_POST['necesario'] ?? "";

      //Validamos la información

      //Crear arreglo de datos

      if (empty($errores)) {
        
        //Enviamos al modelo
        //if (condition) {
          # code...
        //}
      }

    }

    //Vista Alta
    $datos = [
      "titulo" => "Administrativo Productos Alta",
      "menu" => false,
      "admon" => true,
      "errores" => $errores,
      "tipoProducto" => $llaves,
      "statusProducto" => $statusProducto,
      "catalogo" => $catalogo,
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