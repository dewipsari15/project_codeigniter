<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Components extends CI_Controller {
    function __construct(){
		parent::__construct();
		$this->load->model('m_model');
		$this->load->helper('my_helper');
        if($this->session->userdata('logged_in')!=true) {
            redirect(base_url().'auth');
        }
	}

	public function index()
	{
		$data['siswa'] = $this->m_model->get_data('siswa')->result();
		$this->load->view('components/navbar', $data);
	}
}
?>