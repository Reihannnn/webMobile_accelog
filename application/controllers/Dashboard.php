<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Load model
        $this->load->model('Order_model');

        // Cek apakah user sudah login
        if (!$this->session->userdata('driver_id')) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $driver_id = $this->session->userdata('driver_id');
        $orders = $this->Order_model->get_orders_by_driver($driver_id);

        $data = [
            'title' => 'Dashboard Sopir',
            'orders' => $orders
        ];

        $this->load->view('dashboard/index', $data);

    }
}
