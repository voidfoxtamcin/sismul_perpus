<?php
class BukuModel extends CI_Model
{
  public function ambil($id = FALSE)
  {
    if ($id != FALSE) {
      return $this->db->query('SELECT `buku`.*, `kategori`.`nama` AS `nama_kategori` FROM `buku` INNER JOIN `kategori` ON `buku`.`id_kategori` = `kategori`.`id` WHERE `buku`.`id` = ' . $id)->row_object();
    }
    return $this->db->query('SELECT `buku`.*, `kategori`.`nama` AS `nama_kategori` FROM `buku` INNER JOIN `kategori` ON `buku`.`id_kategori` = `kategori`.`id`')->result_object();
  }

  public function ambilDariKategori($kategoriId)
  {
    return $this->db->query('SELECT `buku`.*, `kategori`.`nama` AS `nama_kategori` FROM `buku` INNER JOIN `kategori` ON `buku`.`id_kategori` = `kategori`.`id` WHERE `buku`.`id_kategori` = ' . $kategoriId)->result_object();
  }

  public function simpan($filename)
  {
    $data = [
      'judul' => $this->input->post('nama'),
      'pengarang' => $this->input->post('pengarang'),
      'id_kategori' => $this->input->post('kategori'),
      'stok' => $this->input->post('stok'),
      'gambar' => $filename
    ];

    $this->db->insert('buku', $data);
  }

  public function edit($id, $filename = FALSE)
  {
    $data = [
      'judul' => $this->input->post('nama'),
      'pengarang' => $this->input->post('pengarang'),
      'id_kategori' => $this->input->post('kategori'),
      'stok' => $this->input->post('stok'),
    ];

    if ($filename != FALSE) {
      $data['gambar'] = $filename;
    }

    $this->db->where('id', $id);
    $this->db->update('buku', $data);
  }

  public function hapus($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('buku');
  }
}
