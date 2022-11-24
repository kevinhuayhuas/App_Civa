<?php
//llamar a la conexion de la base de datos

require_once("../config/conexion.php");


//llamar a el modelo Usuarios 

require_once("../modelos/Receptor.php");


$receptor = new Receptor();


//declaramos las variables de los valores que se envian por el formulario y que recibimos por ajax y decimos que si existe el parametro que estamos recibiendo

$idReceptor = isset($_POST["idReceptor"]);
$TipoDocumento = isset($_POST["TipoDocumento"]);
$Documento = isset($_POST["Documento"]);
$Nombre = isset($_POST["Nombre"]);
$Apellido = isset($_POST["Apellido"]);
$Telefono = isset($_POST["Telefono"]);
$TipoEnvio = isset($_POST["TipoEnvio"]);
$CodigoPostal = isset($_POST["CodigoPostal"]);
$Direccion = isset($_POST["Direccion"]);
$Referencia = isset($_POST["Referencia"]);


switch ($_GET["op"]) {

    case "guardaryeditar":
       error_reporting(0);
        $datos = $receptor->get_Tipo_documento($_POST["Documento"],$_POST["TipoDocumento"]);

        if (empty($_POST["idReceptor"])) {

            if (is_array($datos) == true and count($datos) == 0) {

                $receptor->registrar_receptor($TipoDocumento, $Documento, $Nombre, $Apellido, $Telefono, $TipoEnvio, $CodigoPostal, $Direccion, $Referencia);

                $messages[] = "El Receptor se registró correctamente";
            } else {

                $errors[] = "El Receptor ya existe";
            }
        } else {

            $receptor->editar_receptor($idReceptor, $TipoDocumento, $Documento, $Nombre, $Apellido, $Telefono, $TipoEnvio, $CodigoPostal, $Direccion, $Referencia);

            $messages[] = "El Receptor se editó correctamente";
        }



        if (isset($messages)) {
            ?>
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>¡Bien hecho!</strong>
            <?php
            foreach ($messages as $message) {
                echo $message;
            }
            ?>
            </div>
                <?php
            }

            if (isset($errors)) {
                ?>
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Error!</strong> 
            <?php
            foreach ($errors as $error) {
                echo $error;
            }
            ?>
            </div>
            <?php
        }

        break;


    case "mostrar":


        $datos = $receptor->get_receptor_por_id($_POST["idReceptor"]);


        if (is_array($datos) == true and count($datos) > 0) {

            foreach ($datos as $row) {

                $output["TipoDocumento"] = $row["TipoDocumento"];
                $output["Documento"] = $row["Documento"];
                $output["Nombre"] = $row["Nombre"];
                $output["Apellido"] = $row["Apellido"];
                $output["Telefono"] = $row["Telefono"];
                $output["TipoEnvio"] = $row["TipoEnvio"];
                $output["CodigoPostal"] = $row["CodigoPostal"];
                $output["Direccion"] = $row["Direccion"];
                $output["Referencia"] = $row["Referencia"];
                
            }

            echo json_encode($output);
        } else {

            $errors[] = "El Receptor no existe";
        }


        if (isset($errors)) {
            ?>
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Error!</strong> 
            <?php
            foreach ($errors as $error) {
                echo $error;
            }
            ?>
            </div>
            <?php
        }

        break;

    /*case "activarydesactivar":

        $datos = $ventas->get_venta_por_id($_POST["id_venta"]);

        if (is_array($datos) == true and count($datos) > 0) {

            $citas->editar_estado($_POST["id_venta"], $_POST["est"]);
        }
        break;*/

    case "eliminar":
        $datos = $receptor->get_receptor_por_id($_POST["idReceptor"]);

        if (is_array($datos) == true and count($datos) > 0) {
            $receptor->eliminar($_POST["idReceptor"]);
        }
        break;

    case "listar":

        $datos = $receptor->get_receptor();
        $data = Array();

        foreach ($datos as $row) {
            $sub_array = array();
            /*//ESTADO
            $est = '';

            $atrib = "btn btn-success btn-md estado";
            if ($row["estado"] == 0) {
                $est = 'INACTIVO';
                $atrib = "btn btn-warning btn-md estado";
            } else {
                if ($row["estado"] == 1) {
                    $est = 'ACTIVO';
                }
            }
            
             if($row["TipoPago"]==1){

              $TipoPago="EFECTIVO";

            } else{

              if($row["TipoPago"]==0){
                   
                   $TipoPago="TARJETA";
              }
            }*/
             
                
            
            
            $sub_array[] = $row["TipoDocumento"];
            $sub_array[] = $row["Documento"];
            $sub_array[] = $row["Nombre"];
            $sub_array[] = $row["Apellido"];
            $sub_array[] = $row["Telefono"];
            $sub_array[] = $row["TipoEnvio"];
            $sub_array[] = $row["CodigoPostal"];
            $sub_array[] = $row["Direccion"];
            $sub_array[] = $row["Referencia"];
            /*
            $sub_array[] = '<button type="button" onClick="cambiarEstado(' . $row["idVenta"] . ',' . $row["estado"] . ');" name="estado" id="' . $row["idVenta"] . '" class="' . $atrib . '">' . $est . '</button>';
            */

            $sub_array[] = '<button type="button" onClick="mostrar(' . $row["idReceptor"] . ');"  id="' . $row["idReceptor"] . '" class="btn btn-warning btn-md update"><i class="glyphicon glyphicon-edit"></i> Editar</button>';


            $sub_array[] = '<button type="button" onClick="eliminar(' . $row["idReceptor"] . ');"  id="' . $row["idReceptor"] . '" class="btn btn-danger btn-md"><i class="glyphicon glyphicon-edit"></i> Eliminar</button>';

            $data[] = $sub_array;
        }

        $results = array(
            "sEcho" => 1, 
            "iTotalRecords" => count($data), 
            "iTotalDisplayRecords" => count($data), 
            "aaData" => $data);
        echo json_encode($results);


        break;
}
?>