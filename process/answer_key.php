<!DOCTYPE html>
<html>
<head>
  <title>Answer Key Template</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <style>
  h1 {
  text-align: center;
  margin-top: 4rem;
  margin-bottom: 2rem;
  font-size: 2.5rem;
  font-weight: bold;
  color: #333;
}

    table {
      border-collapse: separate;
      margin: 0 auto;
      width: 18px;
    }
    th,
    td {
      padding: 8px;
      text-align: center;
      border: 1px ridge #787d79;
      font-weight: bold;
    }

    th {
      font-weight: bold;
      padding: 10px;
    }

    input[type='submit'],
    input[type='button'] {
      margin-top: 1rem;
      width: 100%;
      align-items: center;
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
  <div class="container">
    <h1 class="text-center my-4">Answer Key</h1>
    <form method="post" action="submit.php">
      <div class="table-responsive">
        
          <tbody>
            <?php
            echo "<table>";
            for ($i = 1; $i <= 10; $i++) {
              echo "<tr>";
              for ($j = $i; $j <= 50; $j += 10) {
                echo '<style>input[type="radio"] {height: 20px;width: 20px;}</style>';
                echo "<td style='color:white;background-color:black;'>{$j}</td>";
                echo "<td><input type='radio' name='q{$j}' value='1'></td>";
                echo "<td><input type='radio' name='q{$j}' value='2'></td>";
                echo "<td><input type='radio' name='q{$j}' value='3'></td>";
                echo "<td><input type='radio' name='q{$j}' value='4'></td>";
              }
              echo "</tr>";
            }
            echo "</table>";
            ?>
          </tbody>
        </table>
      </div>
      <div class="d-flex justify-content-center">
        <input type="submit" class="btn btn-primary mr-2" value="Submit">
        <input type="button" class="btn btn-secondary mr-2" value="Clear" onclick="clearInputs()">
        <input type="button" class="btn btn-secondary mr-2" value="Cancel" onclick="window.location.href='../home.php'">
        <input type="button" class="btn btn-secondary mr-3" value="View Answer Key" onclick="window.location.href='master_key.php'">
      </div>
    </form>
  </div>
  <script>
    function clearInputs() {
      const radioInputs = document.querySelectorAll("input[type='radio']");
      radioInputs.forEach((input) => {
        input.checked = false;
      });
    }
  </script>
</body>
</html>
