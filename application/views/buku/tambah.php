<div class="container py-5">
  <h1 class="display-4">Tambah Buku Baru</h1>
  <hr>

  <a href="<?= site_url('buku') ?>" class="btn btn-outline-secondary mb-3">Kembali</a>

  <div class="row">
    <div class="col-md-6">
      <form action="<?= site_url('buku/tambah') ?>" method="post" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Buku</label>
          <input type="text" name="nama" id="nama" class="form-control">
        </div>
        <div class="mb-3">
          <label for="pengarang" class="form-label">Pengarang Buku</label>
          <input type="text" name="pengarang" id="pengarang" class="form-control">
        </div>
        <div class="mb-3">
          <label for="kategori" class="form-label">Kategori Buku</label>
          <select name="kategori" id="kategori" class="form-control">
            <option value="">Pilih satu</option>
            <?php foreach ($kategori as $k) : ?>
              <option value="<?= $k->id ?>"><?= $k->nama ?></option>
            <?php endforeach ?>
          </select>
        </div>
        <div class="mb-3">
          <label for="stok" class="form-label">Stok Buku</label>
          <input type="number" name="stok" id="stok" class="form-control">
        </div>
        <div class="mb-3">
          <label for="gambar" class="form-label">Gambar Buku</label>
          <input type="file" name="gambar" id="gambar" class="form-control">
        </div>
        <div class="d-grid">
          <button type="submit" class="btn btn-outline-dark">Simpan Buku</button>
        </div>
      </form>
    </div>
    <div class="col-md-6">
      <?= validation_errors('<div class="alert alert-danger">', '</div>') ?>
      <?= $this->session->flashdata('error') ?>
    </div>
  </div>
</div>