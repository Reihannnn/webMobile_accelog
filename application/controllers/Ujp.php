<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ujp extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Order_model');
    }

    public function index() {
        $driver_id = $this->session->userdata('driver_id');
        $data['title'] = 'UJP - Trip Fee';
        $data['orders'] = $this->Order_model->get_completed_orders_by_driver($driver_id);
        $this->load->view('ujp/index', $data);
    }
}
