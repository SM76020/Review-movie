<?php
// login.php
session_start();
require_once 'db_config.php';

// Check if the user is already logged in
if (isset($_SESSION['user_id'])) {
  header('Location: index.php');
  exit();
}

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];
  
  // Validate username and password (add additional validation as needed)
  $errors = [];
  if (empty($username)) {
    $errors[] = 'Username is required';
  }
  if (empty($password)) {
    $errors[] = 'Password is required';
  }
  
  if (empty($errors)) {
    // Check username and password against the database
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) === 1) {
      // Login successful, store user id in session
      $user = mysqli_fetch_assoc($result);
      $_SESSION['user_id'] = $user['id'];
      
      header('Location: index.php');
      exit();
    } else {
      echo '<script>alert("Invalid username or password, Check and try again.");</script>';
    }
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

  <style>
.login-form {
  max-width: 400px;
  margin: 0 auto;
  background-color: #1bcae9;
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.login-form h2 {
  text-align: center;
  margin-bottom: 20px;
}

.login-form .form-group {
  margin-bottom: 10px;
}

.login-form label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
}

.login-form input {
  width: 100%;
  padding: 5px 10px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

.login-form .form-button {
  padding: 5px 10px;
  font-size: 16px;
  background-color: #4285f4;
  color: #fff;
  border: none;
  border-radius: 3px;
  cursor: pointer;
}

.login-form .form-button:hover {
  background-color: #3367d6;
}

.login-form .form-button:active {
  background-color: #1a3f96;
}

.login-form .form-button:focus {
  outline: none;
  box-shadow: 0 0 0 3px rgba(66, 133, 244, 0.3);
}

.login-form .error-message {
  color: red;
  margin-top: 5px;
}

.login-form .success-message {
  color: green;
  margin-top: 5px;
}
body{
    background-color: #0d6efdb8;
    font-family: var(--bs-body-font-family);
}
body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    header {
      background-color: #333;
      color: #fff;
      padding: 10px;
    }

    main {
      padding: 20px;
    }

    /* Media Query for smartphones and smaller devices */
    @media (max-width: 768px) {
      /* Your mobile styles go here */

      header {
        font-size: 18px;
        padding: 5px;
      }

      main {
        padding: 10px;
      }
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
  <br><br><br>
  <form class="login-form" action="login.php" method="post">
  <h2>Login</h2>
  <div class="form-group">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>
  </div>
  <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
  </div> <br>
  <div class="form-group d-grid">
    <button class="form-button btn btn-primary" type="submit">Login</button>
  </div>
  <p>Don't have an account? <a style="text-decoration:none" href="register.php" id="registerLink">Register</a></p>
</form>
//   <script>
// document.addEventListener('DOMContentLoaded', function() {
//   const registerLink = document.getElementById('registerLink');

//   // Add a click event listener to the "Register" link
//   registerLink.addEventListener('click', function(event) {
//     event.preventDefault(); // Prevent default link behavior (navigating to the href)

//     // Show the alert message
//     alert("Our Registration is temporarily unavailable. Please contact Suman for assistance.");
//   });
// });
// </script>

  
</body>
</html>

