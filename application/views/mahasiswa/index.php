<div class="container">
  <div class="flash-data" <?= $this->session->data-flashdata('flash'); ?>></div>
  <div class="row mt-3">
    <div class="col-md-6">
      <a href="<?= base_url(); ?> mahasiswa/tambah" class="btn btn-primary">Tambah Data mahasiswa</a>
    </div>
  </div>

  <div class="row mt-3">
    <div class="col-md-6">
      <form action="" method="post">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="cari data mahasiswa.." name="keyword">
          <div class="input-group-append">
            <button class="btn btn-primary" type="submit">Cari</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <div class="row mt-3">
    <div class="col-md-6">
      <h3>Daftar Mahasiswa</h3>
      <?php if (empty($mahasiswa)): ?>
      <div class="alert alert-danger" role>
        data mahasiswa tidak ditemukan.
      </div>
  <?php endif; ?>
  <ul class="list-group">
    <?php foreach ($mahasiswa as mhs) : ?>
    <li class="lis-group-item">
      <?= $mhs['nama']; ?>
      <a href="<?= base_url(); ?>mahasiswa/hapus/<?= $mhs['$id']; ?>"></a>
    </li>
  </ul>
    </div>
  </div>

</div>