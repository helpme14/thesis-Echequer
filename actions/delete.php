<?php
// Conect to database
include '../db.php';

// Check if form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  // Get form data
  $student_number = mysqli_real_escape_string($con, $_POST["student_number"]);

  // Delete data from database
  $sql = "DELETE FROM students_tbl WHERE student_number='$student_number'";
  if(mysqli_query($con, $sql))
  {
    header("location: ../home.php");
  }
  else
  {
    echo "Error: " . mysqli_error($con);
  }
}

// Retrieve data from database
$student_number = mysqli_real_escape_string($con, $_GET["student_number"]);
$sql = "SELECT * FROM students WHERE student_number='$student_number'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

// Close database conection
mysqli_close($con);
?>
