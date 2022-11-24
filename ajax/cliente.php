<?php

  //llamar a la conexion de la base de datos

  require_once("../config/conexion.php");


  //llamar a el modelo Mantenimientos 

  require_once("../modelos/Clientes.php");


  $clientes = new Clientes();

  //declaramos las variables de los valores que se envian por el formulario y que recibimos por ajax y decimos que si existe el parametro que estamos recibiendo

   $idCliente = isset($_POST["idCliente"]);
   $TipoDocumento=isset($_POST["TipoDocumento"]);
   $Documento=isset($_POST["Documento"]);
   $Nombre=isset($_POST["Nombre"]);
   $Apellido=isset($_POST["Apellido"]); 
   $Telefono=isset($_POST["Telefono"]);
   $Ruc=isset($_POST["Ruc"]);
   $RazonSocial=isset($_POST["RazonSocial"]);
   $Correo=isset($_POST["Correo"]);
   $Usuario=isset($_POST["Usuario"]);
   $Password1=isset($_POST["Password1"]);
   $Password2=isset($_POST["Password2"]);
   $Fecha_ingreso=isset($_POST["Fecha_ingreso"]);
   $Estado=isset($_POST["Estado"]);


     switch($_GET["op"]){

         case "guardaryeditar":

                 /*verificamos si existe la num_habitacion y todos en la base de datos, si ya existe un registro con la num_habitacion o todos entonces no se registra el mantenimiento*/


     $datos = $clientes->get_tipo_Documento_fecha_ingreso_del_cliente($_POST["Documento"],$_POST["TipoDocumento"]);
                 
            
                 //validacion de password

                 if($Password1 == $Password2){
                     
                 	   /*si el id no existe entonces lo registra
	                     importante: se debe poner el $_POST sino no funciona*/

	                     if(empty($_POST["idCliente"])){

	                     	   /*si coincide password1 y password2 entonces verificamos si existe la num_habitacion y todos en la base de datos, si ya existe un registro con la num_habitacion o todos entonces no se registra el mantenimiento*/

	                     	   if(is_array($datos)==true and count($datos)==0){
                                
                                 //no existe el mantenimiento por lo tanto hacemos el registros

                                $clientes->registrar_cliente($TipoDocumento, $Documento, $Nombre, $Apellido, $Telefono, $Ruc, $RazonSocial, $Correo, $Usuario, $Password1, $Password2, $Fecha_ingreso, $Estado);

                                 $messages[]="El cliente se registró correctamente";

                                 /*si ya exista el todos y la num_habitacion entonces aparece el mensaje*/

	                     	   } else {

                                    $messages[]="La cédula o la fecha de ingreso ya existe";

	                     	   }
                     
	                      //cierre de la validacion empty

                 } else {

                             /*si ya existe entonces editamos el mantenimiento*/

                            $clientes->editar_cliente($idCliente, $TipoDocumento, $Documento, $Nombre, $Apellido, $Telefono, $Ruc, $RazonSocial, $Correo, $Usuario, $Password1, $Password2, $Fecha_ingreso, $Estado);

                             $messages[]="El cliente se editó correctamente";
	                     }
                 } else {
        /*si el password no conincide, entonces se muestra el mensaje de error*/
        $errors[]="El password no coincide"; }
                     
              

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

            //selecciona el id del mantenimiento
    
           //el parametro id_mantenimiento se envia por AJAX cuando se edita el mantenimiento

          $datos = $clientes->get_cliente_por_id($_POST["idCliente"]);

          //validacion del id del mantenimiento  

             if(is_array($datos)==true and count($datos)>0){

             	 foreach($datos as $row){
                      
                                $output["TipoDocumento"] = $row["TipoDocumento"];
                                $output["Documento"] = $row["Documento"];
            		        $output["Nombre"] = $row["Nombre"];
    				$output["Apellido"] = $row["Apellido"];
                                $output["Telefono"] = $row["Telefono"];
                                $output["Ruc"] = $row["Ruc"];
                                $output["RazonSocial"] = $row["RazonSocial"];
    				$output["Correo"] = $row["Correo"];
                                $output["Usuario"] = $row["Usuario"];
    				$output["Password1"] = $row["Password1"];
                                $output["Password2"] = $row["Password2"];
    				$output["Fecha_ingreso"] = $row["Fecha_ingreso"];
    				$output["Estado"] = $row["Estado"];
             	 }

             	 echo json_encode($output);

             } else {

                    //si no existe el registro entonces no recorre el array
                $errors[]="El cliente no existe";

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
              
                //los parametros id_mantenimiento y est vienen por via ajax
              $datos = $clientes->get_cliente_por_id($_POST["idCliente"]);
                
                //valida el id del mantenimiento
                 if(is_array($datos)==true and count($datos)>0){
                    
                    //edita el estado del mantenimiento 
                    $clientes->editar_estado($_POST["idCliente"],$_POST["est"]);
                 }
         break;



         case "eliminar":
              
                //los parametros id_mantenimiento y est vienen por via ajax
              $datos = $clientes->get_delete_cliente_por_id($_POST["idCliente"]);
                
              
         break;


         case "listar":
          
         $datos = $clientes->get_clientes();

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




	    $sub_array[] = $row["TipoDocumento"];
	    $sub_array[] = $row["Documento"];
            $sub_array[] = $row["Nombre"];
            $sub_array[] = $row["Apellido"];
            $sub_array[] = $row["Telefono"];
            $sub_array[] = $row["Ruc"];
            $sub_array[] = $row["RazonSocial"];
            $sub_array[] = $row["Correo"];
            
            
           
            $sub_array[] = date("d-m-Y",strtotime($row["Fecha_ingreso"]));
         


              
$sub_array[] = '<button type="button" onClick="cambiarEstado('.$row["idCliente"].','.$row["Estado"].');" name="Estado" id="'.$row["idCliente"].'" class="'.$atrib.'">'.$est.'</button>';


                $sub_array[] = '<button type="button" onClick="mostrar('.$row["idCliente"].');"  id="'.$row["idCliente"].'" class="btn btn-warning btn-md update"><i class="glyphicon glyphicon-edit"></i> Editar</button>';


$sub_array[] = '<button type="button" onClick="eliminar('.$row["idCliente"].');"  id="'.$row["idCliente"].'" class="btn btn-danger btn-md"><i class="glyphicon glyphicon-edit"></i> Eliminar</button>';


        
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

