<?php
# memulakan fungsi  SESSION
session_start();

# Memanggil fail header.php & fail connection.php
include('header.php');
include('connection.php');
?>

<!-- Tajuk antaramuka-->
<h3> Pendaftaran Ahli Baharu </h3>

<!-- Borang Pendaftaran ahli Baru-->
<form action = 'signup-proses.php' method = 'POST'>

  Nama ahli       <input type ='text' name ='nama' placeholder="Nama Penuh Anda" title="Sila masukkan nama penuh anda" required> <br>
  Nokp ahli       <input type ='text' name ='nokp' placeholder="Cth:200130278901" title="Sila masukkan 12 digit nombor sahaja"
                         pattern="[0-9]{12}" oninvalid="this.setCustomValidity('Sila masukkan 12 digit nombor sahaja')" 
                         oninput="this.setCustomValidity('')" 
                  required> <br>
  Tingkatan       <select name='id_kelas'><br>
                  <option selected disabled value>Sila Pilih Kelas</option>
                  <?php 
                  # Proses memaparkan senarai kelas dalam bentuk drop down list
                  $arahan_sql_pilih       =   "select* from kelas";
                  $laksana_arahan_pilih   =   mysqli_query($condb,$arahan_sql_pilih);
                  while($m=mysqli_fetch_array($laksana_arahan_pilih))
                  {
                     echo "<option value='".$m['id_kelas']."'>
                     ".$m['ting']." ".$m['nama_kelas']."
                     </option>";
                   }
                   ?>
                    </select> <br>
    Katalaluan      <input type ='password'  name ='katalaluan'  required> <br>
                    <input type ='submit'    value='Daftar'>
</form>
<?php include ('footer.php');?>