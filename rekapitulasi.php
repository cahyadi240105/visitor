<?php require "header.php";?>
<!-- Awal Row -->
<div class="row">
    <!-- Awal col-md-12 -->
    <div class="col-md-12 mt-3">
        <!-- Awal Card -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Rekapitulasi Pengunjung</h6>
            </div>
            <div class="card-body">
                <form action="" method="post" class="text-center">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Dari Tanggal</label>
                                <input type="date" class="form-control" name="tanggal1" value="<?= isset($_POST['tanggal1']) ? $_POST['tanggal1']: date('Y-m-d') ?>" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Sampai Tanggal</label>
                                <input type="date" class="form-control" name="tanggal2"  value="<?= isset($_POST['tanggal2']) ? $_POST['tanggal2']: date('Y-m-d') ?>" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-2">
                            <button name="bstampil" class="btn btn-primary form-control"><i class="fa fa-search"></i> Tampilkan</button>
                        </div>

                        <div class="col-md-2">
                            <a href="admin.php" class="btn btn-danger form-control"><i class="fa fa-backward"></i> Kembali</a>
                        </div>
                    </div>
                </form>
                <?php
                    if(isset($_POST['bstampil'])):
                ?>
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Tanggal</th>
                            <th>Nama Tamu</th>
                            <th>Alamat</th>
                            <th>Tujuan</th>
                            <th>No Hp</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Tanggal</th>
                            <th>Nama Tamu</th>
                            <th>Alamat</th>
                            <th>Tujuan</th>
                            <th>No Hp</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                            
                            $tgl1 = $_POST['tanggal1'];
                            $tgl2 = $_POST['tanggal2'];
                            
                            $tgl = date('Y-m-d');
                            $tampil = mysqli_query($conn,"SELECT * FROM tbl_tamu WHERE tanggal BETWEEN '$tgl1' AND '$tgl2' ORDER BY id ASC");
                            $no = 1;
                            while ($data = mysqli_fetch_array($tampil)){
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data['tanggal']?></td>
                            <td><?= $data['nama']?></td>
                            <td><?= $data['alamat']?></td>
                            <td><?= $data['tujuan']?></td>
                            <td><?= $data['nope']?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <center>
                    <form action="exportexcel.php" method="post">
                        <div class="col-md-4">
                            <input type="hidden" name="tanggala" value="<?=@$_POST['tanggal1'] ?>">

                            <input type="hidden" name="tanggalb" value="<?=@$_POST['tanggal2'] ?>">

                            <button class="btn btn-success form-control" name="bexport">
                            <i class="fa fa-download"></i> Export Data Excel</button>
                        </div>
                        
                    </form>
                </center>
            </div>
            <?php endif;?>
            </div>
        </div>
        <!-- Akhir Card -->
    </div>
    <!-- Akhir col-md-12 -->
</div>
<!-- Akhir Row -->

<?php require "footer.php";?>