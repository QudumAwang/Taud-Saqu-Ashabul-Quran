<?php
include('config.php');

$namaPendaftar = $_POST['namaPendaftar'];
$alamat = $_POST['alamat'];
$nomorTelp = $_POST['nomorTelp'];
$kelas = $_POST['kelas'];

$sql = "INSERT INTO pendaftaran (namaPendaftar, alamat, nomorTelp, kelas)
VALUES ('$namaPendaftar', '$alamat', '$nomorTelp', '$kelas')";

if ($conn->query($sql) === TRUE) {
    echo "Data berhasil dikirim!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
