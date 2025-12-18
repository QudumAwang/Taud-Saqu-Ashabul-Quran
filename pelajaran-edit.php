<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin-login.php");
    exit();
}
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $namaPelajaran = $_POST['namaPelajaran'];
    $deskripsi = $_POST['deskripsi'];

    
    if ($_FILES['image']['name']) {
        $image = $_FILES['image']['name'];
        $target = "images/" . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
        $sql = "UPDATE pelajaran SET namaPelajaran=?, deskripsi=?, image=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $namaPelajaran, $deskripsi, $image, $id);
    } else {
        
        $sql = "UPDATE pelajaran SET nama=?, deskripsi=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $namaPelajaran, $deskripsi, $id);
    }
    $stmt->execute();
    header("Location: acara-crud.php");
    exit();
}

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM pelajaran WHERE id=$id");
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
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
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Acara</title>
    <link href="assets/css/main.css" rel="stylesheet">
</head>
<body>
    <header>
        <nav>
            <a href="index.php">Home</a>
            <a href="admin-logout.php">Logout</a>
        </nav>
    </header>
    <main>
        <h1>Edit pelajaran</h1>
        <form action="pelajaran-edit.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label for="namaPelajaran">Nama</label>
            <input type="text" id="namaPelajaran" name="namaPelajaran" value="<?php echo $row['namaPelajaran']; ?>" required>
            <label for="deskripsi">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" required><?php echo $row['deskripsi']; ?></textarea>
            <label for="image">Image (Leave blank to keep current image)</label>
            <input type="file" id="image" name="image" accept="image/*">
            <button type="submit">Update Pelajaran</button>
        </form>
    </main>
</body>
</html>
