<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galery Foto</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="
    assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
  /* Menambahkan background image pada body */
  body {
    background-image: url('./assets/img/26161796_0zun_56kz_211202.jpg'); /* Ganti 'background.jpg' dengan URL image yang Anda inginkan */
    background-size: cover; /* Menutupi seluruh area body */
    background-position: center; /* Menempatkan image tepat di tengah */
    background-repeat: no-repeat; /* Mencegah image berulang */
    background-attachment: fixed;
  }
  .fa-lg{
  width: 30px;
  cursor: pointer;
  transition: .3s;
}
.fa-lg:active {
  transform: scale(0.8); /* Membuat tombol sedikit mengecil saat diaktifkan */
}
</style>

</head>
<body>

<nav class="navbar navbar-expand-lg ">
  <div class="container">
    <a class="navbar-brand" href="admin/index.php">
    <img src="assets/img/logo-removebg-preview.png" alt="Logo" width="150" height="50" class="d-inline-block align-text-top">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse mt-2" id="navbarNavAltMarkup">
      <div class="navbar-nav me-auto">
         
      </div>
      <a href="register.php" class="btn btn-outline-primary m-1"><i class="fa-solid fa-user-plus fa-lg"></i></a>
        <a href="login.php" class="btn btn-outline-success m-1"><i class="fa-solid fa-right-to-bracket fa-lg"></i></a>
    </div>
  </div>
</nav>
    
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <img src="" class="card-img-top" title="" style="height:12rem;">
                    <div class="card-footer text-center">
                        <a href="">10 Suka</a>
                        <a href="">3 Komentar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
   

    <footer class="d-flex justify-content-center border-top mt-3 text-light bg-transparent fixed-bottom ">
        <p>&copy; UKK RPPL 2024 | Sidiq Kurniawan</p>
    </footer>

<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

</body>
</html>