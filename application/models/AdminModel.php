<?php 

class AdminModel extends CI_Model
{
    function register($register_data)
    {
        $this->db->insert('admins', $register_data);
    }
    
    function login($login_data)
    {		
        return $this->db->get_where('admins', $login_data);
	}
}