<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warden</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-top: 20px;
        }
        header {
            background-color: #007bff;
            color: #fff;
            padding: 0px 0;
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

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        form legend {
            font-weight: bold;
            font-size: 18px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        table th {
            background-color: #007bff;
            color: #fff;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .table-actions a {
            color: #007bff;
            text-decoration: none;
            margin-right: 10px;
        }

        .table-actions a:hover {
            text-decoration: underline;
        }

        .button-container {
            text-align: center;
            margin-top: 20px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            margin-right: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .button-container a {
            text-decoration: none;
            color: #007bff;
        }

        .button-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <h2>Senarai Warden</h2>

    <?php
    if(!isset($_GET['edit'])){
        ?>
        <form action="simpan.php" method="post">
            <fieldset>
                <legend>Daftar Warden</legend>
                <table>
                    <tr>
                        <td>Nama Warden</td>
                        <td><input type="text" name="namawarden" required minlength="5" maxlength="50"></td>
                    </tr>
                    <tr>
                        <td>No KP Warden</td>
                        <td><input type="text" name="nokpwarden" required maxlength="12"></td>
                    </tr>
                    <tr>
                        <td>Kata Laluan</td>
                        <td><input type="password" name="kata" required></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="button-container">
                            <button type="submit">SIMPAN</button>
                            <button type="reset">BATAL</button>
                        </td>
                    </tr>
                </table>
            </fieldset>
        </form>
        <?php
    } else {
       
        if (isset($_GET['edit'])) {
            $idwarden = $_GET['edit'];
            $sql = "SELECT * FROM warden WHERE idwarden = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $idwarden);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $stmt->close();
        } else {
            echo "No record selected for editing.";
            exit();
        }
        ?>
        
        <form action="kemaskini.php" method="post">
            <input type="hidden" name="idwarden" value="<?php echo $row['idwarden']; ?>">
            <fieldset>
                <legend>Kemaskini Data Warden</legend>
                <table>
                    <tr>
                        <td>Nama Warden</td>
                        <td><input type="text" name="namawarden" required value="<?php echo $row['namawarden']; ?>"></td>
                    </tr>
                    <tr>
                        <td>No.KP Warden</td>
                        <td><input type="text" name="nokpwarden" required value="<?php echo $row['nokpwarden']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Kata Laluan</td>
                        <td><input type="password" name="kata" required value="<?php echo $row['kata']; ?>"></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="button-container">
                            <button type="submit">SIMPAN</button>
                            <button type="reset">BATAL</button>
                        </td>
                    </tr>
                </table>
            </fieldset>
        </form>
        <?php
    }
    ?>
<br><br>
<h1><center>Senarai Warden</h1>
    <table class="table">
        <tr>
            <th>Id</th>
            <th>Nama Warden</th>
            <th>No.KP Warden</th>
            <th>Kemaskini</th>
        </tr>
        <?php
        $sql = "SELECT * FROM warden ORDER BY idwarden";
        $result = $conn->query($sql);
        while ($row = $result->fetch_object()) {
            ?>
            <tr>
                <td><?php echo $row->idwarden;?></td>
                <td><?php echo $row->namawarden; ?></td>
                <td><?php echo $row->nokpwarden; ?></td>
                <td class="table-actions">
                    <a href="index.php?menu=pelajar&edit=<?php echo $row->idwarden; ?>">Edit</a>
                    <a href="padam.php?idwarden=<?php echo $row->idwarden; ?>" onclick="return sahkan()">Padam</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
    <br><br><br>
    <br><br><br><br><br><br>
    <script>
        function sahkan() {
            return confirm('Adakah anda pasti?');
        }
    </script>
</body>
</html>



