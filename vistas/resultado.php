
        <?php
        require '../config/conectar.php';
          require_once("header.php");

        $origen = $_POST['origen'];
        $destino = $_POST['destino'];
        $tipoE = $_POST['tipoE'];
//CODIGO PARA ORIGEN
        $query = "select idOrigen,nombre from departamentoo where idOrigen='$origen'";
        $resultadoO = $mysqli->query($query);
//CODIGO PARA DESTINO
        $queryD = "select idDestino,nombre from departamentod where idDestino='$destino'";
        $resultadoD = $mysqli->query($queryD);
//CODIGO PARA TARIFA LEYENDO ORIGEN
        $queryT = "select precio from tarifa where idDepartamentoD='$destino' and idDepartamentoO='$origen'";
        $resultadoT = $mysqli->query($queryT);
//CODIGO PARA TIPO ENCOMIENDA
        $queryTE = "select descripcion,costo from tipoencomienda where idTipoEncomienda='$tipoE'";
        $resultadoTE = $mysqli->query($queryTE);

        $peso = $_POST['peso'];
        ?>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
           <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
           <script>
              $(document).ready(function()
              {
                 $("#mostrarmodal").modal("show");
              });
            </script>
     <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content">
             
             <div id="resultados_ajax"></div>

             <h2>¡COTIZACIÓN CON EXITO!</h2>

            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive">
                          
     
                           
                    <div class="alert alert-success" role="alert">
                        ¡Bien hecho!
                    </div>
                    <label>ORIGEN</label>
                    <?php while ($row = $resultadoO->fetch_assoc()) { ?>
                        <input class="form-control" type="text" disabled=" read" value="<?php echo $row['nombre'] ?>" >
                    <?php } ?>
                    <label>DESTINO</label>
                    <?php while ($rowD = $resultadoD->fetch_assoc()) { ?>
                        <input class="form-control" type="text" disabled="" value="<?php echo $rowD['nombre'] ?>" >
                    <?php } ?>
                    <label>TARIFA</label>
                    <?php while ($rowT = $resultadoT->fetch_assoc()) { ?>
                        <input class="form-control" disabled="" type="number" value="<?php echo $rowT['precio'] ?>" >

                        <label>PESO:</label>
                        <input class="form-control" type="number" disabled="" value="<?php echo $peso ?>" >

                        <?php while ($rowE = $resultadoTE->fetch_assoc()) { ?>
                            <label>TIPO ENCOMIENDA:</label>
                            <input class="form-control" type="text" disabled="" value="<?php echo $rowE['descripcion'] ?>" >
                            <label>COSTO ADICIONAL:</label>
                            <input class="form-control" type="number" disabled="" value="<?php echo ($rowE['costo'] / 100) * ($rowT['precio'] * $peso) ?>" >
                            <label>IMPORTE A PAGAR:</label>
                            <input class="form-control" name="cotiza" type="number" disabled="" value="<?php echo ($rowT['precio'] * $peso) + (($rowE['costo'] / 100) * ($rowT['precio'] * $peso)); ?>" >   
                        <?php } ?>
                    <?php } ?>
                            
                            <label>Codigo de verificación</label>
                            </br>
                            <input disabled="" value="<?php 
                            if(isset($_POST)){
                               function generarCodigo($longitud) {
                               $key = '';
                               $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
                               $max = strlen($pattern)-1;
                               for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
                               return $key;
                              } echo generarCodigo(6);
                            }
                            ?>">
                    <br>
                    <a href="cotizacion.php" class="btn btn-danger">REGRESAR</a>
                
                       
                    </div>
                    <body>
                    <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                       <div class="modal-dialog">
                         <div class="modal-content">
                            <div class="modal-body">
                               <h3>Token de verificacion</h3>
                            </div>
                            <div class="modal-body">
                               <h4>Guardar clave</h4>
                               <?php echo generarCodigo(6); ?>
                        </div>
                            <div class="modal-footer">
                           <a href="#" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
                            </div>
                       </div>
                    </div>
                 </div>
                  
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
        