<?php
session_start();
include '../config/koneksi.php'; // Sesuaikan path sesuai struktur direktori Anda

$userid = $_SESSION['userid'];

if($_SESSION['status'] != 'login') {
  echo"<script>
  alert('Anda Belum Login');
  location.href='../login.php';
  </script>";
}
$liked = isset($_GET['liked']) && $_GET['liked'] == 'true';
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galery Foto</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
 
  body {
    background-color:  #000; 
    background-size: cover; 
    color: white;
    background-position: center; 
    background-repeat: no-repeat; 
    background-attachment: fixed;

  }
  .fa-lg{
  width: 30px;
  cursor: pointer;
  transition: .3s;
}
.fa-lg:active {
  transform: scale(0.8); 
}
body {
    padding: 0;
    margin: 0;
    overflow-x: hidden;
}

.nav-link {
    font-size: 20px; /* Consistent font sizing */
}

.bg-light {
    background-color: #f8f9fa!important; /* Light background for the sidebar */
}

.nav-link .fas {
    margin-right: 10px; /* Icon spacing */
}

.dropdown-toggle{
  margin-bottom: 20px;
}
.sidebar {
    width: 180px;
    height: 100vh;
    background-color: black;
    padding: 3px;
}

/* Hide sidebar on small screens */
@media (max-width: 768px) {
    .sidebar {
        width: 100%; /* Full width */
        height: auto; /* Auto height */
        position: fixed; /* Fixed at the top */
        overflow-y: auto;
        overflow-x: hidden;
        z-index: 1000; /* Make sure it is above other content */
    }
    .nav-link {
        display: block;
        width: 100%; /* Full width links */
    }
}

/* Adjustments for medium screens */
@media (min-width: 769px) and (max-width: 992px) {
    .sidebar {
        width: 150px; /* Slightly smaller width */
    }
}
/* CSS untuk Sidebar */
#sidebar {
    position: fixed;  /* Membuat sidebar tetap pada posisi semula */
    top: 0;
    left: 0;
    height: 100vh; /* Tinggi penuh layar */
    overflow-x: hidden; /* Menyembunyikan scrollbar horizontal */
    overflow-y: auto; /* Memungkinkan scroll pada sidebar jika isi lebih tinggi dari layar */
    z-index: 1000; /* Memastikan sidebar di atas konten lain */
}

/* CSS untuk Main Content */
.main-content {
    margin-left: 180px; /* Memberi jarak sebesar lebar sidebar */
    min-height: calc(100vh - 60px);  /* Sesuaikan 60px dengan tinggi footer Anda */
    display: flex;
    flex-direction: column;
}


footer {
    background-color: #000;  /* atau warna lain sesuai keinginan Anda */
    color: white;
    padding: 10px 0;
}

</style>

</head>
<body>
<div class="d-flex">
<div class="d-flex flex-column flex-shrink-0 p-3 " style="width: 180px; border-right: 1px solid #737373" id="sidebar">
    <a href="index.php" class="d-block mb-0 align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <img src="../assets/img/logo-removebg-preview.png" alt="Logo" width="150" height="50">
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="index.php" class="nav-link text-light" aria-current="page">
                <i class="fas fa-home"></i>
                Home
            </a>
        </li>
        <li>
            <a href="album.php" class="nav-link text-light">
                <i class="fas fa-images"></i>
                Album
            </a>
        </li>
        <li>
            <a href="foto.php" class="nav-link text-light">
                <i class="fas fa-photo-video"></i>
                Foto
            </a>
        </li>
    
    </ul>
    <div class="dropdown">
    <a href="#" class="d-flex align-items-center link-light text-decoration-none " id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="fas fa-bars" style="font-size: 24px; padding: 15px;"></i> <!-- Ganti dengan ikon menu dari Font Awesome -->
    
</a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
    <li>
        <a class="dropdown-item" href="tentang_kami.php">
            <i class="fas  fa-exclamation" style="margin-right: 5px;"></i>
            Tentang Kami
        </a>
    </li>
    <li>
        <a class="dropdown-item" href="home.php">
            <i class="fas fa-user" style="margin-right: 5px;"></i>
            Profile
        </a>
    </li>
    <li>
        <a class="dropdown-item" href="suka.php?liked=true">
            <i class="fas fa-heart" style="margin-right: 5px;"></i>
            Suka
        </a>
    </li>
    <li>
        <hr class="dropdown-divider">
    </li>
    <li>
        <a class="dropdown-item" href="../config/aksi_logout.php">
            <i class="fas fa-sign-out-alt" style="margin-right: 5px;"></i>
            Logout
        </a>
    </li>
</ul>

    </div>
</div>

<div class="main-content flex-grow-1">
<div class="content p-3">

<h1>Tentang Kami</h1>
        <p>Kami adalah tim yang berdedikasi untuk memberikan solusi terbaik untuk Anda. Dengan pengalaman bertahun-tahun dalam industri ini, kami bertekad untuk menciptakan produk-produk yang inovatif dan berkualitas.</p>
        <h2>Visi Kami</h2>
        <p>Visi kami adalah menjadi pemimpin dalam industri ini dengan menyediakan produk-produk yang mengubah hidup dan memberikan pengalaman terbaik bagi pelanggan kami.</p>
        <h2>Misi Kami</h2>
        <p>Misi kami adalah memberikan layanan pelanggan yang luar biasa, mengembangkan produk-produk berkualitas tinggi, dan berkontribusi positif bagi masyarakat dan lingkungan sekitar.</p>
        <h2>Tim Kami</h2>
        <p>Kami adalah tim yang terdiri dari para ahli di bidangnya masing-masing. Bersama-sama, kami bekerja keras untuk mencapai tujuan kami dan memberikan hasil yang memuaskan bagi pelanggan kami.</p>
        <h2>Hubungi Kami</h2>
        <p>Jika Anda memiliki pertanyaan atau ingin berbicara dengan kami lebih lanjut, jangan ragu untuk menghubungi kami di <a href="mailto:info@contoh.com">info@contoh.com</a>.</p>

</div>
<footer class="d-flex justify-content-center text-light bg-transparent ">
            <p>&copy; UKK RPPL 2024 | Sidiq Kurniawan</p>
        </footer>
</div>
    
   

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>