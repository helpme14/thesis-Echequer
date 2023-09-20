<?php
include '../db.php';

    // Retrieve all data from the database
    $sql = "SELECT student_name, student_score, student_exam FROM students_tbl";
    $result = mysqli_query($con, $sql);
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Student Exam Paper</title>
    <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
      <style>
    table {
    border-collapse: collapse;
    width: 100%;
    }
    td, th {
    padding: 8px;
    text-align: left;
    vertical-align: top;
    }
    td {
    border: 1px solid #ddd;
    }

    th {
    border: 1px solid #ddd;
    background-color: #f2f2f2;
    }

    td:first-child, th:first-child {
        text-align: center;
    width: 40%;
    }

    td:last-child, th:last-child {
        text-align: center; 
    width: 50%;
    }

    img[src="../img/logo.png"] {
        width: 150px;
        align-items: right;
        margin-bottom: 20px;
        margin-top: 20px;
    }
    img{
        max-width: 100%;
    }
    .header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-left: 30px;
    padding-right: 30px;
    background-color: #82aef5;

    }
    .container-fluid {
    overflow-x: hidden;
    padding-right: 0;
    padding-left: 0;
    margin-right: auto;
    margin-left: auto;
    width: 100%;
    max-width: none;
    }
    
    .navbar-toggle {
    border: none;
    background-color: transparent;
    margin-top: 15px;
    }
    
    .navbar-toggle .icon-bar {
    background-color: #333;
    height: 3px;
    width: 25px;
    margin-top: 2px;
    }
    
    .navbar-nav > li > a {
    color: #333;
    font-weight: bold;
    }
    
    .navbar-nav > li > a:hover,
    .navbar-nav > li > a:focus {
    color: #555;
    }
    
    .dropdown-toggle {
    color: #333;
    font-weight: bold;
    position: relative;
    }
    
    .dropdown-toggle:hover,
    .dropdown-toggle:focus {
    color: #555;
    background-color: transparent;
    }
    
    .dropdown-toggle:before {
    content: "";
    display: block;
    position: absolute;
    top: 50%;
    right: 15px;
    margin-top: -2px;
    border-top: 6px solid;
    border-right: 6px solid transparent;
    border-left: 6px solid transparent;
    }
    
    .dropdown-menu {
    background-color: #810606;
    border: none;
    box-shadow: 0 4px 4px rgba(0, 0, 0, 0.1);
    border-radius: 0;
    margin-top: 5px;
    }
    
    .dropdown-menu > li > a {
    color: #333;
    font-weight: bold;
    padding: 10px 20px;
    }
    
    .dropdown-menu > li > a:hover,
    .dropdown-menu > li > a:focus {
    color: #bb1c1c;
    background-color: transparent;
    }
    
    .dropdown-menu > li > a:before {
    content: "";
    display: block;
    position: absolute;
    top: 50%;
    left: 20px;
    margin-top: -2px;
    border-top: 6px solid;
    border-right: 6px solid transparent;
    border-left: 6px solid transparent;
    }
    
    .dropdown-menu > li > a:hover:before,
    .dropdown-menu > li > a:focus:before {
    border-top-color: #555;
    }
  </style>  

</head>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <div class="header">
        <a href="../home.php"><img src="../img/logo.png" alt="Logo"></a>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="../home.php">Home</a></li>
            <li><a href="../team.php">Team</a></li>
            <li><a href="../logout.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
   </head>  
  <body>
  <table>
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Student Score</th>
                <th>Student Exam Paper</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <?php if (!empty($row['student_exam'])): ?>
                    <tr>
                        <td style="font-size: 16px; text-align: center; vertical-align: middle;"><?php echo $row['student_name']; ?></td>
                        <td style="font-size: 16px; text-align: center; vertical-align: middle;"><?php echo $row['student_score']; ?></td>
                         <td><a href="#" onclick="showImage('<?php echo base64_encode($row['student_exam']); ?>')"><img src="data:image/jpeg;base64,<?php echo base64_encode($row['student_exam']); ?>"></a>
                        </td>
                        <script>
                        function showImage(base64) {
                        var img = new Image();
                        img.onload = function() {
                            var w = window.open("");
                            w.document.write("<img src='" + img.src + "' style='max-width:100%;max-height:100%;'>");
                        };
                        img.src = "data:image/jpeg;base64," + base64;
                        }
                        </script>

                    </tr>
                <?php endif; ?>
            <?php endwhile; ?>
        </tbody>
    </table>
  
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
