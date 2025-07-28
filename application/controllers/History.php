<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('History_model');
        if (!$this->session->userdata('driver_id')) {
            redirect('auth/login');
        }
    }

    public function index() {
    $driver_id = $this->session->userdata('driver_id');

    $this->load->model('Order_model');
    $logs = $this->Order_model->get_order_logs_by_driver($driver_id);

    $data = [
        'title' => 'Riwayat Order',
        'logs' => $logs
    ];

    $this->load->view('history/index', $data);
}

}
