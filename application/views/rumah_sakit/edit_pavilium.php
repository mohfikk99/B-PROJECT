<div class="container-fluid mb-5">

  <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>

  <?php foreach ($pavilium as $p) : ?>

    <form action="<?= base_url('rumah_sakit/update_pavilium'); ?>" method="post">
      <div class="modal-body">
        <div class="form-group">
          <input type="hidden" name="id" value="<?= $p->id; ?>">
          <label for="">Jenis pavilium</label>
          <select class="form-control" name="jenis_pavilium">
            <option value="<?= $p->jenis_pavilium; ?>"><?= $p->jenis_pavilium; ?></option>
            <option value="VIP">VIP</option>
            <option value="Satu">Satu</option>
          </select>
        </div>
        <div class="form-group">
          <label for="">Nama pavilium</label>
          <input type="text" class="form-control" name="nama_pavilium" value="<?= $p->nama_pavilium; ?>">
        </div>
        <div class="form-group">
          <label for="">Harga</label>
          <input type="text" class="form-control" name="harga" value="<?= $p->harga; ?>">
        </div>
      </div>
      <div class="modal-footer">
        <a class="btn btn-sm btn-success" href="<?= base_url('rumah_sakit/pavilium'); ?>">Kembali</a>
        <button type="submit" class="btn btn-primary">edit</button>
      </div>
    </form>
  <?php endforeach; ?>
</div>