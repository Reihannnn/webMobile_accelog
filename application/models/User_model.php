<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    
    public function get_user_by_phone($phone)
    {
        return $this->db->get_where('drivers', ['phone' => $phone])->row(); // ganti sesuai nama tabel
    }

    public function insert_user($data)
    {
        return $this->db->insert('drivers', $data); // GANTI 'users' dengan nama tabelmu
    }
}


