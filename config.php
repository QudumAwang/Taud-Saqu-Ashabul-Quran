<?php
$servername = "mamberamo.iixcp.rumahweb.net";
$username = "taudasha";
$password = ";D)5jRIL24jg3n";
$dbname = "taudasha_taud";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
