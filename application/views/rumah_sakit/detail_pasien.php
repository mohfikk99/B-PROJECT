<div class="row">
    <div class="col-sm-12">
        <div class="container-fluid">

            <div class="card mt-5">
                <div class="atas text-center mt-3" style="color:#000;">
                    <div class="row">
                        <div class="col-sm-2">
                            <img class="card-img-top" style="width:5rem; margin-top:18px; margin-left:50px;" src="<?= base_url('assets/img/kab.jpg'); ?>" alt="Card image cap">
                        </div>
                        <div class="col-sm-8">
                            <h4><strong>PEMERINTAH KABUPATEN TOLI TOLI</strong></h4>
                            <h3><strong>RUMAH SAKIT UMUM DAERAH MOKOPIDO</strong></h3>
                            <h6><strong>TERAKREDITASI KARS (2017 - 2021)</strong></h6>
                            <span style="font-size: 13px;">Jl.Lanoni No.37 Tolitoli. Kode Pos 94514 Kelurahan Baru</span><br>
                            <span style="font-size: 11px;">Telepon(0453) 21300-21301; Faksimile (0453) 21301; Pos-El: mokopido@gmail.com; Situs : www.mokopido.id; Situs : www.mokopido.id</span>
                        </div>
                        <div class="col-sm-2">
                            <img class="card-img-top" style="width:6rem; margin-top:18px; margin-right:50px;" src="<?= base_url('assets/img/logo.jpg'); ?>" alt="Card image cap">
                        </div>
                    </div>
                    <hr style="background-color:#000; margin-bottom:-13px; width:95%;">
                    <hr style="height:5px; background-color:#000; width:95%;">
                </div>
                <div class="card-header">
                    Rincian Biaya Pasien Rawat Inap
                </div>
                <div class="card-body">
                    <?php foreach ($detail_pasien as $d) : ?>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-7 mb-5">
                                        <h3 class="text-center">Biodata Pasien</h3>
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>Nama Pasien</td>
                                                    <td>:</td>
                                                    <td><?= $d->nama_pasien; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Umur</td>
                                                    <td>:</td>
                                                    <td><?= $d->umur; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Jenis Kelamin</td>
                                                    <td>:</td>
                                                    <td><?= $d->jenis_kelamin; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Alamat</td>
                                                    <td>:</td>
                                                    <td><?= $d->alamat; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Tanggal Masuk</td>
                                                    <td>:</td>
                                                    <td><?= $d->tgl_masuk; ?></td>
                                                </tr>
                                                <?php foreach ($biaya_pavilium as $bia) : ?>
                                                    <tr>
                                                        <td>Tanggal Keluar</td>
                                                        <td>:</td>
                                                        <td><?= $bia->tgl_keluar; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Lama Dirawat</td>
                                                        <td>:</td>
                                                        <td><?= $bia->jumlah_hari; ?> Hari</td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                <tr>
                                                    <td>Pavilium</td>
                                                    <td>:</td>
                                                    <td>(<?= $d->jenis_pavilium; ?>) <?= $d->nama_pavilium; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Kelas</td>
                                                    <td>:</td>
                                                    <td><?= $d->kelas; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Diagnosa</td>
                                                    <td>:</td>
                                                    <td><?= $d->diagnosa; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="col-sm-5">
                                        <div class="card float-right mt-4">
                                            <img class="card-img-top" style="width:11rem; margin-left:115px;" src="<?= base_url('assets/img/logo.jpg'); ?>" alt="Card image cap">
                                            <div class="card-body">
                                                <h4 class="card-title text-center">Rumah Sakit Umum Daerah Mokopido</h4>
                                                <p class="card-text text-center">"Layanan Prima Untuk Semua"</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3 class="text-center">Tabel Rincian Biaya Pasien</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Jenis Pelayanan</th>
                                    <th scope="col">Nama Pelayanan</th>
                                    <th scope="col">Harga Satuan</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Jumlah Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($biaya_pavilium as $bia) : ?>
                                    <tr>
                                        <td><strong>Pavilium</strong></td>
                                        <td><?= $d->nama_pavilium; ?></td>
                                        <td><?= number_format($d->harga, 0, ',', '.'); ?></td>
                                        <td><?= $bia->jumlah_hari; ?> Hari</td>
                                        <td><?= number_format($bia->total_harga, 0, ',', '.'); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                <?php foreach ($biaya_layanan as $layanan) : ?>
                                    <tr>
                                        <td><strong>Layanan</strong></td>
                                        <td><?= $layanan->jenis_layanan; ?></td>
                                        <td><?= number_format($layanan->harga, 0, ',', '.'); ?></td>
                                        <td><?= $layanan->jumlah_layanan; ?></td>
                                        <td><?= number_format($layanan->total_harga_layanan, 0, ',', '.'); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                <?php foreach ($biaya_lab as $lab) : ?>
                                    <tr>
                                        <td><strong>Laboratorium</strong></td>
                                        <td><?= $lab->nama_lab; ?></td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td><?= number_format($lab->harga, 0, ',', '.'); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                <?php foreach ($biaya_lainnya as $lain) : ?>
                                    <tr>
                                        <td><strong>Tindakan Medik</strong></td>
                                        <td><?= $lain->biaya_lainnya; ?></td>
                                        <td><?= number_format($lain->harga, 0, ',', '.'); ?></td>
                                        <td><?= $lain->jumlah; ?></td>
                                        <td><?= number_format($lain->total_lainnya, 0, ',', '.'); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                <tr>
                                    <?php
                                    $sum = 0;
                                    foreach ($total_layanan as $total) {
                                        $total;
                                    }

                                    $sum = 0;
                                    foreach ($total_medik as $total_tindakan) {
                                        $total_tindakan;
                                    }

                                    $sum = 0;
                                    foreach ($total_lab as $lab) {
                                        $lab;
                                    }

                                    $sum = 0;
                                    foreach ($total_pavilium as $pavilium) {
                                        $pavilium;
                                    }

                                    $total_akhir =  $total + $pavilium + $lab + $total_tindakan;
                                    ?>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><strong>Total Harga :</strong></td>
                                    <td><strong><?= number_format($total_akhir, 0, ',', '.'); ?></strong></td>
                                </tr>



                            </tbody>
                        </table>
                    <?php endforeach; ?>
                </div>
                <div class="row mt-5">
                    <div class="col-sm-4">
                        <p>Ket :</p>
                    </div>
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                        <div class="hari" style="color:#000;">
                            <script type='text/javascript'>
                                var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                                var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
                                var date = new Date();
                                var day = date.getDate();
                                var month = date.getMonth();
                                var thisDay = date.getDay(),
                                    thisDay = myDays[thisDay];
                                var yy = date.getYear();
                                var year = (yy < 1000) ? yy + 1900 : yy;
                                document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
                            </script>
                        </div>
                        <div style="height:60px; width:100px;"></div>
                        <span style="margin-left:25%; color: #000"><?= $_SESSION['nama']; ?></span>
                    </div>
                </div>
                <div class="card-footer text-muted">

                </div>
            </div>


        </div>
    </div>
</div>



<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Siap Untuk Keluar?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">Jujur dalam bekerja adalah kunci <strong>KESUKSESAN...</strong></div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('home'); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>