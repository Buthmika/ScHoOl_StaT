<?php
if (isset($_POST["submit"])) {
    // Form handling logic here
    // Example: process form data, save to database, etc.
} else {
    header('Location: /login.php');
    exit(); // Ensures the script stops executing after the redirect
}
?>
