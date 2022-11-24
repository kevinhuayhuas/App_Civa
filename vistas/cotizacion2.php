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

             <h2>MODULO DE COTIZACIÓN</h2>

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
                          
                         <div class="welcome_docmed_area">
        <div class="container">
            <div class="row">
                
                <div class="col-xl-6 col-lg-6">
                    <div class="welcome_docmed_info">
                        <form id="frm_contactenos">
                            <h3>CALCULAR PRECIO</h3>
                            <h2><br>
                            A donde lo llevamos? </h2>
                           <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <select class="form-control" id="num_piso" name="num_piso" required>
                                        <option value=""selected="true" >Departamento</option>
                                        <option value="AMAZONAS ">AMAZONAS </option>
                                                            <option value="ANCASH ">ANCASH </option>
                                                            <option value="APURIMAC ">APURIMAC </option>
                                                            <option value="AREQUIPA ">AREQUIPA </option>
                                                            <option value="AYACUCHO ">AYACUCHO </option>
                                                            <option value="CAJAMARCA ">CAJAMARCA </option>
                                                            <option value="CALLAO ">CALLAO </option>
                                                            <option value="CUSCO ">CUSCO </option>
                                                            <option value="HUANCAVELICA ">HUANCAVELICA </option>
                                                            <option value="HUANUCO ">HUANUCO </option>
                                                            <option value="ICA ">ICA </option>
                                                            <option value="JUNIN ">JUNIN </option>
                                                            <option value="LA LIBERTAD ">LA LIBERTAD </option>
                                                            <option value="LAMBAYEQUE ">LAMBAYEQUE </option>
                                                            <option value="LIMA ">LIMA </option>
                                                            <option value="LORETO ">LORETO </option>
                                                            <option value="MADRE DE DIOS ">MADRE DE DIOS </option>
                                                            <option value="MOQUEGUA ">MOQUEGUA </option>
                                                            <option value="PASCO ">PASCO </option>
                                                            <option value="PIURA ">PIURA </option>
                                                            <option value="PUNO ">PUNO </option>
                                                            <option value="SAN MARTIN ">SAN MARTIN </option>
                                                            <option value="TACNA ">TACNA </option>
                                                            <option value="TUMBES ">TUMBES </option>
                                                            <option value="UCAYALI ">UCAYALI </option>
                                      </select>
                                  </div>
                                  <div class="form-group col-md-4">
                                    <select class="form-control" id="num_piso" name="num_piso" required>
                                        <option value=""selected="true" >Provincia</option>
                                        <option value="Piso 1" >Valle blanco</option>
                                        <option value="Piso 2">Carhuaz</option>
                                      </select>
                                  </div>
                                  <div class="form-group col-md-2">
                                    <select class="form-control" id="num_piso" name="num_piso" required>
                                        <option value=""selected="true" >Distrito</option>
                                        <option value="Piso 1" >Chancay</option>
                                        <option value="Piso 2">Huanchay</option>
                                      </select>
                                  </div>
                                </div> 
                            
                            <h2><br>
                            ¿Lo recogemos? </h2>
                            
                                        <div class="form-group">
                                      <select class="form-control" id="num_piso" name="num_piso" required>
                                                <option value="sin">SIN RECOJO</option>
                                                <option value="con">CON RECOJO</option>
                                            </select>
                                    </div>
                            
                            <h2><br>
                            ¿Qué envías? </h2>
                            
                          <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <input type="radio" name="type" id="sobres" value="SOBRE" checked="">
                                                    <label for="sobres" class="material-icons">
                                                        <p class="qoutnua">Sobres</p>
                                                        <span><img src="https://www.olvacourier.com/wp-content/uploads/2017/08/asdasd.png" alt="box" style="width: 50px;height: 50px;"></span>
                                                    </label>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <input type="radio" name="type" id="paquetes" value="PAQUETE"><label for="paquetes" class="material-icons">
                                                        <p class="qoutnua">Paquetes</p>
                                                        <span><img src="https://www.olvacourier.com/wp-content/uploads/2017/08/cajadea.png" alt="box" style="width: 50px;height: 50px;"></span>
                                                    </label>
                                  </div>
                                </div>
                            
                            <h2><br>
                            ¿Cuánto Pesa? </h2>
                            
                             <div class="form-group">
                                     <input type="number" class="form-control" id="inputPassword4" placeholder="Ingrese peso" required pattern="[0-8]{0,8}" min="1 "max="8">
                                            <span id="gr-type" hidden="" style="display: inline-block;">GRAMOS (GR)</span>
                                            <select class="form-control" id="num_piso" name="num_piso" required>
                                                <option value="KG">KILOGRAMOS (KG)</option>
                                                <option value="GR">GRAMOS (GR)</option>
                                            </select>
                                    </div>
                            
                            
                                            
                                            
                                         <button type="submit" class="btn btn-primary">Estimar</button>
                                          
                                            
                                            <h2><br>
                            PRECIO ESTIMADO </h2>
                            
                             <div class="form-group">
                                
                                 <nav>S/.</nav>       
                                    </div>

                                        </form>
                        

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
