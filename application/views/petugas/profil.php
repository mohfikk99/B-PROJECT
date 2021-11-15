<div class="container-fluid">



    <div class="row mt-5 mb-5">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <div class="card" style="width: 18rem; border-radius:10spx; border:8px solid #08532e;">
                <img class="card-img-top" src="<?= base_url('assets/img/petugas/') . $petugas['gambar']; ?>" alt="Card image cap">
                <div class="card-body" style="border:2px solid #08532e;">
                    <h5 class="card-title text-center"><?= $petugas['nama']; ?></h5>
                    <p class="card-text">Jabatan : <?= $petugas['jabatan']; ?></p>
                    <p class="card-text badge badge-success">Hak Akses : <?= $petugas['level']; ?></p>

                </div>
            </div>
        </div>
        <div class="col-sm-4"></div>



    </div>