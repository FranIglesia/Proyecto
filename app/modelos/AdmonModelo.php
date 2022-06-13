<?php
/**
 *  Usuario Administrador Modelo
 */
class AdmonModelo{
  private $db;

  function __construct()
  {
    $this->db = new MySQLdb();
  }
}
?>