<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('driver_id')) {
            redirect('auth/login');
        }

        $this->load->model('Order_model');
    }

    public function detail($id)
    {
        $driver_id = $this->session->userdata('driver_id');
        $order = $this->Order_model->get_order_by_id($id, $driver_id);

        if (!$order) {
            show_404();
        }

        $data['title'] = 'Detail Order';
        $data['order'] = $order;
        $this->load->view('order/detail', $data);

    }

    

public function update_status($order_id, $new_status)
{
    $driver_id = $this->session->userdata('driver_id');

    $data = [
        'order_id'   => $order_id,
        'driver_id'  => $driver_id,
        'status'     => $new_status,
        'timestamp'  => date('Y-m-d H:i:s')
    ];

    $this->db->insert('order_status_log', $data);

    // Juga update status utama di orders table
    $this->db->where('id', $order_id)->update('orders', ['status' => $new_status]);

    redirect('order/detail/' . $order_id);
}



}
