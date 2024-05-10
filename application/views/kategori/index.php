<div class="container py-3">
  <h1 class="display-4">List Kategori Buku</h1>
  <hr>
  <a href="<?= site_url('kategori/tambah') ?>" class="btn btn-outline-dark mb-3">Tambah Kategori Baru</a>

  <?php if ($this->session->flashdata('success')) : ?>
    <div class="alert alert-success mb-3"><?= $this->session->flashdata('success') ?></div>
  <?php endif ?>

  <table class="table">
    <thead>
      <th>ID</th>
      <th>Nama Kategori</th>
      <th>Opsi</th>
    </thead>
    <tbody>
      <?php foreach ($kategori as $k) : ?>
        <tr>
          <td><?= $k->id ?></td>
          <td><?= $k->nama ?></td>
          <td>
            <a href="<?= site_url('kategori/edit/' . $k->id) ?>" class="btn btn-sm btn-outline-dark"><i data-feather="edit"></i></a>
            <a href="<?= site_url('kategori/hapus/' . $k->id) ?>" class="btn btn-sm btn-outline-danger"><i data-feather="trash"></i></a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>