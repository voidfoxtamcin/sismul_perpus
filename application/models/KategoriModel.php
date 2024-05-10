<?php
class KategoriModel extends CI_Model
{
  public function ambil($id = FALSE)
  {
    if ($id != FALSE) {
      $this->db->where('id', $id);
      return $this->db->get('kategori')->row_object();
    }
    return $this->db->get('kategori')->result_object();
  }

  public function simpan()
  {
    $data = [
      'nama' => $this->input->post('nama')
    ];

    $this->db->insert('kategori', $data);
  }

  public function edit($id)
  {
    $data = [
      'nama' => $this->input->post('nama')
    ];

    $this->db->where('id', $id);
    $this->db->update('kategori', $data);
  }

  public function hapus($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('kategori');
  }
}
