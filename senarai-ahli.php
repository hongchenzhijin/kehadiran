<?php
# Memulakan fungsi session
session_start();

# Memanggil fail header.php, connection.php dan kawalan-admin.php
include('header.php');
include('connection.php');
include('kawalan-admin.php');

?>
<!-- Header bagi jadual untuk memaparkan senarai ahli -->
<h3>Senarai ahli</h3>

<!-- Menjadikan item dipaparkan sebelah-menyebelah -->
<div class="flexbox" >
    <!-- Fungsi carian nama ahli -->
    <form action='' method='POST'>
        <input type='text' name='nama' placeholder='Carian Nama Ahli'>
        <input type='submit' value='Cari'>
    </form>

    <!-- Fungsi ubahan saiz tulisan -->
    <form>            
        <?php include('butang-saiz.php'); ?>
    </form>
</div>

<table align="center" width="100%" border='' id='saiz'>
    <!-- Memasukkan nama medan -->
    <tr>
        <th width="35%">Nama</th>
        <th width="15%">Nokp</th>
        <th width='10%'>Kelas</th>
        <th width="10%">Katalaluan</th>
        <th width="10%">Tahap</th>
        <th width="20%">Tindakan</th>
    </tr>

    <?php
    # Syarat tambahan yang akan dimasukkan dalam arahan (query) senarai ahli
    $tambahan = "";
    if (!empty($_POST['nama'])) {
        $tambahan = " AND ahli.nama LIKE '%" . $_POST['nama'] . "%'";
    }

    # Arahan query untuk mencari senarai nama ahli
    $arahan_papar = "SELECT * FROM ahli, kelas WHERE ahli.id_kelas = kelas.id_kelas" . $tambahan;

    # Laksanakan arahan mencari data ahli
    $laksana = mysqli_query($condb, $arahan_papar);

    # Mengambil data yang ditemui
    while ($m = mysqli_fetch_array($laksana)) {
        # Umpukkan data kepada tatasusunan bagi tujuan kemaskini ahli
        $data_get = array(
            'nama' => $m['nama'],
            'nokp' => $m['nokp'],
            'katalaluan' => $m['katalaluan'],
            'tahap' => $m['tahap'],
            'id_kelas' => $m['id_kelas'],
            'ting' => $m['ting'],
            'nama_kelas' => $m['nama_kelas']
        );

        # Memaparkan senarai nama dalam jadual
        echo "<tr>
            <td>" . $m['nama'] . "</td>
            <td>" . $m['nokp'] . "</td>
            <td>" . $m['ting'] . "" . $m['nama_kelas'] . "</td>
            <td>" . $m['katalaluan'] . "</td>
            <td>" . $m['tahap'] . "</td>";
            echo "<td>
                <a href='ahli-kemaskini-borang.php?" . http_build_query($data_get) . "'>
                <input type='button'/ value='Kemaskini'></a>
                
                <a href='ahli-padam-proses.php?nokp=" . $m['nokp'] . "' 
                onClick=\"return confirm('Anda pasti anda ingin memadam data ini.')\">
                <input type='button'/ value='Hapus'></a>
            </td>
        </tr>";
    }
    ?>
</table>

<!--Mencetak laporan-->
<center><a href="upload.php"><button>Muat Naik ahli</button></a></center>

<?php include('footer.php'); ?>


