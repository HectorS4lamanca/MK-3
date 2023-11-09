<?php
require '../conn.php';
if(!isset($_SESSION['idpengguna'])) header('location: ../');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../include/style.css">
    <title>i-DaftarElektrik</title>
</head>
<body>
    <header>
        <table>
            <tr>    
                <td>i-DaftarElektrik&nbsp;&nbsp;&nbsp;</td>
                <td>
                    <a href="index.php?menu=home" class="menu-button">HOME</a>
                    <a href="index.php?menu=warden" class="menu-button">WARDEN</a>
                    <a href="index.php?menu=peralatan" class="menu-button">PERALATAN</a>
                    <a href="../logout.php" class="menu-button">LOGOUT</a>
                </td>
            </tr>
        </table>
    </header>

    <?php
    $menu = 'home'; 
    if(isset($_GET['menu'])){
        $menu=$_GET['menu'];
    }
    include "$menu.php";
    ?>
</body>
</html>
