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
    $email = sanitize_input($_POST["email"]);
    $password = sanitize_input($_POST["password"]);

    $sql = "UPDATE users SET email = ?";
    if ($password !== "") {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql .= ", password = ?";
    }
    $sql .= " WHERE username = ?";

    $stmt = $conn->prepare($sql);
    if ($password !== "") {
        $stmt->bind_param("sss", $email, $password, $username);
    } else {
        $stmt->bind_param("ss", $email, $username);
    }

    if ($stmt->execute()) {
        header("Location: profile.php");
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
    <title>Edit Profile</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Edit Profile</h1>
    <form action="" method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <br>
        <label for="password">New Password:</label>
        <input type="password" name="password" id="password">
        <br>
        <input type="submit" name="submit" value="Update">
    </form>
</body>
</html>
