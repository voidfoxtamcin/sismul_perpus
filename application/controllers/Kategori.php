<?php
class Kategori extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('session');
    $this->load->library('form_validation');
    $this->load->model('KategoriModel', 'kategoriModel');
  }

  public function index()
  {
    $data['kategori'] = $this->kategoriModel->ambil();
    $this->load->view('layout/header');
    $this->load->view('kategori/index', $data);
    $this->load->view('layout/footer');
  }

  public function tambah()
  {
    $this->form_validation->set_rules('nama', 'Nama Kategori', 'required');

    if (!$this->form_validation->run()) {
      $this->load->view('layout/header');
      $this->load->view('kategori/tambah');
      $this->load->view('layout/footer');
    } else {
      $this->kategoriModel->simpan();
      $this->session->set_flashdata('success', 'Berhasil menambahkan kategori baru!');
      return redirect('kategori');
    }
  }

  public function edit($id)
  {
    $this->form_validation->set_rules('nama', 'Nama Kategori', 'required');

    if (!$this->form_validation->run()) {
      $data['kategori'] = $this->kategoriModel->ambil($id);
      $this->load->view('layout/header');
      $this->load->view('kategori/edit', $data);
      $this->load->view('layout/footer');
    } else {
      $this->kategoriModel->edit($id);
      $this->session->set_flashdata('success', 'Berhasil mengubah kategori!');
      return redirect('kategori');
    }
  }

  public function hapus($id)
  {
    $this->kategoriModel->hapus($id);
    $this->session->set_flashdata('success', 'Berhasil menghapus kategori!');
    return redirect('kategori');
  }
}
