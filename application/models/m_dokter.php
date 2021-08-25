<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_dokter extends CI_Model
{
    private $table = "tb_siswa";

    public function getAll()
    {
        return $this->db->get($this->table)->result();
    }
}