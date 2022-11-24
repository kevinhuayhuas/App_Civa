<?php

  //conexion a la base de datos

   require_once("../config/conexion.php");
   class Usuarios extends Conectar {
       //listar los usuarios
   	    public function get_usuarios(){

   	    	$conectar=parent::conexion();
   	    	parent::set_names();

   	    	$sql="select * from usuarios";

   	    	$sql=$conectar->prepare($sql);
   	    	$sql->execute();

   	    	return $resultado=$sql->fetchAll();
   	    }
        //metodo para eliminar usuario
            public function get_delete_por_id($idUsuario){

             $conectar=parent::conexion();
             parent::set_names();

             $sql="delete from usuarios where idUsuario=?";
             $sql=$conectar->prepare($sql);

             $sql->bindValue(1, $idUsuario);
             $sql->execute();

             return "1";

   	    }
             


        //metodo para registrar usuario
   	    public function registrar_usuario($Dni,$Nombre,$Apellido,$Cargo,$Usuario,$Password1,$Password2,$Telefono,$Correo,$Direccion,$Fecha_ingreso,$Estado){

             $conectar=parent::conexion();
             parent::set_names();

             $sql="insert into usuarios (idUsuario,Dni,Nombre,Apellido,Cargo,Usuario,Password1,Password2,Telefono,Correo,Direccion,Fecha_ingreso,Estado)
             values(null,?,?,?,?,?,?,?,?,?,?,?,?);";

             $sql=$conectar->prepare($sql);

              $sql->bindValue(1,$_POST["Dni"]);
             $sql->bindValue(2,$_POST["Nombre"]);
             $sql->bindValue(3,$_POST["Apellido"]);
             $sql->bindValue(4,$_POST["Cargo"]);
             $sql->bindValue(5,$_POST["Usuario"]);
             $sql->bindValue(6,$_POST["Password1"]);
             $sql->bindValue(7,$_POST["Password2"]);
             $sql->bindValue(8,$_POST["Telefono"]);
             $sql->bindValue(9,$_POST["Correo"]);
             $sql->bindValue(10,$_POST["Direccion"]);
             $sql->bindValue(11,$_POST["Fecha_ingreso"]);
             $sql->bindValue(12,$_POST["Estado"]);
             $sql->execute();
   	    }

        //metodo para editar usuario
   	    public function editar_usuario($idUsuario,$Dni,$Nombre,$Apellido,$Cargo,$Usuario,$Password1,$Password2,$Telefono,$Correo,$Direccion,$Fecha_ingreso,$Estado){
             $conectar=parent::conexion();
             parent::set_names();

             $sql="update usuarios set 
              Dni=?,
              Nombre=?,
              Apellido=?,
              Cargo=?,
              Usuario=?,
              Password1=?,
              Password2=?,
              Telefono=?,
              Correo=?,
              Direccion=?,
              Fecha_ingreso=?,
              Estado = ?

              where 
              idUsuario=?



             ";

              //echo $sql;

             $sql=$conectar->prepare($sql);

             $sql->bindValue(1,$_POST["Dni"]);
             $sql->bindValue(2,$_POST["Nombre"]);
             $sql->bindValue(3,$_POST["Apellido"]);
             $sql->bindValue(4,$_POST["Cargo"]);
             $sql->bindValue(5,$_POST["Usuario"]);
             $sql->bindValue(6,$_POST["Password1"]);
             $sql->bindValue(7,$_POST["Password2"]);
             $sql->bindValue(8,$_POST["Telefono"]);
             $sql->bindValue(9,$_POST["Correo"]);
             $sql->bindValue(10,$_POST["Direccion"]);
             $sql->bindValue(11,$_POST["Fecha_ingreso"]);
             $sql->bindValue(12,$_POST["Estado"]);
             $sql->bindValue(13,$_POST["idUsuario"]);
             $sql->execute();

            // print_r($_POST);
   	    }

        
        //mostrar los datos del usuario por el id
   	    public function get_usuario_por_id($idUsuario){
          
          $conectar=parent::conexion();
          parent::set_names();

          $sql="select * from usuarios where idUsuario=?";

          $sql=$conectar->prepare($sql);

          $sql->bindValue(1, $idUsuario);
          $sql->execute();

          return $resultado=$sql->fetchAll();

   	    }

   	    //editar el estado del usuario, activar y desactiva el estado

   	    public function editar_estado($idUsuario,$Estado){


   	    	$conectar=parent::conexion();
   	    	parent::set_names();

            //el parametro est se envia por via ajax
   	    	if($_POST["est"]=="0"){

   	    		$Estado=1;

   	    	} else {

   	    		$Estado=0;
   	    	}

   	    	$sql="update usuarios set 
            
            Estado=?

            where 
            idUsuario=?


   	    	";

   	    	$sql=$conectar->prepare($sql);


   	    	$sql->bindValue(1,$Estado);
   	    	$sql->bindValue(2,$idUsuario);
   	    	$sql->execute();


   	    }


   	    //valida correo y cedula del usuario

   	    public function get_dni_correo_del_usuario($Dni){
          
          $conectar=parent::conexion();
          parent::set_names();

          $sql="select * from usuarios where Dni=? ";

          $sql=$conectar->prepare($sql);

          $sql->bindValue(1, $Dni);
          
          $sql->execute();

          return $resultado=$sql->fetchAll();

   	    }
   }

?>