<?php
session_start();
if (!isset($_SESSION['admin'])) {
    echo "<script>alert('Harus Login'); window.location.href='index.php';</script>";
    exit();
}
include('config.php');

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM DataSiswa WHERE id=$id") or die($conn->error);
$data = $result->fetch_assoc();

if (isset($_POST['update'])) {
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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 15px 0;
            text-align: center;
        }
        nav a {
            color: #fff;
            text-decoration: none;
            padding: 0 15px;
        }
        nav a:hover {
            text-decoration: underline;
        }
        main {
            padding: 20px;
            max-width: 1000px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
        }
        form {
            margin-bottom: 20px;
        }
        form label {
            display: block;
            margin: 10px 0 5px;
        }
        form input[type="text"],
        form textarea,
        form input[type="file"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        form button {
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            background-color: #28a745;
            color: #fff;
            cursor: pointer;
        }
        form button:hover {
            background-color: #218838;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table th,
        table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        table th {
            background-color: #f2f2f2;
        }
        table img {
            max-width: 100px;
            height: auto;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    
    <header>
        <nav>
            <a href="index.php">Home</a>
            <a href="admin-logout.php">Logout</a>
        </nav>
    </header>
    <main>

<h2>Edit Data Siswa</h2>
<form action="" method="POST">
    Kelas: <input type="text" name="kelas" value="<?php echo $data['kelas']; ?>" required><br>
    Nama: <input type="text" name="nama" value="<?php echo $data['nama']; ?>" required><br>
    Tempat Lahir: <input type="text" name="tempat_lahir" value="<?php echo $data['tempat_lahir']; ?>" required><br>
    Tanggal Lahir: <input type="date" name="tanggal_lahir" value="<?php echo $data['tanggal_lahir']; ?>" required><br>
    Anak Ke: <input type="number" name="anak_ke" value="<?php echo $data['anak_ke']; ?>" required><br>
    Dari: <input type="number" name="dari" value="<?php echo $data['dari']; ?>" required><br>
    Bahasa Daerah: <input type="text" name="bahasa_daerah" value="<?php echo $data['bahasa_daerah']; ?>" required><br>
    Minat/Kecenderungan: <input type="text" name="minat_kecenderungan" value="<?php echo $data['minat_kecenderungan']; ?>" required><br>
    Berat: <input type="number" step="0.01" name="berat" value="<?php echo $data['berat']; ?>" required><br>
    Tinggi: <input type="number" step="0.01" name="tinggi" value="<?php echo $data['tinggi']; ?>" required><br>
    Penyakit: <input type="text" name="penyakit" value="<?php echo $data['penyakit']; ?>" required><br>
    <button type="submit" name="update">Update Data</button>
</form>

<a href="acara-crud.php">Kembali</a>
</main>

</body>
</html>

<?php $conn->close(); ?>
