<?php

session_start();

# memanggil fail connection dan kawalan-biasa
include('connection.php');

$masa = date("H:i:s");

# Menyemak kewujudan data GET id_aktiviti
if (!empty($_GET['id_aktiviti']) && !empty($_SESSION['nokp'])) {

    # Arahan Simpan data kehadiran
    $sql = "INSERT INTO kehadiran (id_aktiviti, nokp, masa_hadir) VALUES ('" . $_GET['id_aktiviti'] . "','" . $_SESSION['nokp'] . "', '$masa')";

    # Laksana arahan Simpan
    $simpandata = mysqli_query($condb, $sql);

    # menguji proses simpan
    if ($simpandata) {
        echo "<script>alert('Kehadiran Telah Disahkan');</script>";
    } else {
        echo "<script>alert('Kehadiran GAGAL Disahkan. Sila Ke Meja Urusetia');</script>";
    }

    header('Location: profil.php');
    exit();

} else {
    echo "<script>alert('Akses secara terus'); window.location.href='logout.php';</script>";
}
?>
