<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senarai Peralatan Elektrik</title>
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
        .page-heading {
            text-align: center;
            color: #333;
            margin-top: 20px;
        }

        .search-form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        .search-form legend {
            font-weight: bold;
            font-size: 18px;
        }

        .result-container {
            margin-top: 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        .result-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .result-table th,
        .result-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .result-table th {
            background-color: #007bff;
            color: #fff;
        }

        .result-table tr:nth-child(even) {
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

        .button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            margin-right: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .button:hover {
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
            echo "<tr><th>ID.Pelajar</th><th>Nama Pelajar</th><th>Jenis Peralatan</th><th>Brand</th><th>No.Siri</th></tr>";
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