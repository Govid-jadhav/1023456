<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contract";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = trim($_POST["firstName"]);
    $lastName = trim($_POST["lastName"]);
    $mobilenumber = trim($_POST["mobilenumber"]);
    $email = trim($_POST["email"]);
    $address = trim($_POST["address"]);

    // Insert using prepared statement
    $stmt = $conn->prepare("INSERT INTO information (firstName, lastName, mobilenumber, email, address) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $firstName, $lastName, $mobilenumber, $email, $address);

    if ($stmt->execute()) {
        // Redirect with success flag
        header("Location: index.php?success=1");
        exit();
    } else {
        echo "Database Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>