<?php

session_start();

if (!isset($_SESSION['username']) || !isset($_SESSION['id'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
    <p>You are logged in with ID: <?php echo htmlspecialchars($_SESSION['id']); ?></p>
    <a href="logout.php">Logout</a>
</body>
</html>
