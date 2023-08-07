<?php
// search.php
session_start();
require_once 'db_config.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
  header('Location: login.php');
  exit();
}

// Get the search query
$search = $_GET['search'] ?? '';

// Fetch movies from the database based on the search query
$movies = [];
$query = "SELECT * FROM movies WHERE title LIKE '%$search%'";
$result = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($result)) {
  $movies[] = $row;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Search</title>

  <style>
        body {
            background-color: #1bcae9;
            color: white;
            font-family: Arial, sans-serif;
            text-align: center;
        }

        h1 {
            margin-top: 50px;
        }

        form {
            margin-top: 20px;
        }

        input[type="text"] {
            padding: 10px;
            font-size: 15px;
            width: 250px;
        }

        button[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }

        .movies-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 20px;
        }

        .movie {
            width: 200px;
            padding: 10px;
            margin: 10px;
            background-color: #007bff;
            border-radius: 5px;
        }

        .movie a {
            color: white;
            text-decoration: none;
        }

        .movie h2 {
            margin-top: 10px;
        }

        a {
            display: block;
            margin-top: 20px;
            color: white;
            text-decoration: none;
        }
  </style>
</head>
<body>
  <h1>Search</h1>
  
  <form action="search.php" method="get">
    <input type="text" name="search" placeholder="Search movies" value="<?php echo $search; ?>">
    <button type="submit">Search</button>
  </form>
  
  <div class="movies-container">
    <?php foreach ($movies as $movie): ?>
      <div class="movie">
        <a href="movie.php?id=<?php echo $movie['id']; ?>">
    
        </a>
        <h2><?php echo $movie['title']; ?></h2>
      </div>
    <?php endforeach; ?>
  </div>
  
  <a href="index.php">Back to Home</a>
</body>
</html>
