<?php
$host = 'sql107.epizy.com';
$username = 'epiz_32608600';
$db_password = 'mHc11WeNLck';
$dbname = 'epiz_32608600_movier';

// Create a connection
$conn = new mysqli($host, $username, $db_password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$errors = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve user registration details
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $user_password = $_POST['password']; // Renamed the variable to avoid conflicts

    // Validate and sanitize user inputs (added for security)
    $fullname = htmlspecialchars($fullname);
    $email = htmlspecialchars($email);
    $username = htmlspecialchars($username);
    $user_password = htmlspecialchars($user_password);

    // Insert the user details into the database
    $sql = $conn->prepare("INSERT INTO users (fullname, email, username, password) VALUES (?, ?, ?, ?)");
    $sql->bind_param("ssss", $fullname, $email, $username, $user_password);
    $sql->execute();

    if ($sql) {
      echo '<script>alert("Registration Successful.");</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>


<!DOCTYPE html>
<html>
<head>
  <title>Register Yourself</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <style>
    .register-form {
      max-width: 300px;
      margin: 0 auto 0;
      background-color: #1bcae9;
      padding: 50px;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .register-form label {
      display: block;
      margin-bottom: 10px;
      font-weight: bold;
    }

    .register-form input[type="text"],
    .register-form input[type="email"],
    .register-form input[type="password"] {
      width: 96%;
      padding: 5px;
      font-size: 15px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }

    .register-form button[type="submit"] {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      background-color: #4285f4;
      color: #fff;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }
    h1{
        margin-top: -10px;
    }
    .register-form button[type="submit"]:hover {
      background-color: #1a73e8;
    }
    body {
        background-color: #0d6efdb8;
        margin-top: 30px;
    }
  </style>
</head>
<body>
<?php if (!empty($errors)): ?>
    <div class="error">
        <?php foreach ($errors as $error): ?>
            <p><?php echo $error; ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
  <form class="register-form" action="register.php" method="post">
    <h1>Register</h1>
    <br>
    <label for="fullname">Full Name:</label>
    <input type="text" id="fullname" name="fullname" required>
    <br><br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <br><br>
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>
    <br><br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <br><br>
    <button type="submit">Register</button>
    <br>
    <p>Already have an account? <a style="text-decoration:none" href="login.php">Login</a></p>
  </form>
</body>
</html>
