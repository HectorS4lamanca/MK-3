<?php
session_start();

require 'conn.php';

$idpengguna = $_POST['idpengguna'];
$katalaluan = $_POST['kata'];

if ($idpengguna == 'admin') {
    $sql = 'SELECT * FROM admin';
    $row = $conn->query($sql)->fetch_object();
    if (password_verify($katalaluan, $row->kata)) {
        $_SESSION['idpengguna'] = 'admin';
        header('location: admin/');
    } else {
        ?>
        <script>
            alert('Maaf, kata laluan salah.');
            window.location = './';
        </script>
        <?php
    }
} else { //warden dulunya staff
    $sql = "SELECT idwarden, kata FROM warden WHERE idwarden = '$idpengguna'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        $row = $result->fetch_object();
        if (password_verify($katalaluan, $row->kata)) {
            $_SESSION['idwarden'] = $row->idwarden;
            header('location: warden/');
        } else {
            ?>
            <script>
                alert('Maaf, kata laluan salah.');
                window.location = './';
            </script>
            <?php
        }
    } else { //pelajar dulunya cust
        $sql = "SELECT idpelajar, kata FROM pelajar WHERE idpelajar = '$idpengguna'";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            $row = $result->fetch_object();
            if (password_verify($katalaluan, $row->kata)) {
                $_SESSION['idpelajar'] = $row->idpelajar;
                header('location: pelajar/');
            } else {
                ?>
                <script>
                    alert('Maaf, kata laluan salah.');
                    window.location = './';
                </script>
                <?php
            }
        } else {
            ?>
            <script>
                alert('Maaf, ID pengguna/kata laluan salah.');
                window.location = './';
            </script>
            <?php
        }
    }
}
?>