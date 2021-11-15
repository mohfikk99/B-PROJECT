<div class="container-fluid">

    <script>
        function startCalc() {
            interval = setInterval("calc()", 1);
        }

        function calc() {
            one = document.autoSumForm.jumlah_hari.value;
            two = document.autoSumForm.harga.value;
            document.autoSumForm.total_harga.value = (one * 1) * (two * 1);
        }

        function stopCalc() {
            clearInterval(interval);
        }
    </script>

    <a href="#" class="btn btn-success mb-3 mt-5 mr-3" data-toggle="modal" data-target="#pemModal">Tanggal Keluar Pasien</a>
    <div class="modal fade" id="pemModal" tabindex="-1" role="dialog" aria-labelledby="pemModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="files">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pemModalLabel">Tambah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form name="autoSumForm" action="<?= base_url('pasien/biaya_pavilium'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <?php foreach ($detail_pasien as $d) : ?>
                                <label for="b">Tanggal Masuk</label>
                                <input type="text" class="form-control" id="b" name="id_pasien" value="<?= $d->id_pasien; ?>" hidden>
                                <input type="text" class="form-control" id="b" value="<?= $d->tgl_masuk; ?>" readonly>
                            <?php endforeach; ?>
                        </div>
                        <div class="form-group">
                            <label for="b">Tanggal Keluar</label>
                            <input type="date" class="form-control hari" id="b" name="tgl_keluar" placeholder="Tanggal Keluar">
                        </div>
                        <div class="form-group">
                            <label for="b">Jumlah Hari</label>
                            <input type="text" class="form-control" name="jumlah_hari" placeholder="Jumlah Hari" onFocus="startCalc();" onBlur="stopCalc();">
                        </div>
                        <div class="form-group">
                            <?php foreach ($detail_pasien as $d) : ?>
                                <input type="text" class="form-control" name="harga" value="<?= $d->harga; ?>" onFocus="startCalc();" onBlur="stopCalc();" hidden>
                            <?php endforeach; ?>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" value="0" name="total_harga" onchange='tryNumberFormat(this.form.thirdBox);' hidden>
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


    <script>
        function startCal() {
            interval = setInterval("cal()", 1);
        }

        function cal() {
            one = document.layananForm.tampil.value;
            two = document.layananForm.jumlah_layanan.value;
            document.layananForm.total_harga_layanan.value = (one * 1) * (two * 1);
        }

        function stopCal() {
            clearInterval(interval);
        }
    </script>

    <script>
        function tampilkan() {
            var nama_kota = document.getElementById("layananForm").id_layanan.value;
            <?php foreach ($layanan as $o) : ?>
                if (nama_kota == "<?= $o['id']; ?>") {
                    document.getElementById("tampil").innerHTML = "<option value='<?= $o['harga']; ?>'><?= $o['harga']; ?></option>";
                }
            <?php endforeach; ?>
        }
    </script>

    <a href="#" class="btn btn-success mb-3 mt-5 mr-3" data-toggle="modal" data-target="#newModal">Tambahkan Biaya Layanan</a>
    <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="files">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newModalLabel">Tambah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form name="layananForm" id="layananForm" action="<?= base_url('pasien/biaya_layanan'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <?php foreach ($detail_pasien as $d) : ?>
                                <input type="text" class="form-control" name="id_pasien" value="<?= $d->id_pasien; ?>" hidden>
                            <?php endforeach; ?>

                            <label for="id_layanan">Masukan Jenis Layanan</label>
                            <select class="form-control" name="id_layanan" id="id_layanan" onchange="tampilkan()">
                                <option value="">* Pilih Layanan</option>
                                <?php foreach ($layanan as $o) : ?>
                                    <option value="<?= $o['id']; ?>"><?= $o['jenis_layanan']; ?></option>

                                <?php endforeach; ?>
                            </select>
                        </div>

                        <select id="tampil" name="tampil" onFocus="startCal();" onBlur="stopCal();" hidden></select>

                        <div class="form-group">
                            <label for="b">Jumlah</label>
                            <input type="text" class="form-control" name="jumlah_layanan" placeholder="Jumlah" onFocus="startCal();" onBlur="stopCal();">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" value="0" name="total_harga_layanan" onchange='tryNumberFormat(this.form.thirdBox);' hidden>
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





















    <script>
        function laboratorium() {
            var nama_kota = document.getElementById("labForm").id_lab.value;
            <?php foreach ($laboratorium as $o) : ?>
                if (nama_kota == "<?= $o['id']; ?>") {
                    document.getElementById("harga").innerHTML = "<option value='<?= $o['harga']; ?>'><?= $o['harga']; ?></option>";
                }
            <?php endforeach; ?>
        }
    </script>

    <a href="#" class="btn btn-success mb-3 mt-5 mr-3" data-toggle="modal" data-target="#labModal">Tambahkan Biaya lab</a>
    <div class="modal fade" id="labModal" tabindex="-1" role="dialog" aria-labelledby="labModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="files">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="labModalLabel">Tambah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form name="labForm" id="labForm" action="<?= base_url('pasien/biaya_lab'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <?php foreach ($detail_pasien as $d) : ?>
                                <input type="text" class="form-control" name="id_pasien" value="<?= $d->id_pasien; ?>" hidden>
                            <?php endforeach; ?>


                            <label for="id_lab">Masukan Jenis lab</label>
                            <select class="form-control" name="id_lab" id="id_lab" onchange="laboratorium()">
                                <option value="">* Pilih Layanan</option>
                                <?php foreach ($laboratorium as $o) : ?>
                                    <option value="<?= $o['id']; ?>"><?= $o['nama_lab']; ?></option>

                                <?php endforeach; ?>
                            </select>
                        </div>

                        <select id="harga" name="harga" hidden></select>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>






























    <script>
        function startLain() {
            interval = setInterval("lain()", 1);
        }

        function lain() {
            one = document.biayaLainnya.harga.value;
            two = document.biayaLainnya.jumlah.value;
            document.biayaLainnya.total_lainnya.value = (one * 1) * (two * 1);
        }

        function stopLain() {
            clearInterval(interval);
        }
    </script>

    <a href="#" class="btn btn-success mb-3 mt-5 mr-3" data-toggle="modal" data-target="#pasModal">Tindakan Medik Non Operatif</a>
    <div class="modal fade" id="pasModal" tabindex="-1" role="dialog" aria-labelledby="pasModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="files">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pasModalLabel">Tambah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form name="biayaLainnya" action="<?= base_url('pasien/biaya_lainnya'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <?php foreach ($detail_pasien as $d) : ?>
                                <input type="text" class="form-control" id="b" name="id_pasien" value="<?= $d->id_pasien; ?>" hidden>
                            <?php endforeach; ?>
                            <label for="b">Nama Biaya</label>
                            <input type="text" class="form-control" id="b" name="biaya_lainnya" placeholder="Nama Biaya">
                        </div>
                        <div class="form-group">
                            <label for="b">Harga</label>
                            <input type="text" class="form-control" id="b" name="harga" placeholder="Harga" onFocus="startLain();" onBlur="stopLain();">
                        </div>
                        <div class="form-group">
                            <label for="b">Jumlah</label>
                            <input type="text" class="form-control" id="b" name="jumlah" placeholder="Jumlah" onFocus="startLain();" onBlur="stopLain();">
                        </div>
                        <div class="form-group">

                            <input type="text" class="form-control" id="b" name="total_lainnya" value="0" onchange='tryNumberFormat(this.form.thirdBox);' hidden>
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



    <?php foreach ($detail_pasien as $d) : ?>
        <a class="btn btn-success mb-3 mt-5 mr-3" href="<?= base_url('pasien/cetak_detail_pasien/' . $d->id_pasien); ?>" target="_BLANK">Cetak</a>



        <a href="#" class="btn btn-success mb-3 mt-5 mr-3" data-toggle="modal" data-target="#selesaiModal">Selesai</a>
        <div class="modal fade" id="selesaiModal" tabindex="-1" role="dialog" aria-labelledby="selesaiModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="files" style="color:#000">
                <div class="modal-content">
                    <form action="<?= base_url('pasien/selesai'); ?>" method="post">
                        <div class="modal-body">
                            <span>Terima Kasih !</span>
                            <div class="form-group">
                                <input type="text" class="form-control" name="id_pasien" value="<?= $d->id_pasien; ?>" hidden>
                                <input type="text" class="form-control" name="status" value="selesai" hidden>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">OK</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    <?php endforeach; ?>

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
                    <div class="col-lg-6 mb-5">
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
                    <div class="col-lg-5">
                        <div class="card float-right mt-4">
                            <img class="card-img-top" style="width:11rem; margin-left:115px;" src="<?= base_url('assets/img/logo.jpg'); ?>" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title text-center">Rumah Sakit Umum Daerah Mokopido</h4>
                                <p class="card-text text-center">"Layanan Prima Untuk Semua"</p>
                            </div>
                        </div>
                    </div>
                </div>
                <h3 class="text-center">Tabel Rincian Biaya Pasien</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Aksi</th>
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
                                <td>
                                    <a href="<?= base_url('pasien/hapus_biaya_pavilium/' . $bia->id); ?>" class="btn btn-sm btn-danger">Hapus</a>
                                </td>
                                <td><strong>Pavilium</strong></td>
                                <td> <?= $d->nama_pavilium; ?></td>
                                <td><?= number_format($d->harga, 0, ',', '.'); ?></td>
                                <td><?= $bia->jumlah_hari; ?> Hari</td>
                                <td><?= number_format($bia->total_harga, 0, ',', '.'); ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <?php foreach ($biaya_layanan as $layanan) : ?>
                            <tr>
                                <td>
                                    <a href="<?= base_url('pasien/hapus_biaya_layanan/' . $layanan->id_biaya_layanan); ?>" class="btn btn-sm btn-danger">Hapus</a>
                                </td>
                                <td><strong>Layanan</strong></td>
                                <td><?= $layanan->jenis_layanan; ?></td>
                                <td><?= number_format($layanan->harga, 0, ',', '.'); ?></td>
                                <td><?= $layanan->jumlah_layanan; ?></td>
                                <td><?= number_format($layanan->total_harga_layanan, 0, ',', '.'); ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <?php foreach ($biaya_lab as $lab) : ?>
                            <tr>
                                <td>
                                    <a href="<?= base_url('pasien/hapus_biaya_lab/' . $lab->id_biaya_lab); ?>" class="btn btn-sm btn-danger">Hapus</a>
                                </td>
                                <td><strong>Laboratorium</strong></td>
                                <td><?= $lab->nama_lab; ?></td>
                                <td>-</td>
                                <td>-</td>
                                <td><?= number_format($lab->harga, 0, ',', '.'); ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <?php foreach ($biaya_lainnya as $lain) : ?>
                            <tr>
                                <td>
                                    <a href="<?= base_url('pasien/hapus_biaya_lainnya/' . $lain->id_biaya_lainnya); ?>" class="btn btn-sm btn-danger">Hapus</a>
                                </td>
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
                            <td></td>
                            <td><strong>Total Harga :</strong></td>
                            <td><strong><?= number_format($total_akhir, 0, ',', '.'); ?></strong></td>
                        </tr>



                    </tbody>
                </table>
            <?php endforeach; ?>
        </div>
        <div class="card-footer text-muted">
            <strong>RSUD. Mokopido</strong>
        </div>
    </div>

</div>