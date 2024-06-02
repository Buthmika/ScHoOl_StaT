<?php
// Start the session
session_start();

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Get the form data
    $username = $_POST['username'];
    $id = $_POST['id'];

    // Dummy data for user validation
    // In a real application, you would query the database to check the user credentials
    $dummy_user = "admin";
    $dummy_id = "12345";

    // Validate the user credentials
    if ($username === $dummy_user && $id === $dummy_id) {
        // Set session variables
        $_SESSION['username'] = $username;
        $_SESSION['id'] = $id;

        // Redirect to a protected page
        header('Location:2.html');
        exit();
    } else {
        // Invalid credentials, redirect back to the login page with an error message
        header('Location: login.php?error=Invalid%20credentials');
        exit();
    }
} else {
    // If the form is not submitted, redirect to the login page
    header('Location: login.php');
    exit();
}
?>
