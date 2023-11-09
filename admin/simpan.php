<?php
require '../conn.php';

$namawarden = $_POST['namawarden'];
$nokpwarden = $_POST['nokpwarden'];
$kataWarden =  $_POST['kata'];
$warden = $_POST['warden'];

$sql = "INSERT INTO warden VALUES(null, '$namawarden', '$nokpwarden','$kataWarden')";
$conn->query($sql);

header('location: index.php?menu=warden');