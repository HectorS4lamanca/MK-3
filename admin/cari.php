<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
require '../conn.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $search_term = $_POST["nosiri"];
    $sql = "SELECT * FROM peralatan WHERE nosiri = '$search_term'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $bil = 1;
        ?>
        <table class="table">
            <tr>
                <th>Bil</th>
                <th>Nama warden</th>
                <th>Jenis Peralatan</th>
                <th>Jenama</th>
                <th>No Siri</th>
            </tr>
            <?php
            while ($row = $result->fetch_object()) {
                ?>
                <tr>
                    <td><?php echo $bil++; ?></td>
                    <td><?php echo $row->warden; ?></td>
                    <td><?php echo $row->jenisperalatan; ?></td>
                    <td><?php echo $row->jenama; ?></td>
                    <td><?php echo $row->nosiri; ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
        <?php
    } else {
        echo "Tiada rekod ditemui.";
    }
}
?>
</body>
</html>
