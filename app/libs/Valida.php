<?php
/**
 * 
 */
class Valida{
  
  function __construct()
  {
    # code...
  }

  public static function numero($cadena){
    $buscar  = array(' ', '$', ',');
    $reemplazar = array('', '', '');
    $numero = str_replace($buscar, $reemplazar, $cadena);
    return $numero;
  }

  public static function archivo($cadena){
    $buscar  = array(' ', '*', '!','@','?','á','é','í','ó','ú','Á','É','í','ó','Ú','ñ','Ñ','Ü','ü');
    $reemplazar = array('-', '', '','','','a','e','i','o','u','A','E','I','O','U','n','N','U','u');
    $cadena = str_replace($buscar, $reemplazar, $cadena);
    return $cadena;
  }

  public static function fecha($cadena){
    //ISO AAAA-MM-DD 
    $fecha_array = explode("-", $cadena);
    return checkdate($fecha_array[1], $fecha_array[2], $fecha_array[0]);
  }

  public static function fechaDif($fecha){
    $hoy = date_create('now');
    $fecha2 = date_create($fecha);
    return ($fecha2 > $hoy);
  }
}
?>