<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_pendaftaran extends CI_Model
{
    private $table = 'pendaftaran';

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('pendaftaran');
        $this->db->join('pasien','pendaftaran.kd_pasien = pasien.kd_pasien');
        $this->db->order_by('status', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    public function save($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function getById($id)
    {
        return $this->db->get_where($this->table, ['no_pendaftaran' => $id])->row();
    }

    public function update($data, $id)
    {
        return $this->db->update($this->table, $data, array('no_pendaftaran' => $id));
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, array('no_pendaftaran' => $id));
    }

    public function getPasien()
    {
        $this->db->order_by('nm_pasien', 'asc');
        $query = $this->db->get('pasien')->result();
        return $query;
    }

}