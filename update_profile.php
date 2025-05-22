<?php
require "db_connection.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $username = trim($_POST["username"]);
  $password = trim($_POST["password"]);

  if ($username === "" || $password === "") {
    echo "Username and password cannot be empty.";
    exit;
  }

  // Optional: sanitize input to prevent SQL injection (safer with prepared statements)
  $username = mysqli_real_escape_string($con, $username);
  $password = mysqli_real_escape_string($con, $password);

  // Update only the first admin row
  $query = "UPDATE admin_credentials SET USERNAME = '$username', PASSWORD = '$password' LIMIT 1";
  $result = mysqli_query($con, $query);

  if ($result) {
    echo "Username and password updated successfully.";
  } else {
    echo "Failed to update. Please try again.";
  }
}
?>
