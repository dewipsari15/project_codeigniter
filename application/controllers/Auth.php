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
    public function aksi_register() {
        $email = $this->input->post('email', true);
        $password = $this->input->post('password', true);
        $username = $this->input->post('username', true);
        $role = $this->input->post('role', true);

        if (strlen($password) < 8) {
            $this->session->set_flashdata('salah_password', 'Password harus 8 karakter');
            redirect(base_url('auth'));
            return;
        }

        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        $data = [
            'email' => $email,
            'password' => $hashed_password,
            'username' => $username,
            'role' => $role,
        ];

        $result = $this->m_model->tambah_data('admin', $data);

        if ($result) {
            $this->session->set_flashdata('berhasil_register', 'Berhasil Registrasi, Silahkan Login');
            redirect(base_url('auth'));
        } else {
            redirect(base_url('auth/register'));
        }
    }

    public function login()
    {
        $this->load->view('auth/login');
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
                redirect(base_url() . 'admin');
            } else {
                redirect(base_url() . 'auth');
            }
        } else {
            redirect(base_url() . 'auth/login');
        }
    }

    // public function aksi_login() {
    //     $email = $this->input->post('email', true);
    //     $password = $this->input->post('password', true);
    //     $data = ['email' => $email];

    //     $query = $this->m_model->getwhere('admin', $data);
    //     $result = $query->row_array(); 

    //     if (!empty($result) && password_verify($password, $result['password'])) {
    //         $data = [
    //             'logged_in' => true,
    //             'email' => $result['email'],
    //             'username' => $result['username'],
    //             'id' => $result['id'],
    //         ];

    //         $this->session->set_userdata($data);

    //         if ($this->session->userdata('role') == 'admin') {
    //             redirect(base_url('admin'));
    //         } else {
    //             $this->session->set_flashdata('gagal_login', 'Silahkan periksa email dan password anda.');
    //             redirect(base_url('auth'));
    //         }
    //     } else {
    //         redirect(base_url('auth/login'));
    //     }
    // }

    // fungsi logout
	function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('auth'));
    }

}
?>