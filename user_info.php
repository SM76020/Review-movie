<!DOCTYPE html>
<html>
<head>
    <title>User Information</title>
    <style>
        body {
            background-color: #1bcae9;
            color: white;
            font-family: Arial, sans-serif;
            margin-top: 100px;
        }

        table {
            width: 30%;
            margin: 5px auto;
            border-collapse: collapse;
            border: 2px solid black;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #333;
        }

        form {
            text-align: center;
        }
    .add-movie-button {
      display: inline-block;
      padding: 10px 20px;
      background-color: #007bff;
      color: #fff;
      text-decoration: none;
      border-radius: 4px;
      text-align: center;
      cursor: pointer;
    }
    </style>
</head>
<body>
<?php
// Database connection details
$host = 'sql107.epizy.com';
$username = 'epiz_32608600';
$password = 'mHc11WeNLck';
$dbname = 'epiz_32608600_movier';

// Create a connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<h1 align ="center"> User Information </h1>
<br>
<?php
// Fetch user details from the database
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td><strong>ID:</strong></td>";
        echo "<td>" . $row["id"] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td><strong>Full Name:</strong></td>";
        echo "<td>" . $row["fullname"] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td><strong>Email:</strong></td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td><strong>Username:</strong></td>";
        echo "<td>" . $row["username"] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td><strong>Date of Join:</strong></td>";
        echo "<td>" . $row["dateofjoin"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No users found.";
}

// Close the connection
$conn->close();
?>
<br>
<form>
    <input type="button" class="add-movie-button" value="Go Back" onclick="history.back()">
</form>
</body>
</html>
