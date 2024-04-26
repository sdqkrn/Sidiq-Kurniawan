<?php
session_start();
include 'koneksi.php';

$userid = $_SESSION['userid'];
$fotoid = $_GET['fotoid'];

if (isset($_GET['fotoid'])) {
    $fotoid = $_GET['fotoid'];
    $userid = $_SESSION['userid'];

    $query = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid' AND userid='$userid'");
    if (mysqli_num_rows($query) > 0) {
        // Variabel $query seharusnya digunakan di sini, bukan $ceksuka
        while ($data = mysqli_fetch_array($query)) {
            $likeid = $data["likeid"];
            // Memperbaiki tanda kutip yang hilang dalam pernyataan SQL di bawah ini
            mysqli_query($koneksi, "DELETE FROM likefoto WHERE fotoid='$fotoid' AND userid='$userid'");
            echo "<script>
                location.href='../admin/index.php';
                </script>";
        }
    } else {
        $tanggallike = date('Y-m-d');
        mysqli_query($koneksi, "INSERT INTO likefoto (fotoid, userid) VALUES ('$fotoid', '$userid')");
        echo "<script>
            location.href='../admin/index.php';
            </script>";
    }
}
?>
