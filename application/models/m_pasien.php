<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_pasien extends CI_Model
{
    private $table = 'pasien';
    private $contact = 'keluarga';

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
        return $this->db->get_where($this->table, ['kd_pasien' => $id])->row();
    }

    public function update($data, $id)
    {
        return $this->db->update($this->table, $data, array('kd_pasien' => $id));
    }

    public function delete($id)
    {
        $tables = array('keluarga', 'pendaftaran', 'periksa', 'pasien');
        $this->db->where('kd_pasien', $id);
        return $this->db->delete($tables);
    }

    public function addContact($data)
    {
        return $this->db->insert($this->contact, $data);
    }

    public function getContact($id)
    {
        $this->db->select('*');
        $this->db->from('keluarga');
        $this->db->join('pasien','keluarga.kd_pasien = pasien.kd_pasien');
        $this->db->where('keluarga.kd_pasien', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function deleteContact($id)
    {
        return $this->db->delete($this->contact, array('kd_keluarga' => $id));
    }
    
}