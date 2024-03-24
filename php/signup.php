<?php
include '../includes/db.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  // Get form data and sanitize it
  $firstname = mysqli_real_escape_string($conn, $_POST["firstname"]);
  $lastname = mysqli_real_escape_string($conn, $_POST["lastname"]);
  $username = mysqli_real_escape_string($conn, $_POST["email"]);
  $password = mysqli_real_escape_string($conn, $_POST["password"]);
  
  // Hash the password using bcrypt
  $hashed_password = password_hash($password, PASSWORD_BCRYPT);
  
  // Prepare the SQL query to insert the data into the database
  $sql = "INSERT INTO users (firstname, lastname, email, password)
          VALUES ('$firstname', '$lastname', '$username', '$hashed_password')";
  
  // Execute the query and check for errors
  if (mysqli_query($conn, $sql)) {
    header("Location:../html/profile.html");
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

// Close the database connection
mysqli_close($conn);

?>