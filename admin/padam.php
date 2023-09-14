<?php
require '../conn.php';

$idwarden = $_GET['idwarden'];
$warden = $_POST['warden'];
$sql = "DELETE FROM warden WHERE idwarden = $idwarden";
$conn->query($sql);

header('location:index.php?menu=pelajar');