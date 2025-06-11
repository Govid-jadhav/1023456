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

// Fetch all records
$sql = "SELECT * FROM information";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Manage Submissions</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 2rem;
            background-color: #f4f4f4;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
        }

        th,
        td {
            padding: 0.75rem;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f0f0f0;
        }

        a.btn {
            padding: 0.4rem 0.8rem;
            text-decoration: none;
            border-radius: 4px;
            font-size: 0.9rem;
        }

        .edit-btn {
            background-color: #4CAF50;
            color: white;
        }

        .delete-btn {
            background-color: #f44336;
            color: white;
        }

        h2 {
            text-align: center;
        }
    </style>
</head>

<body>

    <h2>Manage Contact Submissions</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>First</th>
                <th>Last</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result && $result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row["id"]) ?></td>
                        <td><?= htmlspecialchars($row["firstname"]) ?></td>
                        <td><?= htmlspecialchars($row["lastname"]) ?></td>
                        <td><?= htmlspecialchars($row["mobilenumber"]) ?></td>
                        <td><?= htmlspecialchars($row["email"]) ?></td>
                        <td><?= htmlspecialchars($row["address"]) ?></td>
                        <td>
                            <a href="edit.php?id=<?= $row['id'] ?>" class="btn edit-btn">Edit</a>
                            <a href="delete.php?id=<?= $row['id'] ?>" class="btn delete-btn"
                                onclick="return confirm('Are you sure you want to delete this entry?')">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" style="text-align:center;">No data found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <?php $conn->close(); ?>
</body>

</html>