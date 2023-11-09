<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../include/style.css">
    <title>Senarai Peralatan Elektrik</title>
</head>
<body>
    <h1 class="page-heading">Senarai Peralatan Elektrik</h1>
    <form action="peralatan.php" method="GET" class="search-form">
        <fieldset>
            <legend>Cari Peralatan</legend>
            <label for="nosiri">Number Siri Peralatan:</label>
            <input type="text" name="nosiri" id="nosiri" required>
            <button type="submit" class="button">Search</button>
        </fieldset>
    </form>

    <?php
    $host = 'localhost';
    $user = 'root';
    $pswd = '';
    $dbname = 'penperel';

    $conn = new mysqli($host, $user, $pswd, $dbname);


    if (isset($_GET['nosiri'])) {
        $nosiri = $_GET['nosiri'];
        $sql = "SELECT idperalatan, pelajar, jenisperalatan, jenama, nosiri
                    FROM peralatan
                    WHERE nosiri = '$nosiri'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<div class='result-container'>";
            echo "<h2>Equipment Details:</h2>";
            echo "<table class='result-table'>";
            echo "<tr><th>ID.warden</th><th>Nama warden</th><th>Jenis Peralatan</th><th>Brand</th><th>No.Siri</th></tr>";
            while ($row = $result->fetch_object()) {
                echo "<tr>";
                echo "<td>" . $row->idperalatan . "</td>";
                echo "<td>" . $row->pelajar . "</td>";
                echo "<td>" . $row->jenisperalatan . "</td>";
                echo "<td>" . $row->jenama . "</td>";
                echo "<td>" . $row->nosiri . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "</div>";
        } else {
            echo "<p>No equipment found with the provided serial number.</p>";
        }
    }
    $conn->close();
    ?>
</body>
</html>