<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');
        $this->load->helper(['url', 'form']);
        $this->load->model('Driver_model');
        $this->load->model('User_model');
        $this->load->library('session');

    }

    public function index()
    {
         redirect('auth/login');
    }


    public function login() {
        // jika sudah login, lempar ke dashboard
        if ($this->session->userdata('logged_in')) {
            redirect('dashboard');
        }

        $this->load->view('auth/login_view');
    }

    public function register() {
        if ($this->session->userdata('logged_in')) {
            redirect('dashboard');
        }

        $this->load->view('auth/register_view');
    }

    public function proses_login() {
        $phone = $this->input->post('phone');
        $password = $this->input->post('password');

        $user = $this->User_model->get_user_by_phone($phone);

        if ($user && password_verify($password, $user->password)) {
            // simpan ke session
            $this->session->set_userdata([
                'driver_id' => $user->id,
                'driver_name' => $user->name ,
                'phone' => $user->phone,
                'logged_in' => true
            ]);
            redirect('dashboard');
        } else {
            $this->session->set_flashdata('error', 'Nomor HP atau password salah!');
            redirect('auth/login');
        }
    }


    public function register_action() {
        $phone = $this->input->post('phone');
        $password = $this->input->post('password');
        $confirm = $this->input->post('confirm_password');

        if ($password !== $confirm) {
            $this->session->set_flashdata('error', 'Konfirmasi password tidak cocok');
            redirect('auth/register');
        }

        $data = [
            'phone' => $phone,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ];

        $this->User_model->insert_user($data);

        $this->session->set_flashdata('success', 'Berhasil daftar, silakan login');
        redirect('auth/login');
    }



    public function logout() {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
