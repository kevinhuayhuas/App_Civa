<?php
include '../config/Conexion.php';
require_once("header.php");

?>
<!--Contenido-->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">        
    <!-- Main content -->
    <section class="content">

        <div id="resultados_ajax"></div>


            <h2>Modulo Receptor</h2>

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h1 class="box-title">
                            <button class="btn btn-primary btn-lg" id="add_button" onclick="limpiar()" data-toggle="modal" data-target="#receptorModal"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo Receptor</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive">

                        <table id="receptor_data" class="table table-bordered table-striped">

                            <thead>

                                <tr>

                                    <th>Tipo Documento</th>
                                    <th>Documento</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Telefono</th>
                                    <th>TipoEnvio</th>
                                    <th>CodigoPostal</th>
                                    <th>Direccion</th>
                                    <th>Referencia</th>
                                    
                                    <th width="10%">Editar</th>
                                    <th width="10%">Eliminar</th>



                                </tr>
                            </thead>

                            <tbody>


                            </tbody>


                        </table>

                    </div>

                    <!--Fin centro -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->

</div><!-- /.content-wrapper -->
<!--Fin-Contenido-->

<!--FORMULARIO VENTANA MODAL-->

<div id="receptorModal" class="modal fade">

    <div class="modal-dialog">

        <form method="post" id="receptor_form">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Agregar Receptor</h4>


                </div>


                <div class="modal-body">

                    <label>Tipo Documento</label>
                      <select class="form-control" name="TipoDocumento" id="TipoDocumento" required>
                        <option disabled selected>-- Selectione documento --</option>
                        <option value="DNI">DNI</option>
                        <option value="PASAPORTE">PASAPORTE</option>
                        <option value="CARNET DE EXTRANGERIA">CARNET DE EXTRANGERIA</option>
                        <option value="OTROS DOCUMENTOS">OTRO DOCUMENTO</option>
                        
                    </select>


                    <br />
                    
                    <label>Documento</label>
                    <input type="text" name="Documento" id="Documento" class="form-control" placeholder="Documento" />

                    <br />
                    
                    <label>Nombre</label>
                    <input type="text" name="Nombre" id="Nombre" class="form-control" placeholder="Nombre" />
                    <br />
                    
                    <label>Apellido</label>
                    <input type="text" name="Apellido" id="Apellido" class="form-control" />
                    
                    <br />
                    
                    <label>Telefono</label>
                    <input type="number" name="Telefono" id="Telefono" class="form-control" placeholder="Telefono"/>
                    
                    <br />

                    
                    <label>TipoEnvio</label>
                    <select class="form-control" name="TipoEnvio" id="TipoEnvio" required>
                        <option disabled selected>-- Selectione Tipo de envio --</option>
                        <option value="Recojo en oficina">Recojo en oficina</option>
                        <option value="Envio a domicilio">Envio a domicilio</option>
                    </select>
                    <br />
                    
 
                    <label>CodigoPostal</label>
                    <input type="number" name="CodigoPostal" id="CodigoPostal" class="form-control" placeholder="CodigoPostal"/>
                    <br />
                    
                    <label>Direccion</label>
                    <input type="text" name="Direccion" id="Direccion" class="form-control" placeholder="Direccion"/>
                    <br />
                    
                    <label>Referencia</label>
                    <input type="text" name="Referencia" id="Referencia" class="form-control" placeholder="Referencia"/>
                    <br />
                </div>


                <div class="modal-footer">

                    <input type="hidden" name="idReceptor" id="idReceptor"/>

                    <button type="submit" name="action" id="btnGuardar" class="btn btn-success pull-left" value="Add"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>

                    <button type="button" onclick="limpiar()" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Cerrar</button>



                </div>



            </div>


        </form>


    </div>

</div>
<?php
require_once("footer.php");
?>

<script type="text/javascript" src="js/receptor.js"></script>


