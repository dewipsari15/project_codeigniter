<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_model');
	}
    // menampilkan halaman
	public function index()
	{
		$this->load->view('auth/auth');
	}
    
    // function aksinya
    public function aksi_register() 
    { 
        $this->load->library('form_validation'); 
        

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email'); 
        $this->form_validation->set_rules('username', 'username');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('role', 'role');
    
        if ($this->form_validation->run() == FALSE) { 
            $this->session->set_flashdata('salah_password', 'Password harus ada 8 karakter.');
            redirect(base_url('auth'));
        } else {
            $email = $this->input->post('email', true);
            $username = $this->input->post('username', true);
            $password = md5($this->input->post('password', true));
            $role = $this->input->post('role', true);
    
            $data = [ 
                'email' => $email, 
                'username' => $username,
                'password' => $password,
                'role' => $role,
            ]; 
    
            $this->m_model->tambah_data('admin', $data); 
            $this->session->set_flashdata('berhasil_register', 'Berhasil Registrasi, Silahkan Login');
            redirect(base_url('auth')); 
        } 
    }

    public function aksi_login()
    {
        $email = $this->input->post('email', true);
        $password = $this->input->post('password', true);
        $data = ['email' => $email];
        $query = $this->m_model->getwhere('admin', $data);
        $result = $query->row_array();

        if (!empty($result) && md5($password) === $result['password']) {
            $data = [
                'logged_in' => true,
                'email' => $result['email'],
                'username' => $result['username'],
                'role' => $result['role'],
                'id' => $result['id'],
            ];
            $this->session->set_userdata($data);
            if ($this->session->userdata('role') == 'admin') {
                $this->session->set_flashdata('berhasil_login', 'Selamat datang dimini project Dewi.');
                redirect(base_url() . 'main');
            } else {
                $this->session->set_flashdata('gagal_login', 'Silahkan periksa email dan password anda.');
                redirect(base_url() . 'auth');
            }
        } else {
            $this->session->set_flashdata('gagal_login_i', 'Akun atau Password anda kosong!');
            redirect(base_url() . 'auth');
        }
    }

    // fungsi logout
	function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('auth'));
    }

}
?>