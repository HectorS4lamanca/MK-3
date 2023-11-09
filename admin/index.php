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
    <title>i-DaftarElektrik</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #007bff;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }

        .menu {
            text-align: center;
            padding: 10px 0;
        }

        .menu-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            margin: 0 10px;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .menu-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header>
        <table>
            <tr>    
                <td>i-DaftarElektrik&nbsp;&nbsp;&nbsp;</td>
                <td>
                    <a href="index.php?menu=home" class="menu-button">HOME</a>
                    <a href="index.php?menu=pelajar" class="menu-button">WARDEN</a>
                    <a href="index.php?menu=peralatan" class="menu-button">PERALATAN</a>
                    <a href="index.php?menu=pass" class="menu-button">RESET PASSWORD</a>
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
