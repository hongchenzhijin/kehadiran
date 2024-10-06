<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cantikkan-GUI.css">
</head>
<body>
    <nav>
        <table ><tr >
            <td class="logo"><img width='100px' height='auto' src="images/logo.png"></td>
            <td>
                <h1>PERSATUAN BULAN SABIT MERAH SMK TAMAN RIA</h1>
                <p>Sistem Pengesahan Kehadiran Ahli</p>
            </td>
            <td class="logo"><img width='100px' height='auto' src="images/logo.png"></td>
        </tr></table>
        
        <?php if (!empty($_SESSION['tahap']) and $_SESSION['tahap'] == "Admin") { ?>
            <!-- Menu admin -->
            <a href='menu-utama.php'>Laman Utama</a>
            <a href='profil.php'>Profil</a>
            <a href='kehadiran-rekod.php'>Kaunter Kehadiran</a>
            <a href='senarai-ahli.php'>Senarai ahli</a>
            <a href='senarai-aktiviti.php'>Senarai Aktiviti</a>
            <a href='kehadiran-laporan.php'>Laporan Kehadiran</a>
            <a href='info.php'>Info</a>
            <a href='logout.php'>Logout</a>
            <hr>
        <?php } else if (!empty($_SESSION['tahap']) and $_SESSION['tahap'] == "Ahli") { ?>
            <!-- Menu ahli biasa -->
            <a href='menu-utama.php'>Laman Utama</a>
            <a href='profil.php'>Profil</a>
            <a href='info.php'>Info</a>
            <a href='logout.php'>Logout</a>
            <hr> 
        <?php } else { ?>
            <!-- Menu Laman Utama -->
            <a href='index.php'>Laman Utama</a>
            <a href='login-borang.php'>Daftar Masuk</a> 
            <a href='info.php'>Info</a>
            <hr>
        <?php } ?>
    </nav>
</body>
</html>

    
    


