<?php
//aqui se valida si exite la session si no lo redirecciona al login
if (isset($this->session->userdata['login'])) {
    $id = ($this->session->userdata['login']['id']);
    $nombre = $this->session->userdata['login']['nombre'];
    $apellido = $this->session->userdata['login']['apellido'];
    $correo = $this->session->userdata['login']['correo'];
    $count_productos = $this->session->userdata['login']['count_productos'];
    $count_ventas = $this->session->userdata['login']['count_ventas'];
    $count_facturado = $this->session->userdata['login']['count_facturado'];
   
} else {
    redirect('');
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Panel</title>
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
      <h1 class="text-center text-primary"> Bienvenido a la plataforma Konecta</h1>
     
    <div class="row">
    	
   			<div class="col-md-4 text-right">
    			<div class="row">
        			<div class="col-md-4 text-muted text-center">
        				<div class="row">
            				<div class="col-md-12">
            				<h3>Productos</h3>
            				</div>
            				<div class="col-md-12 ">
                				<h5 class="text-success text-center"><span data-plugin="counterup" id="count_p"><?php echo $count_productos?></span></h5>
                			</div>
        				</div>
        				
        			</div>
        			<div class="col-md-4 text-muted text-center">
        				<div class="row">
            				<div class="col-md-12">
            				<h3>Total de ventas</h3>
            				</div>
            				<div class="col-md-12 ">
                				<h5 class="text-success text-center"><span data-plugin="counterup" id="count_v"><?php echo $count_ventas?></span></h5>
                			</div>
        				</div>
        				
        			</div>
        			<div class="col-md-4 text-muted text-center">
        				<div class="row">
            				<div class="col-md-12">
            				<h3>Total facturas</h3>
            				</div>
            				<div class="col-md-12 ">
                				<h5 class="text-success text-center"><span data-plugin="counterup" id="count_f"><?php echo $count_facturado?></span></h5>
                			</div>
        				</div>
        				
        			</div>
    			
    			</div>
    		</div>
    		
   			<div class="col-md-4 text-center">
    			<h5 class="text-warning font-weight-medium ml-1 font-24" style="text-transform: capitalize;"><?php echo $nombre. ' '. $apellido?></h5>
    		</div>
    		<div class="col-md-4 text-right pr-4">
    			<a href="<?php echo base_url('login/salir')?>" class="text-danger font-weight-medium ml-1 font-24">Cerrar Sesion</a>
    		</div>
    	
    </div>
       <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="card-box">
                                    <h4 class="header-title">Productos</h4>
                                    <p class="sub-header">
                                       Lista de productos
                                    </p>
									<div class="text-right pb-3">
										<button type="button" class="btn btn-outline-success waves-effect waves-light" data-toggle="modal" data-target=".modal_productos">
										Registrar</button>
									</div>	
		
                                    <div class="table-responsive">
                                        <table class="table mb-0" id="tabla_actividades">
                                            <thead class="thead-light">
                                            <tr>
                                                <th>#</th>
                                                <th>Acción</th>
                                                <th>Nombre</th>
                                                <th>Referencia</th>
                                                <th>Precio</th>
                                                <th>Peso</th>
                                                <th>Categoria</th>
                                                <th>Stock</th>
                                                <th>Fecha creacion</th>
                                                <th>Fecha de ultima venta</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody id="contenido_producto">
                                            
                                            </tbody>
                                        </table>
                                    </div> 
        
                                </div> 
                            </div> 
    <!-- modal producto-->
    
     <div class="modal fade modal_productos" id="modal_productos" tabindex="-1" role="dialog" aria-labelledby="tituloProductoModal" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="tituloActividadModal">Registrar Producto</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <div class="modal-body">
                                       <form class="form-horizontal" role="form" id="form_producto">
                                       
                                        <div class="form-group row">
                                            <label for="nombre" class="col-sm-3 col-form-label">Nombre</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="nom_producto" placeholder="Nombre" required="required">
                                            </div>
                                        </div>
                                       
                                        <div class="form-group row">
                                            <label for="nombre" class="col-sm-3 col-form-label">Referencia</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="referencia" placeholder="Referencia" required="required">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="nombre" class="col-sm-3 col-form-label">Precio</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" name="precio" placeholder="Precio" required="required">
                                            </div>
                                        </div>
                                       
                                       <div class="form-group row">
                                            <label for="nombre" class="col-sm-3 col-form-label">Peso</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" name="peso" placeholder="peso" required="required">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nombre" class="col-sm-3 col-form-label">Categoria</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="categoria" placeholder="Categoria" required="required">
                                            </div>
                                        </div>
                                       
                                       <div class="form-group row">
                                            <label for="nombre" class="col-sm-3 col-form-label">Stock</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" name="stock" placeholder="Stock" required="required">
                                            </div>
                                        </div>
                                       
                                        
                                       
                                        <div class="form-group mb-0 justify-content-end row">
                                            <div class="col-sm-9">
                                                <button type="submit" class="btn btn-success waves-effect waves-light">Registrar</button>
                                            </div>
                                        </div>
                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                     
                                     
                          <!-- modal update producto -->           
                                     
                            <div class="modal fade modal_update_productos" id="modal_update_productos" tabindex="-1" role="dialog" aria-labelledby="tituloProductoModal" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="tituloActividadModal">Actualizar Producto</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <div class="modal-body">
                                       <form class="form-horizontal" role="form" id="form_update_producto">
                                       <!-- productoid oculto -->   
                                       
                                         <input type="text" class="form-control" id="productoid" name="productoid"  required="required" hidden="" >
                                        <div class="form-group row">
                                            <label for="nombre" class="col-sm-3 col-form-label">Nombre</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="nom_producto" name="nom_producto" placeholder="Nombre" required="required">
                                            </div>
                                        </div>
                                       
                                        <div class="form-group row">
                                            <label for="nombre" class="col-sm-3 col-form-label">Referencia</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="referencia" name="referencia" placeholder="Referencia" required="required">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="nombre" class="col-sm-3 col-form-label">Precio</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" id="precio" name="precio" placeholder="Precio" required="required">
                                            </div>
                                        </div>
                                       
                                       <div class="form-group row">
                                            <label for="nombre" class="col-sm-3 col-form-label">Peso</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" id="peso" name="peso" placeholder="peso" required="required">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nombre" class="col-sm-3 col-form-label">Categoria</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="categoria" name="categoria" placeholder="Categoria" required="required">
                                            </div>
                                        </div>
                                       
                                       <div class="form-group row">
                                            <label for="nombre" class="col-sm-3 col-form-label">Stock</label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" id="stock" name="stock" placeholder="Stock" required="required">
                                            </div>
                                        </div>
                                       
                                        
                                       
                                        <div class="form-group mb-0 justify-content-end row">
                                            <div class="col-sm-9">
                                                <button type="submit" class="btn btn-success waves-effect waves-light">Actualizar</button>
                                            </div>
                                        </div>
                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>          
                                     
                                     
                                     
                                     
                                     
                                    
                                    <div class="modal fade get_tiempo" id="get_tiempo" tabindex="-1" role="dialog" aria-labelledby="titulotiempoModal" aria-hidden="true">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="titulotiempoModal">Lista de horas trabajadas</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <div class="modal-body">
                                                       <div class="table-responsive">
                                                        <table class="table mb-0" id="tabla_actividades">
                                                            <thead class="thead-light">
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Fecha</th>
                                                                <th>Cantidad Horas</th>
                                                               
                                                                	
                                                            </tr>
                                                            </thead>
                                                            <tbody id="contenido_tiempo">
                                                            
                                                            </tbody>
                                                        </table>
                                                    </div> 
                        
                                                </div> 
                                            </div> <!-- end col -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    </body>
 
<script src="<?php echo base_url('assets/js/vendor.min.js')?>"></script>
<script src="<?php echo base_url('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/home.js')?>"></script>
    </html>