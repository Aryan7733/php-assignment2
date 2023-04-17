<?php
session_start();
require_once("includes/functions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Profile</h1>
    <?php if (isLoggedIn()): ?>
        <p>Welcome, <?php echo $_SESSION['username']; ?>!</p>
        <a href="edit_profile.php">Edit Profile</a>
        <br>
        <a href="logout.php">Logout</a>
    <?php else: ?>
        <p>Please <a href="login.php">login</a> to view your profile.</p>
    <?php endif; ?>
</body>
</html>
