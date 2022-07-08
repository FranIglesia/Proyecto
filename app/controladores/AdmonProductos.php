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
      $nombre = Valida::cadena($_POST['nombre'] ?? "");
      $descripcion = Valida::cadena($_POST['content'] ?? "");
      $precio = Valida::numero($_POST['precio'] ?? "");
      $descuento = Valida::numero($_POST['descuento'] ?? "0");
      $envio = Valida::numero($_POST['envio'] ?? "0");
      //XAMP 5.0.3 
      //$imagen = $_POST['imagen'];

      //XAMP 7.0.1
      $imagen = $_FILES['imagen']['name'];
      $imagen = Valida::archivo($imagen);
      //
      $fecha = $_POST['fecha'] ?? "";
      $relacion1 = $_POST['relacion1'] ?? "";
      $relacion2 = $_POST['relacion2'] ?? "";
      $relacion3 = $_POST['relacion3'] ?? "";
      //
      $masvendido = $_POST['masvendido'] ?? "";
      $nuevo = $_POST['nuevo'] ?? "";
      //validamos los checkboxes
      $masvendido = ($masvendido=="")?"0":"1";
      $nuevo = ($nuevo=="")?"0":"1";
      //
      $status = $_POST['status'] ?? "";
      //Libros
      $autor = Valida::cadena($_POST['autor'] ?? "");
      $editorial = Valida::cadena($_POST['editorial'] ?? "");
      $pag = Valida::numero($_POST['pag'] ?? "");
      //Cursos
      $publico = Valida::cadena($_POST['publico'] ?? "");
      $objetivo = Valida::cadena($_POST['objetivos'] ?? "");
      $necesario = Valida::cadena($_POST['necesario'] ?? "");

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
      if(!Valida::fecha($fecha)){
        array_push($errores,"La fecha es errónea o su formato es erróneo (AAAA-MM-DD).");
      } else if(Valida::fechaDif($fecha)){
        array_push($errores,"La fecha no puede ser mayor a la fecha actual.");
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
      if(Valida::archivoImagen($_FILES['imagen']['tmp_name'])){
        //Cambiar el nombre del archivo 
        $imagen = Valida::archivo($nombre);
        $imagen = strtolower($imagen.".jpg");

        //Subir el archivo
        if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
          //copiamos el archivo temporal
          copy($_FILES['imagen']['tmp_name'],"img/".$imagen);
          //Validar 240px
          Valida::imagen($imagen,240);
        } else {
          array_push($errores, "Error al subir el archivo de imágen.");
        }
      } else {
        array_push($errores, "Formato de la imagen no aceptado.");
      }

      
      
      
      //Crear arreglo de datos
      $datos = [
        "nombre" => $nombre,
        "descripcion" => $descripcion,
        "autor" => $autor,
        "editorial" => $editorial,
        "pag" => $pag,
        "publico" => $publico,
        "objetivo" => $objetivo,
        "necesario" => $necesario,
        "precio" => $precio,
        "descuento" => $descuento,
        "envio" => $envio,
        "fecha" => $fecha,
        "imagen" => $imagen,
        "masvendido" => $masvendido,
        "nuevo" => $nuevo
      ];

      var_dump($datos);

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