<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "health_report";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$age = $_POST['age'];
$weight = $_POST['weight'];
$email = $_POST['email'];
$health_report = $_FILES['health_report']['name'];

// Upload PDF file
$target_dir = "uploads/";
$target_file = $target_dir . $health_report;
if (move_uploaded_file($_FILES['health_report']['tmp_name'], $target_file)) {
  echo "File uploaded successfully";
} else {
  echo "File upload failed";
}

// Insert data into database
$sql = "INSERT INTO health_report (name, age, weight, email, health_report) VALUES ('$name', '$age', '$weight', '$email', '$health_report')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $conn->error;
}

$conn->close();
?>
