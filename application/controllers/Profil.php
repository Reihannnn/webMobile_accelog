<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Driver_model');
    }

    public function detail($id)
{
    $this->load->model('Driver_model');
    $this->load->model('Order_model'); // pastikan model ini sudah ada

    $driver = $this->Driver_model->get_by_id($id);
    $total_order = $this->Order_model->get_total_orders_by_driver($id);

    $data = [
        'driver' => $driver,
        'total_order' => $total_order
    ];

    $this->load->view('profile/detail', $data);
}


    public function index()
    {
    $driver_id = $this->session->userdata('driver_id'); // atau sesuaikan
    $data['driver'] = $this->Driver_model->get_by_id($driver_id);

    $this->load->view('profile/detail', $data);
    }

}
