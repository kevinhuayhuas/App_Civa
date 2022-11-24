<?php

require_once("../config/conexion.php");

class Receptor  extends Conectar{

public function get_receptor() {

        $conectar = parent::conexion();
        parent::set_names();

        $sql = "select * from receptor";

        $sql = $conectar->prepare($sql);
        $sql->execute();

        return $resultado = $sql->fetchAll();
    }

    public function registrar_receptor($TipoDocumento, $Documento, $Nombre, $Apellido, $Telefono, $TipoEnvio, $CodigoPostal, $Direccion,$Referencia) {

        $conectar = parent::conexion();
        parent::set_names();

        $sql = "insert into receptor 
             values(null,?,?,?,?,?,?,?,?,?);";
        $sql = $conectar->prepare($sql);

        $sql->bindValue(1, $_POST["TipoDocumento"]);
        $sql->bindValue(2, $_POST["Documento"]);
        $sql->bindValue(3, $_POST["Nombre"]);
        $sql->bindValue(4, $_POST["Apellido"]);
        $sql->bindValue(5, $_POST["Telefono"]);
        $sql->bindValue(6, $_POST["TipoEnvio"]);
        $sql->bindValue(7, $_POST["CodigoPostal"]);
        $sql->bindValue(8, $_POST["Direccion"]);
        $sql->bindValue(9, $_POST["Referencia"]);
        
        $sql->execute();
    }

    public function editar_receptor($idReceptor, $TipoDocumento, $Documento, $Nombre, $Apellido, $Telefono, $TipoEnvio, $CodigoPostal, $Direccion,$Referencia) {

        $conectar = parent::conexion();
        parent::set_names();

        $sql = "update receptor set 

              TipoDocumento=?,
              Documento=?,
              Nombre=?,
              Apellido=?,
              Telefono=?,
              TipoEnvio=?,
              CodigoPostal=?,
              Direccion=?,
              Referencia=?

              where 
              idReceptor=?



             ";


        $sql = $conectar->prepare($sql);

        $sql->bindValue(1, $_POST["TipoDocumento"]);
        $sql->bindValue(2, $_POST["Documento"]);
        $sql->bindValue(3, $_POST["Nombre"]);
        $sql->bindValue(4, $_POST["Apellido"]);
        $sql->bindValue(5, $_POST["Telefono"]);
        $sql->bindValue(6, $_POST["TipoEnvio"]);
        $sql->bindValue(7, $_POST["CodigoPostal"]);
        $sql->bindValue(8, $_POST["Direccion"]);
        $sql->bindValue(9, $_POST["Referencia"]);
        $sql->bindValue(10, $_POST["idReceptor"]);
        
        $sql->execute();

    }

    public function get_receptor_por_id($idReceptor) {

        $conectar = parent::conexion();
        parent::set_names();

        $sql = "select * from receptor where idReceptor=?";

        $sql = $conectar->prepare($sql);

        $sql->bindValue(1, $idReceptor);
        $sql->execute();

        return $resultado = $sql->fetchAll();
    }

    public function eliminar($idReceptor) {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "delete from receptor where idReceptor=?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $idReceptor);
        $sql->execute();

        return $resultado = $sql->fetchAll();
    }
    /*
    public function editar_estado($id_cita, $estado) {


        $conectar = parent::conexion();
        parent::set_names();

        if ($_POST["est"] == "0") {

            $estado = 1;
        } else {

            $estado = 0;
        }

        $sql = "update citas set 
            
            estado=?

            where 
            id_cita=?


   	    	";

        $sql = $conectar->prepare($sql);


        $sql->bindValue(1, $estado);
        $sql->bindValue(2, $id_cita);
        $sql->execute();
    }
    */


    public function get_Tipo_documento($TipoDocumento,$Documento) {

        $conectar = parent::conexion();
        parent::set_names();

        $sql = "select * from receptor where TipoDocumento=? and Documento=?";

        $sql = $conectar->prepare($sql);

        $sql->bindValue(1, $TipoDocumento);
        $sql->bindValue(1, $Documento);

        $sql->execute();

        return $resultado = $sql->fetchAll();
    }

}

?>