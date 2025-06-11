<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contract";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error)
    die("Connection failed: " . $conn->connect_error);

// Delete record by ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM information WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: index.php?deleted=true");
        exit();
    } else {
        echo "Delete failed: " . $stmt->error;
    }
} else {
    echo "No ID specified.";
}
?>