<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chetna_samaj";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
