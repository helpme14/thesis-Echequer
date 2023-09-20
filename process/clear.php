<?php
include '../db.php';
if(isset($_POST['clear'])) {
    $sql = "DELETE FROM students_tbl";
    mysqli_query($con, $sql);
}
?>