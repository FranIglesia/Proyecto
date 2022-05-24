<?php
/**
 * Manejo de la base de datos MySQL
 */
class MySQLdb{
  private $host = "localhost";
  private $usuario = "root";
  private $clave = ""; //XAMPP la clave es vacía, y en MAMP es "root"
  private $db = "ecommerce5";
  private $puerto = ""; //MAMP en Windows necesitamos el puerto
  private $conn;
  
  function __construct()
  {
    $this->conn = mysqli_connect($this->host, 
      $this->usuario, 
      $this->clave,
      $this->db);

    if (mysqli_connect_errno()) {
      printf("Error en la conexión a la base de datos %s",
      mysqli_connect_errno());
      exit();
    } else {
      //print "Conexión exitosa"."<br>";
    }

    if (!mysqli_set_charset($this->conn, "utf8")) {
      printf("Error en la conversión de caracteress %s",
      mysqli_connect_error());
      exit();
    } else {
      //print "El conjunto de caracteres es: ".mysqli_character_set_name($this->conn)."<br>";
    }
    
    
  }
}
?>