<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin-login.php");
    exit();
}
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $namaGuru = $_POST['namaGuru'];
    $kelas = $_POST['kelas'];
    $deskripsi = $_POST['deskripsi'];
    
    $sql = "INSERT INTO guru (namaGuru, kelas, deskripsi) VALUES ('$namaGuru', '$kelas', '$deskripsi')";
    if ($conn->query($sql) === TRUE) {
        // echo "<script>alert('Data berhasil dikirim')</script>";
        header("Location: acara-crud.php");
    } else {
        echo "<script>alert('Error')</script>";
    }
    
    header("Location: acara-crud.php");
    exit();
}
?>