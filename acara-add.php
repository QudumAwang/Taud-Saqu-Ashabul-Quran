<?php
session_start();
if (!isset($_SESSION['admin'])) {
    echo "<script>alert('Harus Login'); window.location.href='index.php';</script>";
    exit();
}
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengecek jumlah data yang sudah ada di database
    $result = $conn->query("SELECT COUNT(*) as count FROM acara");
    $row = $result->fetch_assoc();
    $currentCount = $row['count'];
    $maxLimit = 10;

    if ($currentCount >= $maxLimit) {
        // Jika jumlah data sudah mencapai batas, beri tahu pengguna dan hentikan eksekusi
        echo "<script>alert('Batas maksimal data acara sudah tercapai.'); window.location.href='acara-crud.php';</script>";
        exit();
    }
    
    $namaAcara = $_POST['namaAcara'];
    $deskripsi = $_POST['deskripsi'];
    
    
    $image = $_FILES['image']['name'];
    $target = "images/" . basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target);

    $sql = "INSERT INTO acara (namaAcara, deskripsi, image) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $namaAcara, $deskripsi, $image);
    $stmt->execute();

    header("Location: acara-crud.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Acara</title>
    <link href="assets/css/main.css" rel="stylesheet">
</head>

<body>
    <div>
    <header>
        <nav>
            <a href="index.php">Home</a>
            <a href="admin-dashboard.php">Dashboard</a>
            <a href="admin-logout.php">Logout</a>
        </nav>
    </header>
    </div>
    <main>
        <h1>Tambah Acara</h1>
        <form action="acara-add.php" method="POST" enctype="multipart/form-data">
            <label for="namaAcara">Judul:</label>
            <input type="text" id="namaAcara" name="namaAcara" required>
            <label for="deskripsi">Deskripsi:</label>
            <textarea id="deskripsi" name="deskripsi" required></textarea>
            <label for="image">Image:</label>
            <input type="file" id="image" name="image" accept="image/*" required>
            <button type="submit">Tambah Acara</button>
        </form>
    </main>
</body>
</html>
