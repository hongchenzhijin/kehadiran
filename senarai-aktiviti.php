<?php 
# memulakan fungsi session
session_start();

#memanggil fail header.php, connection.php dan guard-aktiviti.php
include('header.php');
include('connection.php');
include('kawalan-admin.php');

?>
<!-- Header bagi jadual untuk memaparkan senarai ahli -->
<h3>Senarai aktiviti</h3>

<!-- Menjadikan item dipaparkan sebelah-menyebelah -->
<div class="flexbox" >
    <!-- Fungsi carian nama ahli -->
    <form action='' method='POST'>
        <input type='text' name='nama_aktiviti' placeholder='Carian aktiviti'>
        <input type='submit' value='Cari'>
    </form>

    <!-- Fungsi ubahan saiz tulisan -->
    <form>            
        <?php include('butang-saiz.php'); ?>
    </form>
</div>

<table align='center' width='100%' border='1' id='saiz'> 

    <!-- Memasukkan nama medan -->
    <tr bgcolour='yellow'> 
        <td>Nama Aktiviti</td> 
        <td>Tarikh | Masa</td> 
        <td>Tindakan</td>
    </tr> 

    <?php 

    # syarat tambahan yang akan dimasukkan dalam arahan(query) senarai aktiviti
    $tambahan="";
    if(!empty($_POST['nama_aktiviti'])){
        $tambahan= "where nama_aktiviti like '%".$_POST['nama_aktiviti']."%'";
    }
    # arahan query untuk mencari senarai Aktiviti 
    $arahan_papar="select* from aktiviti $tambahan "; 

    # laksanakan arahan mencari data aktiviti 
    $laksana = mysqli_query($condb,$arahan_papar); 

        # Mengambil data yang ditemui 
        while($m = mysqli_fetch_array($laksana)) {  
            # memaparkan senarai nama dalam jadual 
            echo"<tr> 
            <td>".$m['nama_aktiviti']."</td> 
            <td>".$m['tarikh_aktiviti']." | ".$m['masa_mula']." </td> ";
            
            # memaparkan navigasi untuk kemaskini dan hapus data aktiviti
            echo"<td style='max-width:250px;'>
                <a href='aktiviti-kemaskini-borang.php?id_aktiviti=".$m['id_aktiviti']."'>
                <input type='button'/ value='Kemaskini'></a>

                <a href='aktiviti-padam-proses.php?id_aktiviti=".$m['id_aktiviti']."' 
                onClick=\"return confirm('Anda pasti anda ingin memadam data ini.')\">
                <input type='button'/ value='Hapus'></a>

                <a href='kehadiran-borang.php?id_aktiviti=".$m['id_aktiviti']."'>
                <input type='button'/ value='Pengesahan Kehadiran'></a> 
            </td>
            </tr>"; 
        }
    ?> 
</table>

<!--Mendafterkan aktiviti baharu-->
<center><a href="aktiviti-daftar-borang.php"><button>Daftar Aktiviti Baru</button></a></center>

<?php include ('footer.php'); ?>
