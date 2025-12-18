<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin-login.php");
    exit();
}
include('config.php');

$id = $_GET['id'];

$sql = "DELETE FROM guru WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: acara-crud.php");
exit();
?>
