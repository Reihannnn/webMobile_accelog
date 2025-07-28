<?php
class History_model extends CI_Model {

    public function get_driver_history($driver_id)
    {
        $this->db->select('osl.*, o.order_code, o.customer');
        $this->db->from('order_status_log osl');
        $this->db->join('orders o', 'o.id = osl.order_id');
        $this->db->where('osl.driver_id', $driver_id);
        $this->db->order_by('osl.timestamp', 'DESC');
        return $this->db->get()->result();
    }
}
