<?php
/**
 * Modelo Productos Admon.
 */
class AdmonProductosModelo{
  private $db;
  
  function __construct()
  {
    $this->db = new MySQLdb();
  }

  public function insertarDatos($data){
  }

  public function getProductos(){
    $sql = "SELECT * FROM productos WHERE baja=0";
    $data = $this->db->querySelect($sql);
    return $data;
  }
// controlar catalogos
  public function getCatalogo(){
    $sql = "SELECT id, nombre, tipo FROM productos ";
    $sql.= "WHERE baja=0 AND status!=0 ";
    $sql.= "Order BY tipo, nombre";
    $data = $this->db->querySelect($sql);
    return $data;
  }

  public function getLlaves($tipo){
    $sql = "SELECT * FROM llaves WHERE tipo='".$tipo."' ";
    $data = $this->db->querySelect($sql);
    return $data;
  }

  public function getProductoId($id){
    $sql = "SELECT * FROM productos WHERE id=".$id;
    $data = $this->db->query($sql);
    return $data;
  }

  public function bajaLogica($id){
    $errores = array();
    $sql = "UPDATE productos SET baja=1, baja_dt=(NOW()) WHERE id=".$id;
    if(!$this->db->queryNoSelect($sql)){
      array_push($errores,"Error al modificar el registro para baja.");
    }
    return $errores;
  }

  public function modificaProductos($data){
    $errores = array();
    return $errores;
  }
}

?>