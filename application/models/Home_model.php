<?php 
class Home_model extends CI_Model
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function save_producto($datos) {
        $this->db->insert('producto', $datos);
        return $this->db->insert_id();
    }
  
    public function update_producto($productoid,$datos) {
      
        $this->db->where('productoid', $productoid);
        $this->db->update('producto',$datos);
        return $this->db->affected_rows();
    }
    function get_productos() {
        $this->db->select("*, (select max(fecha_creacion) FROM historial_ventas v WHERE  p.productoid = v.productoid) fecha_ult_venta ");
        $this->db->from("producto p");  
        $this->db->where("usuarioid", $this->session->userdata['login']['id']);
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_producto_id($id) {
        $this->db->select("*");
        $this->db->from("producto" );
        $this->db->where("productoid", $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    function ventas($datos) {
        $this->db->insert('historial_ventas', $datos);
        return $this->db->insert_id();
    }
    function update_stock($productoid){
        $this->db->set('stock', '(stock - 1)',false);
        $this->db->where('productoid', $productoid);
        $this->db->update('producto');
        
        if ($this->db->affected_rows() > 0)
        {
            return json_encode(array('status' => true));
        }
        else
        {
            return json_encode(array('status' => false));
        }
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
    
    public function delete_producto($id) {
        
        
        
         $this->db->delete('historial_ventas', array('productoid' => $id));
        if ($this->db->affected_rows() >= 0 )
        {
            $this->db->delete('producto', array('productoid' => $id));
            if ($this->db->affected_rows() > 0)
            {
                return TRUE;
            }
            else
            {
                return FALSE;
            }
        }
        else
        {
            return FALSE;
        }
        
    }
    
}

?>