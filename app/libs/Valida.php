<?php
/**
 * 
 */
class Valida{
  
  function __construct()
  {
    
  }

  public static function numero($cadena){
    $buscar  = array(' ', '$', ',');
    $reemplazar = array('', '', '');
    $numero = str_replace($buscar, $reemplazar, $cadena);
    return $numero;
  }
}
?>