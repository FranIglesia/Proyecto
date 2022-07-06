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
      //Recibimos la información PHP7 isset()?valor1:valor2 => valor1 ?? valor2
      $tipo = $_POST['tipo'] ?? "";
      $nombre = addslashes(htmlentities($_POST['nombre'] ?? ""));
      $descripcion = addslashes(htmlentities($_POST['content'] ?? ""));
      $precio = Valida::numero($_POST['precio'] ?? "");
      $descuento = Valida::numero($_POST['descuento'] ?? "0");
      $envio = Valida::numero($_POST['envio'] ?? "0");
      $imagen = $_POST['imagen'] ?? "";
      $fecha = $_POST['fecha'] ?? "";
      $relacion1 = $_POST['relacion1'] ?? "";
      $relacion2 = $_POST['relacion2'] ?? "";
      $relacion3 = $_POST['relacion3'] ?? "";
      $masvendido = $_POST['masvendido'] ?? "";
      $nuevos = $_POST['nuevos'] ?? "";
      $status = $_POST['status'] ?? "";
      //Libros
      $autor = addslashes(htmlentities($_POST['autor'] ?? ""));
      $editorial = addslashes(htmlentities($_POST['editorial'] ?? ""));
      $pag = Valida::numero($_POST['pag'] ?? "");;
      //Cursos
      $publico = addslashes(htmlentities($_POST['publico'] ?? ""));
      $objetivo = addslashes(htmlentities($_POST['objetivos'] ?? ""));
      $necesario = addslashes(htmlentities($_POST['necesario'] ?? ""));

      //Validamos la información
      if(empty($nombre)){
        array_push($errores,"El nombre del producto es requerido");
      }
      if(empty($descripcion)){
        array_push($errores,"La descripción del producto es requerido");
      }
      if(!is_numeric($precio)){
        array_push($errores,"El precio debe de ser un número.");
      }
      if(!is_numeric($envio)){
        array_push($errores,"El envío debe de ser un número.");
      }
      if(!is_numeric($descuento)){
        array_push($errores,"El descuento debe de ser un número.");
      }
      if($precio < $descuento){
        array_push($errores,"El descuento no puede ser mayor al precio del producto.");
      }
      //1 = curso
      if($tipo==1){
        if(empty($publico)){
          array_push($errores,"El público objetivo del curso es requerido");
        }
        if(empty($objetivo)){
          array_push($errores,"Los objetivos del curso son requeridos");
        }
        if(empty($necesario)){
          array_push($errores,"Los requisitos necesarios del curso son requeridos");
        }
      } else if($tipo==2){
        //2 = libro
        if(empty($autor)){
          array_push($errores,"El autor del libro es requerido.");
        }
        if(empty($editorial)){
          array_push($errores,"La editorial del libro es requerida.");
        }
        if(!is_numeric($pag)){
          array_push($errores,"El número de las páginas debe de ser un número.");
        }
      }
      
      //Crear array de datos
      $datos = [
        "nombre" => $nombre,
        "descripcion" => $descripcion,
        "autor" => $autor,
        "editorial" => $editorial,
        "pag" => $pag,
        "fecha" => $fecha,
        "publico" => $publico,
        "objetivo" => $objetivo,
        "necesario" => $necesario,
        "precio" => $precio,
        "descuento" => $descuento,
        "envio" => $envio
      ];

      var_dump($datos);
      var_dump($errores);

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