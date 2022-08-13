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
  }

  public function getCarrito($idUsuario)
  {
    $sql = "SELECT c.idUsuario as usuario, ";
    $sql.= "c.idProducto as producto, ";
    $sql.= "c.cantidad as cantidad, ";
    $sql.= "c.envio as envio, ";
    $sql.= "c.descuento as descuento, ";
    $sql.= "p.precio as precio, ";
    $sql.= "p.imagen as imagen, ";
    $sql.= "p.descripcion as descripcion, ";
    $sql.= "p.nombre as nombre ";
    $sql.= "FROM carrito as c, productos as p ";
    $sql.= "WHERE idUsuario='".$idUsuario."' AND ";
    $sql.= "estado=0 AND ";
    $sql.= "c.idProducto=p.id";
    //
    return $this->db->querySelect($sql);
  }

  public function actualiza($idUsuario, $idProducto, $cantidad) 
  {
    $sql = "UPDATE carrito ";
    $sql.= "SET cantidad=".$cantidad." ";
    $sql.= "WHERE idUsuario=".$idUsuario." AND ";
    $sql.= "idProducto=".$idProducto;
    return $this->db->queryNoSelect($sql);
  }
}
?>