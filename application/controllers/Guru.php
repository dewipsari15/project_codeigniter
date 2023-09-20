<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {

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
        $data['guru'] = $this->m_model->get_data('guru')->result();
		$this->load->view('guru/index', $data);
	}

    public function guru() {
        $data['guru'] = $this->m_model->get_data('guru')->result();
        $this->load->view('guru', $data);
    }

    public function tambah_guru() {
        $data['mapel'] = $this->m_model->get_data('mapel')->result();
        $this->load->view('guru/tambah_guru', $data);
    }

    public function aksi_tambah_guru() {
        $data = [
			'nama_guru' => $this->input->post('nama'),
			'nik' => $this->input->post('nik'),
			'gender' => $this->input->post('gender'),
			'id_mapel' => $this->input->post('id_mapel'),
		];
		$this->m_model->tambah_data('guru', $data);
		redirect(base_url('guru'));
    }

    public function update_guru($id){
        $data['guru']=$this->m_model->get_by_id('guru', 'id', $id)->result();
        $data['mapel']=$this->m_model->get_data('mapel')->result();
        $this->load->view('guru/update_guru', $data);
    }

    public function aksi_update_guru()
    {
        $data = array (
            'nama_guru' => $this->input->post('nama'),
            'nik' => $this->input->post('nik'),
            'gender' => $this->input->post('gender'),
            'id_mapel' => $this->input->post('id_mapel'),
        );
        $eksekusi=$this->m_model->update_data
        ('guru', $data, array('id'=>$this->input->post('id')));
        if($eksekusi)
        {
            redirect(base_url('guru'));
        }
        else
        {
            redirect(base_url('guru/update_guru/'.$this->input->post('id')));
        }
    }

    public function hapus_guru($id) {
        $this->m_model->delete('guru', 'id', $id);
		redirect(base_url('guru'));
    }
}
?>