<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin-login.php");
    exit();
}
include('config.php');

$id = $_GET['id'];

$result = $conn->query("SELECT image FROM acara WHERE id=$id");
$row = $result->fetch_assoc();
$image = $row['image'];
if ($image) {
    unlink("images/" . $image);
}

$sql = "DELETE FROM pelajaran WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: acara-crud.php");
exit();
?>
