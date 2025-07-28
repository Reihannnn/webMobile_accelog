<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model
{
    public function get_orders_by_driver($driver_id)
    {
        return $this->db->get_where('orders', ['driver_id' => $driver_id])->result();
    }

    public function get_order_by_id($id, $driver_id)
    {
    $this->db->where('id', $id);
    $this->db->where('driver_id', $driver_id);
    return $this->db->get('orders')->row();
    }

    public function get_total_orders_by_driver($driver_id)
{
    $this->db->where('driver_id', $driver_id);
    return $this->db->count_all_results('orders');
}

public function update_status($order_id, $status)
{
    $this->db->where('id', $order_id);
    $this->db->update('orders', ['status' => $status]);
}

public function insert_status_log($order_id, $driver_id, $status)
{
    $data = [
        'order_id' => $order_id,
        'driver_id' => $driver_id,
        'status' => $status,
        'timestamp' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('order_status_log', $data);
}


public function get_order_logs_by_driver($driver_id) {
    $this->db->select('osl.*, o.order_code, o.customer');
    $this->db->from('order_status_log osl');
    $this->db->join('orders o', 'o.id = osl.order_id');
    $this->db->where('osl.driver_id', $driver_id);
    $this->db->order_by('osl.timestamp', 'DESC'); // Urut dari terbaru
    return $this->db->get()->result();
}

public function get_completed_orders_by_driver($driver_id) {
    $this->db->select('order_code, km_mobil, customer, created_at');
    $this->db->from('orders');
    $this->db->where('driver_id', $driver_id);
    $this->db->where('status', 'selesai');
    return $this->db->get()->result();
}



}
