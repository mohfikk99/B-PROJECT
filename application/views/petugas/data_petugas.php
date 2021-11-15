

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
              <h6 class="m-0 font-weight-bold text-primary">Data Petugas</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Aksi</th>
                      <th scope="col">NIP</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Jabatan</th>
                      <th scope="col">Password</th>
                      <th scope="col">Gambar</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  $no = 1;
                  foreach ($data_petugas as $p) {
                   ?>
                  <tr>
                    <th scope="row"><?= $no; ?></th>
                    <td>
                      <a href="<?= base_url('petugas/edit_petugas/'. $p['id']); ?>" class="btn btn-sm btn-warning">Edit</a>
                      <a href="<?= base_url('petugas/hapus_petugas/'. $p['id']); ?>" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                    <td><?= $p['nip']; ?></td>
                    <td><?= $p['nama']; ?></td>
                    <td><?= $p['jabatan']; ?></td>
                    <td><?= $p['password']; ?></td>
                    <td>
                    <img src="<?= base_url('assets/img/petugas/') .  $p['gambar']; ?>" height="50" alt="<?= $p['gambar']; ?>">
                    </td>
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

        <?= form_open_multipart('petugas/data_petugas');?>
        <form action="<?= base_url('petugas/data_petugas'); ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control" name="nip" placeholder="Nomor Induk Pegawai (NIP)" value="">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="nama" placeholder="Nama Petugas" value="">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="jabatan" placeholder="Jabatan" value="">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="password" placeholder="Password Akses" value="">
          </div>
          <div class="form-group">
            <input type="file" class="form-control" name="gambar" value="">
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
