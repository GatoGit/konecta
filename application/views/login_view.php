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
                               
                                       <h1 class="text-primary">Login</h1>
                                   
                                    <p class="text-muted mb-4 mt-3">Correo y contraseña</p>
                                </div>

                                <form id="form_login">

                                    <div class="form-group mb-3">
                                        <label for="emailaddress">Correo</label>
                                        <input class="form-control" type="text" id="correo" name="correo" required="" placeholder="ingrese su correo">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">Contraseña</label>
                                        <input class="form-control" type="password" required="" id="password" name="password" placeholder="ingrese su contraseña">
                                    </div>

                                    <div class="form-group mb-3">
                                        
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" type="submit"> Ingresar</button>
                                    </div>

                                </form>

                                

                            </div>
                        </div>
                       

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                
                                <p class="text-muted"> <a href="<?php echo base_url('login/registro')?>" class="text-primary font-weight-medium ml-1">Crear cuenta!</a></p>
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
<script src="<?php echo base_url('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/login.js')?>"></script>
    </html>