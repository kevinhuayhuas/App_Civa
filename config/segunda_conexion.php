<?php
class Conexion {
    //Atributo para la cadena de conexi�n
    private $cn=null;

    //Funci�n de conexion
    public function getConexion(){
    try{
      //Script de la cadena de conexi�n    
      $cadena='mysql:host=localhost;dbname=dbproyecto';
        
      //Implementando la cadena de conexi�n    
	$this->cn = new PDO($cadena,'root','root');
      $this->cn->setAttribute(PDO::ATTR_CASE,PDO::CASE_LOWER);
        
      //Retornando la conexi�n correcta
      return $this->cn;
     } catch(PDOException $ex){
            echo 'Error en la conexion - '.$ex->getMessage();
      }
    }
}
