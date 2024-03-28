<!-- Author: Dumar Ruge -->

<?php

// Start session php
session_start();

include '../includes/db.php';

// Check if user is logged in
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
  // Get user email from session
  $email = $_SESSION["email"];

  // Prepare SQL query to retrieve user details
  $sql = "SELECT * FROM users WHERE email = '$email'";
  
  // Execute the query
  $result = mysqli_query($conn, $sql);

  // Check if the query returned any rows
  if (mysqli_num_rows($result) > 0) {
      // Fetch user details 
      $user = mysqli_fetch_assoc($result);
  } else {
      // No rows were returned, handle this case 
      echo "User details not found.";
  }
} else {
  // User is not logged in, handle this case 
  echo "You are not logged in.";
}

// Close the database connection
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="..//css/profile.css" />
  <link href="..//css/jquery-countryselector.min.css" rel="stylesheet" />
  <!-- JQuery CountrySelector CSS -->
  <link href="..//lib/jquery-ui.css" rel="stylesheet" />

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
  <!-- <script src="..//js/profile.js"></script> -->
  <title>Your Profile</title>
</head>

<body>
  <div id="main-container" class="container">
    <div id="img-container" class="child-content"></div>

    <div class="form-container">
      <div class="form-wrapper">
        <div id="user-img">
          <img id="user-img"
            src="https://images.rawpixel.com/image_transparent_png_800/cHJpdmF0ZS9sci9pbWFnZXMvd2Vic2l0ZS8yMDIyLTA0L3BmLWljb240LWppcjIwNjQtcG9yLWwtam9iNzg4LnBuZw.png"
            alt="User Image" />
          <header><?php 
                     
                     echo $user['firstname']." ". $user['lastname'];
                   ?> </header>
        </div>
        <form id="myform" action="../php/profile-form.php" method="post">
          <div class="form">
            <div class="details personal">
              
              <span class="title">Personal Details</span>

              <div class="fields">
                <div class="input-box">
                  <label for="first-name">First Name</label>
                  <input id="first-name" name="first-name" type="text" placeholder="First Name" 
                  value="<?php echo $user['firstname'];?>" required />   
                </div>
                <div class="input-box">
                  <label for="last-name">Last Name</label>
                  <input id="last-name" name="last-name" type="text" placeholder="Last Name" 
                  value="<?php echo $user['lastname']; ?>" required />
                </div>
                
                <div class="input-box">
                  <label for="emailInput">Email</label>
                  <input id="emailInput" name="emailInput" type="text" placeholder="Email"
                  value="<?php echo $user['email']; ?>" readonly />
                </div>
                <div class="input-box">
                  <label for="address">Address</label>
                  <input id="address" name="address" type="text" placeholder="Enter your address"
                  value="<?php echo $user['address']; ?>" required />
                </div>
                <div class="input-box">
                  <label for="phone">Mobile Phone</label>
                  <input type="text" id="phone" name="phone" placeholder="Enter mobile number" 
                  value="<?php echo $user['phone_number']; ?>"/>
                </div>
                <script>
                  $("#myform").validate({
                    rules: {
                      phone: {
                        required: true,
                        number: true,
                        minlength: 10,
                      },
                    },
                  });
                </script>
                <div class="input-box">
                  <label for="gender">Gender</label>
                  <select id="gender" name="gender" id="">
                    <option value="">Select your Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="no">Other</option>
                  </select>
                </div>

                <div class="input-box">
                  <label for="country-selector">Country</label>
                  <!-- JQuery  Country Selector plugin       
                                    https://www.jqueryscript.net/form/Simple-Flexible-jQuery-Country-Select-Box-Plugin-countrySelector.html -->
                  <select id="country-selector" name="country" value="SYC" data-role="country-selector"></select>
                  <!-- Selector Plugin -->
                </div>
                <div class="input-box">
                  <label for="province">Province</label>
                  <input id="province" name="province" type="text" placeholder="Enter Province"
                  value="<?php echo $user['province']; ?>" required />
                </div>
                <div class="input-box">
                  <label for="postal-code">Postal Code</label>
                  <input id="postal-code" name="postal-code" type="text" placeholder="Postal Code" 
                  value="<?php echo $user['postal_code']; ?>" required />
                </div>
              </div>
            </div>
          </div>

          <!-- Script for JQuery CountrySelector -->
          <script src="..//js/jquery.countrySelector.js"></script>

          <div id="save-button"><button type="submit">Update</button></div>
          <!-- <div id="save-button"><button id="button" type="submit" >Upload</button></div>
          <script src="..//lib/jquery.js"></script>
          <script src="..//lib/jquery-ui.js"></script>
          <script>
            $("#button").button();
          </script> -->
        </form>
      </div>
    </div>
  </div>
</body>

</html>