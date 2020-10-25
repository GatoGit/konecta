<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('Home_model','home');
        
    }
	
	public function index()
	{
	  
		$this->load->view('home_view');
		
	}
	public function save_producto(){
	    $nom_producto =  $this->input->post('nom_producto');
	    $referencia =$this->input->post('referencia');
	    $categoria =$this->input->post('categoria');
	    $precio =  $this->input->post('precio');
	    $peso =$this->input->post('peso');
	    $stock =  $this->input->post('stock');
	  
	    
	    $datos= array(
	        'usuarioid' => $this->session->userdata['login']['id'],
	        'nom_producto' => $nom_producto,
	        'referencia' => $referencia,
	        'precio' => $precio,
	        'peso' => $peso,
	        'categoria' => $categoria,
	        'stock' => $stock
	    );
	    $result = $this->home->save_producto($datos);
	    if ($result > 0) {
	        echo json_encode(array('status'=> true));
	    }else{
	        echo json_encode(array('status'=> false));
	    }
	}
	
	public function update_producto(){
	    $productoid =  $this->input->post('productoid');
	    $nom_producto =  $this->input->post('nom_producto');
	    $referencia =$this->input->post('referencia');
	    $categoria =$this->input->post('categoria');
	    $precio =  $this->input->post('precio');
	    $peso =$this->input->post('peso');
	    $stock =  $this->input->post('stock');
	    
	    
	    $datos= array(
	       
	        'nom_producto' => $nom_producto,
	        'referencia' => $referencia,
	        'precio' => $precio,
	        'peso' => $peso,
	        'categoria' => $categoria,
	        'stock' => $stock
	    );
	    $result = $this->home->update_producto($productoid,$datos);
	    if ($result >= 0) {
	        echo json_encode(array('status'=> true));
	    }else{
	        echo json_encode(array('status'=> false));
	    }
	}
	
	public function get_productos() {
	    $datos = $this->home->get_productos();
        $count = 1;
        $row = '';
        foreach ($datos as $value) {
           $row .= '<tr class="font-20">';
           $row .= '<th>'.$count.'</th>';
           $row .= '<td>'. 
           ' <button onclick="venta('.$value["productoid"].')" class="btn btn-icon waves-effect waves-light btn-light text-success font-20"> <i class="fe-dollar-sign"></i> </button>'. 
           ' <button onclick="get_producto_update('.$value["productoid"].')" class="btn btn-icon waves-effect waves-light btn-light text-primary font-20"> <i class="fe-edit-2"></i> </button>'.
           ' <button onclick="delete_producto('.$value["productoid"].')" class="btn btn-icon waves-effect waves-light btn-light text-danger font-20"> <i class="fe-delete"></i> </button>'.
           '</td>';
           $row .= '<td>'.$value['nom_producto'].'</td>';
           $row .= '<td>'.$value['referencia'].'</td>';
           $row .= '<td>'.$value['precio'].'</td>';
           $row .= '<td>'.$value['peso'].'</td>';
           $row .= '<td>'.$value['categoria'].'</td>';
           $row .= '<td>'.$value['stock'].'</td>';
           $row .= '<td>'.$value['fecha_creacion'].'</td>';
           $row .= '<td>'.$value['fecha_ult_venta'].'</td>';
          
          $row .= '</tr>';
               $count++;
        }
        echo $row;
        
    }
    
    
    public function ventas(){
        
        
        $productoid =  $this->input->post('productoid');
        $res = $this->val_stock($productoid);
        if ($res) {
            $datos= array(
                'productoid' => $productoid
                
            );
            $result = $this->home->ventas($datos);
            
            if ($result > 0) {
                //update stock
                $result = $this->home->update_stock($productoid);
                echo  $result;
            }else{
                echo json_encode(array('status'=> false));
            }
        }else{
            echo json_encode(array('stock'=> false));
        }
       
    }
    
    
    public function val_stock($productoid){
        $result = $this->home->get_producto_id($productoid);
        if ($result['stock'] > 0) {
          return true;
        }else{
            return false;
        }
    }
    
    public function get_producto_id() {
        $productoid =  $this->input->post('productoid');
        $result = $this->home->get_producto_id($productoid);
        echo json_encode($result);
    }
   
    public function count() {
        $datos = $this->home->count($this->session->userdata['login']['id']);
        if ($datos['count_ventas'] == "" || $datos['count_ventas'] == null) {
            $datos['count_ventas'] = 0;
        }
        $this->session->userdata['login']['count_ventas'] = $datos['count_ventas'];
        $this->session->userdata['login']['count_productos'] = $datos['count_productos'];
        $this->session->userdata['login']['count_facturado'] = $datos['count_facturado'];
        echo json_encode(array(
            'count_ventas' => $datos['count_ventas'],
            'count_productos' => $datos['count_productos'],
            'count_facturado' => $datos['count_facturado']
        ));
        
    }
    
    public function delete_producto(){
     
            $productoid = $this->input->post('productoid');
            
            
            
            $result = $this->home->delete_producto($productoid);
            
            echo json_encode($result);
            
            
        
    }
}

