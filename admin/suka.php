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
    background-color: #121212; /* Warna latar belakang hitam */
   
    background-size: cover; 
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
.like-button:active {
        color: red; /* Ubah warna tombol menjadi merah saat ditekan */
    }
    .like-button {
        color: red; /* Warna default tombol */
    }

    .like-button.clicked {
        color: red; /* Warna tombol setelah diklik */
    }
</style>

</head>
<body>
<div class="d-flex">
<div class="d-flex flex-column flex-shrink-0 p-3" style="width: 180px;  border-right: 1px solid #737373" id="sidebar">
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


   
    <div class="row mt-3">
    <?php
    if(isset($_GET['albumid'])){
        $albumid = $_GET['albumid'];
        $query = mysqli_query($koneksi,"SELECT * FROM foto WHERE userid='$userid' AND albumid='$albumid'");
        while ($data = mysqli_fetch_array($query)) {?>
        <div class="col-md-4" style="margin-bottom: 20px;">
        <div class="card">
        <?php if (pathinfo($data['lokasifile'], PATHINFO_EXTENSION) === 'mp4'): ?>
            <video controls width="100%" style="height:15rem;">
                    <source src="../assets/img/<?php echo $data['lokasifile']; ?>" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            <?php else: ?>
                <img src="../assets/img/<?php echo $data['lokasifile']; ?>" class="card-img-top" title="<?php echo $data['judulfoto']; ?>" style="height:15rem;">
                
            <?php endif; ?>
            <div class="card-footer text-center">
    
    <?php 
    $fotoid = $data['fotoid'];
    $ceksuka = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid' AND userid='$userid'");
    if (mysqli_num_rows($ceksuka) == 1) { ?>
      <a href="../config/proses_like.php?fotoid=<?php echo $data['fotoid'] ?>"class="like-button" type="submit" name="batalsuka"><i class="fa fa-heart" ></i></a>
    <?php }else{ ?>

      <a href="../config/proses_like.php?fotoid=<?php echo $data['fotoid'] ?>"class="like-button" type="submit" name="suka"><i class="fa-regular fa-heart"></i></a>
    <?php }
    $like = mysqli_query($koneksi,"SELECT * FROM likefoto WHERE fotoid='$fotoid'");
    echo mysqli_num_rows($ceksuka).' suka';

    ?>
   <a href=""><i class="fa-regular fa-comment"></i></a> 3 Komentar
</div>


        </div>
    </div>
    <?php } }else{
    
   
   
    $baseQuery = "SELECT * FROM foto INNER JOIN user ON foto.userid=user.userid INNER JOIN album ON foto.albumid=album.albumid";

    // Menambahkan kondisi suka jika parameter liked true
    if ($liked) {
        $baseQuery .= " WHERE foto.fotoid IN (SELECT fotoid FROM likefoto WHERE userid='$userid')";
    }
    
    $query = mysqli_query($koneksi, $baseQuery);
           
    while ($data = mysqli_fetch_array($query)) {
        $jenis_media = $data['jenis_media'];
    ?>
        <div class="col-md-4" style="margin-bottom: 20px;">
        <a type="button"  data-bs-toggle="modal" data-bs-target="#komentar<?php echo $data['fotoid']?>">
      
    
            <div class="card ">
            <?php if (pathinfo($data['lokasifile'], PATHINFO_EXTENSION) === 'mp4'): ?>
                <video controls width="100%" style="height:15rem;">
                        <source src="../assets/img/<?php echo $data['lokasifile']; ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                <?php else: ?>
                    <img src="../assets/img/<?php echo $data['lokasifile']; ?>" class="card-img-top" title="<?php echo $data['judulfoto']; ?>" style="height:15rem;">
                    
                <?php endif; ?>
                <div class="card-footer text-center">
        
        <?php 
        $fotoid = $data['fotoid'];
        $ceksuka = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid' AND userid='$userid'");
        if (mysqli_num_rows($ceksuka) == 1) { ?>
          <a href="../config/proses_like3.php?fotoid=<?php echo $data['fotoid'] ?>"class="like-button" type="submit" name="batalsuka"><i class="fa fa-heart"></i></a>
        <?php }else{ ?>
    
          <a href="../config/proses_like3.php?fotoid=<?php echo $data['fotoid'] ?>"class="like-button" type="submit" name="suka"><i class="fa-regular fa-heart"></i></a>
        <?php }
       $like = mysqli_query($koneksi, "SELECT COUNT(*) as jumlah FROM likefoto WHERE fotoid='$fotoid'");
       $data_like = mysqli_fetch_assoc($like);
       echo $data_like['jumlah'].' suka';
    
        ?>
       <a type="button"  data-bs-toggle="modal" data-bs-target="#komentar<?php echo $data['fotoid']?>"><i class="fa-regular fa-comment"></i></a>
       <?php
       $jmlkomen = mysqli_query($koneksi,"SELECT * FROM komentarfoto WHERE fotoid='$fotoid'");
       echo mysqli_num_rows($jmlkomen).' komentar';
       ?>
    </div>
    
    
            </div>
            </a>
            <!-- Modal -->
    <div class="modal fade" id="komentar<?php echo $data['fotoid']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
        
          <div class="modal-body">
            <div class="row">
              <div class="col-md-8">
              <?php if (pathinfo($data['lokasifile'], PATHINFO_EXTENSION) === 'mp4'): ?>
                <video controls width="100%" >
                        <source src="../assets/img/<?php echo $data['lokasifile']; ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                <?php else: ?>
                    <img src="../assets/img/<?php echo $data['lokasifile']; ?>" class="card-img-top" title="<?php echo $data['judulfoto']; ?>" >
                    
                <?php endif; ?>
              </div>
              <div class="col-md-4">
                    <div class="m-2">
                      <div class="overflow-auto">
                        <div class="sticky-top">
                          <strong>
                            <?php echo $data['judulfoto']?>
                          </strong><br>
                          <span class="badge bg-secondary"><?php echo $data['username']?></span>
                          <span class="badge bg-secondary"><?php echo $data['tanggalunggah']?></span>
                          <span class="badge bg-primary"><?php echo $data['namaalbum']?></span>
                          <span><?php 
        $fotoid = $data['fotoid'];
        $ceksuka = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid' AND userid='$userid'");
        if (mysqli_num_rows($ceksuka) == 1) { ?>
          <a href="../config/proses_like.php?fotoid=<?php echo $data['fotoid'] ?>"class="like-button" type="submit" name="batalsuka"><i class="fa fa-heart"></i></a>
        <?php }else{ ?>
    
          <a href="../config/proses_like.php?fotoid=<?php echo $data['fotoid'] ?>"class="like-button" type="submit" name="suka"><i class="fa-regular fa-heart"></i></a>
        <?php }
       $like = mysqli_query($koneksi, "SELECT COUNT(*) as jumlah FROM likefoto WHERE fotoid='$fotoid'");
       $data_like = mysqli_fetch_assoc($like);
       echo $data_like['jumlah'].' suka';
    
        ?></span>
                        </div>
                        <hr>
                        <p align="left">
                          <?php echo $data['deskripsifoto']?>
                        </p>
                        <hr>
                        <?php
                        $fotoid = $data['fotoid'];
                        $komentar = mysqli_query($koneksi,"SELECT * FROM komentarfoto INNER JOIN user ON komentarfoto.userid=user.userid WHERE komentarfoto.fotoid='$fotoid'");
                        while($row = mysqli_fetch_array($komentar)) { ?>
                        <p align="left">
                          <strong><?php echo $row['username'] ?></strong>
                          <?php echo $row['isikomentar'] ?>
                        </p>
    
                        <?php } ?> 
    
    
                        <hr>
                        <div class="sticky-bottom">
                          <form action="../config/proses_komentar3.php" method="POST">
                            <div class="input-grup">
                              <input type="hidden" name="fotoid" value="<?php echo $data['fotoid']?>">
                              <div class="input-group mb-3">
        <input type="text" name="isikomentar" class="form-control" placeholder="Tambah Komentar">
        <div class="input-group-append">
            <button type="submit" name="kirimkomentar" class="btn btn-outline-primary">
                <i class="fas fa-paper-plane"></i> <!-- Menggunakan ikon paper plane -->
            </button>
        </div>
    </div>
    
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
              </div>
            </div>
          </div>
         
        </div>
      </div>
    </div>
    
        </div>
<?php } } ?>

  

    </div>
  
</div>
<footer class="d-flex justify-content-center text-light bg-transparent ">
            <p>&copy; UKK RPPL 2024 | Sidiq Kurniawan</p>
        </footer>

</div>

</div>
    
   

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>