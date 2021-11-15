<div class="container-fluid mb-5">

  <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>

  <?php foreach ($layanan as $p) : ?>

    <form action="<?= base_url('rumah_sakit/update_layanan'); ?>" method="post">
      <div class="modal-body">
        <div class="form-group">
          <label for="">Jenis Layanan</label>
          <input type="hidden" name="id" value="<?= $p->id; ?>">
          <input type="text" class="form-control" name="jenis_layanan" value="<?= $p->jenis_layanan; ?>">
        </div>
        <div class="form-group">
          <label for="">Harga</label>
          <input type="text" class="form-control" name="harga" value="<?= $p->harga; ?>">
        </div>
      </div>
      <div class="modal-footer">
        <a class="btn btn-sm btn-success" href="<?= base_url('rumah_sakit/layanan'); ?>">Kembali</a>
        <button type="submit" class="btn btn-primary">edit</button>
      </div>
    </form>
  <?php endforeach; ?>
</div>