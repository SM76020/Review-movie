<?php
// movie.php
session_start();
require_once 'db_config.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
  header('Location: login.php');
  exit();
}

// Get the movie ID from the URL parameter
$movieId = $_GET['id'] ?? '';

// Fetch movie details from the database
$query = "SELECT * FROM movies WHERE id = $movieId";
$result = mysqli_query($connection, $query);
$movie = mysqli_fetch_assoc($result);

// Fetch reviews for the movie
$reviews = [];
$query = "SELECT * FROM reviews WHERE movie_id = $movieId";
$result = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($result)) {
  $reviews[] = $row;
}

// Handle review form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $rating = $_POST['rating'];
  $review = $_POST['review'];
  
  // Insert review data into the database
  $query = "INSERT INTO reviews (movie_id, user_id, rating, review) VALUES ($movieId, $_SESSION[user_id], $rating, '$review')";
  mysqli_query($connection, $query);
  
  // Redirect to the movie page to see the updated reviews
  header("Location: movie.php?id=$movieId");
  exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Details of <?php echo $movie['title']; ?></title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <style>
    /* Existing styles... */

    /* New styles for separating the movie description and reviews */
    .movie-content {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
    }

    .reviews-content {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    /* New styles to remove margin between review items */
    .review-item:not(:last-child) {
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
<h1 class="movie-title"><?php echo $movie['title']; ?></h1>

<div class="movie-content">
  <p class="movie-description"><?php echo $movie['description']; ?></p>
</div>

<div class="reviews-content">
  <h2 class="section-title">Reviews:</h2>
  <ul class="reviews-list">
    <?php foreach ($reviews as $review): ?>
      <li class="review-item">
        <strong class="review-rating">Rating:</strong> <?php echo $review['rating']; ?>/5<br>
        <strong class="review-label">Review:</strong> <?php echo $review['review']; ?><br>
        <strong class="review-label">User:</strong> <?php echo $review['user_id']; ?>
      </li>
    <?php endforeach; ?>
  </ul>
</div>

<!--<h2 class="section-title">Add a Review:</h2>
<form class="review-form" action="movie.php?id=<?php echo $movieId; ?>" method="post">
  <label for="rating">Rating (1-5):</label>
  <input type="number" id="rating" name="rating" min="1" max="5" required>

  <label for="review">Review:</label>
  <textarea id="review" name="review" required></textarea>

  <button class="submit-button" type="submit">Submit Review</button>
</form> -->

<a href="index.php" class="back-link">Back to Home</a>

</body>
</html>
