<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Change Password</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="shortcut icon" href="" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/sidenav.css">
    <link rel="stylesheet" href="css/home.css">
    <script src="js/validateForm.js"></script>
    <script src="js/my_profile.js"></script>
    <script src="js/restrict.js"></script>

    <script>
      function changePassword() {
        // Get the values of the input fields
        var oldPassword = document.getElementById('old_password').value;
        var newPassword = document.getElementById('password').value;
        var confirmPassword = document.getElementById('confirm_password').value;

        // Validate the fields before sending the request
        if (oldPassword == "" || newPassword == "" || confirmPassword == "") {
          alert("Please fill in all fields.");
          return;
        }

        if (newPassword !== confirmPassword) {
          alert("New passwords do not match!");
          return;
        }

        // Use AJAX to submit the data to the PHP script for password change
        $.ajax({
          url: 'change_password.php',  // PHP script to handle the change password logic
          type: 'POST',
          data: {
            old_password: oldPassword,
            new_password: newPassword
          },
          success: function(response) {
            alert(response);  // Display the response from PHP
          },
          error: function() {
            alert("Error in password change!");
          }
        });
      }
    </script>
  </head>
  <body>
    <!-- including side navigations -->
    <?php include("sections/sidenav.html"); ?>
    <div class="container-fluid">
      <div class="container">
        <!-- header section -->
        <?php
          require "php/header.php";
          createHeader('key', 'Change Password', 'Set New Password');
          // header section end
        ?>
        <div class="row">
          <div class="col-md-6">

            <div class="form-group">
              <label class="font-weight-bold" for="old_password">Old Password :</label>
              <input id="old_password" type="text" class="form-control" placeholder="Old password" required>
            </div>

            <div class="form-group">
              <label class="font-weight-bold" for="password">New Password :</label>
              <input id="password" type="text" class="form-control" placeholder="New password" required>
            </div>

            <div class="form-group">
              <label class="font-weight-bold" for="confirm_password">Confirm New Password :</label>
              <input id="confirm_password" type="password" class="form-control" placeholder="Confirm new password" required>
            </div>

            <div class="form-group text-right">
              <button class="btn btn-warning" onclick="changePassword();">Reset Password</button>
            </div>

            <div class="form-group text-right">
              <a href="my_profile.php" class="btn btn-primary">Profile</a>
            </div>

          </div>
        </div>
        <hr style="border-top: 2px solid #ff5252;">
      </div>
    </div>
  </body>
</html>
