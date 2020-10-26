<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('Login_model','login');
        
    }
	
	public function index()
	{
		$this->load->view('login_view');
	}
	public function registro()
	{
	    $this->load->view('registro_view');
	}
	
	public function save_registro() {
	    $nombre = $this->input->post('nombre');
	    $apellido = $this->input->post('apellido');
	    $correo = $this->input->post('correo');
	    $pass = $this->input->post('pass');
	    
	   $datos = array(
	       'nombre' => $nombre,
	       'apellido' => $apellido,
	       'correo' => $correo,
	       'password' => $pass
	       
	   );
	   $result = $this->login->save($datos);
	   if ($result > 0) {
	       echo json_encode(array('status'=> true));
	   }else{
	       echo json_encode(array('status'=> false));
	   }
	   
	}
	public function login() {
	    $correo = $this->input->post('correo');
	    $password = $this->input->post('password');
	    
	    $datos = array(
	       'correo' => $correo,
	        'password' => $password
	    );
	    $result = $this->login->login($datos);
	    if (!empty($result)) {
	        
	        //aqui se obtiene la cant de ventas y cant de productos y se guardan en la session
	        
	        $count = $this->login->count($result['usuarioid']);
	        if ($count['count_ventas'] == "" || $count['count_ventas'] == null) {
	            $count['count_ventas'] = 0;
	        }
	        $sess_array = array();
	        $sess_array = array(
	            'id' => $result['usuarioid'],
	            'nombre' => $result['nombre'],
	            'apellido' => $result['apellido'],
	            'correo' => $result['correo'],
	            'count_productos' => $count['count_productos'],
	            'count_ventas' => $count['count_ventas'],
		    'count_facturado' => $count['count_facturado']
	            
	        );
	        $this->session->set_userdata('login' , $sess_array);
	        echo json_encode(array('status'=>true));
	    }else{
	        echo json_encode(array('status'=> false));
	    }
	}
	
	
	function salir()
	{
	    $this->session->unset_userdata('login');
	    session_destroy();
	    redirect('');
	}
}
