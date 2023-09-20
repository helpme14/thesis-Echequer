<?php
session_start();
include('../db.php');

require 'vendor/autoload.php';

if(isset($_POST['save_excel_data']))
{
    $fileName = $_FILES['import_file']['name'];
    $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);

    $allowed_ext = ['xls','csv','xlsx'];

    if(in_array($file_ext, $allowed_ext))
    {
        $inputFileNamePath = $_FILES['import_file']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
        $data = $spreadsheet->getActiveSheet()->toArray();

        $count = "0";
        $added = 0;
        foreach($data as $row)
        {
            if($count > 0)
            {
                $student_number = $row['0'];
                $student_name = $row['1'];

                // Check if the student with the same student number and name already exists
                $existingStudentQuery = "SELECT * FROM students_tbl WHERE Student_Number='$student_number' AND Student_Name='$student_name'";
                $result = mysqli_query($con, $existingStudentQuery);
                if(mysqli_num_rows($result) == 0) // if not found, insert new student
                {
                    $studentQuery = "INSERT INTO students_tbl(Student_Number,Student_Name) VALUES ('$student_number','$student_name')";
                    mysqli_query($con, $studentQuery);
                    $added++;
                }
            }
            else
            {
                $count = "1";
            }
        }

        if($added > 0)
        {
            $_SESSION['message'] = "Successfully Imported $added new students.";
            header('Location: ../home.php');
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "No new students imported.";
            header('Location: ../home.php');
            exit(0);
        }
    }
    else
    {
        $_SESSION['message'] = "Invalid File";
        header('Location: ../home.php');
        exit(0);
    }
}
?>
