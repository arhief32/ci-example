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

    function login_page()
    {
        $data['status'] = '';
        $this->load->view('auth/login', $data);
    }

    function login()
    {
        $login_data = [
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password'))
        ];

        $check_login = $this->AdminModel->login($login_data)->num_rows();
        $result = $this->AdminModel->login($login_data)->result();

        if($check_login > 0)
        {
            $data_session = array(
				'name' => $result[0]->full_name,
				'status' => "login"
				);
 
            $this->session->set_userdata($data_session);

            var_dump('berhasil uuuyeeeaah');

			// redirect(base_url('dashboard'));
        }
        else
        {
            $data['status'] = "your username and password don't match. try again";
            
            $this->load->view('auth/login', $data);
        }
    }

    function logout()
    {

    }
}