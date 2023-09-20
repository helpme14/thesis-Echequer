<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Initialize the answer key array
    $answer_key = array();

    // Loop through each question and get the selected answer
    $all_answers_selected = true;
    for ($i = 1; $i <= 50; $i++) {
        $answer = $_POST["q{$i}"] ?? '';
        if (empty($answer)) {
            $all_answers_selected = false;
            break;
        }

        // Append the answer to the answer key array
        $answer_key[] = $answer;
    }

    if (!$all_answers_selected) {
        echo "<script>alert('Please select an answer for all questions.'); window.location.href='answer_key.php';</script>";
        exit();
    }

    // Store the answer key array in the database
    include '../db.php';

    $answers_str = implode(',', $answer_key);
    $sql_check = "SELECT COUNT(*) as count FROM answer_key";
    $result = mysqli_query($con, $sql_check);
    $row = mysqli_fetch_assoc($result);
    
    if ($row['count'] > 0) {
        // If there is data in the table, update the existing data
        $sql = "UPDATE answer_key SET answers = '$answers_str'";
    } else {
        // If there is no data in the table, insert the new data
        $sql = "INSERT INTO answer_key (answers) VALUES ('$answers_str')";
    }
    
    if (mysqli_query($con, $sql)) {
        // Show alert and redirect to home.php
        echo "<script>alert('All answers have been submitted.'); window.location.href='answer_key.php';</script>";
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
    
    mysqli_close($con);
    
    
}
?>
