<?php
session_start();

if (!isset($_SESSION['authenticated'])) {
    header('Location: index.html');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Manager</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="main-container">
        <h2>Stored Passwords</h2>
        <table id="passwordTable">
            <tr>
                <th>Site Name</th>
                <th>Username</th>
                <th>Password</th>
            </tr>
            <?php include 'fetch_passwords.php'; ?>
        </table>

        <h2>Add New Password</h2>
        <form id="addPasswordForm" action="add_password.php" method="POST">
            <label for="siteName">Site Name:</label>
            <input type="text" id="siteName" name="siteName" required>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="text" id="password" name="password" required>
            <button type="submit">Add Password</button>
        </form>
    </div>

    <script src="scripts.js"></script>
</body>
</html>
