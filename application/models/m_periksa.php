<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_periksa extends CI_Model
{
    private $table = 'periksa';

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('periksa');
        $this->db->join('dokter','periksa.kd_dokter = dokter.kd_dokter');
        $this->db->join('pasien','periksa.kd_pasien = pasien.kd_pasien');
        $this->db->order_by('nm_pasien', 'asc');
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

    public function getDokter()
    {
        $this->db->order_by('nm_dokter', 'asc');
        $query = $this->db->get('dokter')->result();
        return $query;
    }

    public function getPenyakit()
    {
        $this->db->order_by('nm_penyakit', 'asc');
        $query = $this->db->get('penyakit')->result();
        return $query;
    }

    public function getObat()
    {
        $this->db->order_by('nm_obat', 'asc');
        $query = $this->db->get('obat')->result();
        return $query;
    }

    public function getLayanan()
    {
        $this->db->order_by('nm_layanan', 'asc');
        $query = $this->db->get('layanan')->result();
        return $query;
    }

    public function setDone($data, $id)
    {
        return $this->db->update($this->table, $data, array('no_pendaftaran' => $id));
    }

    public function setWait($data, $id)
    {
        return $this->db->update($this->table, $data, array('no_pendaftaran' => $id));
    }

}