<div class="container-fluid">

  <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>

    <?php foreach ($petugas as $p): ?>

  <?= form_open_multipart('petugas/update');?>
  <form action="<?= base_url('petugas/update'); ?>" method="post">
  <div class="modal-body">
    <div class="form-group">
        <input type="hidden" name="id" value="<?= $p->id; ?>">
        <label for="">Nomor Induk Pegawai</label>
        <input type="text" class="form-control"  name="nip" value="<?= $p->nip; ?>">
    </div>
    <div class="form-group">
        <label for="">Nama</label>
        <input type="text" class="form-control" name="nama" value="<?= $p->nama; ?>">
    </div>
    <div class="form-group">
        <label for="">Jabatan</label>
        <input type="text" class="form-control" name="jabatan" value="<?= $p->jabatan; ?>">
    </div>
    <div class="form-group">
        <label for="">Password</label>
        <span style="font-size:12px; color:red;">* Masukkan Password baru jika ingin mengganti/Kosongkan jika tidak</span>
        <input type="text" class="form-control"  name="password" pleacholder="password">
    </div>
    <div class="form-group row">
      <div class="col-sm-2">Gambar</div>
      <div class="col-sm-10">
        <div class="row">
          <div class="col-sm-3">
            <img src="<?= base_url('assets/img/petugas/'). $p->gambar; ?>" class="img-thumbnail">
          </div>
          <div class="col-sm-9">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="gambar" name="gambar">
              <label class="custom-file-label" for="gambar"></label>
            </div>
          </div>
        </div>
      </div>
    </div>
   </div>
  <div class="modal-footer">
    <a class="btn btn-sm btn-success" href="<?= base_url('petugas/data_petugas'); ?>">Kembali</a>
    <button type="submit" class="btn btn-primary">edit</button>
  </div>
</form>
<?php endforeach; ?>
</div>
