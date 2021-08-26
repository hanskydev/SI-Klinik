<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_pasien extends CI_Model
{
    private $table = "pasien";

    public function getAll()
    {
        return $this->db->get($this->table)->result();
    }
    
}