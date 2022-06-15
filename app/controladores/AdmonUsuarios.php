<?php
/**
 * Controlador usuarioAdmon.
 */
class AdmonUsuarios extends Controlador{
  private $modelo;
  
  function __construct()
  {
    $this->modelo = $this->modelo("AdmonUsuariosModelo");
  }

  public function caratula()
  {
    $datos = [
      "titulo" => "Administrativo Usuarios",
      "menu" => false,
      "admon" => true,
      "data" => []
    ];
    $this->vista("admonUsuariosCaratulaVista",$datos);
  }

  public function alta()
  {
    if ($_SERVER['REQUEST_METHOD']=="POST") {
      $errores = array();
      $data = array();
      $usuario = isset($_POST['usuario'])?$_POST['usuario']:"";
      $clave1 = isset($_POST['clave1'])?$_POST['clave1']:"";
      $clave2 = isset($_POST['clave2'])?$_POST['clave2']:"";
      $nombre = isset($_POST['nombre'])?$_POST['nombre']:"";
      //Validacion
      if(empty($usuario)){
        array_push($errores,"El usuario es requerido.");
      }
      if(empty($clave1)){
        array_push($errores,"La clave de acceso es requerida.");
      }
      if(empty($clave2)){
        array_push($errores,"La verificación de la clave de acceso es requerida.");
      }
      if($clave1!=$clave2){
        array_push($errores,"Las claves no coinciden, favor de verificar.");
      }
      if(empty($nombre)){
        array_push($errores,"El nombre del usuario es requerido.");
      }
      //Crear arreglo de datos
      $data = [
          "nombre" => $nombre,
          "clave1" => $clave1,
          "clave2" => $clave2,
          "usuario" => $usuario
        ];
      //Verificamos que no haya errores
      if (empty($errores)) {
        if ($this->modelo->insertarDatos($data)) {
          header("location:".RUTA."admonUsuarios");
        } else {
          $datos = [
          "titulo" => "Error en el registro",
          "menu" => false,
          "errores" => [],
          "data" => [],
          "subtitulo" => "Error en la inserción del registro",
          "texto" => "Existió un error al insertar el registro, favor de intentarlo más tarde o comunicarse a soporte técnico.",
          "color" => "alert-danger",
          "url" => "admonInicio",
          "colorBoton" => "btn-danger",
          "textoBoton" => "Regresar"
          ];
          $this->vista("mensajeVista",$datos);
        } 
      } else {
        $datos = [
        "titulo" => "Administrativo Usuarios Alta",
        "menu" => false,
        "admon" => true,
        "errores" => $errores,
        "data" => $data
      ];
      $this->vista("admonUsuariosVista",$datos);
      }
    } else {
      $datos = [
        "titulo" => "Administrativo Usuarios Alta",
        "menu" => false,
        "admon" => true,
        "data" => []
      ];
      $this->vista("admonUsuariosVista",$datos);
    }
  }

  public function baja()
  {
   print "Usuarios admon baja";
  }

  public function cambio()
  {
    print "Usuarios admon cambio";
  }
}

?>