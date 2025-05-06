<?php
include "connection.php";
if (isset($_POST['submit'])) {
  $nim = $_POST['nim'];
  $course_id = $_POST['course_id'];
  $enrollment_date = $_POST['enrollment_date'];

  $q = "INSERT INTO `enrollments`(`nim`, `course_id`, `enrollment_date`) 
        VALUES ('$nim', '$course_id', '$enrollment_date')";

  $query = mysqli_query($conn, $q);
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Tambah Enrollment</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="popper.min.js"></script>
  <script src="bootstrap.min.js"></script>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Enrollments</a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="index.php">Home</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="col-lg-6 m-auto">
    <form method="post">
      <br><br>
      <div class="card">
        <div class="card-header bg-primary">
          <h1 class="text-white text-center">Create Enrollment</h1>
        </div><br>

        <label>NIM:</label>
        <input type="text" name="nim" class="form-control" required><br>

        <label>Course ID:</label>
        <input type="number" name="course_id" class="form-control" required><br>

        <label>Enrollment Date:</label>
        <input type="date" name="enrollment_date" class="form-control" required><br>

        <button class="btn btn-success" type="submit" name="submit">Submit</button><br>
        <a class="btn btn-info" href="index.php">Cancel</a><br>
      </div>
    </form>
  </div>
</body>

</html>
