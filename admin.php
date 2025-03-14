<?php require "header.php"; ?>

<?php 

    // uji jika tombol simpan di klik
    if(isset($_POST['simpan'])){
        $tgl = date('Y-m-d');

        $nama = htmlspecialchars($_POST['nama'], ENT_QUOTES);
        $alamat = htmlspecialchars($_POST['alamat'], ENT_QUOTES);
        $tujuan = htmlspecialchars($_POST['tujuan'], ENT_QUOTES);
        $nope = htmlspecialchars($_POST['nope'], ENT_QUOTES);

        // persiapan query simpan data
        $simpan = mysqli_query($conn, "INSERT INTO tbl_tamu VALUES ('','$tgl','$nama','$alamat','$tujuan', '$nope')");

        // jika data sukses di input
        if($simpan){
            echo "<script>
                alert('Data Berhasil di Tambahkan');
                document.location='?'</script>";
        }else{
            echo "<script>
                alert('Data Gagal di Tambahkan');
                document.location='?'</script>";
    }
}


?>
    <!-- head -->
    <div class="head text-center">
        <img src="img/icon.png" width="70" style="margin-top: 1rem;">
        <h2 class="text-white">Sistem Informasi Tamu <br> PT.PELINDO <small> Reg.1 Tanjungpinang</small></h2>
    </div>
    <!-- end head -->

    <!-- Awal Row -->
    <div class="row mt-2">
        <!-- Awal col lg-7 -->
        <div class="col-lg-7 mb-3">
            <div class="card shadow bg-gradient-light">
                <!-- Awal card-body -->
                <div class="card-body">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">IDENTITAS PENGUNJUNG</h1>
                    </div>
                    <form class="user" method="POST" action="">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="nama" placeholder="Nama Pengunjung" autocomplete="off" requierd>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="alamat" placeholder="Alamat Pengunjung" autocomplete="off" requierd>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="tujuan" placeholder="Tujuan Pengunjung" autocomplete="off" requierd>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="nope" placeholder="No.Hp Pengunjung" autocomplete="off" requierd>
                        </div>
                        <button type="submit" name="simpan" class="btn btn-primary btn-user btn-block">
                            Simpan Data
                        </button>
                    </form>
                    <hr>
                    <div class="text-center">
                       <a href="http://instagram.com/" target="_blank" 
                       class="small">Create by &copy; Cahyadi Prasetyo | 2022 - <?= date('Y')?></a>
                    </div>
                </div>
                <!-- end card-body -->
            </div>
        </div>
        <!-- end col lg-7 -->
        <!-- Awal col lg-5 -->
        <div class="col-lg-5 mb-3">
            <!-- awal card -->
            <div class="card shadow">
                <!-- Awal card-body -->
                <div class="card-body">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">STATISTIK TAMU</h1>
                    </div>
                    <?php 
                    // deklarasi tanggal

                    // menampilkan tanggal sekarang
                    $tgl_sekarang = date('Y-m-d');

                    // menapilkan tanggal kemarin'
                    $kemarin = date('Y-m-d', strtotime('-1 day', strtotime(date('Y-m-d'))));

                    // mendapatkan 6 hari sebelum tanggal sakarang
                    $seminggu = date('Y-m-d h:i:s', strtotime('-1 week +1 day',strtotime($tgl_sekarang)));

                    $bulan = date('m');
                    
                    $sekarang = date('Y-m-d h:i:s');

                    // query data pengunjung

                    $tgl_sekarang = mysqli_fetch_array
                    (mysqli_query($conn,"SELECT COUNT(*) FROM tbl_tamu WHERE tanggal LIKE '%$tgl_sekarang%'"));

                    $kemarin = mysqli_fetch_array
                    (mysqli_query($conn,"SELECT COUNT(*) FROM tbl_tamu WHERE tanggal LIKE '%$kemarin%'"));

                    $seminggu = mysqli_fetch_array
                    (mysqli_query($conn,"SELECT COUNT(*) FROM tbl_tamu WHERE tanggal BETWEEN '$seminggu' AND '$sekarang'"));

                    $bulan = mysqli_fetch_array(mysqli_query
                    ($conn, "SELECT COUNT(*) FROM tbl_tamu WHERE month(tanggal) = '$bulan'"));

                    $keseluruhan = mysqli_fetch_array(mysqli_query
                    ($conn, "SELECT COUNT(*) FROM tbl_tamu"));

                    ?>
                    <table class="table table-bordered">
                        <tr>
                            <td>Hari ini</td>
                            <td>: <?= $tgl_sekarang[0] ?></td>
                        </tr>
                        <tr>
                            <td>Kemarin</td>
                            <td>: <?= $kemarin[0] ?></td>
                        </tr>
                        <tr>
                            <td>Minggu ini</td>
                            <td>: <?= $seminggu[0] ?></td>
                        </tr>
                        <tr>
                            <td>Bulan ini</td>
                            <td>: <?= $bulan[0]?></td>
                        </tr>
                        <tr>
                            <td>Keseluruhan</td>
                            <td>: <?= $keseluruhan [0]?></td>
                        </tr>
                    </table>
                </div>
                <!-- end card-body -->
            </div>
        </div>
        <!-- end card-->
    </div>
    <!-- end row -->

     <!-- DataTales Example -->
     <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pengunjung Hari ini [<?= date('d-m-Y') ?>]</h6>
        </div>
        <div class="card-body">
        <a href="rekapitulasi.php" class="btn btn-success mb-3"><i class="fa fa-table"></i> Rekapitulasi Pengunjung</a>
        <a href="logout.php" class="btn btn-danger mb-3"><i class="fa fa-sign-out-alt"></i> Logout</a>
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
                    <tbody>
                        <?php
                            $tgl = date('Y-m-d');
                            $tampil = mysqli_query($conn,"SELECT * FROM tbl_tamu WHERE tanggal LIKE '%$tgl%' ORDER BY id ASC");
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
            </div>
        </div>
    </div>

<?php require "footer.php" ?>