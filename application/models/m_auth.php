<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model
{
	private $table = 'admin';

    function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}

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
        return $this->db->get_where($this->table, ['username' => $id])->row();
    }

    public function update($data, $id)
    {
        return $this->db->update($this->table, $data, array('username' => $id));
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, array('username' => $id));
    }
    
}