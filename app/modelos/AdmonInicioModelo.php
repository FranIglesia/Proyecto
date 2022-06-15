<?php
/**
 * Admon InicioModelo
 */
class AdmonInicioModelo{
  private $db;
  
  function __construct()
  {
    $this->db = new MySQLdb();
  }
}
?>