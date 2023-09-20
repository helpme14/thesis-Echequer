<?php
// export.php
require_once 'vendor/autoload.php';
include '../db.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$output = '';
if (isset($_POST["export"])) {
    $query = "SELECT * FROM students_tbl";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Student Number');
        $sheet->setCellValue('B1', 'Student Name');
        $sheet->setCellValue('C1', 'Student Score');


        foreach(range('A','C') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        $rowIndex = 2;
        while ($row = mysqli_fetch_array($result)) {
            $sheet->setCellValue('A'.$rowIndex, $row["student_number"]);
            $sheet->setCellValue('B'.$rowIndex, $row["student_name"]);
            $sheet->setCellValue('C'.$rowIndex, $row["student_score"]);
            $rowIndex++;
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Exported.xlsx"');
        $writer->save('php://output');
        exit;
    } else {
        echo "<script>alert('There is no data to export.'); window.location.href = '../home.php';</script>";
    }
}
