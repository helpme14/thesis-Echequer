<form method="POST" action="create.php">
  <div class="form-group">
    <label for="student_number">Student Number:</label>
    <input type="text" class="form-control" id="student_number" name="student_number" required>
  </div>
  <div class="form-group">
    <label for="student_name">Name:</label>
    <input type="text" class="form-control" id="student_name" name="student_name" required>
  </div>
  <div class="form-group">
    <label for="score">Score:</label>
    <input type="number" class="form-control" id="score" name="score" required>
  </div>
  <button type="submit" class="btn btn-success">Create</button>
</form>
