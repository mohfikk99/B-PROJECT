<div class="container-fluid">


  <!-- Begin Page Content -->
  <div class="container-fluid">

    <a href="#" class="btn btn-success mb-3 mt-5" data-toggle="modal" data-target="#newModal">Tambahkan</a>

    <?php if (validation_errors()) : ?>
      <div class="alert alert-danger" role="alert">
        <?= validation_errors(); ?>
      </div>
    <?php endif; ?>

    <?= $this->session->flashdata('massage'); ?>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Layanan</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Aksi</th>
                <th scope="col">Jenis Layanan</th>
                <th scope="col">Harga layanan</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($data_layanan as $o) {
              ?>
                <tr>
                  <th scope="row"><?= $no; ?></th>
                  <td>
                    <a href="<?= base_url('rumah_sakit/edit_layanan/' . $o['id']); ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="<?= base_url('rumah_sakit/hapus_layanan/' . $o['id']); ?>" class="btn btn-sm btn-danger">Hapus</a>
                  </td>
                  <td><?= $o['jenis_layanan']; ?></td>
                  <td><?= number_format($o['harga'], 0, ',', '.'); ?></td>
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

      <form action="<?= base_url('rumah_sakit/layanan'); ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control" name="jenis_layanan" placeholder="Jenis Layanan" value="">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="harga" placeholder="Harga permalam" value="">
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

</div>