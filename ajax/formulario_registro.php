<?php

 if(!empty($_POST)){
  require_once("../config/conexion.php");


  //llamar a el modelo Mantenimientos 

  require_once("../modelos/Formulario_registro.php");


  $formulario_registro = new Formulario_registro();

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
   $Estado= 1 ;

   
   if(isset($_POST)){
/* print_r($_POST);/

 
         
                 /*verificamos si existe la num_habitacion y todos en la base de datos, si ya existe un registro con la num_habitacion o todos entonces no se registra el mantenimiento*/

     $datos = $formulario_registro->get_tipo_Documento_fecha_ingreso_del_formulario($_POST["Documento"],$_POST["TipoDocumento"]);
                 
            
                 //validacion de password

                 if($Password1 == $Password2){
                     
                 	   /*si el id no existe entonces lo registra
	                     importante: se debe poner el $_POST sino no funciona*/

	                     if(empty($_POST["idCliente"])){

	                     	   /*si coincide password1 y password2 entonces verificamos si existe la num_habitacion y todos en la base de datos, si ya existe un registro con la num_habitacion o todos entonces no se registra el mantenimiento*/

	                     	   if(is_array($datos)==true and count($datos)==0){
                                
                                 //no existe el mantenimiento por lo tanto hacemos el registros

                                $formulario_registro->registrar_formulario($TipoDocumento, $Documento, $Nombre, $Apellido, $Telefono, $Ruc, $RazonSocial, $Correo, $Usuario, $Password1, $Password2, $Fecha_ingreso, $Estado);

                                 $messages[]="El cliente se registró correctamente";

                                 /*si ya exista el todos y la num_habitacion entonces aparece el mensaje*/

	                     	   } else {

                                    $messages[]="El documento ya existe";
                                    
	                     	   }
                     
	                      //cierre de la validacion empty

                 } 
                 } else {
        /*si el password no conincide, entonces se muestra el mensaje de error*/
        $errors[]="El password no coincide"; }}
                     
              

                 //mensaje success
     

	 //fin mensaje error




 }    

       


?>

