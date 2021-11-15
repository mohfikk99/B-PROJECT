<div class="container-fluid mb-5">

    <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>

    <?php foreach ($lab as $p) : ?>

        <form action="<?= base_url('rumah_sakit/update_laboratorium'); ?>" method="post">
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Nama Laboratorium</label>
                    <input type="hidden" name="id" value="<?= $p->id; ?>">
                    <input type="text" class="form-control" name="nama_lab" value="<?= $p->nama_lab; ?>">
                </div>
                <div class="form-group">
                    <label for="">Harga</label>
                    <input type="text" class="form-control" name="harga" value="<?= $p->harga; ?>">
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-sm btn-success" href="<?= base_url('rumah_sakit/laboratorium'); ?>">Kembali</a>
                <button type="submit" class="btn btn-primary">edit</button>
            </div>
        </form>
    <?php endforeach; ?>
</div>