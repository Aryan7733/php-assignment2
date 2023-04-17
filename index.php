<?php
session_start();
require_once("includes/functions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Welcome to the User Management System</h1>
    <?php if (isLoggedIn()): ?>
        <p>Welcome back, <?php echo $_SESSION['username']; ?>!</p>
        <a href="profile.php">Go to your profile</a>
        <br>
        <a href="logout.php">Logout</a>
    <?php else: ?>
        <p>Please <a href="login.php">login</a> or <a href="register.php">register</a>.</p>
    <?php endif; ?>
</body>
</html>
