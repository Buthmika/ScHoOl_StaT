<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "School_Stat"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $conn->real_escape_string($_POST['firstName']);
    $lastName = $conn->real_escape_string($_POST['lastName']);
    $email = $conn->real_escape_string($_POST['email']);
    $username = $conn->real_escape_string($_POST['username']);
    $id = $conn->real_escape_string($_POST['id']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $password = $conn->real_escape_string($_POST['password']);
    $confirmPassword = $conn->real_escape_string($_POST['confirmPassword']);

    if ($password !== $confirmPassword) {
        die("Passwords do not match.");
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (first_name, last_name, email,username, id_index, phone, password)
            VALUES ('$firstName', '$lastName', '$email','$username', '$id', '$phone', '$hashedPassword')";

    if ($conn->query($sql) === TRUE) {
        header('Location:index.html');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
