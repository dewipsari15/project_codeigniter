<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

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
		$this->load->view('siswa/index', $data);
	}

    public function tambah_siswa() {
        $data['kelas'] = $this->m_model->get_data('kelas')->result();
        $this->load->view('siswa/tambah_siswa', $data);
    }

    public function aksi_tambah_siswa() {
        $data = [
			'nama_siswa' => $this->input->post('nama'),
			'nisn' => $this->input->post('nisn'),
			'gender' => $this->input->post('gender'),
			'id_kelas' => $this->input->post('id_kelas'),
		];
		$this->m_model->tambah_data('siswa', $data);
        $this->session->set_flashdata('berhasil_menambahkan', 'Data siswa berhasil ditambahkan.');
		redirect(base_url('siswa'));
    }

    public function update_siswa($id){
        $data['siswa']=$this->m_model->get_by_id('siswa', 'id_siswa', $id)->result();
        $data['kelas']=$this->m_model->get_data('kelas')->result();
        $this->load->view('siswa/update_siswa', $data);
    }

    public function aksi_update_siswa()
    {
        $data = array (
            'nama_siswa' => $this->input->post('nama'),
            'nisn' => $this->input->post('nisn'),
            'gender' => $this->input->post('gender'),
            'id_kelas' => $this->input->post('id_kelas'),
        );
        $eksekusi=$this->m_model->update_data
        ('siswa', $data, array('id_siswa'=>$this->input->post('id_siswa')));
        if($eksekusi)
        {
            $this->session->set_flashdata('berhasil_mengupdate', 'Data siswa berhasil diupdate.');
            redirect(base_url('siswa'));
        }
        else
        {
            redirect(base_url('siswa/update_siswa/'.$this->input->post('id_siswa')));
        }
    }

    public function hapus_siswa($id) {
        $this->m_model->delete('siswa', 'id_siswa', $id);
		redirect(base_url('siswa'));
    }
}
?>