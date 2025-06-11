<?php
// Start output buffering to prevent header issues
ob_start();

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contract";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Validate and fetch the ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid ID");
}
$id = intval($_GET['id']);

// Fetch existing record
$sql = "SELECT * FROM information WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if (!$data) {
    die("Record not found.");
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $firstName = $_POST["firstname"];
    $lastName = $_POST["lastname"];
    $mobile = $_POST["mobilenumber"];
    $email = $_POST["email"];
    $address = $_POST["address"];

    $update = $conn->prepare("UPDATE information SET firstname=?, lastname=?, mobilenumber=?, email=?, address=? WHERE id=?");
    $update->bind_param("sssssi", $firstName, $lastName, $mobile, $email, $address, $id);

    if ($update->execute()) {
        // Redirect only if update is successful
        header("Location: view-data.php?updated=true");
        exit();
    } else {
        echo "Update failed: " . $update->error;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Contact</title>
    <style>
        body {
            font-family: Arial;
            margin: 2rem;
            background-color: #f4f4f4;
        }

        form {
            max-width: 500px;
            background: white;
            padding: 20px;
            border-radius: 6px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
        }

        input,
        textarea {
            width: 100%;
            padding: 8px;
            margin-top: 6px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button,
        a.button-link {
            display: inline-block;
            padding: 8px 16px;
            text-decoration: none;
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
        }

        a.button-link {
            background: #ccc;
            margin-left: 8px;
        }
    </style>
</head>

<body>
    <h2>Edit Contact</h2>

    <form method="POST" action="edit.php?id=<?= $id ?>">
        <label>First Name:</label>
        <input type="text" name="firstname" value="<?= htmlspecialchars($data['firstname']) ?>" required>

        <label>Last Name:</label>
        <input type="text" name="lastname" value="<?= htmlspecialchars($data['lastname']) ?>" required>

        <label>Mobile Number:</label>
        <input type="text" name="mobilenumber" value="<?= htmlspecialchars($data['mobilenumber']) ?>" required>

        <label>Email:</label>
        <input type="email" name="email" value="<?= htmlspecialchars($data['email']) ?>" required>

        <label>Address:</label>
        <textarea name="address" required><?= htmlspecialchars($data['address']) ?></textarea>

        <button type="submit">Update</button>
        <a href="view-data.php" class="button-link">Cancel</a>
    </form>
</body>

</html>