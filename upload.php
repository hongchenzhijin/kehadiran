<?php
# Memulakan fungsi session
session_start();
# Memanggil fail header, kawalan-admin
include('header.php');
include('kawalan-admin.php');
?>

<!-- Tajuk laman -->
<h3>Muat Naik Data ahli (*.txt)</h3>

<!-- Borang untuk memuat naik fail -->
<form action="" method='POST' enctype="multipart/form-data">
    <h3><b>Sila Pilih Fail txt yang ingin dimuat naik</b></h3>
    <input type='file' name='data_ahli'>
    <button type='submit' name='btn-upload'>Muat Naik</button>
</form>

<?php include('footer.php'); ?>

<!-- Bahagian Memproses Data yang dimuat naik -->
<?php
# Data validation - menyemak kewujudan data dari borang
if (isset($_POST['btn-upload'])) {

    # Memanggil fail connection
    include('connection.php');

    # Mengambil nama sementara fail
    $namafailsementara = $_FILES["data_ahli"]["tmp_name"];

    # Mengambil nama fail
    $namafail = $_FILES['data_ahli']['name'];

    # Mengambil jenis fail
    $jenisfail = pathinfo($namafail, PATHINFO_EXTENSION);

    # Menguji jenis fail dan saiz fail
    if ($_FILES["data_ahli"]["size"] > 0 && $jenisfail == "txt") {

        # Membuka fail yang diambil
        $fail_data_ahli = fopen($namafailsementara, "r");

        # Mendapatkan data dari fail baris demi baris
        while (!feof($fail_data_ahli)) {

            # Mengambil data sebaris sahaja bagi setiap pusingan
            $ambilbarisdata = fgets($fail_data_ahli);

            # Memecahkan baris data mengikut tanda pipe
            $pecahkanbaris = explode("|", $ambilbarisdata);

            # Selepas pecahan tadi akan diumpukan kepada 5 list
            list($nama, $nokp, $id_kelas, $tahap, $katalaluan) = $pecahkanbaris;

            # Arahan SQL untuk menyimpan data
            $arahan_sql_simpan = "INSERT INTO ahli (nama, nokp, id_kelas, tahap, katalaluan) 
                                  VALUES ('$nama', '$nokp', '$id_kelas', '$tahap', '$katalaluan')";

            # Memasukkan data ke dalam jadual ahli
            $laksana_arahan_simpan = mysqli_query($condb, $arahan_sql_simpan);
            echo "<script>alert('Import fail Data Selesai'); window.location.href='senarai-ahli.php'; </script>";
        }

        # Menutup fail txt yang dibuka
        fclose($fail_data_ahli);
    } else {
        # Jika fail yang dimuat naik kosong atau tersalah format
        echo "<script>alert('Hanya file berformat .txt sahaja dibenarkan');</script>";
    }
}
?>
