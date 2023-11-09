<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="../penperel/style.css">
</head>
<body>
    <div class="container">
        <h1>Sistem Pendaftaran Peralatan Elektrik</h1>
        <h3>Log Masuk</h3>
        <form action="login.php" method="post">
            <label for="idpengguna">ID:</label>
            <input type="text" name="idpengguna" id="idpengguna" required><br><br>
            <label for="kata">Kata Laluan:</label>
            <input type="password" name="kata" id="kata" required><br><br>
            <button type="submit">MASUK</button>
        </form>
    </div>
</body>
</html>