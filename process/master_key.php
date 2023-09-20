<!DOCTYPE html>
<html>
<head>
	<title>Answer Key</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<style>
		h1 {
			text-align: center;
			margin-top: 20px;
			margin-bottom: 20px;
			font-size: 36px;
			font-weight: bold;
			color: #333;
		}
	</style>
<body>
	<div class="container">
        <h1> Answer Key</h1>
		<?php
			include '../db.php';

			// Retrieve the numbers array from the database
			$sql = "SELECT answers FROM answer_key WHERE id = 1"; // Replace table_name and id with your table and record ID
			$result = mysqli_query($con, $sql);

			if (mysqli_num_rows($result) > 0) {
				$row = mysqli_fetch_assoc($result);
				$numbers = explode(',', $row['answers']);
			} else {
				echo "No results found.";
				exit;
			}

			// Convert the numbers array to letters
			$letters = array('A', 'B', 'C', 'D');
			$count = 1;
			echo "<div class='table-responsive'>";
			echo "<table class='table table-bordered'>";
			for ($i = 0; $i < 10; $i++) {
				echo "<tr>";
				for ($j = $i; $j < count($numbers); $j += 10) {
					$number = $numbers[$j];
					$letter = $letters[$number - 1];
					echo "<td>" . ($j+1) . '. ' . $letter . "</td>";
					$count++;
				}
				echo "</tr>";
			}
			echo "</table>";
			echo "</div>";

			// Close the database connection
			mysqli_close($con);
		?>
	</div>
	<div class="d-flex justify-content-center">
        <input type="submit" class="btn btn-primary mr-2" value="Update Answer Key" onclick="window.location.href='answer_key.php'">
        <input type="button" class="btn btn-secondary mr-2" value="Home" onclick="window.location.href='../home.php'">
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

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
