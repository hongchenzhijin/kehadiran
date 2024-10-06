<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <!--Creating slideshow-->
    <div id="slideshow-container">
        
        <div class="mySlides fade">
        <img class="slide-img" src="images/slideshow1.jpg" style="width:100%">
        <a href="#main"><button class="arrow-button"><i class="arrow down"></i></button></a>
        </div>
        
        <div class="mySlides fade">
        <img class="slide-img" src="images/slideshow2.jpg" style="width:100%">
        <a href="#main"><button class="arrow-button"><i class="arrow down"></i></button></a>
        </div>
        
        <div class="mySlides fade">
        <img class="slide-img" src="images/slideshow3.jpeg" style="width:100%">
        <a href="#main"><button class="arrow-button"><i class="arrow down"></i></button></a>
        </div>

        <div class="mySlides fade">
        <img class="slide-img" src="images/slideshow4.webp" style="width:100%">
        <a href="#main"><button class="arrow-button"><i class="arrow down"></i></button></a>
        </div>

    </div>

    <!--Controlling slideshow-->
    <div style="text-align:center">
        <span class="dot"></span> 
        <span class="dot"></span> 
        <span class="dot"></span> 
        <span class="dot"></span> 
    </div>
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
        setTimeout(showSlides, 2000); // Change image every 2 seconds
    }
    </script>

    <!--Main-->
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
                    <!-- ubah nama fail banner.jpg mengikut nama gambar anda -->
                    <img src='images/banner.png' width='100%'>
                </td>
                
                <td align='center' bgcolour='#ffaad0'>
                    <p>Selamat Datang ke Sistem Kehadiran PBSMM</p>
                    <h3>SMK Taman Ria</h3>
                </td>
            </tr>
        </table>
        <?php include ('footer.php'); ?>
    </div>
</body>
</html>