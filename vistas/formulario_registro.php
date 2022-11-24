
<?php
    require_once ("../ajax/formulario_registro.php");


?>

<!DOCTYPE html>
<html>

<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- <title>OxigenoVida</title>
    <meta name="description" content=""> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CIVA ENCOMIENDAS</title>
   
    <link rel="icon" type="Form/image/png" href="Form/img/icon.html">
    <link rel="image_src" type="Form/image/jpeg" href="Form/img/logo.png"/>
    <link rel="stylesheet" href="Form/css/bootstrap.min.css">
    <link rel="stylesheet" href="Form/css/owl.carousel.min.css">
    <link rel="stylesheet" href="Form/css/magnific-popup.css">
    <!-- <link rel="stylesheet" href="css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="Form/css/themify-icons.css">
    <link rel="stylesheet" href="Form/css/nice-select.css">
    <link rel="stylesheet" href="Form/css/flaticon.css">
    <link rel="stylesheet" href="Form/css/gijgo.css">
    <link rel="stylesheet" href="Form/css/animate.css">
    <link rel="stylesheet" href="Form/css/slicknav.css">
    <link rel="stylesheet" href="Form/css/style.css">

</head>

<body>

    <header>
    <div class="header-area ">
        <div class="header-top_area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-md-6 ">
                        <div class="social_media_links">
                            <a href="#">
                                <i class="fa fa-linkedin"></i>
                            </a>
                            <a href="#">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a href="#">
                                <i class="fa fa-google-plus"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="short_contact_list">
                            <ul>
                                <li><a href="#"> <i class="fa fa-envelope"></i> </a></li>
                                <li><a href="#"> <i class="fa fa-phone"></i> </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="sticky-header" class="main-header-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-2">
                        <div class="logo">
                                   <a href="index.html">
                                       <img src="Form/img/logo.png" alt="Civa" style="width: 250px;">
                                   </a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-7">
                        <div class="main-menu  d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li><a class="active" href="#">Nosotros</a></li>
                                    <!-- <li><a href="#">Servicios</a></li>
                                    <li><a href="#">Ofertas</i></a> -->
                                        <li><a href="#">Preguntas frecurecuentes</a></li>
                                   
                                        <li><a href="formulario_registro.php">Registrate</a></li>
                                        <li><a href="login.php">Login</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                        <div class="Appointment">
                            <div class="book_btn d-none d-lg-block">
                                <a class="popup-with-form" href="#test-form">Acceso Libre</a>
                            </div>
                        </div>
                    </div> -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>    <!-- header-end -->

    <!-- slider_area_start -->
 
    <!-- slider_area_end -->

    <!-- service_area_start -->
    <div class="service_area">
        <div class="container p-0">
            <div class="row no-gutters">
                <div class="col-xl-4 col-md-4">
                    <div class="single_service">
                        
                        <div class="icon" >
                            <i class="flaticon-electrocardiogram"></i>
                            <h2>CIVA CARGO</h2>
                            <h3>Es rápido y fácil</h3>
                        </div>
                        
                      
                    </div>
                </div>
              
            </div>
        </div>
    </div>
    <!-- service_area_end -->

    <!-- welcome_docmed_area_start -->
    <div class="welcome_docmed_area ">
        <div class="container">
            <div class="row">
               
                <div class="col-xl-6 col-lg-6">
                    <div class="welcome_docmed_info">
                        <h2>Información</h2>
                        <form method="post"  id="formulario_form"><h3><br>
                            Registrate </h3>
                            <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label for="TipoDocumento">Tipo de Documento(*)</label>
                                      <select class="form-control" name="TipoDocumento" id="TipoDocumento" required>
                                        <option disabled selected>Elija una Opcion</option>
                                        <option value="DNI">DNI</option>
                                        <option value="CARNET DE EXTRANJERIA">CARNET DE EXTRANJERIA</option>
                                        <option value="PASAPORTE">PASAPORTE</option>
                                      </select>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="quantify">Numero de Documento(*)</label>
                                    <input type="number" class="form-control" name="Documento" id="Documento" placeholder="Ingrese documento" required pattern="[0-8]{0,8}" >
                                  </div>
                                </div>
                            
                                
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label for="Nombre">Nombre(*)</label>
                                    <input type="text" class="form-control" name="Nombre" id="Nombre" placeholder="Ingrese nombre" required="">
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="Apellido">Apellidos(*)</label>
                                    <input type="text" class="form-control" name="Apellido" id="Apellido" placeholder="Ingrese apellidos" required="">
                                  </div>
                                </div>
                                <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="Ruc">Telefono-Celular(*)</label>
                                    <input type="text" class="form-control" name="Telefono" id="Telefono" placeholder="Ingrese el número" required maxlength="9" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="Ruc">RUC(*)</label>
                                    <input type="text" class="form-control" name="Ruc" id="Ruc" placeholder="Ingrese el RUC" required maxlength="10" >
                                </div>
                                </div>
                                <div class="form-group col-md-14">
                                    <label for="RazonSocial">RazonSocial(*)</label>
                                    <input type="text" class="form-control" name="RazonSocial" id="RazonSocial" placeholder="Ingrese su Razón social" required >
                                </div>
                                  
                                  <div class="form-group col-md-14">
                                    <label for="inputEmail4">Correo(*)</label>
                                    <input type="email" class="form-control" name="Correo" id="Correo" placeholder="Ingrese su correo" required="">
                                  </div>
                                  
                                
                        
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Usuario(*)</label>
                                        <input type="text" class="form-control" name="Usuario" id="Usuario" placeholder="Ingrese usuario" required="" required="">
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="inputPassword4">Password(*)</label>
                                        <input type="password" class="form-control" name="Password1" id="Password1" placeholder="Ingrese contraseña" required="">
                                      </div>
                                 </div> 
                                 <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Repita Password(*)</label>
                                        <input type="password" class="form-control" name="Password2" id="Password2" placeholder="Ingrese contraseña" required="">
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="inputPassword4">Fecha_ingreso(*)</label>
                                        <input type="date" class="form-control" name="Fecha_ingreso" id="Fecha_ingreso" placeholder="" required="">
                                      </div>
                                 </div>
                                  
                                     
                            <div class="footer">
                                    <input type="hidden" name="idCliente" id="idCliente"/>

                                    <button type="submit"  name="submit" value="submit" class="btn btn-success pull-left"><i class="fa fa-floppy-o" aria-hidden="true"></i> GUARDAR</button>
                                    <button type="button" id="btnLimpiar" class="btn btn-danger"><i class="fa fa-times" ></i> Limpiar</button>
                                  </div>
                              </form>
                        </br>
             <!-- Mensaje de confirmación -->
                        <div class="form-group col-md-14">
                            <?php if(isset($_POST['submit'])){if(isset($messages)){?>
				<div class="alert alert-success" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong><?php foreach($messages as $message) {echo $message;}?></strong>     
                                </div>
            <!-- Mensaje de Error --> 
                            <?php
                            }
                      
                        if(isset($errors)){?>
				<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong><?php foreach($errors as $error) {echo $error;}?></strong>
				</div>
			<?php

                        }}?> </div>
             <!-- Limpiar formulario -->
                        <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
                        <script>
                            $("#btnLimpiar").click(function(event) {
                                    $("#formulario_form")[0].reset();
                            });
                        </script>
                             
                        
                            
                                 
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <!-- footer start -->
    <footer class="footer">
    
    <div class="copy-right_text">
        <div class="container">
            <div class="footer_border"></div>
            <div class="row">
                <div class="col-xl-12">
                    <p class="copy_right text-center">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>
                        document.write(new Date().getFullYear());
                        </script> All rights reserved <i class="fa fa-heart-o"
                            aria-hidden="true"></i> by <a href="#" target="_blank">UCH-EquipoWeb</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </div>
    </footer>
    
        
</body>


</html>
 