<div class="container py-5">
  <h1 class="display-4">Tambah Kategori Baru</h1>
  <hr>

  <a href="<?= site_url('kategori') ?>" class="btn btn-outline-secondary mb-3">Kembali</a>

  <div class="row">
    <div class="col-md-6">
      <form action="<?= site_url('kategori/tambah') ?>" method="post">
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Kategori</label>
          <input type="text" name="nama" id="nama" class="form-control">
        </div>
        <div class="d-grid">
          <button type="submit" class="btn btn-outline-dark">Simpan Kategori</button>
        </div>
      </form>
    </div>
    <div class="col-md-6">
      <?= validation_errors('<div class="alert alert-danger">', '</div>') ?>
      <?= $this->session->flashdata('error') ?>
    </div>
  </div>
</div>