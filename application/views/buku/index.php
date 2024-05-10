<div class="container py-3">
  <h1 class="display-4">Perpus Sismul</h1>
  <hr>

  <a href="<?= site_url('buku/tambah') ?>" class="btn btn-outline-dark mb-3">Tambah Buku Baru</a>

  <p class="mb-0">Kategori</p>
  <div class="btn-group mb-3">
    <a href="<?= site_url('buku') ?>" class="btn btn-light">Semua</a>
    <?php foreach ($kategori as $k) : ?>
      <a href="<?= site_url('buku?kategori=' . $k->id) ?>" class="btn btn-light"><?= $k->nama ?></a>
    <?php endforeach ?>
  </div>

  <div class="row">
    <?php foreach ($buku as $b) : ?>
      <div class="col-md-3">
        <div class="card h-100">
          <img src="<?= base_url('uploads/img/' . $b->gambar) ?>" alt="Gambar <?= $b->judul ?>" class="card-img-top">
          <div class="card-body d-flex flex-column justify-content-between">
            <div>
              <p class="h5 text-center"><?= $b->judul ?></p>
            </div>
            <div class="d-flex justify-content-center">
              <a href="<?= site_url('buku/detail/' . $b->id) ?>" class="btn btn-sm btn-outline-dark">
                <i data-feather="eye"></i>
              </a>
              <a href="<?= site_url('buku/edit/' . $b->id) ?>" class="btn btn-sm btn-outline-dark mx-2">
                <i data-feather="edit"></i>
              </a>
              <a href="<?= site_url('buku/hapus/' . $b->id) ?>" class="btn btn-sm btn-outline-danger">
                <i data-feather="trash"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach ?>
  </div>
</div>