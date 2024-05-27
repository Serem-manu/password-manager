<?php
session_start();

if (!isset($_SESSION['authenticated'])) {
    header('Location: index.html');
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "password_manager";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $siteName = $_POST['siteName'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("INSERT INTO passwords (site_name, username, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $siteName, $username, $password);

    if ($stmt->execute()) {
        header('Location: main.php');
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
