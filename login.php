<?php
session_start();
$masterPassword = 'master123';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $inputPassword = $_POST['masterPassword'];

    if ($inputPassword === $masterPassword) {
        $_SESSION['authenticated'] = true;
        header('Location: main.php');
    } else {
        header('Location: index.html?error=1');
    }
    $hashedMasterPassword = password_hash('master123', PASSWORD_BCRYPT);

// Verify master password
if (password_verify($inputPassword, $hashedMasterPassword)) {
    // Password is correct
}

}
?>

