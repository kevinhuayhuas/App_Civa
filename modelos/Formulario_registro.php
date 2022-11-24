<?php

  //conexion a la base de datos

   require_once("../config/conexion.php");


   class Formulario_registro extends Conectar {

       //listar los mantenimientos
   	    public function get_formulario_registro(){

   	    	$conectar=parent::conexion();
   	    	parent::set_names();

   	    	$sql="select * from cliente";

   	    	$sql=$conectar->prepare($sql);
   	    	$sql->execute();

   	    	return $resultado=$sql->fetchAll();
   	    }

        //metodo para registrar mantenimiento
   	    public function registrar_formulario($TipoDocumento,$Documento,$Nombre,$Apellido,$Telefono,$Ruc,$RazonSocial,$Correo,$Usuario,$Password1,$Password2,$Fecha_ingreso,$Estado){

             $conectar=parent::conexion();
             parent::set_names();
             $sql="insert into cliente 
             values(null,?,?,?,?,?,?,?,?,?,?,?,?,?);";

             $sql=$conectar->prepare($sql);

             $sql->bindValue(1, $_POST["TipoDocumento"]);
             $sql->bindValue(2, $_POST["Documento"]);
             $sql->bindValue(3, $_POST["Nombre"]);
             $sql->bindValue(4, $_POST["Apellido"]);
             $sql->bindValue(5, $_POST["Telefono"]);
             $sql->bindValue(6, $_POST["Ruc"]);
             $sql->bindValue(7, $_POST["RazonSocial"]);
             $sql->bindValue(8, $_POST["Correo"]);
             $sql->bindValue(9, $_POST["Usuario"]);
             $sql->bindValue(10, $_POST["Password1"]);
             $sql->bindValue(11, $_POST["Password2"]);
             $sql->bindValue(12, $_POST["Fecha_ingreso"]);
             $sql->bindValue(13, $Estado);
             $sql->execute();
   	    }

        



   	  


   	    //valida precio_noche y tipo del mantenimiento

   	    public function get_tipo_Documento_fecha_ingreso_del_formulario($Documento,$TipoDocumento){
          
          $conectar=parent::conexion();
          parent::set_names();

          $sql="select * from cliente where Documento=? and TipoDocumento=?";

          $sql=$conectar->prepare($sql);
          $sql->bindValue(1, $Documento);
          $sql->bindValue(2, $TipoDocumento);
       
          $sql->execute();

          return $resultado=$sql->fetchAll();

   	    }













   }



?>