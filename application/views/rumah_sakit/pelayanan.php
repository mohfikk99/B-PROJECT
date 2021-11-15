<div class="container-fluid">

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Pasien Telah Selesai Perawatan</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Aksi</th>
              <th>Nama Pasien</th>
              <th>Ruangan</th>
              <th>Tanggal Masuk</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Aksi</th>
              <th>Nama Pasien</th>
              <th>Pavilium</th>
              <th>Tanggal Masuk</th>
            </tr>
          </tfoot>
          <tbody>
            <?php
            $no = 1;
            foreach ($selesai as $p) { ?>
              <tr>
                <td><?= $no; ?></td>
                <td>
                  <a href="<?= base_url('rumah_sakit/hapus_pasien/' . $p->id_pasien); ?>" class="btn btn-sm btn-danger">Hapus</a>
                  <a href="<?= base_url('rumah_sakit/detail_pasien/' . $p->id_pasien); ?>" class="btn btn-sm btn-info">Detail</a>
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