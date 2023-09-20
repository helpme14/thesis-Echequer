<?php
include "db.php";

// Check if the form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
  
  // Retrieve the form data
  $student_name = $_POST["student_name"];
  $student_number = $_POST["student_number"];

  
  // Update the student record in the database
  $sql = "UPDATE students_tbl SET student_name='$student_name' WHERE student_number='$student_number'";
  
  if(mysqli_query($con, $sql)){
    // Redirect back to the main page
    header("Location: home.php");
    exit();
  } else{
    echo "Error updating record: " . mysqli_error($con);
  }
  
}

?>
