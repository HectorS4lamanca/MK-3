<?php
if (!isset($_SESSION['idpengguna'])) {
    header('location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newPassword = $_POST['new_password'];
    $confirmNewPassword = $_POST['confirm_new_password'];

    // Check if the new password and confirm new password match
    if ($newPassword === $confirmNewPassword) {
        // Establish a database connection (replace with your database credentials)
        $servername = "localhost";
        $username = "your_username";
        $password = "your_password";
        $database = "penperel";

        $conn = new mysqli($servername, $username, $password, $database);

        // Check the database connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare the SQL statement
        $updateSql = "UPDATE penperel SET katal = ? WHERE idpelajar = ?";

        if ($stmt = $conn->prepare($updateSql)) {
            // Bind the parameters and execute the query
            $stmt->bind_param("si", $newPasswordHash, $idpengguna);
            $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);
            $idpengguna = $_SESSION['idpengguna'];

            if ($stmt->execute()) {
                // Redirect to a success page or display a success message
                header('location: password_change_success.php');
                exit();
            } else {
                $error = 'Password update failed.';
            }

            // Close the prepared statement
            $stmt->close();
        } else {
            $error = 'Database error: Unable to prepare statement.';
        }

        // Close the database connection
        $conn->close();
    } else {
        $error = 'New password and confirm new password do not match.';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
</head>
<body>
    <h1>Change Password</h1>
    <?php if (isset($error)) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>

    <form method="POST" action="">
        <label for="new_password">New Password:</label>
        <input type="password" id="new_password" name="new_password" required><br>

        <label for="confirm_new_password">Confirm New Password:</label>
        <input type="password" id="confirm_new_password" name="confirm_new_password" required><br>

        <button type="submit">Change Password</button>
    </form>
</body>
</html>
        