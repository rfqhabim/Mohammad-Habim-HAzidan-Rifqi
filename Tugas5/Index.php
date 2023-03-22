<?php
require('function.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <title>HZweb</title>

    <!-- link font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400&display=swap" rel="stylesheet">

    <!--link css-->
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">

    <!--link icon-->
    <link
    href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
    rel="stylesheet"/>
</head>
<body>

    <nav>
        <div class="logo">
            <img src="HZweb.png" alt="">
        </div>
        <div class="menu">
            <a href="home.html">HOME</a>
            <a href="main.html">MAIN</a>
            <a href="help.html">HELP</a>
        </div>
    </nav>

    <div class="jumbotron">
        <div class="container">
            <div class="text">
                <h3>FRONT END & BACK END DEVELOPER<h3>
                <h1>MOHAMMAD HABIM HAZIDAN RIFQI</h1>
            </div>
            <div class="box-button">
                <div class="button">
                    <a href="profil.html">About Me</a>
                </div>
              </div>
        </div>
    </div>
    
    <div class="about-me">
        <div class="container1">
            <div class="box1">
                <img src="fotoku.png" alt="">
            </div>
            <div class="box2">
                <h2>ABOUT ME</h2>
                <p>Halo, perkenalkan namaku</p>
                <h1>MOHAMMAD HABIM HAZIDAN RIFQI</h1>
                <p>Aku biasa dipanggil Habim. Aku lahir tanggal 23 Februari 2003 di Mojokerto dan sekarang bertempat tinggal di Dusun Klanjan RT 01 RW 01 Desa Baureno Kecamatan Jatirejo. Aku sekarang sedang menjadi mahasiswa di sebuah Perguran Tinggi Negeri yaitu Universitas Pembangunan Nasional VETERAN Jawa Timur mengambil program studi Informatika Fakultas Ilmu Koputer.</p>
            </div>
        </div>
    </div>

    <div class="box-table">
        <table class="tabel-1">
        <tr>
            <td><b>Nama : </b><?php echo $biodata["nama"]; ?></td>
        </tr>
        <tr>
            <td><b>Ttl : </b><?php echo $biodata["ttl"]; ?></td>
        </tr>
        <tr>
            <td><b>Age : </b><?php age() ?></td>
        </tr>
        <tr>
            <td><b>Jenis kelamin : </b><?php echo $biodata["jeniskelamin"]; ?></td>
        </tr>
        <tr>
            <td><b>Agama : </b><?php echo $biodata["agama"]; ?></td>
        </tr>
        </table>
        <table class="tabel-2">
        <tr>
            <td><b>Kewarganegaraan : </b><?php echo $biodata["kewarganegaraan"]; ?></td>
        </tr>
        <tr>
            <td><b>Suku : </b><?php echo $biodata["suku"]; ?></td>
        </tr>
        <tr>
            <td><b>Tb : </b><?php echo $biodata["tb"]; ?></td>
        </tr>
        <tr>
            <td><b>Bb : </b><?php echo $biodata["bb"]; ?></td>
        </tr>
        </table>
    </div>

    <footer>
        <p>copyright by Mohammad Habim Hazidan Rifqi</p>
    </footer>

    <div class="sosmed">
        <i class='bx bxl-github github'><p>rfqhabim</p></i>
        <i class='bx bxl-spotify spotify'><p>rfqhabim</p></i>
        <i class='bx bxl-instagram instagram'><p>rfqhabim</p></i>
        <i class='bx bxl-whatsapp whatsapp'><p>085850158235</p></i>
        <i class='bx bxl-twitter twitter'><p>rfqhabim</p></i>
    </div>

    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</body>
</html>