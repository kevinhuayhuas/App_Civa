<?php

include_once '../config/conexion.php';
class Login extends Conectar{
    
    
    public function Loguearse($user,$pass) {
        $conectar=parent::conexion();
        parent::set_names();
        $sql="select Usuario,Password1 from cliente where Usuario=? and Password1=?";
        $sql= $conectar->prepare($sql);
     
        $sql->bindValue(1, $user);
        $sql->bindValue(2, $pass);
        $sql->execute();
        
        return $resultado=$sql->fetchAll();
        }
    

}


?>

