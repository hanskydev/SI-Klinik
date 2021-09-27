<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_periksa extends CI_Model
{
    private $table = 'periksa';
    private $resep = 'resep';

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
        $this->db->insert($this->table, $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function getById($id)
    {
        return $this->db->get_where($this->table, ['kd_periksa' => $id])->row();
    }

    public function getByPasien($id)
    {
        return $this->db->get_where($this->table, ['kd_pasien' => $id])->result();
    }

    public function update($data, $id)
    {
        return $this->db->update($this->table, $data, array('kd_periksa' => $id));
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, array('kd_periksa' => $id));
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

    public function getDiagnosa($id)
    {
        $this->db->select('*');
        $this->db->from('periksa');
        $this->db->join('dokter','periksa.kd_dokter = dokter.kd_dokter');
        $this->db->join('pasien','periksa.kd_pasien = pasien.kd_pasien');
        $this->db->where('kd_periksa', $id);
        $this->db->order_by('nm_pasien', 'asc');
        $query = $this->db->get()->row();
        return $query;
    }

    public function getPasienPenyakit($id)
    {
    $this->db->select('*');
    $this->db->from('periksa');
    $this->db->join('penyakit','periksa.kd_penyakit = penyakit.kd_penyakit');
    $this->db->where('periksa.kd_periksa', $id);
    $query = $this->db->get()->row();
    return $query;
    }

    public function getPasienLayanan($id)
    {
    $this->db->select('*');
    $this->db->from('layanan');
    $this->db->join('periksa','layanan.kd_layanan = periksa.kd_layanan');
    $this->db->where('periksa.kd_periksa', $id);
    $query = $this->db->get()->row();
    return $query;
    }

    public function resep($data)
    {
        return $this->db->insert($this->resep, $data);
    }

    public function getPasienResep($id)
    {
    $this->db->select('*');
    $this->db->from('resep');
    $this->db->join('obat','resep.kd_obat = obat.kd_obat');
    $this->db->join('periksa','resep.kd_periksa = periksa.kd_periksa');
    $this->db->where('periksa.kd_periksa', $id);
    $query = $this->db->get()->result();
    return $query;
    }

    public function deleteResep($id)
    {
        return $this->db->delete($this->resep, array('kd_resep' => $id));
    }

}