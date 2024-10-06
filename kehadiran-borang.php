<?php 

# memulakan fungsi session
session_start();

#memanggil fail header.php, connection.php dan guard-admin.php
include('header.php');
include('connection.php');
include('kawalan-admin.php');

# Mendapatkan maklumat aktiviti dari pangkalan data
$arahan_sql_aktiviti   =   "select * from aktiviti where id_aktiviti ='".$_GET['id_aktiviti']."' ";
$laksana_aktiviti    =   mysqli_query($condb,$arahan_sql_aktiviti);
$n  =   mysqli_fetch_array($laksana_aktiviti);
?>

<!-- Header bagi jadual untuk memaparkan senarai aktiviti -->
<h3>
    Pengesahan Kehadiran Ahli <br><br><br>
    Nama Aktiviti : <?= $n['nama_aktiviti'] ?> <br>
    Tarikh | Masa : <?= $n['tarikh_aktiviti']." | ".$n['masa_mula'] ?><br><br>
</h3>

<!-- Fungsi ubahan saiz tulisan -->
<form>            
    <?php include('butang-saiz.php'); ?>
</form>

<form style='width:900px;' align='center' action='kehadiran-proses.php?id_aktiviti=<?= $_GET['id_aktiviti'] ?>' method='POST'>
    <table border='t1' id='saiz' width='100%'>

        <!-- Memasukkan nama medan -->
        <tr bgcolour='yellow'>
            <td>Bil</td>
            <td>Nama</td>
            <td>Nokp</td>
            <td>Kelas</td>
            <td>Kehadiran</td>
        </tr>

    <?php

    # Arahan untuk mendapatkan data kehadiran setiap ahli
    $arahan_sql_kehadiran = "SELECT  
    ahli.nokp, ahli.nama,
    kelas.ting, kelas.nama_kelas,
    kehadiran.id_aktiviti
    FROM ahli
    LEFT JOIN kelas
    ON ahli.id_kelas 	= 	kelas.id_kelas
    LEFT JOIN kehadiran
    ON ahli.nokp 		= 	kehadiran.nokp 
    AND kehadiran.id_aktiviti='".$_GET['id_aktiviti']."'
    ORDER BY ahli.nama";

    # Laksanakan arahan untuk memproses data
    $laksana_kehadiran 	= 	mysqli_query($condb,$arahan_sql_kehadiran);
    $bil=0;

    # Mengambil dan memaparkan semua data kehadiran yang ditemui
    while($m=mysqli_fetch_array($laksana_kehadiran)){  ?>
        <tr>
            <td><?= ++$bil; ?></td>
            <td><?= $m['nama'] ?></td>
            <td><?= $m['nokp'] ?></td>
            <td><?= $m['ting']." ".$m['nama_kelas'] ?> </td>
            <td><?php 
            
            if($m['id_aktiviti'] != null)
            {
                $tanda='checked';
            } else 
            $tanda="";
            ?>

            <input <?= $tanda ?>  type='checkbox' name='kehadiran[]' 
            value='<?= $m['nokp'] ?> ' style='width:30px; height:30px;'>
            </td>
        </tr>
        <?PHP
    }
    ?>

    </table>
    <input type='submit' value='Simpan'>
</form>
<?php include ('footer.php'); ?>