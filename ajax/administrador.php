<?php
require_once("../config/conexion.php");
require_once '../modelos/Administrador.php';


 
 $administrador=new Administrador();
 $idUsuario=isset($_POST['idUsuario']);
 $user=isset($_POST['user']);
 $pass=isset($_POST['pass']);
 
 $datos=$administrador->Loguearse($_POST['user'],$_POST['pass']);
    //print_r($datos);

    if(!empty($datos)){
        
        foreach($datos as $row){
            if($row["Usuario"]==$user and $row["Password1"]==$user){
                session_start();
               $_SESSION["user"]=$_POST["user"];
                header ("location:./../vistas/index.php");
            }else{
        header ("location:./../vistas/administrador.php");
    } 
            die();
        }
        
    }else{
       
        header ("location:./../vistas/administrador.php?fallo=true");
    } 
  
    


      
        
  //print_r($row);
    

/* 
 * 
$acceso=new PDO("mysql:host=localhost;dbname=hotel", "root","root");
$recorrido=$acceso->query("select*from usuarios");
if(!empty($user)){
    foreach ($recorrido as $row) {
    if($row[5]==$user and $row[6]==$pass){
     header ("location:index.php");  
    } echo "uno";
  
}header ("location:login.php");
}*/





?>
