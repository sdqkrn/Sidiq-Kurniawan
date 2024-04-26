<?php
session_start();
include '../config/koneksi.php';
$userid = $_SESSION['userid'];
if($_SESSION['status'] != 'login') {
  echo"<script>
  alert('Anda Belum Login');
  location.href='../login.php';
  </script>";
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galery Foto</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
 
  body {
    background-color: #121212;  
    background-size: cover; 
    background-position: center; 
    background-repeat: no-repeat; 
    background-attachment: fixed;
  }

  * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
:root {
  --primary-color: #c6c3c3;
  --second-color: #ffffff;
  --black-color: #000000;
}
  .fa-lg{
  width: 30px;
  cursor: pointer;
  transition: .3s;
}
.fa-lg:active {
  transform: scale(0.8); 
}
.card-header{
  background-color: #198754;
}

.btn {
  cursor: pointer;
  transition: .3s;
}
.btn:active {
  transform: scale(0.8); 
}
.modal-header{
  background: #198754;
}
@media (max-width: 768px) {
            .navbar-brand img {
                width: 120px; /* Adjust logo size */
            }
            .card-body {
                padding: 1rem; /* Padding adjustment */
            }
        }

        .dropdown-toggle{
  margin-bottom: 20px;
}
/* Base styles for the sidebar */
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
            <i class="fas  fa-exclamation" style="margin-right: 5px; "></i>
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
    <div class="row">
        <div class="col-md-4">
          <div class="card mt-2">
            <div class="card-header">
            <h5 class="m-0 text-light"><center>Tambah Album</center></h5> 
            </div>
            <div class="card-body">
              <form action="../config/aksi_album.php" method="POST">
                <label class="form-label"><b>Nama Album</b></label>
                <input type="text" name="namaalbum" class="form-control" required>
                <label class="form-label"><b>Deskripsi</b></label>
                <textarea class="form-control" name="deskripsi" required></textarea>
                <button type="submit" class="btn btn-success mt-2" name="tambah">Tambah Data</button>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-8">
            <div class="card mt-2">
              <div class="card-header">
              
                <h5 class="m-0 text-light"><center>Data Album</center></h5>
                
               
              
              
    
              </div>
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Album</th>
                      <th>Deskripsi</th>
                      <th>Tanggal</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    $userid = $_SESSION['userid'];
                    $sql = mysqli_query($koneksi,"SELECT * FROM album WHERE userid='$userid'");
                    while ($data = mysqli_fetch_array($sql)) {
                    ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $data['namaalbum'] ?></td>
                      <td><?php echo $data['deskripsi'] ?></td>
                      <td><?php echo $data['tanggalbuat'] ?></td>
                      <td>
                          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit<?php echo $data['albumid'] ?>">
                          Edit
                          </button>


                          <div class="modal fade" id="edit<?php echo $data['albumid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                              <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">Edit Data</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="filter: invert(100%);"></button>
                          </div>
                        <div class="modal-body">
                          <form action="../config/aksi_album.php" method="POST">
                          <input type="hidden" name="albumid" value="<?php echo $data['albumid'] ?>">
                          <label class="form-label"><b>Nama Album</b></label>
                          <input type="text" name="namaalbum" value="<?php echo $data['namaalbum'] ?>" class="form-control" required>
                          <label class="form-label"><b>Deskripsi</b></label>
                          <textarea class="form-control" name="deskripsi" required><?php echo $data['deskripsi'];?></textarea>
        
                        </div>
                      <div class="modal-footer">
                    <button type="submit" name="edit" class="btn btn-primary">Edit Data</button>
                  </form>
                </div>
              </div>
            </div>
        </div>

        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $data['albumid'] ?>">
                         Hapus
                          </button>


                          <div class="modal fade" id="hapus<?php echo $data['albumid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                              <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">Edit Data</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="filter: invert(100%);"></button>
                          </div>
                        <div class="modal-body">
                          <form action="../config/aksi_album.php" method="POST">
                          <input type="hidden" name="albumid" value="<?php echo $data['albumid'] ?>">
                         Apakah Anda yakin Ingin Menghapus Data <strong> <?php echo $data['namaalbum']?></strong> ?
        
                        </div>
                      <div class="modal-footer">
                    <button type="submit" name="hapus" class="btn btn-danger">Hapus Data</button>
                  </form>
                </div>
              </div>
            </div>
        </div>
                      </td>
                    </tr>
                    <?php }?>
                  </tbody>
                </table>
              </div>
            </div>
        </div>
    </div>
    <footer class="d-flex justify-content-center  text-light bg-transparent  ">
        <p>&copy; UKK RPPL 2024 | Sidiq Kurniawan</p>
    </footer>

</div>
</div>
    
    

   
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    </script>

</body>
</html>