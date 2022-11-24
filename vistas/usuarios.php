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

             <h2>Listado de Usuarios</h2>

            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                          <h1 class="box-title">
                            <button class="btn btn-primary btn-lg" id="add_button" onclick="limpiar()" data-toggle="modal" data-target="#usuarioModal"><i class="fa fa-plus" aria-hidden="true"></i> Nueva Usuario</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive">
                          
                          <table id="usuario_data" class="table table-bordered table-striped">

                            <thead>
                              
                                <tr>
                                <th>Dni</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Cargo</th>
                                <th>Usuario</th>
                                <th>Teléfono</th>
                                <th>Correo</th>
                                <th>Dirección</th>
                                <th>Fecha Registro</th>
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

    <div id="usuarioModal" class="modal fade">
      
      <div class="modal-dialog">
        
         <form method="post" id="usuario_form">

            <div class="modal-content">
              
               <div class="modal-header">

                 <button type="button" class="close" data-dismiss="modal">&times;</button>

                 <h4 class="modal-title">Agregar Usuario</h4>
                 

               </div>

                
           <div class="modal-body">
            <label>Dni</label>
            <input type="text" name="Dni" id="Dni" class="form-control" placeholder="Dni" required pattern="[0-9]{0,8}"/>
          <br/>                

          <label>Nombres</label>
          <input type="text" name="Nombre" id="Nombre" class="form-control" placeholder="Nombres" required pattern="^[a-zA-Z_áéíóúñ\s]{0,30}$"/>
          <br/>
          
          <label>Apellidos</label>
          <input type="text" name="Apellido" id="Apellido" class="form-control" placeholder="Apellidos Completo" required pattern="^[a-zA-Z_áéíóúñ\s]{0,30}$"/>
          <br/>
          
          <label>Cargo</label>
           <select class="form-control" id="Cargo" name="Cargo" required>
              <option disabled selected>-- Selecciona cargo --</option>
              <option value="1">Administrador</option>
              <option value="0">Empleado</option>
           </select>
           <br/>
          
          <label>Usuario</label>
          <input type="text" name="Usuario" id="Usuario" class="form-control" placeholder="Usuario" required pattern="^[a-zA-Z_áéíóúñ\s]{0,30}$"/>
          <br />
          
          <label>Password</label>
          <input type="password" name="Password1" id="Password1" class="form-control" placeholder="Password" required/>
          <br />
         
          <label>Repita Password</label>
          <input type="password" name="Password2" id="Password2" class="form-control" placeholder="Repita Password" required/>
          <br />
          
          <label>Teléfono</label>
          <input type="text" name="Telefono" id="Telefono" class="form-control" placeholder="Teléfono" required pattern="[0-9]{0,9}"/>
          <br />
          
          <label>Correo</label>
          <input type="email" name="Correo" id="Correo" class="form-control" placeholder="Correo" required="required"/>
          <br />
          
          <label>Dirección</label>
          <textarea cols="90" rows="3" id="Direccion" name="Direccion"  placeholder="Direccion ..." required pattern="^[a-zA-Z0-9_áéíóúñ°\s]{0,200}$">
          </textarea>
          <br />
          
          <label>Fecha Registro</label>
          <input type="date" name="Fecha_ingreso" id="Fecha_ingreso" class="form-control" placeholder="Fecha Rgistros" required />
          <br />
          
          <label>Estado</label>
           <select class="form-control" id="Estado" name="Estado" required>
               <option disabled selected>-- Selecciona estado --</option>
              <option value="1">Activo</option>
              <option value="0">Inactivo</option>
           </select>
                 

               </div>


               <div class="modal-footer">

                 <input type="hidden" name="idUsuario" id="idUsuario"/>

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

    <script type="text/javascript" src="js/usuarios.js"></script>

