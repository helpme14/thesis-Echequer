<?php
include 'db.php';

// Check if the clear button was clicked
if(isset($_POST['clear'])) {
    $sql = "DELETE FROM students_tbl";
    mysqli_query($con, $sql);
}

// Select all data from the table
$sql = "SELECT * FROM students_tbl";  
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
  <style>
  .modal-title {
  font-size: 15px;
  font-weight: bold;
  text-align: center;
}

  img{
    width: 150px;
    align-items: right;
    margin-bottom: 20px;
    margin-top: 20px;
  }
  .custom-btn {
    font-size: 15px;
    margin-bottom: 20px;
  }
  #importModal .download {
  display: block;
  margin: 0 auto;
  color: black;
  width: 100%;
  }
  .modal-title {
  font-size: 20px;
  }
  .modal-body .btn-primary {
  margin-top: 5px;
  padding: 5px 50px;
  }
  .form-group {
  display: inline-block;
  margin-right: 10px;
  }
  .form-container {
  text-align: center;
  }
  .download-container {
  text-align: center;
  }
  .download {
  display: inline-block;
  }
  .table-responsive {
    border: none; /* or border: transparent; */

}
.custom-btn {
  width: 150px;
  margin: 5px;
}
  .modal-title {
    text-align: center;
    font-size: 10px;
}
  .modal-body::after {
    content: "";
    display: table;
    clear: both;
  }
  .modal-body .btn-primary {
    margin-top: 5px;
    padding: 5px 50px;
    float: right;
  }
  .close {
    border: 1px solid #ccc;
    border-radius: 50%;
    padding: 5px 10px;
  }
</style>
</head>
<body>
  <!-- header -->
  <?php include 'header.php'; ?>
  <!-- header -->
  <div class="container"><br/><br/><br/>
    <div class="table-responsive" style="border: none; overflow-x: hidden;">
    
        <div class="row justify-content-center text-center">

        <div class="col-xs-12 col-sm-2">
        <button type="button" class="btn btn-primary btn-sm custom-btn" data-toggle="modal" data-target="#importModal" >Import</button>      
        </div>            

        <div class="col-xs-12 col-sm-2">
            <form method="post" action="process/export.php">
            <input type="submit" name="export" class="btn btn-primary btn-sm custom-btn" value="Export" /></form>
        </div>

        <div class="col-xs-12 col-sm-2">
        <form action="" method="post">
            <input type="submit" name="clear" class="btn btn-danger btn-sm custom-btn" value="Clear" /></form>
        </div>

        <div class="col-xs-12 col-sm-2">
        <form method="post" action="process/answer_key.php" formnovalidate>
        <input type="submit" name="clear" class="btn btn-success btn-sm custom-btn" value="Answers Key" /></form>
        </div>

        <div class="col-xs-12 col-sm-2">
        <form method="post" action="process/answer_sheet.php">
            <input type="submit" name="clear" class="btn btn-success btn-sm custom-btn" value="Generate Answer Sheet" /></form>
        </div>
        <div class="col-xs-12 col-sm-2">
        <form method="post" action="process/preview.php">
            <input type="submit" name="clear" class="btn btn-info btn-sm custom-btn" value="Preview Student Exam" /></form>
        </div>  

        </div>
    </div>

        <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h5 class="modal-title" id="importModalLabel"> Import Excel File <br><br>"Do you not have an Excel template yet? No worries! You can download the template file below by clicking on the download button provided."</h5>
            <a href="process/excel_file/excel_template.xlsx" download>
              <br>
            <button type="button" class="download">Download Template File</button></a>
            </div>
            <div class="modal-body">
                <form action="process/import.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="import_file" class="form-control" />
                <button type="submit" name="save_excel_data" class="btn btn-primary mt-5">Import</button>
                </form>
            </div>
            </div>
        </div>  
        </div>
        <br>  
        <div class="form-container">
          <form id="create-form">
            <div class="form-group">
              <label for="student_number">Student Number</label>
              <input type="text" class="form-control" id="student_number" name="student_number" required autocomplete="off">
            </div>
            <div class="form-group">
              <label for="student_name">Student Name</label>
              <input type="text" class="form-control" id="student_name" name="student_name" required autocomplete="off">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary mt">Add Student</button>
          </div>
        </form> 
      </div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(function() {
    $('#create-form').submit(function(e) {
      e.preventDefault(); // Prevent form from redirecting to another page upon submitting
      
      // Get form data
      var formData = $(this).serialize();

      // Send AJAX request to create.php to insert data into database
      $.ajax({
        url: 'actions/create.php',
        type: 'POST',
        data: formData,
        success: function(response) {
          alert(response); // Show success message
          $('#create-form')[0].reset(); // Reset form fields
          window.location.href = "home.php";
        },
        error: function(xhr, status, error) {
          alert("Error inserting record: " + xhr.responseText); // Show error message
        }
      });
    });
  });
</script>

    <br />
    <div class="table-responsive text-center">
  <table class="table table-bordered">
    <tr>
      <th class="text-center">Student Number</th>
      <th class="text-center">Name</th>
      <th class="text-center">Score</th>

    </tr>
    <?php
    while($row = mysqli_fetch_array($result))
    {
      echo '
      <tr>
        <td>'.$row["student_number"].'</td>
        <td>'.$row["student_name"].'</td>
        <td>'.$row["student_score"].'</td>

        <td>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal'.$row["student_number"].'">Edit</button>
          <form method="POST" action="actions/delete.php" style="display:inline-block;">
            <input type="hidden" name="student_number" value="'.$row["student_number"].'">
            <button type="submit" class="btn btn-danger" onclick="return confirm(\'Are you sure you want to delete this record?\')">Delete</button>
          </form>
        </td>
      </tr>
      
      <!-- Edit Modal -->
      <div class="modal fade" id="editModal'.$row["student_number"].'" tabindex="-1" role="dialog" aria-labelledby="editModal'.$row["student_number"].'Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editModal'.$row["student_number"].'Label">Edit Student Record</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="edit.php" method="POST">
                <div class="form-group">
                  <label for="student_number">Student Number</label>
                  <input type="text" class="form-control" id="student_number" name="student_number" value="'.$row["student_number"].'" readonly>
                </div>
                <div class="form-group">
                  <label for="student_name">Student Name</label>
                  <input type="text" class="form-control" id="student_name" name="student_name" value="'.$row["student_name"].'">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      ';
    }
    
    ?>
  </table>
</div>
  </div>
</body>
</html>