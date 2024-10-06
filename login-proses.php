<?php
# Memulakan fungsi session
session_start();

# Menyemak kewujudan data post yang dihantar dari login-borang.php
if(!empty($_POST['nokp']) and !empty($_POST['katalaluan']))
{
    # Memanggil fail connection.php
    include ('connection.php');

    # Mengambil data yang di POST dari fail Borang
    $nokp           =   $_POST['nokp'];
    $katalaluan     =   $_POST['katalaluan'];

    # Arahan SQL (query) untuk membandingkan data yang dimasukkan
    # Wujud di pangkalan data atau tidak
    $query_login = "select * from ahli
    where 
            nokp            =   '$nokp'
    and     katalaluan      =   '$katalaluan' LIMIT 1";
   
    # Melaksakan arahan membandingkan data
    $laksana_query = mysqli_query($condb,$query_login);

    # Jika terdapat 1 data yang sepadan, login berjaya
    if(mysqli_num_rows($laksana_query)==1)
    {
        # Mengambil data yang ditemui
        $m  =   mysqli_fetch_array($laksana_query);

        # Mengumpukkan kepada pembolehubah session
        $_SESSION['nokp']   =   $m['nokp'];
        $_SESSION['tahap']  =   $m['tahap'];
 	    $_SESSION['nama']    =   $m['nama'];
         # Membukan laman index.php
        echo "<script>window.location.href='menu-utama.php';</script>";
    }
    else
    {
        # Login gagal. Kembali ke laman login-borang.php
        die("<script>alert('login Gagal');
        window.location.href='login-borang.php';</script>");
    }
}
else
{
    # Data yang dihantar dari laman login-borang.php adalah kosong
    die("<script>alert('sila masukkan nokp dan katalaluan');
    window.location.href='login-borang.php';</script>");
}
?>



