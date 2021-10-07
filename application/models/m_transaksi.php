<?php defined('BASEPATH') OR exit('No direct script access allowed');

class m_transaksi extends CI_Model
{
    private $table = 'transaksi';
    private $item = 'item';

    public function getAll()
    {
        return $this->db->get($this->table)->result();
    }

    public function save($data)
    {
        $this->db->insert($this->table, $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function getById($id)
    {
        return $this->db->get_where($this->table, ['kd_transaksi' => $id])->row();
    }

    public function update($data, $id)
    {
        return $this->db->update($this->table, $data, array('kd_transaksi' => $id));
    }

    public function delete($id)
    {
        $tables = array('item', 'transaksi');
        $this->db->where('kd_transaksi', $id);
        return $this->db->delete($tables);
    }

    public function getIdTransaksi()
    {
        $this->db->select_max('kd_transaksi');
        $query = $this->db->get($this->table);
        $this->db->limit(1);
		if($query->num_rows() <> 0){
			$data = $query->row();
			$kode = intval($data->kd_transaksi) + 1;
            return $kode;
		}
		else{
		    $kode = 1;
            return $kode;
		}
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

    public function getIdItem()
    {
        $this->db->select_max('kd_item');
        $query = $this->db->get($this->item);
        $this->db->limit(1);
		if($query->num_rows() <> 0){
			$data = $query->row();
			$kode = intval($data->kd_item) + 1;
            return $kode;
		}
		else{
		    $kode = 1;
            return $kode;
		}
    }

    public function getItem($id)
    {
        return $this->db->get_where($this->item, ['kd_transaksi' => $id])->result();
    }

    public function saveItem($data)
    {
        return $this->db->insert($this->item, $data);
    }

    public function updateItem($data, $id)
    {
        return $this->db->update($this->item, $data, array('kd_item' => $id));
    }

    public function deleteItem($id)
    {
        return $this->db->delete($this->item, array('kd_item' => $id));
    }

    public function clearItem($id)
    {
        return $this->db->delete($this->item, array('kd_transaksi' => $id));
    }

}