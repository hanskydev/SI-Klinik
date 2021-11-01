<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model
{
	private $table = 'admin';

    function login($admin){		
		return $this->db->get_where($this->table, $admin);
	}

	public function getAll()
    {
        return $this->db->get($this->table)->result();
    }

    public function save($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function getById($username)
    {
        return $this->db->get_where($this->table, ['username' => $username])->row();
    }

    public function update($data, $username)
    {
        return $this->db->update($this->table, $data, array('username' => $username));
    }

    public function delete($username)
    {
        return $this->db->delete($this->table, array('username' => $username));
    }
    
}