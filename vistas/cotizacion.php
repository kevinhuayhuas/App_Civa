<?php
 session_start();
  require_once("header.php");

                    require '../config/conectar.php';
                    $queryO = "select idOrigen,nombre from departamentoo ";
                    $resultadoO = $mysqli->query($queryO);

                    $queryD = "select idDestino,nombre from departamentod";
                    $resultadoD = $mysqli->query($queryD);
                    
?>
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content">
             
             <div id="resultados_ajax"></div>

             <center> <h2>MODULO DE COTIZACIÓN</h2></center>

            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive">
                          
                         <div class="welcome_docmed_area">
        <div class="container">
            <div class="row">
                
                <div class="col-xl-6 col-lg-6">
                    <div class="welcome_docmed_info">
                       <div class="container">
                           <form method="POST" name="frm" action="resultado.php">
                            <h1 id="titulo-cotiza">Cotización de Encomienda</h1> 
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-lg-12"> <h3 for="validationDefault04"> Origen</h3></div>
                                    <div class="col-md-3 mb-3">
                                        <select class="custom-select" name="origen" id="origen" id="validationDefault04" required>
                                            <option selected disabled value="">Seleccione</option>
                                            <?php while ($rowO = $resultadoO->fetch_assoc()) { ?>   
                                                <option value="<?php echo $rowO['idOrigen']; ?>"><?php echo $rowO['nombre']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>

                                <div class="card">
                                    <div class="card-body">
                                        <div class="col-lg-12"> <h3> Destino</h3></div>
                                        <div class="col-md-3 mb-3">
                                            <select class="custom-select" name="destino" id="destino" id="validationDefault04" required>
                                                <option selected disabled value="">Seleccione</option>
                                                <?php while ($rowD = $resultadoD->fetch_assoc()) { ?>   
                                                    <option value="<?php echo $rowD['idDestino']; ?>"><?php echo $rowD['nombre']; ?></option>
                                                <?php } ?>
                                            </select>     
                                        </div>
                                    </div>
                                </div>
                                <br>
                                    <div class="card">
                                        <div class="card-body">
                                            <h3>TIPO DE ENCOMIENDA</h3>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="tipoE" id="gridRadios1" value="1" required>
                                                    <label class="form-check-label" for="gridRadios1">
                                                        Normal
                                                    </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="tipoE" id="gridRadios2" value="2" required>
                                                    <label class="form-check-label" for="gridRadios2">
                                                        Fragil
                                                    </label>
                                            </div>
                                            <br>
                                                <label>Peso:</label>
                                                <div class="form-group">
                                                    <input type="number" name="peso" placeholder="Ingrese peso" class="form-control mx-sm-3" required min="1">
                                                        <small id="passwordHelpInline" class="text-muted">
                                                            La tarifa minima es de un kilo.
                                                        </small>
                                                        <br>
                                                            <br>
                                                                <input class="btn btn-success" type="submit" value="Cotizar">
                                                                    </div>
                                                                    </div>
                                                                    </div>
                                                                    </form>
                                                                    </div>
                        

                    </div>
                </div>
                
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
--------------
<script src="js/script.js" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
                                                                    