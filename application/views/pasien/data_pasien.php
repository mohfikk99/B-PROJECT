<!-- Begin Page Content -->
<div class="container-fluid">

  <a href="#" class="btn btn-success mb-3 mt-5" data-toggle="modal" data-target="#newModal">Tambahkan</a>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Pasien</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Aksi</th>
              <th scope="col">Nama Pasien</th>
              <th scope="col">Pavilium</th>
              <th scope="col">Tanggal Masuk</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($data_pasien as $p) {
            ?>
              <tr>
                <th scope="row"><?= $no; ?></th>
                <td>
                  <a href="<?= base_url('pasien/detail_pasien/' . $p->id_pasien); ?>" class="btn btn-sm btn-info">Detail</a>
                  <a href="<?= base_url('pasien/edit_data_pasien/' . $p->id_pasien); ?>" class="btn btn-sm btn-warning">Edit</a>
                </td>
                <td><?= $p->nama_pasien; ?></td>
                <td>(<?= $p->jenis_pavilium; ?>) <?= $p->nama_pavilium; ?></td>
                <td><?= $p->tgl_masuk; ?></td>
              </tr>
            <?php
              $no++;
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->







<div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="files">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newModalLabel">Tambah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="<?= base_url('pasien'); ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label for=""> * Tanggal Masuk</label>
            <input type="date" class="form-control" name="tgl_masuk" placeholder="Tanggal Masuk" value="">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="nama_pasien" placeholder="Nama Pasien" value="">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="umur" placeholder="Umur Pasien" value="">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="alamat" placeholder="Alamat" value="">
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <select class="form-control" name="jenis_kelamin">
                <option value="">* Pilih Jenis Kelamin</option>
                <option value="pria">Pria</option>
                <option value="wanita">Wanita</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <select class="form-control" name="id_pavilium">
                <option value="">* Pilih Pavilium</option>
                <?php foreach ($pavilium as $r) : ?>
                  <option value="<?= $r['id']; ?>">(<?= $r['jenis_pavilium']; ?>) <?= $r['nama_pavilium']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="kelas" placeholder="Kelas" value="">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="diagnosa" placeholder="Diagnosa" value="">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
          <button type="submit" class="btn btn-success">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>