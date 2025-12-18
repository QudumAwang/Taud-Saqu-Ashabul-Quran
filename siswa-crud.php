<?php
session_start();
if (!isset($_SESSION['admin'])) {
    echo "<script>alert('Harus Login'); window.location.href='index.php';</script>";
    exit();
}

include('config.php');


// Menambahkan Data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kelas = $_POST['kelas'];
    $nama = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $anak_ke = $_POST['anak_ke'];
    $dari = $_POST['dari'];
    $bahasa_daerah = $_POST['bahasa_daerah'];
    $minat_kecenderungan = $_POST['minat_kecenderungan'];
    $berat = $_POST['berat'];
    $tinggi = $_POST['tinggi'];
    $penyakit = $_POST['penyakit'];

    $sql = "INSERT INTO DataSiswa (kelas, nama, tempat_lahir, tanggal_lahir, anak_ke, dari, bahasa_daerah, minat_kecenderungan, berat, tinggi, penyakit)
            VALUES ('$kelas', '$nama', '$tempat_lahir', '$tanggal_lahir', $anak_ke, $dari, '$bahasa_daerah', '$minat_kecenderungan', $berat, $tinggi, '$penyakit')";

    if ($conn->query($sql) === TRUE) {
        header("Location: acara-crud.php");
        // echo "Data berhasil ditambahkan.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Menghapus Data
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM DataSiswa WHERE id=$id") or die($conn->error);
    header("Location: acara-crud.php");
}

// Mengedit Data
if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $kelas = $_POST['kelas'];
    $nama = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $anak_ke = $_POST['anak_ke'];
    $dari = $_POST['dari'];
    $bahasa_daerah = $_POST['bahasa_daerah'];
    $minat_kecenderungan = $_POST['minat_kecenderungan'];
    $berat = $_POST['berat'];
    $tinggi = $_POST['tinggi'];
    $penyakit = $_POST['penyakit'];

    $conn->query("UPDATE DataSiswa SET kelas='$kelas', nama='$nama', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', anak_ke=$anak_ke, dari=$dari, bahasa_daerah='$bahasa_daerah', minat_kecenderungan='$minat_kecenderungan', berat=$berat, tinggi=$tinggi, penyakit='$penyakit' WHERE id=$id") or die($conn->error);
    header("Location: acara-crud.php");
}

// Mengambil Data
$result = $conn->query("SELECT * FROM DataSiswa") or die($conn->error);

header("Location: acara-crud.php");


$conn->close(); ?>
