<?php 

class AdminModel extends CI_Model
{
    function register($register_data)
    {
        $this->db->insert('admins', $register_data);
	}
}