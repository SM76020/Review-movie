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

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the movie details from the form
    $title = $_POST['title'];
    $category = $_POST['category'];
    $release = $_POST['release_date'];
    $language = $_POST['language'];
    $description = $_POST['description'];

    // Prepare and execute an SQL statement to insert the movie details into the database
    $stmt = $conn->prepare("INSERT INTO movies (title, category, release_date, language, description) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $title, $category, $release, $language, $description);
    $stmt->execute();

    // Redirect back to the index page after saving the movie
    header("Location: index.php");
    exit;
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add a New Movie</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
     .container {
    max-width: 500px;
    margin: 0 auto;
    padding: 20px;
}

h1 {
    text-align: center;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

input[type="text"],
textarea {
    width: 97%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}
select[name="category"]{
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}
button[type="submit"] {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.back-link {
    text-align: center;
    margin-top: 20px;
}


form{
    margin-left: 5%;
    max-width: 800px;
    margin: 0 auto;
    background-color: #3486db;
    padding: 40px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  }
.button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    text-decoration: none;
    border-radius: 4px;
}
a{
    color: #fff;
}
a:hover{
    color: #1bcae9;
}

    </style>
</head>
<body>
    <h1>Add a New Movie</h1>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
            <label for="title">Movie Title:</label>
            <input type="text" id="title" name="title" required>
        </div>

        <div class="form-group">
            <label for="category">Category:</label>
                <select id="category" name="category" required>
                    <option value="">Select Category</option>
                    <option value="action">Action</option>
                    <option value="sci-fi">Sci-Fi</option>
                    <option value="horror">Horror</option>
                    <option value="comedy">Comedy</option>
                    <option value="romance">Romance</option>
                    <option value="drama">Drama</option>
                    <option value="adventure">Adventure</option>
        <!-- Add more options as needed -->
                </select>
        </div>

        <div class="form-group">
            <label for="release_date">Release Date:</label>
            <input type="text" id="release_date" name="release_date" required>
        </div>

        <div class="form-group">
            <label for="language">Language:</label>
            <input type="text" id="language" name="language" required>
        </div>

        <div class="form-group">
            <label for="description">Movie Description:</label>
            <textarea id="description" name="description" required></textarea>
        </div>

        <div class="form-group"  align="center">
            <button type="submit">Save Movie</button>
        </div>
    </form>

    <div class="back-link">
        <a class="button" href="index.php">Back to Home</a>
    </div> <br>
</body>

</html>
