<?php
include '../includes/db.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  // Get form data and sanitize it
  $email = mysqli_real_escape_string($conn, $_POST["email"]);
  $password = mysqli_real_escape_string($conn, $_POST["password"]);
  
  // Prepare the SQL query to retrieve the user's data
  $sql = "SELECT * FROM users WHERE email = '$email'";
  
  // Execute the query and get the result
  $result = mysqli_query($conn, $sql);
  
  // Check if the query returned any rows
  if (mysqli_num_rows($result) > 0) {
    
    // Get the user's data from the result
    $row = mysqli_fetch_assoc($result);
    
    // Check if the password is correct
    if (password_verify($password, $row["password"])) {
      // Password is correct, so set a session variable to indicate the user is logged in
      session_start();
      $_SESSION["loggedin"] = true;
      $_SESSION["email"] = $email;
      
      // Redirect the user to a secure page
      header("location: ../html/profile.php");
    } else {
      // Password is incorrect, so show an error message
      echo "Invalid password";
    }
    
  } else {
    // No rows were returned, so the username is not registered
    echo "Invalid username";
  }
}

// Close the database connection
mysqli_close($conn);

?>