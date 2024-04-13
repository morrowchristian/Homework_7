<?php
$servername = "localhost";
$username = "root";
$password = "101601";
$dbname = "sakila";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("INSERT INTO film (title,description,release_year,language_id,rental_duration,rental_rate,length,replacement_cost,rating,special_features) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssiiididss", $title, $description, $release_year, $language_id, $rental_duration, $rental_rate, $length, $replacement_cost, $rating, $special_features);

$title = $_POST['title'];
$description = $_POST['description'];
$release_year = $_POST['release_year'];
$language_id = $_POST['language_id'];
$rental_duration = $_POST['rental_duration'];
$rental_rate = $_POST['rental_rate'];
$length = $_POST['length'];
$replacement_cost = $_POST['replacement_cost'];
$rating = $_POST['rating'];
$special_features = implode(", ", $_POST['special_features']);

if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Film Result</title>
</head>
<body>
    <br>
    <a href="manager.html"><button>Return to Manager Dashboard</button></a>
</body>
</html>
