<?php
/**
 * Controlador Login
 */
class Login extends Controlador{
  private $modelo;

  function __construct()
  {
    $this->modelo = $this->modelo("LoginModelo");
  }

  function caratula(){
    $datos = [
      "titulo" => "Login",
      "menu" => false
    ];
    $this->vista("loginVista",$datos);
  }

  function olvido(){
    print "Hola desde el olvido";
  }

  function registro(){
    $errores = array();
    $data = array();
    if ($_SERVER['REQUEST_METHOD']=="POST") {
      $nombre = isset($_POST["nombre"])?$_POST["nombre"]:"";
      $apellidoPaterno = isset($_POST["apellidoPaterno"])?
      $_POST["apellidoPaterno"]:"";
      $apellidoMaterno = isset($_POST["apellidoMaterno"])?
      $_POST["apellidoMaterno"]:"";
      $email = isset($_POST["email"])?$_POST["email"]:"";
      $clave1 = isset($_POST["clave1"])?$_POST["clave1"]:"";
      $clave2 = isset($_POST["clave2"])?$_POST["clave2"]:"";
      $direccion = isset($_POST["direccion"])?$_POST["direccion"]:"";
      $ciudad = isset($_POST["ciudad"])?$_POST["ciudad"]:"";
      $colonia = isset($_POST["colonia"])?$_POST["colonia"]:"";
      $estado = isset($_POST["estado"])?$_POST["estado"]:"";
      $codpos = isset($_POST["codpos"])?$_POST["codpos"]:"";
      $pais = isset($_POST["pais"])?$_POST["pais"]:"";
      $data = [
        "nombre"=>$nombre,
        "apellidoPaterno" => $apellidoPaterno,
        "apellidoMaterno" => $apellidoMaterno,
        "email" => $email,
        "clave1" => $clave1,
        "clave2" => $clave2,
        "direccion" => $direccion,
        "ciudad" => $ciudad,
        "colonia" => $colonia,
        "estado" => $estado,
        "codpos" => $codpos,
        "pais" => $pais
      ];
      //Validación 
      if ($nombre=="") {
        array_push($errores,"El nombre es requerido");
      }
      if ($apellidoPaterno=="") {
        array_push($errores,"El apellido paterno es requerido");
      }
      if ($email=="") {
        array_push($errores,"El correo es requerido");
      }
      if ($clave1=="") {
        array_push($errores,"La clave de acceso es requerida");
      }
      if ($clave2=="") {
        array_push($errores,"La clave de acceso es de verificación es requerida");
      }
      if ($direccion=="") {
        array_push($errores,"La direccion es requerida");
      }
      if ($ciudad=="") {
        array_push($errores,"La ciudad es requerida");
      }
      if ($colonia=="") {
        array_push($errores,"La colonia es requerida");
      }
      if ($estado=="") {
        array_push($errores,"El estado es requerido");
      }
      if ($codpos=="") {
        array_push($errores,"El código postal es requerido");
      }
      if ($pais=="") {
        array_push($errores,"El país es requerido");
      }
      if ($clave1!=$clave2) {
        array_push($errores,"Las claves de acceso no coinciden");
      }
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errores,"El correo electrónico no es válido");
      }
      if(count($errores)==0){
        $r = $this->modelo->insertarRegistro($data);
        if($r){
          $datos = [
          "titulo" => "Nuestra ilusión es levantarnos cada día para seguir un camino de servicio",
          "menu" => false,
          "errores" => [],
          "data" => [],
          "subtitulo" => "Bienvenid@ a nuestra tienda",
          "texto" => "En nombre de nuestra empresa te damos la más sincera bienvenida a nuestra tienda virtual, en la que esperamos encontrarán todo lo que necesitas.<br><br>El objetivo principal de este canal de comunicación es plasmar los valores que nos respaldan: el compromiso social, la máxima calidad y la voluntad de servicio, así como nuestro interés por todas aquellas ventajas que nos ofrece la tecnología. Todo ello tiene una presencia destacada en esta página web y en nuestras propias decisiones.<br><br>En 1999 comenzó una idea tan sencilla y a la vez tan responsable de crear esta tienda.<br><br>Sólo nos queda desearles un agradable experiencia en nuestra tienda.<br><br>Atentamente: Francisco José Iglesia Martín",
          "color" => "alert-success",
          "url" => "menu",
          "colorBoton" => "btn-success",
          "textoBoton" => "Iniciar"
          ];
          $this->vista("mensajeVista",$datos);
        } else {
          $datos = [
          "titulo" => "Error en el registro",
          "menu" => false,
          "errores" => [],
          "data" => [],
          "subtitulo" => "Error en el registro",
          "texto" => "Existió un error en el registro, posiblemente ya existe ese correo en nuestra base de datos, favor de verificarlo",
          "color" => "alert-danger",
          "url" => "login",
          "colorBoton" => "btn-danger",
          "textoBoton" => "Regresar"
          ];
          $this->vista("mensajeVista",$datos);
        }
      } else {
        $datos = [
        "titulo" => "Registro usuario",
        "menu" => false,
        "errores" => $errores,
        "data" => $data
        ];
        $this->vista("loginRegistroVista",$datos);
      }
    } else {
      $datos = [
      "titulo" => "Registro usuario",
      "menu" => false
      ];
      $this->vista("loginRegistroVista",$datos);
    } 
  }
}
?>