<?php

    include "koneksi.php";
    
    // persiapan untuk excel
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Rekap Data Pengunjung.xls");
    header("Pragma: no-cache");
    header("Expires:0");
?>

<table border="1">
    <thead>
        <tr>
            <th colspan="6">Rekapitulasi Data Pengunjung</th>
        </tr>
        <tr>
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
            $tgl1 = $_POST['tanggala'];
            $tgl2 = $_POST['tanggalb'];
            
            $tgl = date('Y-m-d');
            $tampil = mysqli_query($conn,"SELECT * FROM tbl_tamu WHERE tanggal BETWEEN '$tgl1' AND '$tgl2' ORDER BY tanggal ASC");
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