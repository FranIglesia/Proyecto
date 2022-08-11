<?php
/**
 * Login Carrito
 */
class CarritoModelo{
  private $db;
  
  function __construct()
  {
    $this->db = new MySQLdb();
  }
//se crea metodos de verifica y agregar producto
  public function verificaProducto($idProducto, $idUsuario)
  {
    $sql = "SELECT * FROM carrito WHERE idUsuario=".$idUsuario." ";
    $sql.= "AND idProducto=".$idProducto;
    $r = $this->db->querySelect($sql);
    return count($r);
  }

  public function agregaProducto($idProducto, $idUsuario)
  {
    $sql = "SELECT * FROM productos WHERE id=".$idProducto;
    $data = $this->db->query($sql);

    $sql = "INSERT INTO carrito ";
    $sql.= "SET estado=0, "; //carrito abierto
    $sql.= "idProducto=".$idProducto.", ";
    $sql.= "idUsuario=".$idUsuario.", ";
    $sql.= "descuento=".$data["descuento"].", ";
    $sql.= "envio=".$data["envio"].", ";
    $sql.= "cantidad=1, ";
    $sql.= "fecha=(NOW())";
    //
    return $this->db->queryNoSelect($sql);



    return count($r);
  }
}
?>