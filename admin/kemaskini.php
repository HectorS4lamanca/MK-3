<?php
require '../conn.php';

if (isset($_POST['idwarden'], $_POST['namawarden'], $_POST['nokpwarden'], $_POST['kata'])) {
    $idwarden = $_POST['idwarden'];
    $namawarden = $_POST['namawarden'];
    $nokpwarden = $_POST['nokpwarden'];
    $kata = $_POST['kata'];

    $sql = "UPDATE warden
            SET namawarden = ?, nokpwarden = ?, kata = ?
            WHERE idwarden = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $namawarden, $nokpwarden, $kata, $idwarden);

    if ($stmt->execute()) {
        header('location: index.php?menu=warden');
    } else {
        echo "Update failed: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Missing POST data.";
}