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
    
    // function login() {
    //     $this->load->view('auth/login');
    // }

    // function aksinya
    public function aksi_register() {
        $email = $this->input->post('email', true);
        $password = $this->input->post('password', true);
        $username = $this->input->post('username', true);
        $role = $this->input->post('role', true);

        if (strlen($password) < 8) {
            echo '
            <h1>Password harus 8 karakter</h1>
            // <script>
            // Swal.fire(
            //     "Password Terlalu Pendek",
            //     "Password harus memiliki minimal 8 karakter.",
            //     "error"
            // );
            // </script>
            ';
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
            redirect(base_url('auth/login'));
        } else {
            redirect(base_url('auth/register'));
        }
    }

    public function aksi_login() {
        $email = $this->input->post('email', true);
        $password = $this->input->post('password', true);
        $data = ['email' => $email];

        $result = $this->m_model->getwhere('admin', $data)->row_array();

        if (!empty($result) && password_verify($password, $result['password'])) {
            $data = [
                'logged_in' => true,
                'email' => $result['email'],
                'username' => $result['username'],
                'id' => $result['id'],
            ];

            $this->session->set_userdata($data);

            if ($this->session->userdata('role') == 'admin') {
                redirect(base_url('admin'));
            } else {
                redirect(base_url('auth/login'));
            }
        } else {
            redirect(base_url('auth/login'));
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