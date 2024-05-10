<div class="container py-3">
  <h1 class="display-4"><?= $buku->judul ?></h1>
  <hr>
  <a href="<?= site_url('buku') ?>" class="btn btn-outline-secondary mb-3">Kembali</a>

  <div class="row align-items-center">
    <div class="col-md-4">
      <img src="<?= base_url('uploads/img/' . $buku->gambar) ?>" alt="" class="w-100">
    </div>
    <div class="col-md-8">
      <p class="h4">Penulis</p>
      <p><?= $buku->pengarang ?></p>
      <hr>
      <p class="h4">Stok</p>
      <p><?= $buku->stok ?></p>
      <hr>
      <p class="h4">Kategori</p>
      <p><?= $buku->nama_kategori ?></p>
    </div>
  </div>
</div>