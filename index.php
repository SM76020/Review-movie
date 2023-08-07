<?php
// index.php
session_start();
require_once 'db_config.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
  header('Location: login.php');
  exit();
}

// Fetch the username of the logged-in user
$userID = $_SESSION['user_id'];
$username = ""; // Initialize an empty variable for the username

// Fetch the username from the database
$query = "SELECT username FROM users WHERE id = '$userID'";
$result = mysqli_query($connection, $query);

if ($result && mysqli_num_rows($result) === 1) {
  $user = mysqli_fetch_assoc($result);
  $username = $user['username'];
}

// Fetch all movies from the database
$query = "SELECT * FROM movies";
$result = mysqli_query($connection, $query);
$movies = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<!DOCTYPE html>
<html>
<head>
  <title>Entertainment Review</title>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
  body{
      background-color: #1bcae9;
      text-align: center;
  }
    .movies-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
    }

    .movie {
      width: calc(33.33% - 20px);
      margin-bottom: 20px;
      padding: 10px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .movie h2 {
      margin-top: 10px;
      font-size: 18px;
    }

    .movie a {
      display: block;
      text-align: center;
      margin-top: 10px;
      padding: 8px 16px;
      font-size: 14px;
      background-color: #4285f4;
      color: #fff;
      text-decoration: none;
      border-radius: 3px;
    }

    .movie a:hover {
      background-color: #1a73e8;
    }

    .top-right {
      position: absolute;
      top: 20px;
      right: 20px;
    }

    .logout-button {
      background-color: transparent;
      border: none;
      padding: 0;
      font-size: 14px;
    }

    .logout-button a {
      display: block;
      padding: 16px 20px;
      background-color: #4285f4;
      color: #fff;
      text-decoration: none;
      border-radius: 5px;
    }

    .logout-button a:hover {
      background-color: #1a73e8;
    }

    .center {
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
    }

    @media (max-width: 768px) {
      .movie {
        width: 100%;
      }
      h1{
             margin-top: 60px;
      }
    }
    .top-left {
  position: absolute;
  top: 20px;
  left: 20px;
  color: #fff;


  border-radius: 5px;
  padding: 8px;
  margin-bottom: -10px;
  background-color: #007bff;
}
a{
    color: #fff;
}
a:hover,
button:hover[type="submit"]{
    color: #0dcaf0;
    font-weight: bold;
}
input[name="search"]{
    margin: 10px;
    padding: 10px;
    border-radius: 6px;
}
button[type="submit"]{
    border: none;
}
.details-movie{
    font-size: 26px;

.login-area {
      background-color: #1bcae9;
      text-align: center;
      padding: 10px; /* Add some padding for better spacing */
    }
}
 @media (max-width: 768px) {
      .login-area {
        padding: 20px; /* Increase padding for better spacing on small screens */
      }

      
/* h1{
    background-color: #007bff;
    width: 30%;
    text-align: center;
} */
  </style>
</head>
<body><br>
  <h1>Movie Review Library</h1>
  <div class="top-left">
    <a style="text-decoration:none" href="user_info.php"> <p>Welcome, <?php echo $username; ?> </p></a>
  </div>
<form action="search.php" method="get" align=center>
    <input type="text" name="search" placeholder="Search movies" Required>
    <button type="submit" class="add-movie-button">Search</button>
  </form> <br>
  <div class="center">
    <a style="text-decoration:none" href="add_movie.php" class="add-movie-button">Add New Movie</a>
  </div>
  <br>
  <div class="movies-container">
    <?php foreach ($movies as $movie): ?>
      <div class="movie col-md-4 col-sm-12">
        <a class="details-movie" href="movie.php?id=<?php echo $movie['id']; ?>">
            <p>Details about the Movie</p>
        </a>
        <h2><?php echo $movie['title']; ?></h2>
        <?php if (isset($_SESSION['user_id'])): ?>
          <a href="add_review.php?id=<?php echo $movie['id']; ?>">Add Review</a>
        <?php endif; ?>
      </div>
    <?php endforeach; ?>
  </div>

  <div class="top-right">
    <button class="logout-button"><a href="logout.php">Logout</a></button>
  </div>

</body>
</html>
