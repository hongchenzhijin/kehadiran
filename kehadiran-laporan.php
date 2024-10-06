<?php 
# memulakan fungsi session
session_start();

# memanggil fail header.php, connection.php dan guard-aktiviti.php
include('header.php');
include('connection.php');
include('kawalan-admin.php');
?>

<h3 >Laporan Kehadiran aktiviti</h3>
<!-- Boarang carian Aktiviti -->
<form action='' method='GET'>
    <h4>Aktiviti</h4> 
    <select name='id_aktiviti'>
    <option selected disabled value>Sila Pilih Aktiviti</option>

    <?php 
    # Proses memaparkan senarai aktiviti dalam bentuk drop down list
    $arahan_sql_pilih       =   "select* from aktiviti";
    $laksana_arahan_pilih   =   mysqli_query($condb,$arahan_sql_pilih);
    while($n=mysqli_fetch_array($laksana_arahan_pilih))
    {
        echo "<option value='".$n['id_aktiviti']."'>
                ".$n['id_aktiviti']." | ".$n['nama_aktiviti']."
            </option>";
    }
    ?>
    </select>
    <input type='submit' value='Cari'>
</form>

<?php 
# syarat tambahan yang akan dimasukkan dalam arahan(query) senarai aktiviti
$tambahan="";
if(!empty($_GET['id_aktiviti'])){
        # Mengambil nilai data GET di URL
        $id_aktiviti = $_GET['id_aktiviti'];

        # proses mendapatkan maklumat aktiviti
        $sql_aktiviti = "select* from aktiviti where id_aktiviti = '$id_aktiviti'";
        $laksana_aktiviti = mysqli_query($condb,$sql_aktiviti);
        $ma=mysqli_fetch_array($laksana_aktiviti);

        # Mendapatkan Analisis Kehadiran (bil hadir & bil ahli)
        $arahanSQL=" SELECT 
        ( SELECT COUNT(*) FROM kehadiran WHERE id_aktiviti = '".$ma['id_aktiviti']."' ) AS bil_hadir,
        ( SELECT COUNT(*) FROM ahli ) AS bil_ahli ";
        $laksanaSQL     =   mysqli_query($condb, $arahanSQL);
        $da             =   mysqli_fetch_array($laksanaSQL);
    ?> 

    <!-- Header bagi jadual untuk memaparkan senarai aktiviti -->
    <h3 >
        <?= $ma['nama_aktiviti'] ?><br>
        <?= $ma['tarikh_aktiviti'] ?> | <?= $ma['masa_mula'] ?><br>
        Kehadiran   :   <?= $da['bil_hadir']." / ".$da['bil_ahli'] ?> <br>
        Peratus     :   <?php echo number_format(($da['bil_hadir']/$da['bil_ahli']*100),2); ?> %
    </h3>

    <!-- Menjadikan item dipaparkan sebelah-menyebelah -->
    <div class="flexbox" >
        <!-- Fungsi carian nama ahli -->
        <form action='kehadiran-laporan.php?id_aktiviti=<?= $id_aktiviti; ?>' method='POST'>
            <input type='text' name='nama' placeholder='Carian Nama Ahli'>
            <input type='submit' value='Cari'>
        </form>

        <!-- Fungsi ubahan saiz tulisan -->
        <form>            
            <?php include('butang-saiz.php'); ?>
        </form>
    </div>

    <!-- Table paparan data-->
    <table id="paparan"> 

        <!-- Memasukkan nama medan -->
        <tr bgcolour='yellow'> 
            <td>Bil</td>
            <td>Nama</td> 
            <td>NoKP</td>
            <td>Kelas</td> 
            <td>Kehadiran</td>
        </tr> 

        <?php
        
        # Syarat tambahan yang akan dimasukkan dalam arahan(query) senarai ahli
        $tambahan="";
        if(!empty($_POST['nama'])){
            $tambahan= " where ahli.nama like '%".$_POST['nama']."%'";
        }

        # Arahan query untuk mencari senarai Aktiviti 
        $arahan_papar="
        SELECT *,  ahli.nokp
        FROM ahli
        LEFT JOIN kelas
        ON ahli.id_kelas = kelas.id_kelas
        LEFT JOIN kehadiran
        ON ahli.nokp = kehadiran.nokp 
        and id_aktiviti like '%$id_aktiviti%'
        $tambahan
        ORDER BY ahli.nama ";

        # Laksanakan arahan mencari data aktiviti 
        $laksana = mysqli_query($condb,$arahan_papar); 
        $hadir=$takhadir=$bil=0;

        # Mengambil data yang ditemui 
            while($m = mysqli_fetch_array($laksana)) { 
                
                # memaparkan senarai nama dalam jadual 
                echo"<tr> 
                    <td>".++$bil."</td>
                    <td>".$m['nama']."</td> 
                    <td>".$m['nokp']."</td> 
                    <td>".$m['ting']." | ".$m['nama_kelas']." </td> 
                    <td style='text-align: center;'>";
                        if(strlen($m['id_aktiviti'])>=1) {
                            echo "&#9989;"; 
                        } else {
                            echo "&#10060;";
                        } 
                    "</td> 
                </tr>"; 
            }
            
    echo"</table>";
} 
?> 

<!--Mencetak laporan-->
<center><button onclick="printTable()">Cetak</button></center>
<!-- Rewrite file sementara untuk mencetak data yang diingini sahaja -->
<script>
    function printTable() {
        var printWindow = window.open('', '_blank');
        printWindow.document.write('<html><head><title>Print Table</title></head><body>');
        printWindow.document.write('<h2>Laporan Kehadiran aktiviti</h2>');
        printWindow.document.write('<style>table {border-collapse: collapse;width: 100%;} th, td {border: 1px solid #ddd;padding: 8px;text-align: left;}</style>');
        printWindow.document.write('<h3><?= $ma['nama_aktiviti'] ?><br><?= $ma['tarikh_aktiviti'] ?> | <?= $ma['masa_mula'] ?><br>Kehadiran   :   <?= $da['bil_hadir']." / ".$da['bil_ahli'] ?> <br>Peratus     :   <?php echo number_format(($da['bil_hadir']/$da['bil_ahli']*100),2); ?> %</h3>');
        printWindow.document.write(document.querySelector('#paparan').outerHTML);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
    }
</script>

<?php include ('footer.php'); ?> 