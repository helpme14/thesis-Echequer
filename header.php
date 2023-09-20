<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <style>
    
    .header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-left: 30px;
    padding-right: 30px;
    background-color: #82aef5;

  }
  .container-fluid {
  padding-right: 0;
  padding-left: 0;
  margin-right: auto;
  margin-left: auto;
  width: 100%;
  max-width: none;
  overflow-x: hidden;
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
        <a href="home.php"><img src="img/logo.png" alt="Logo"></a>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="home.php">Home</a></li>
            <li><a href="team.php">Team</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>