<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://unpkg.com/feather-icons"></script>
  <title>Document</title>
</head>

<body>

  <nav class="navbar navbar-expand-lg bg-white border-bottom">
    <div class="container">
      <a class="navbar-brand" href="#">Perpus Sismul</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link <?php if (explode('/', current_url())[4] == explode('/', site_url('buku'))[4]) : ?>active<?php endif ?>" href="<?= site_url('buku') ?>">Buku</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if (explode('/', current_url())[4] == explode('/', site_url('kategori'))[4]) : ?>active<?php endif ?>" href="<?= site_url('kategori') ?>">Kategori</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if (explode('/', current_url())[4] == explode('/', site_url('tentang-kami'))[4]) : ?>active<?php endif ?>" href="<?= site_url('tentang-kami') ?>">Tentang Kami</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>