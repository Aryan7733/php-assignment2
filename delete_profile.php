<?php
session_start();
require_once("includes/config.php");
require_once("includes/functions.php");

if (!isLoggedIn()) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_SESSION["username"];

    $sql = "DELETE FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);

    if ($stmt->execute()) {
        session_destroy();
        header("Location: login.php");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Profile</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Delete Profile</h1>
    <p>Are you sure you want to delete your profile?</p>
    <form action="" method="post">
        <input type="submit" name="submit" value="Yes, delete my profile">
    </form>
    <a href="profile.php">Cancel</a>
</body>
</html>
