<?php
  require "php/db_connection.php";

  // Check if the connection is established
  if ($con) {
    // Update the login status to 'false' for logging out the user
    $query = "UPDATE admin_credentials SET IS_LOGGED_IN = 'false'";
    $result = mysqli_query($con, $query);

    // If the query is successful, log out and redirect to the login page
    if ($result) {
      // You can also clear the session variables if you're using session management
      session_start();
      session_unset();
      session_destroy();

      // Redirect to the login page (adjust the URL based on your actual login page)
      header("Location: login.php");
      exit();
    } else {
      echo "Error during logout. Please try again.";
    }
  } else {
    echo "Failed to connect to the database.";
  }
?>
