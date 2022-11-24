<?php
require_once("../config/conexion.php");
require_once '../modelos/Login.php';


 
 $login=new Login();
 $idUsuario=isset($_POST['idCliente']);
 $user=isset($_POST['user']);
 $pass=isset($_POST['pass']);
 
 $datos=$login->Loguearse($_POST['user'],$_POST['pass']);
    //print_r($datos);

    if(!empty($datos)){
        
        foreach($datos as $row){
            if($row["Usuario"]==$user and $row["Password1"]==$user){
                session_start();
               $_SESSION["user"]=$_POST["user"];
                header ("location:./../vistas/index.php");
            }else{
        header ("location:./../vistas/login.php");
    } 
            die();
        }
        
    }else{
       
        header ("location:./../vistas/login.php?fallo=true");
    } 
  
    


      
        
  //print_r($row);
    

?>
