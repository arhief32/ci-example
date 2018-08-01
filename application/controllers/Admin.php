<?php 

class Admin extends CI_Controller
{

	function __construct(){
		parent::__construct();		
		$this->load->model('AdminModel');
        $this->load->helper('url');
	}

    function register_page()
    {
        $this->load->view('auth/register');
    }
    
    function register()
    {
        $register_data = [
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'full_name' => $this->input->post('full_name')
        ];

        $this->AdminModel->register($register_data);
        $this->load->view('auth/login');
    }
}