<?php
class Buku extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('session');
    $this->load->library('form_validation');
    $this->load->model('BukuModel', 'bukuModel');
    $this->load->model('KategoriModel', 'kategoriModel');
  }

  public function index()
  {
    $data['kategori'] = $this->kategoriModel->ambil();
    $id_kategori = $this->input->get('kategori');

    if ($id_kategori) {
      $data['buku'] = $this->bukuModel->ambilDariKategori($id_kategori);
      $this->load->view('layout/header');
      $this->load->view('buku/index', $data);
      $this->load->view('layout/footer');
    } else {
      $data['buku'] = $this->bukuModel->ambil();
      $this->load->view('layout/header');
      $this->load->view('buku/index', $data);
      $this->load->view('layout/footer');
    }
  }

  public function tambah()
  {
    $this->form_validation->set_rules('nama', 'Nama Buku', 'required');
    $this->form_validation->set_rules('pengarang', 'Pengarang Buku', 'required');
    $this->form_validation->set_rules('kategori', 'Kategori Buku', 'required');
    $this->form_validation->set_rules('stok', 'Stok Buku', 'required');

    if (!$this->form_validation->run()) {
      $data['kategori'] = $this->kategoriModel->ambil();
      $this->load->view('layout/header');
      $this->load->view('buku/tambah', $data);
      $this->load->view('layout/footer');
    } else {
      $config['upload_path'] = './uploads/img/';
      $config['allowed_types'] = 'png|jpg|jpeg';
      $config['max_size'] = '10000';

      $this->load->library('upload', $config);

      if (!$this->upload->do_upload('gambar')) {
        $this->session->set_flashdata('error', $this->upload->display_errors('<div class="alert alert-danger">', '</div>'));
        return redirect('buku/tambah');
      } else {
        $filename = $this->upload->data('file_name');
        $this->bukuModel->simpan($filename);
        $this->session->set_flashdata('success', '<div class="alert alert-danger">Berhasil menambahkan buku baru!</div>');
        return redirect('buku');
      }
    }
  }

  public function detail($id)
  {
    $data['buku'] = $this->bukuModel->ambil($id);
    $this->load->view('layout/header');
    $this->load->view('buku/detail', $data);
    $this->load->view('layout/footer');
  }

  public function edit($id)
  {
    $data['buku'] = $this->bukuModel->ambil($id);

    $this->form_validation->set_rules('nama', 'Nama Buku', 'required');
    $this->form_validation->set_rules('pengarang', 'Pengarang Buku', 'required');
    $this->form_validation->set_rules('kategori', 'Kategori Buku', 'required');
    $this->form_validation->set_rules('stok', 'Stok Buku', 'required');

    if (!$this->form_validation->run()) {
      $data['kategori'] = $this->kategoriModel->ambil();
      $this->load->view('layout/header');
      $this->load->view('buku/edit', $data);
      $this->load->view('layout/footer');
    } else {
      if ($_FILES['gambar']) {
        $config['upload_path'] = './uploads/img/';
        $config['allowed_types'] = 'png|jpg|jpeg';
        $config['max_size'] = '10000';
        $config['overwrite'] = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
          $this->session->set_flashdata('error', $this->upload->display_errors('<div class="alert alert-danger">', '</div>'));
          return redirect('buku/tambah');
        } else {
          unlink('./uploads/img/' . $data['buku']->gambar);
          $filename = $this->upload->data('file_name');
          $this->bukuModel->edit($id, $filename);
          return redirect('buku');
        }
      } else {
        $this->bukuModel->edit($id);
        return redirect('buku');
      }
    }
  }

  public function hapus($id)
  {
    $data = $this->bukuModel->ambil($id);
    unlink('./uploads/img/' . $data->gambar);
    $this->bukuModel->hapus($id);
    return redirect('buku');
  }
}
