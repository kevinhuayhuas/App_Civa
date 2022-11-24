<?php

  //conexion a la base de datos

   require_once("../config/conexion.php");


   class Clientes extends Conectar {

       //listar los mantenimientos
   	    public function get_clientes(){

   	    	$conectar=parent::conexion();
   	    	parent::set_names();

   	    	$sql="select * from cliente";

   	    	$sql=$conectar->prepare($sql);
   	    	$sql->execute();

   	    	return $resultado=$sql->fetchAll();
   	    }

        //metodo para registrar mantenimiento
   	    public function registrar_cliente($TipoDocumento,$Documento,$Nombre,$Apellido,$Telefono,$Ruc,$RazonSocial,$Correo,$Usuario,$Password1,$Password2,$Fecha_ingreso,$Estado){

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
             $sql->bindValue(13, $_POST["Estado"]);
             $sql->execute();
   	    }

        //metodo para editar mantenimiento
   	    public function editar_cliente($idCliente,$TipoDocumento,$Documento,$Nombre,$Apellido,$Telefono,$Ruc,$RazonSocial,$Correo,$Usuario,$Password1,$Password2,$Fecha_ingreso,$Estado){

             $conectar=parent::conexion();
             parent::set_names();

             $sql="update cliente set 

              TipoDocumento=?,
              Documento=?,
              Nombre=?,
              Apellido=?,
              Telefono=?,
              Ruc=?,
              RazonSocial=?,
              Correo = ?,
              Usuario = ?,
              Password1 = ?,
              Password2 = ?,
              Fecha_ingreso = ?,
              Estado = ?
              
              where 
              idCliente=?

             ";

              //echo $sql;

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
             $sql->bindValue(13, $_POST["Estado"]);
             $sql->bindValue(14,$_POST["idCliente"]);
             $sql->execute();

             //print_r($_POST);
   	    }

        
        //mostrar los datos del mantenimiento por el id
   	    public function get_cliente_por_id($idCliente){
          
          $conectar=parent::conexion();
          parent::set_names();

          $sql="select * from cliente where idCliente=?";

          $sql=$conectar->prepare($sql);

          $sql->bindValue(1, $idCliente);
          $sql->execute();

          return $resultado=$sql->fetchAll();

   	    }

    //mostrar los datos del mantenimiento por el id
   	    public function get_delete_cliente_por_id($idCliente){
          
          $conectar=parent::conexion();
          parent::set_names();

          $sql="DELETE  from cliente where idCliente=?";

          $sql=$conectar->prepare($sql);

          $sql->bindValue(1, $idCliente);
          $sql->execute();

          return "1";

          //return $resultado=$sql->fetchAll();

   	    }




   	    //editar el estado del mantenimiento, activar y desactiva el estado

   	    public function editar_estado($idCliente,$Estado){


   	    	$conectar=parent::conexion();
   	    	parent::set_names();

            //el parametro est se envia por via ajax
   	    	if($_POST["est"]=="0"){

   	    		$Estado=1;

   	    	} else {

   	    		$Estado=0;
   	    	}

   	    	$sql="update cliente set 
            
            Estado=?

            where 
            idCliente=?


   	    	";

   	    	$sql=$conectar->prepare($sql);


   	    	$sql->bindValue(1,$Estado);
   	    	$sql->bindValue(2,$idCliente);
   	    	$sql->execute();


   	    }


   	    //valida precio_noche y tipo del mantenimiento

   	    public function get_tipo_Documento_fecha_ingreso_del_cliente($Documento,$TipoDocumento){
          
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