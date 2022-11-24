<?php

  //llamar a la conexion de la base de datos

  require_once("../config/conexion.php");


  //llamar a el modelo Usuarios 

  require_once("../modelos/Usuarios.php");


  $usuarios = new Usuarios();

  //declaramos las variables de los valores que se envian por el formulario y que recibimos por ajax y decimos que si existe el parametro que estamos recibiendo

   $idUsuario = isset($_POST["idUsuario"]);
   $Dni=isset($_POST["Dni"]);
   $Nombre=isset($_POST["Nombre"]);
   $Apellido=isset($_POST["Apellido"]);
   $Cargo=isset($_POST["Cargo"]);
   $Usuario=isset($_POST["Usuario"]);
   $Password1=isset($_POST["Password1"]);
   $Password2=isset($_POST["Password2"]);
   $Telefono=isset($_POST["Telefono"]);
   $Correo=isset($_POST["Correo"]);
   $Direccion=isset($_POST["Direccion"]); 
   $Fecha_ingreso=isset($_POST["Fecha_ingreso"]);
   $Estado=isset($_POST["Estado"]);
//este es el que se envia del formulario

     switch($_GET["op"]){

         case "guardaryeditar":

                 /*verificamos si existe la cedula y correo en la base de datos, si ya existe un registro con la cedula o correo entonces no se registra el usuario*/


                 $datos = $usuarios->get_dni_correo_del_usuario($_POST["Dni"]);
                 
                 //validacion de password
                 if($Password1 == $Password2){

                 	   /*si el id no existe entonces lo registra
	                     importante: se debe poner el $_POST sino no funciona*/

	                     if(empty($_POST["idUsuario"])){

	                     	   /*si coincide password1 y password2 entonces verificamos si existe la cedula y correo en la base de datos, si ya existe un registro con la cedula o correo entonces no se registra el usuario*/

	                     	   if(is_array($datos)==true and count($datos)==0){
                                
                                 //no existe el usuario por lo tanto hacemos el registros

                                $usuarios->registrar_usuario($Dni,$Nombre,$Apellido,$Cargo,$Usuario,$Password1,$Password2,$Telefono,$Correo,$Direccion,$Fecha_ingreso,$Estado);
                                        
                                 $messages[]="El usuario se registró correctamente";

                                 /*si ya exista el correo y la cedula entonces aparece el mensaje*/

	                     	   } else {

                                    $messages[]="La cédula o el correo ya existe";

	                     	   }
                     
	                     } //cierre de la validacion empty

	                     else {

                             /*si ya existe entonces editamos el usuario*/

                            $usuarios->editar_usuario($idUsuario,$Dni,$Nombre,$Apellido,$Cargo,$Usuario,$Password1,$Password2,$Telefono,$Correo,$Direccion,$Fecha_ingreso,$Estado);

                             $messages[]="El usuario se editó correctamente";
	                     }

                     
                
                } else {

                 	  /*si el password no conincide, entonces se muestra el mensaje de error*/

                        $errors[]="El password no coincide";
                 }

                 //mensaje success
     if(isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}
	 //fin success

      //mensaje error
         if(isset($errors)){
			
			?>
				<div class="alert alert-danger" role="alert">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>Error!</strong> 
						<?php
							foreach($errors as $error) {
									echo $error;
								}
							?>
				</div>
			<?php

			}

	 //fin mensaje error


         break;


         case "mostrar":

            //selecciona el id del usuario
    
           //el parametro id_usuario se envia por AJAX cuando se edita el usuario

          $datos = $usuarios->get_usuario_por_id($_POST["idUsuario"]);

          //validacion del id del usuario  

             if(is_array($datos)==true and count($datos)>0){

             	 foreach($datos as $row){
                    
                    $output["Dni"] = $row["Dni"];
                    $output["Nombre"] = $row["Nombre"];
            				$output["Apellido"] = $row["Apellido"];
            				$output["Cargo"] = $row["Cargo"];
            				$output["Usuario"] = $row["Usuario"];
            				$output["Password1"] = $row["Password1"];
            				$output["Password2"] = $row["Password2"];
            				$output["Telefono"] = $row["Telefono"];
            				$output["Correo"] = $row["Correo"];
            				$output["Direccion"] = $row["Direccion"];
                                        $output["Fecha_ingreso"] = $row["Fecha_ingreso"];
            				$output["Estado"] = $row["Estado"];
             	 }

             	 echo json_encode($output);

             } else {

                    //si no existe el registro entonces no recorre el array
                $errors[]="El usuario no existe";

             }


	         //inicio de mensaje de error

				if(isset($errors)){
			
					?>
					<div class="alert alert-danger" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
							<strong>Error!</strong> 
							<?php
								foreach($errors as $error) {
										echo $error;
									}
								?>
					</div>
					<?php
			      }

	        //fin de mensaje de error

         break;

         case "activarydesactivar":
              
                //los parametros id_usuario y est vienen por via ajax
              $datos = $usuarios->get_usuario_por_id($_POST["idUsuario"]);
                
                //valida el id del usuario
                 if(is_array($datos)==true and count($datos)>0){
                    
                    //edita el estado del usuario 
                    $usuarios->editar_estado($_POST["idUsuario"],$_POST["est"]);
                 }
         break;
         
         case "eliminar":
              
                //los parametros id_mantenimiento y est vienen por via ajax
              $datos = $usuarios->get_delete_por_id($_POST["idUsuario"]);
                
              
         break;
     
         case "listar":
          
         $datos = $usuarios->get_usuarios();

         //declaramos el array

         $data = Array();


         foreach($datos as $row){

            
            $sub_array= array();

             //ESTADO
	        $est = '';
	       
	         $atrib = "btn btn-success btn-md estado";
	        if($row["Estado"] == 0){
	          $est = 'INACTIVO';
	          $atrib = "btn btn-warning btn-md estado";
	        }
	        else{
	          if($row["Estado"] == 1){
	            $est = 'ACTIVO';
	            
	          } 
	        }


            //cargo

            if($row["Cargo"]==1){

              $cargo="ADMINISTRADOR";

            } else{

            	if($row["Cargo"]==0){
                   
                   $cargo="EMPLEADO";
            	}
            }


	     $sub_array[]= $row["Dni"];
	     $sub_array[] = $row["Nombre"];
             $sub_array[] = $row["Apellido"];
             $sub_array[] =  $row["Cargo"];
             $sub_array[] = $row["Usuario"];
             $sub_array[] = $row["Telefono"];
             $sub_array[] = $row["Correo"];
             $sub_array[] = $row["Direccion"];
             $sub_array[] = $row["Fecha_ingreso"];

              
                $sub_array[] = '<button type="button" onClick="cambiarEstado('.$row["idUsuario"].','.$row["Estado"].');" name="Estado" id="'.$row["idUsuario"].'" class="'.$atrib.'">'.$est.'</button>';


                $sub_array[] = '<button type="button" onClick="mostrar('.$row["idUsuario"].');"  id="'.$row["idUsuario"].'" class="btn btn-warning btn-md update"><i class="glyphicon glyphicon-edit"></i> Editar</button>';


                $sub_array[] = '<button type="button" onClick="eliminar('.$row["idUsuario"].');"  id="'.$row["idUsuario"].'" class="btn btn-danger btn-md"><i class="glyphicon glyphicon-edit"></i> Eliminar</button>';
                

        
	     $data[]=$sub_array;
	    
	        
         }

         $results= array(	

         "sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
         echo json_encode($results);


         break;
     }


?>