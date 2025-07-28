<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Driver_model extends CI_Model {
    public function get_by_phone($phone)
    {
        return $this->db->get_where('drivers', ['phone' => $phone])->row();
    }

     public function get_by_id($id) {
        return $this->db->get_where('drivers', ['id' => $id])->row();
    }
}

