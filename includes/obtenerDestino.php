<?php

require './Conexion/conectar.php';
$queryD = "select idDepartemento,nombreDepartamento,tarifa from departamento";
$resultadoD = $mysqli->query($queryD);
$html="<option value='0'>seleccione Destino></option>";
while($rowD = $resultadoD->fetch_assoc()){
    $html.="<option value='".$rowD['idDepartemento']."'>".$rowD['nombreDepartamento']."</option>"; 
}
echo $html;
?>