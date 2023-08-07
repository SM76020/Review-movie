<?php
// add_review.php
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

// Fetch previous reviews for the movie
$reviewsQuery = "SELECT * FROM reviews WHERE movie_id = $movieId";
$reviewsResult = mysqli_query($connection, $reviewsQuery);
$reviews = mysqli_fetch_all($reviewsResult, MYSQLI_ASSOC);

// Handle review form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $rating = $_POST['rating'];
  $review = $_POST['review'];
  
  // Insert review data into the database
  $insertQuery = "INSERT INTO reviews (movie_id, user_id, rating, review) VALUES ($movieId, $_SESSION[user_id], $rating, '$review')";
  mysqli_query($connection, $insertQuery);
  
  // Redirect to the movie page to see the updated reviews
  header("Location: movie.php?id=$movieId");
  exit();
}
?>
<style>
.page-title {
  text-align: center;
  margin: 20px 0;
  font-size: 24px;
}

.section-title {
  font-size: 20px;
  margin-bottom: 10px;
}

.reviews-list {
  list-style-type: none;
  padding: 0;
}

.review-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 5px;
}

.review-rating {
  font-weight: bold;
}

.review-user {
  color: #777;
}

.review-text {
  margin: 0;
  padding: 0;
}

.review-form label {
  display: block;
  margin-bottom: 10px;
  font-weight: bold;
}

.review-form input[type="number"],
.review-form textarea {
  width: 100%;
  padding: 8px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

.review-form button[type="submit"] {
  padding: 10px 20px;
  font-size: 16px;
  background-color: #4285f4;
  color: #fff;
  border: none;
  border-radius: 3px;
  cursor: pointer;
}

.review-form button[type="submit"]:hover {
  background-color: #1a73e8;
}

.back-link {
  display: block;
  text-align: center;
  margin-top: 20px;
  color: #777;
  text-decoration: none;
}
body{
    width: 50%;
    margin-left: 350px;
}
</style>
<!DOCTYPE html>
<html>
<head>
  <title>Add Review</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1 class="page-title">Add Review for <?php echo $movie['title']; ?></h1>

<h2 class="section-title">Previous Reviews:</h2>
<?php if (empty($reviews)): ?>
  <p>No reviews yet.</p>
<?php else: ?>
  <ul class="reviews-list">
    <?php foreach ($reviews as $review): ?>
      <li>
        <div class="review-header">
          <span class="review-rating">Rating: <?php echo $review['rating']; ?>/5</span>
          <span class="review-user">User: <?php echo $review['user_id']; ?></span>
        </div>
        <p class="review-text"><?php echo $review['review']; ?></p>
      </li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>

<form class="review-form" action="add_review.php?id=<?php echo $movieId; ?>" method="post">
  <label for="rating">Rating (1-5):</label>
  <input type="number" id="rating" name="rating" min="1" max="5" required>

  <label for="review">Review:</label>
  <textarea id="review" name="review" required></textarea>
    <br>
  <button class="submit-button" type="submit">Submit Review</button>
</form>

<a href="index.php" class="back-link">Back to Home</a>

</body>
</html>
