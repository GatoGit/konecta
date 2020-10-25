<?php


class Login_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function save($datos)
    {
        $nombre = $this->val_usuario($datos['correo']);
        if ($nombre == 0) {
            $this->db->insert('usuario', $datos);
            return $this->db->insert_id();
        } else {
            return 0;
        }
    }
    public function val_usuario($correo) {
        $sql = "SELECT 1 FROM usuario WHERE correo = ?";
        $query = $this->db->query($sql, array(
            $correo
        ));
        
        return $query->row_array();
    }
    public function login($datos)
    {
        
        $sql = "SELECT * FROM usuario WHERE correo = ? and password = ?";
        $query = $this->db->query($sql, array(
            $datos['correo'], $datos['password']
            
        ));
        
        return $query->row_array();
    }
    public function count($id)
    {
        
        $sql = "SELECT count(0) count, sum(precio) sum 
                FROM historial_ventas v
                JOIN producto p ON v.productoid = p.productoid
                WHERE usuarioid = ? ";
        $query = $this->db->query($sql, array(
            $id
            
        ));
        
      
        
        $count1 = $query->row_array();
        
        
        $sql = "SELECT count(0) count 
                FROM producto 
                WHERE usuarioid = ? ";
        $query = $this->db->query($sql, array(
            $id
            
        ));
        $count2 = $query->row_array();
        
        return array(
            'count_ventas' => $count1['count'],
            'count_facturado' => $count1['sum'],
            'count_productos' => $count2['count']
        );
        
    }
}
?>