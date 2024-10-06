<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <!--Mencipta slideshow-->
    <div id="slideshow-container">
        
        <!--Slideshow ke-1-->
        <div class="mySlides fade">
        <img class="slide-img" src="images/slideshow1.jpg" style="width:100%">
        <a href="#main"><button class="arrow-button"><i class="arrow down"></i></button></a>
        </div>
        
        <!--Slideshow ke-2-->
        <div class="mySlides fade">
        <img class="slide-img" src="images/slideshow2.jpg" style="width:100%">
        <a href="#main"><button class="arrow-button"><i class="arrow down"></i></button></a>
        </div>
        
        <!--Slideshow ke-3-->
        <div class="mySlides fade">
        <img class="slide-img" src="images/slideshow3.jpeg" style="width:100%">
        <a href="#main"><button class="arrow-button"><i class="arrow down"></i></button></a>
        </div>

        <!--Slideshow ke-4-->
        <div class="mySlides fade">
        <img class="slide-img" src="images/slideshow4.jpg" style="width:100%">
        <a href="#main"><button class="arrow-button"><i class="arrow down"></i></button></a>
        </div>

    </div>

    <!--Memanipulasi Slideshow-->
    <!--Mencipta 'dot' bagi mengisytiharkan setiap Slideshow-->
    <div style="text-align:center">
        <span class="dot"></span> 
        <span class="dot"></span> 
        <span class="dot"></span> 
        <span class="dot"></span> 
    </div>

    <!--Mengisytiharkan dan memangil fungsi untuk mengawal perubahan dan penggantian slideshow (JavaScript)-->
    <script>
    let slideIndex = 0;
    showSlides();
    function showSlides() {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}    
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";  
        dots[slideIndex-1].className += " active";
        setTimeout(showSlides, 2000); // Imej berubah setiap 2 saat
    }
    </script>

    <!--Dengan mengklik butang anak panah, sistem diiringi untuk melaksanakan segmen kod 'main'-->
    <div id="main">
        <?php 
        # Memulakan fungsi session
        session_start();

        # Memanggil fail header.php 
        include('header.php'); 
        ?>
        <table width='100%' >
            <tr>
                <td width='75%' bgcolour='#7CB9E8' >
                     <img src='images/banner.png' width='100%'>
                </td>
                <td bgcolour='#ffaad0'>
                <center>
                    <p>Daftar Sebagai Ahli Persatuan</p>
                    <h3>Klik Pautan Dibawah Untuk Mendaftar</h3>
                    <p>↓↓↓↓↓↓↓</p>
                  <a href='signup-borang.php'><button style="width:100px;">Daftar Sini</button></a>
                </center>
                </td>
            </tr>
        </table>

        <!--Memangil footer-->
        <?php include ('footer.php'); ?>
    </div>
</body>
</html>