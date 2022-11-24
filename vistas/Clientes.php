<?php
 session_start();
  require_once("header.php");

?>
  <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content">
             
             <div id="resultados_ajax"></div>

             <h2>MODULO DE CLIENTE</h2>

            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                          <h1 class="box-title">
                            <button class="btn btn-primary btn-lg" id="add_button" onclick="limpiar()" data-toggle="modal" data-target="#clienteModal"><i class="fa fa-plus" aria-hidden="true"></i> Registrar nuevo Cliente</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive">
                          
                          <table id="cliente_data" class="table table-bordered table-striped">

                            <thead>
                              
                                <tr>
                                <th>Tipo Documento</th>
                                <th>Documento</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Telefono</th>
                                <th>Ruc</th>
                                <th>Razon Social</th>
                                <th>Correo</th>
                                
                                <th>Fecha Ingreso</th>
                                <th>Estado</th>
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

    <div id="clienteModal" class="modal fade">
      
      <div class="modal-dialog">
        
         <form method="post" id="cliente_form">

            <div class="modal-content">
              
               <div class="modal-header">

                 <button type="button" class="close" data-dismiss="modal">&times;</button>

                 <h4 class="modal-title">Agregar Cliente</h4>
                 

               </div>

               <div class="modal-body">

                  
                        
                            <label class="control-label" for="TipoDocumento">Tipo de Documento</label>
                            
                            <select class="form-control" id="TipoDocumento" name="TipoDocumento" required>
                                <option disabled selected>--Seleccione Tipo Documento--</option>
                                   <option value="DNI" >DNI</option>
                                   <option value="CARNET DE EXTRANJERIA">CARNET DE EXTRANJERIA</option>
                                   <option value="PASAPORTE">PASAPORTE</option>
                                </select>
                        </br>
                     
                       
                           
                                 <label class="control-label" for="Documento">Documento</label>
                                 <input class="form-control" type="text" id="Documento" name="Documento" placeholder="Ingrese numero de documento">

                                 
                            </br>
                       
                    
                        
                            
                                 <label class="control-label" for="Nombre">Nombre</label>
                                 <input class="form-control" type="text" id="Nombre" name="Nombre" placeholder="Ingrese nombre">
                            </br>
                        
                            <label class="control-label" for="Apellido">Apellidos</label>
                                 <input class="form-control" type="text" id="Apellido" name="Apellido" placeholder="Ingrese apellido">
                            </br>
                            
                            <label class="control-label" for="Telefono">Telefono</label>
                                 <input class="form-control" type="text" id="Telefono" name="Telefono" placeholder="Ingrese telefono">
                            </br>
                            
                            <label class="control-label" for="Ruc">Ruc</label>
                                 <input class="form-control" type="text" id="Ruc" name="Ruc" placeholder="Ingrese Ruc">
                            </br>
                                <label class="control-label" for="RazonSocial">Razon social</label>
                                <input class="form-control" type="text" id="RazonSocial" name="RazonSocial" placeholder="Ingrese Razon social">
                            </br>

                            <label class="control-label" for="Correo">Correo</label>
                                <input class="form-control" type="text" id="Correo" name="Correo" placeholder="Ingrese Correo">
                            </br>
                         
                            <label>Usuario</label>
                            <input type="text" name="Usuario" id="Usuario" class="form-control" placeholder="Usuario" required pattern="^[a-zA-Z_áéíóúñ\s]{0,30}$"/>
                            <br />
          
                            <label>Password</label>
                            <input type="password" name="Password1" id="Password1" class="form-control" placeholder="Password" required/>
                            <br />

                            <label>Repita Password</label>
                            <input type="password" name="Password2" id="Password2" class="form-control" placeholder="Repita Password" required/>
                            <br />
          
                  
                            <label>Fecha Registro</label>
                            <input type="date" name="Fecha_ingreso" id="Fecha_ingreso" class="form-control" placeholder="Fecha Registros" required />
                            <br />
                            
                            <label>Estado</label>
                            <select class="form-control" id="Estado" name="Estado" required>
                            <option disabled selected="">-- Selecciona estado --</option>
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                            </select>
                            
          
                     </div>
          
                  <div class="modal-footer">

                 <input type="hidden" name="idCliente" id="idCliente"/>

                 <button type="submit" name="action" id="btnGuardar" class="btn btn-success pull-left" value="Add"><i class="fa fa-floppy-o" aria-hidden="true"></i> GUARDAR</button>
                  <button type="button" onclick="limpiar()" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Cerrar</button>
         
            
                 

               </div>

               </div>


              



           
           

         </form>


      </div>
    </div>
    

<?php

  require_once("footer.php");
?>

    <script type="text/javascript" src="js/clientes.js"></script>




