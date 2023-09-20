<?php
require_once('ans_sheet_gen/fpdf/fpdf.php');

// Connect to the database
include '../db.php';

// Get the student names and numbers from the database
$sql = "SELECT student_name FROM students_tbl"; // Replace "students_tbl" with the actual table name
$result = mysqli_query($con, $sql);

if (!$result || mysqli_num_rows($result) == 0) {
    echo '<script type="text/javascript">';
    echo 'alert("No results found.");';
    echo 'window.location.href="../home.php";';
    echo '</script>';
}
// Create a new PDF document    
$pdf = new FPDF('P', 'mm', 'A5');
$pdf->AddPage();

// Loop through the student names and numbers and generate a QR code for each one
while ($row = mysqli_fetch_assoc($result)) {
    // Get the student name and number from the current row
    $student_name = $row['student_name'];

    // Set the coordinates where you want to write the text and QR code
    $name_x = 300;
    $name_y = 1124;
    $qr_x = 465;
    $qr_y = 70;

    // Load the answer sheet image
    $image = imagecreatefrompng("ans_sheet_gen/answer_sheet_official.png");

    // Set the font size and color
    $font_size = 14;
    $font_color = imagecolorallocate($image, 0, 0, 0);

    // Write the student name on the image at the specified coordinates
    imagettftext($image, $font_size, 0, $name_x, $name_y, $font_color, "ans_sheet_gen/font/TNR.ttf", $student_name);

    require_once('ans_sheet_gen/phpqrcode/qrlib.php');

    // Generate the QR code for the student
    $qr_data = $student_name;
    $qr_filename = "ans_sheet_gen/qr/" . $student_name . "_qr.png";
    QRcode::png($qr_data, $qr_filename, QR_ECLEVEL_L, 150, 2);

    // Load the QR code image
    $qr_image = imagecreatefrompng($qr_filename);

    // Resize the QR code image 
    $qr_image_resized = imagescale($qr_image, 210, 195);

    // Copy the resized QR code image onto the answer sheet image at the specified coordinates
    imagecopy($image, $qr_image_resized, $qr_x, $qr_y, 0, 0, 210, 195);

    // Destroy the resized QR code image to free up memory
    imagedestroy($qr_image_resized);

    // Generate the filename for the modified image
    $filename = "ans_sheet_gen/answer_sheet/". $student_name . ".png";

    // Save the modified image as a new PNG file
    imagepng($image, $filename);

    // Destroy the images to free up memory
    imagedestroy($image);
    imagedestroy($qr_image);

    // Add the modified image to the PDF document
    $pdf->Image($filename, 0, 0, 148, 210);

    // Add a new page to the PDF document
    $pdf->AddPage();
}


// Output the PDF documents
$pdf->Output('Answer Sheet.pdf', 'D');

// Close the database connection
mysqli_close($con);
?>
