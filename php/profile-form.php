<?php
include '../includes/db.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  

  
  // Get form data and sanitize it
  
  $email = mysqli_real_escape_string($conn, $_POST["emailInput"]);
  $first_name = mysqli_real_escape_string($conn, $_POST["first-name"]);
  $last_name = mysqli_real_escape_string($conn, $_POST["last-name"]);
  $address = mysqli_real_escape_string($conn, $_POST["address"]);
  $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
  $gender = mysqli_real_escape_string($conn, $_POST["gender"]);
  $country = mysqli_real_escape_string($conn, $_POST["country"]);
  $province = mysqli_real_escape_string($conn, $_POST["province"]);
  $postal_code = mysqli_real_escape_string($conn, $_POST["postal-code"]);




  
  echo "<script>console.log('email: " . $email. "' );</script>";
  echo "<script>console.log('fisrt name: " . $first_name. "' );</script>";
  echo "<script>console.log('last_name: " . $last_name. "' );</script>";
  echo "<script>console.log('address: " . $address. "' );</script>";
  echo "<script>console.log('phone: " . $phone. "' );</script>";
  echo "<script>console.log('gender: " . $gender. "' );</script>";
  echo "<script>console.log('country: " . $country. "' );</script>";
  echo "<script>console.log('province: " . $province. "' );</script>";
  echo "<script>console.log('postal_code: " . $postal_code. "' );</script>";

  
  
  // Prepare the SQL query to update the user's data
  $sql = "UPDATE users SET firstname = '$first_name', lastname = '$last_name', address ='$address', 
  phone_number ='$phone', country = '$country', province = '$province', postal_code = '$postal_code',
  gender = '$gender'  WHERE email = '$email'";

// Execute the query and get the result
  $result = mysqli_query($conn, $sql);
  

  // Check if the query returned data
  if ($result){

    echo "<script>console.log('update was executed' );</script>";
    // header("location: ../html/test.html");

  } else {
    // No row updated
    echo "Error updating record:  " . $sql . "<br>" . mysqli_error($conn);
  }

    
}

// Close the database connection
mysqli_close($conn);

?>