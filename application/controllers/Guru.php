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
        $this->load->view('guru/guru', $data);
    }

    public function tambah_guru() {
        $data['kelas'] = $this->m_model->get_data('kelas')->result();
        $this->load->view('guru/tambah_guru', $data);
    }

    public function aksi_tambah_guru() {
        $data = [
			'nama_guru' => $this->input->post('nama'),
			'nisn' => $this->input->post('nisn'),
			'gender' => $this->input->post('gender'),
			'id_kelas' => $this->input->post('id_kelas'),
		];
		$this->m_model->tambah_data('guru', $data);
		redirect(base_url('guru/guru'));
    }

    public function update_guru($id){
        $data['guru']=$this->m_model->get_by_id('guru', 'id_guru', $id)->result();
        $data['kelas']=$this->m_model->get_data('kelas')->result();
        $this->load->view('guru/update_guru', $data);
    }

    public function aksi_update_guru()
    {
        $data = array (
            'nama_guru' => $this->input->post('nama'),
            'nisn' => $this->input->post('nisn'),
            'gender' => $this->input->post('gender'),
            'id_kelas' => $this->input->post('id_kelas'),
        );
        $eksekusi=$this->m_model->update_data
        ('guru', $data, array('id_guru'=>$this->input->post('id_guru')));
        if($eksekusi)
        {
            redirect(base_url('guru/guru'));
        }
        else
        {
            redirect(base_url('guru/update_guru/'.$this->input->post('id_guru')));
        }
    }

    public function hapus_guru($id) {
        $this->m_model->delete('guru', 'id_guru', $id);
		redirect(base_url('guru/guru'));
    }
}
?>