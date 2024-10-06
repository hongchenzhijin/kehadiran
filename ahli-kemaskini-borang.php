<link rel="stylesheet" href="test.css">
<?php

# Memulakan fungsi session
session_start();

# Memanggil fail header dan fail kawalan-admin.php
include('header.php');
include('kawalan-admin.php');
include('connection.php');

# Menyemak kewujudan data GET. Jika data GET empty, buka fail senarai-ahli
if (empty($_GET)) {
    die("<script>window.location.href='senarai-ahli.php'; </script>");
}

?>

<h3>Kemaskini Ahli Baru</h3>

<form action='ahli-kemaskini-proses.php?nokp_lama=<?= $_GET['nokp'] ?>' method='POST' class="small-form">

    Nama
    <input type='text' name='nama' value='<?= $_GET['nama'] ?>' required><br>

    NoKP
    <input type='text' name='nokp' value='<?= $_GET['nokp'] ?>' required><br>

    Katalaluan
    <input type='text' name='katalaluan' value='<?= $_GET['katalaluan'] ?>' required><br>

    Tahap
    <select name='tahap'><br>
        <option value='<?= $_GET['tahap'] ?>'> <?= $_GET['tahap'] ?> </option>

        <?php
        # Proses memaparkan senarai tahap dalam bentuk drop-down list
        $arahan_sql_tahap = "SELECT tahap FROM ahli GROUP BY tahap ORDER BY tahap";
        $laksana_arahan_tahap = mysqli_query($condb, $arahan_sql_tahap);

        while ($n = mysqli_fetch_array($laksana_arahan_tahap)) {
            if ($n['tahap'] != $_GET['tahap']) {
                echo "<option value='" . $n['tahap'] . "'> " . $n['tahap'] . " </option>";
            }
        }
        ?>
    </select> <br>

    Tingkatan
    <select name='id_kelas'><br>
        <option value='<?= $_GET['id_kelas'] ?>'> <?= $_GET['ting'] . " " . $_GET['nama_kelas'] ?> </option>

        <?php
        # Proses memaparkan senarai kelas dalam bentuk drop-down list
        $arahan_sql_pilih = "SELECT * FROM kelas";
        $laksana_arahan_pilih = mysqli_query($condb, $arahan_sql_pilih);

        while ($m = mysqli_fetch_array($laksana_arahan_pilih)) {
            if ($m['id_kelas'] != $_GET['id_kelas']) {
                echo "<option value='" . $m['id_kelas'] . "'> " . $m['ting'] . "" . $m['nama_kelas'] . " </option>";
            }
        }
        ?>
    </select> <br>

    <input type='submit' value='Kemaskini'>
</form>

<?php include('footer.php'); ?>
