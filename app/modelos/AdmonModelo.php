<?php
/**
 * Administrador Modelo
 */
class AdmonModelo{
  private $db;

  function __construct()
  {
    $this->db = new MySQLdb();
  }

  public function verificarClave($data)
  {
    //Declaramos el arreglo
    $errores = array();

    //Encriptamos
    $clave = hash_hmac("sha512", $data['clave'], LLAVE);

    //Enviamos el query
    $sql = "SELECT id, clave FROM admon WHERE correo='".$data['usuario']."'";
    $data = $this->db->query($sql);

    //Verificación
    if (empty($data)) {
      array_push($errores, "No existe el usuario.");
    } else if($clave!=$data['clave']){
      array_push($errores, "La clave de acceso no es correcta.");
    } else if(count($data)>2){
      array_push($errores, "El correo electrónico esta duplicado.");
    } else {
      $sql = "UPDATE admon SET login_dt=NOW() WHERE id=".$data['id'];
      if (!$this->db->queryNoSelect($sql)) {
        array_push($errores, "Error al modificar la fecha del último acceso.");
      }
    }
    
    //Regresamos los errores
    return $errores;
  }
}
?>