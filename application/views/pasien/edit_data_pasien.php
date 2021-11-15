<div class="container-fluid">

  <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>

  <?php foreach ($data_pasien as $p) : ?>

    <?= form_open_multipart('pasien/update'); ?>
    <form action="<?= base_url('pasien/update'); ?>" method="post">
      <div class="modal-body">
        <div class="form-group">
          <input type="hidden" name="id_pasien" value="<?= $p->id_pasien; ?>">
          <label for="">Tanggal Masuk</label>
          <input type="date" class="form-control" name="tgl_masuk" value="<?= $p->tgl_masuk; ?>">
        </div>
        <div class="form-group">
          <label for="">Nama Pasien</label>
          <input type="text" class="form-control" name="nama_pasien" value="<?= $p->nama_pasien; ?>">
        </div>
        <div class="form-group">
          <label for="">Umur Pasien</label>
          <input type="text" class="form-control" name="umur" value="<?= $p->umur; ?>">
        </div>
        <div class="form-group">
          <label for="">Jenis Kelamin</label>
          <div class="col-sm-12">
            <select class="form-control" name="jenis_kelamin">
              <option value="<?= $p->jenis_kelamin; ?>"><?= $p->jenis_kelamin; ?></option>
              <option value="pria">Pria</option>
              <option value="wanita">Wanita</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="">Alamat</label>
          <input type="text" class="form-control" name="alamat" value="<?= $p->alamat; ?>">
        </div>
        <div class="form-group">
          <select class="form-control" name="id_pavilium">
            <option value="<?= $p->id_pavilium; ?>"> * Default Pavilium</option>
            <?php foreach ($pavilium as $r) : ?>
              <option value="<?= $r['id']; ?>">(<?= $r['jenis_pavilium']; ?>) <?= $r['nama_pavilium']; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <label for="">Kelas</label>
          <input type="text" class="form-control" name="kelas" value="<?= $p->kelas; ?>">
        </div>
        <div class="form-group">
          <label for="">Diagnosa</label>
          <input type="text" class="form-control" name="diagnosa" value="<?= $p->diagnosa; ?>">
        </div>


      </div>
      <div class="modal-footer">
        <a class="btn btn-sm btn-success" href="<?= base_url('pasien'); ?>">Kembali</a>
        <button type="submit" class="btn btn-primary">edit</button>
      </div>
    </form>
  <?php endforeach; ?>
</div>