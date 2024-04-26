<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galery Foto</title>
    <link rel="stylesheet" type="text/css" href="
    assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <style>

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
body {
    background-image: url('./assets/img/26161796_0zun_56kz_211202.jpg'); /* Ganti 'background.jpg' dengan URL image yang Anda inginkan */
    background-size: cover; /* Menutupi seluruh area body */
    background-position: center; /* Menempatkan image tepat di tengah */
    background-repeat: no-repeat; /* Mencegah image berulang */
    background-attachment: fixed;
  }
.wrapper {
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  background-color: rgba(0, 0, 0, 0.2);
}
.login_box {
  position: relative;
  width: 450px;
  backdrop-filter: blur(25px);
  border: 2px solid var(--primary-color);
  border-radius: 15px;
  padding: 7.5em 2.5em 4em 2.5em;
  color: var(--second-color);
  box-shadow: 0px, 0px, 10px, 2px rgba(0, 0, 0, 0.3);
}
.login-header {
  position: absolute;
  top: 0;
  left: 50%;
  transform: translateX(-50%);
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: var(--primary-color);
  width: 150px;
  height: 70px;
  border-radius: 0 0 20px 20px;
}
.login-header span {
  font-size: 30px;
  color: var(--black-color);
}
.login-header::before {
  content: "";
  position: absolute;
  top: 0;
  left: -30px;
  width: 30px;
  height: 30px;
  border-top-right-radius: 50%;
  background: transparent;
  box-shadow: 15px 0 0 0 var(--primary-color);
}
.login-header::after {
  content: "";
  position: absolute;
  top: 0;
  right: -30px;
  width: 30px;
  height: 30px;
  border-top-left-radius: 50%;
  background: transparent;
  box-shadow: -15px 0 0 0 var(--primary-color);
}
.input_box{
  position: relative;
  display: flex;
  flex-direction: column;
  margin: 20px 0;
}
.input-field {
  width: 100%;
  height: 55px;
  font-size: 16px;
  background: transparent;
  color: var(--second-color);
  padding-inline: 20px 50px;
  border: 2px solid var(--primary-color);
  border-radius: 30px;
  outline: none;
}
#username{
  margin-bottom: 10px;
}
.form-label{
  position: absolute;
  top: 15px;
  left: 20px;
  transition: .2s;
}
.input-field:focus ~ .form-label,
.input-field:valid ~ .form-label{
  position: absolute;
  top: -10px;
  left: 20px;
  font-size: 14px;
  background-color: var(--primary-color);
  border-radius: 30px;
  color: var(--black-color);
  padding: 0 10px;
}

.icon{
  position: absolute;
  top: 18px;
  right: 25px;
  font-size: 20px;
}
.input-submit{
  width: 100%;
  height: 50px;
  background: #ececec;
  font-size 16px;
  font-weight: 500;
  border: none;
  border-radius: 30px;
  cursor: pointer;
  transition: .3s;
}
.input-submit:hover{
  background-color: var(--second-color);
}
.input-submit:active {
  transform: scale(0.95); /* Membuat tombol sedikit mengecil saat diaktifkan */
}
.register a{
  font-weight: 500;
}
@media only screen and(max-width: 564px){
  .wrapper{
    padding: 20px;
  }
  .login_box{
    padding: 7.5em 1.5em 4em 1.5em;
  }
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

<!-- <div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body bg-light">
                    <div class="text-center">
                        <h5>Daftar Akun Baru</h5>
                    </div>
                        <form action="" method="POST">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" required>
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="namalengkap" class="form-control" required>
                            <label class="form-label">Alamat</label>
                            <input type="text" name="alamat" class="form-control" required>
                            <div class="d-grid mt-2">
                            <button class="btn btn-primary" type="submit" name="kirim">Daftar</button>
                        </div>
                        </form>
                        <hr>
                        <p>Sudah punya akun? <a href="login.php">Login disini!</a></p>
                </div>
            </div>
        </div>
    </div>
</div> -->


<div class="wrapper">
    <div class="login_box">
        <div class="login-header">
            <span>register</span>
        </div>
        <form action="config/aksi_register.php" method="POST">
        <div class="input_box">
             <input type="text" name="username" class="input-field " required>
                            <label class="form-label">Username</label>
                            <i class="bx bx-user icon"></i>        
        </div>
        <div class="input_box">
        <input type="password" name="password" class="input-field" required>
                            <label class="form-label">Password</label>
                            <i class="bx bx-lock-alt icon"></i>   
                            
                           
                            </div>
                            <div class="input_box">
        <input type="email" name="email" class="input-field" required>
                            <label class="form-label">Email</label>
                            <i class='bx bx-envelope icon'></i>
                            
                           
                            </div>
                            <div class="input_box">
        <input type="text" name="namalengkap" class="input-field" required>
                            <label class="form-label">Nama Lengkap</label>
                            <i class="bx bx-user icon"></i>
                            
                            
                            </div>
                            <div class="input_box">
        <input type="text" name="alamat" class="input-field" required>
                            <label class="form-label">Alamat</label>
                            <i class='bx bx-map icon'></i>     
                            
                           
           
        </div>
        <div class="input_box">
            <input type="submit" class="input-submit" value="Register">
        </div> 
        <hr style="height: 10px;">
        <div class="register">
            <span><center>Sudah punya akun? <a href="login.php"><u>Login disini</u>!</a></center</span>
        </div>             
       
        </form>
       
      
       
    </div>
</div>




    <footer class="d-flex justify-content-center border-top mt-3 text-light bg-transparent ">
        <p>&copy; UKK RPPL 2024 | Sidiq Kurniawan</p>
    </footer>

<script type="text/javascript" src="assets/js/bootstrap.min.js">



</script>

</body>
</html>