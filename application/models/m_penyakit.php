<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_penyakit extends CI_Model
{
    private $table = 'penyakit';

    public function getAll()
    {
        return $this->db->get($this->table)->result();
    }

    public function save($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function getById($id)
    {
        return $this->db->get_where($this->table, ['kd_penyakit' => $id])->row();
    }

    public function update($data, $id)
    {
        return $this->db->update($this->table, $data, array('kd_penyakit' => $id));
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, array('kd_penyakit' => $id));
    }

}