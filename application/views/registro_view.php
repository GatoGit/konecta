<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Prueba Konecta" name="description" />
        <meta content="Santiago soto" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
          <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/css/app.min.css" rel="stylesheet" type="text/css" />
   <link 
	href="<?php echo base_url('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css')?>"
	rel="stylesheet" type="text/css" />
    </head>
    <body>
    <input type="hidden" id="baseurl" value="<?php echo base_url()?>" >
     <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">

                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <h1 class="text-primary">Registro</h1>
                                    <p class="text-muted mb-4 mt-3">Crear cuenta para la plataforma de Konecta</p>
                                </div>

                                <form id="form_registro">

                                    <div class="form-group">
                                        <label for="fullname">Nombres</label>
                                        <input class="form-control" type="text" id="nombre" name="nombre"placeholder="Ingrese su nombre" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="fullname">Apellidos</label>
                                        <input class="form-control" type="text" id="apellido"  name="apellido" placeholder="Ingrese su apellido" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="emailaddress">Correo</label>
                                        <input class="form-control" type="email" id="correo" name="correo" required placeholder="Ingrese su correo" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Contraseña</label>
                                        <input class="form-control" type="password" required id="password" name="pass" placeholder="Ingrese su contraseña" required>
                                    </div>
                                    
                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" type="submit"> Registrar </button>
                                    </div>

                                </form>

                                

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-warning"> <a href="<?php echo base_url()?>" class="text-warning font-weight-medium ml-1">Iniciar sesion</a></p>
                            </div> 
                        </div>
                        

                    </div> 
                </div>
               
            </div>
            
        </div>
        </div>
            
        </div>
    
    <footer>
    
    </footer>
    </body>
    <!-- Vendor js -->
<script src="<?php echo base_url('assets/js/vendor.min.js')?>"></script>
<script
	src="<?php echo base_url('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/login.js')?>"></script>
    </html>