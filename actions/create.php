<?php
include '../db.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the form data
  $student_number = $_POST["student_number"];
  $student_name = $_POST["student_name"];

  // Prepare the SQL statement
  $sql = "INSERT INTO students_tbl (student_number, student_name) VALUES (?, ?)";

  // Create a prepared statement
  $stmt = $con->prepare($sql);

  // Bind the parameters to the prepared statement
  $stmt->bind_param("ss", $student_number, $student_name);

  // Execute the prepared statement
  if ($stmt->execute()) {
    echo "Record inserted successfully";
  } else {
    echo "Error inserting record: " . $con->error;
  }

  // Close the prepared statement
  $stmt->close();
}

// Close the database connection
$con->close();
?>
