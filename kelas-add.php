<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin-login.php");
    exit();
}
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $namaKelas = $_POST['namaKelas'];
    $deskripsi = $_POST['deskripsi'];
    
    $image = $_FILES['image']['name'];
    $target = "images/" . basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target);

    $sql = "INSERT INTO kelas (namaKelas, deskripsi, image) VALUES ('$namaKelas', '$deskripsi', '$image')";
    
    if ($conn->query($sql) === TRUE) {
        // echo "<script>alert('Data berhasil dikirim')</script>";
        header("Location: acara-crud.php");
    } else {
        echo "<script>alert('Error')</script>";
    }
    

    header("Location: acara-crud.php");
}
?>


