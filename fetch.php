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

// Get email ID
$email = $_GET['email'];

// Fetch health report
$sql = "SELECT health_report FROM health_report WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // File exists
  $row = $result->fetch_assoc();
  $health_report = $row['health_report'];
  echo $health_report;
} else {
  // File does not exist
  echo "File not found";
}

$conn->close();
?>
