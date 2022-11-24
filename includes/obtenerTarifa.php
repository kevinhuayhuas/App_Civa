<?php
require '../Conexion/conectar.php'; ;
//	$idOrigen = $_POST['idOrigen'];
	$idDestino = $_POST['idDestino'];
        $idOrigen=$_POST['idOrigen'];
	$queryM = "SELECT precio FROM tarifa WHERE idDepartamentoD='$idDestino' and idDepartamentoO='$idOrigen'";
	$resultadoM = $mysqli->query($queryM);
	$html= "";
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.="<input type='number' value='".$rowM['precio']."'>";
	}
	echo $html;

?>
